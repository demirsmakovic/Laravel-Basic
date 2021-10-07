@extends('admin.admin_master')
@section('admin')


<div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Contact Info</div>
                        <div class="card-body">
                           <div class="mb-3">
                            <form action="{{ url('contact/update/'.$con->id) }}" method="post" enctype="multipart/form-data">
                               @csrf
                              <label for="address" class="form-label">Address</label>
                              <input type="text" class="form-control" name="address" value="{{ $con->address }}">
                              @error('address')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <label for="email" class="form-label">Email</label>
                              <input type="text" class="form-control" name="email" value="{{ $con->email }}">
                              @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control" name="phone" value="{{ $con->phone }}">
                              @error('phone')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>








@endsection