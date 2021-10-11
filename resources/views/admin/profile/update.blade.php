@extends('admin.admin_master')
@section('admin')



<div class="col-lg-6">
	<div class="card card-default">
		<div class="card-header card-header-border-bottom">
		    <h2>Update Profile</h2>
		</div>
		<div class="card-body">
			<form action="{{ route('update.profile') }}" method="post">
            @csrf
			<div class="form-group">
				<label for="exampleFormControlPassword">Name</label>
				<input type="text" class="form-control" id="oldpassword" name="name" value="{{ $user->name }}">
			</div>			
            <div class="form-group">
				<label for="exampleFormControlPassword">Email</label>
				<input type="email" class="form-control" id="password" name="email" value="{{ $user->email }}">
			</div>		
            <div class="form-footer pt-4 pt-5 mt-4 border-top">
			    <button type="submit" class="btn btn-primary btn-default">Submit</button>
			    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
			</div>
			</form>								
		</div>
    </div>
</div>


									
















@endsection