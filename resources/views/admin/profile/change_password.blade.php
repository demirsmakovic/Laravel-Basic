@extends('admin.admin_master')
@section('admin')



<div class="col-lg-6">
	<div class="card card-default">
		<div class="card-header card-header-border-bottom">
		    <h2>Change Password</h2>
		</div>
		<div class="card-body">
			<form action="{{ route('update.password') }}" method="post">
            @csrf
			<div class="form-group">
				<label for="exampleFormControlPassword">Current Password</label>
				<input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Password">
                @error('oldpassword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if (session('error'))
                <span class="text-danger"> {{ session('error') }}</span>   
                @endif
			</div>			
            <div class="form-group">
				<label for="exampleFormControlPassword">New Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
			</div>			
            <div class="form-group">
				<label for="exampleFormControlPassword">Confirm Password</label>
				<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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