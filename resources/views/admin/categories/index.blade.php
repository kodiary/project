@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Categories</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
  	<p>
  		<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>ID</th>
  			<th>Title</th>
  			<th>Action</th>
  		</tr>
  		@foreach($categories as $c)
  			<tr>
  				<td>{{ $c->id }}</td>
  				<td>{{ $c->title }}</td>
  				<td><a href="#" class="btn btn-info">Edit</a> <a href="#" class="btn btn-danger">Delete</a></td>
  			</tr>
  		@endforeach
  	</table>
  </div>
</section>	


@endsection