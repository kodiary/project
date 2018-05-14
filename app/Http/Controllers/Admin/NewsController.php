<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\News;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['news'] = News::paginate(2);
        return view('admin.news.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['categories'] = Category::all();
        return view('admin.news.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,News $news)
    {
        if($request->image->getClientOriginalName()){
            $ext =  $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/news',$file);
        }
        else
        {
            $file = '';
        }
        $news->category_id = $request->category_id;
        $news->image = $file;
        $news->title = $request->title;
        $news->author = $request->author;
        $news->description = $request->description;
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $arr['news'] = $news;
        $arr['categories'] = Category::all();
        return view('admin.news.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext =  $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/news',$file);
        }
        else
        {
            if(!$news->image)
                $file = '';
            else
                $file = $news->image;
        }
        $news->category_id = $request->category_id;
        $news->image = $file;
        $news->title = $request->title;
        $news->author = $request->author;
        $news->description = $request->description;
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
