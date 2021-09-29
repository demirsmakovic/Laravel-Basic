@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
<div class="col-lg-12">
<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>Edit Slider</h2>
	</div>
	<div class="card-body">
            <form action="{{ url('slider/update/'.$sliders->id) }}" method="post" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="old_image" value="{{ $sliders->image }}">
			<div class="form-group">
				<label for="exampleFormControlInput1">Title</label>
				<input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $sliders->title }}">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Description</label>
				<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $sliders->description }}</textarea>
            </div>
			<div class="form-group">
				<label for="exampleFormControlFile1">Image</label>
				<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			</div>
            <div class="form-group">
                <img src="{{ asset($sliders->image) }}" style="width:400px; height:200px;">
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