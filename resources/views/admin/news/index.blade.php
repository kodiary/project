@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">News</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">News</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
  	<p>
  		<a href="{{ route('admin.news.create') }}" class="btn btn-primary">Add New News</a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>ID</th>
  			<th>Title</th>
        <th>Category</th>
  			<th>Action</th>
  		</tr>
      @if(count($news))
  		@foreach($news as $n)
  			<tr>
  				<td>{{ $n->id }}</td>
  				<td>{{ $n->title }}</td>
          <td>{{ $n->category->title }}</td>
  				<td>
            <a href="{{ route('admin.news.edit',$n->id) }}" class="btn btn-info">Edit</a> 
            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
            <form action="{{ route('admin.news.destroy',$n->id) }}" method="post">
              @method('DELETE')
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          </td>
  			</tr>
  		@endforeach
      @else
      <tr><td colspan="3">No News Found</td></tr>
      @endif
  	</table>
    {{ $news->render() }}
  </div>
</section>	


@endsection