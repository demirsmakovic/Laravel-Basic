@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if (session('succes'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('succes') }}
                        </div>
                      @endif
                        <div class="card-header">Update Brand Name</div>
                         <div class="card-body">
                           <div class="mb-3">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="post" enctype="multipart/form-data">
                               @csrf
                              <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                              <label for="cat_name" class="form-label">Brand Name</label>
                              <input type="text" class="form-control" name="brand_name" value="{{ $brands->brand_name }}">
                              @error('brand_name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <label for="brand_image" class="form-label">Brand Image</label>
                            <input type="file" class="form-control" name="brand_image">
                            @error('brand_image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <br>
                            <div class="form-group">
                                <img src="{{ asset($brands->brand_image) }}" style="width:400px; height:200px;">
                            </div><br>
                            <button type="submit" class="btn btn-primary mb-3">Update brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection