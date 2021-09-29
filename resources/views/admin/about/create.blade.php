@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
<div class="col-lg-12">
<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>Create About</h2>
	</div>
	<div class="card-body">
            <form action="{{ route('store.about') }}" method="post" enctype="multipart/form-data">
             @csrf
			<div class="form-group">
				<label for="exampleFormControlInput1">Title</label>
				<input type="text" name="title" class="form-control" id="exampleFormControlInput1">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Short Description</label>
				<textarea class="form-control" name="short_des" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>
            <div class="form-group">
				<label for="exampleFormControlTextarea1">Long Description</label>
				<textarea class="form-control" name="long_des" id="exampleFormControlTextarea2" rows="3"></textarea>
			</div>
			<div class="form-footer pt-4 pt-5 mt-4 border-top">
				<button type="submit" class="btn btn-primary btn-default">Submit</button>
				<button type="submit" class="btn btn-secondary btn-default">Cancel</button>
			</div>
		</form>
	</div>
</div>
</div>
</div> 
</div>   
@endsection