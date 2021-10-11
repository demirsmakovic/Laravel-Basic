@extends('admin.admin_master')
@section('admin')
    


    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="card">
                   <div class="card-header">All Brand</div>
                    <table class="table">
                        <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Brand Name</th>
                             <th scope="col">Brand Image</th>
                             <th scope="col">Created At</th>
                             <th scope="col">Action</th>
                         </tr>
                        </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                         <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                         <td>{{ $brand->brand_name }}</td>
                         <td><img src="{{ asset($brand->brand_image) }}" style="height:40px; width:70px;"></td>
                         <td>{{ $brand->created_at->diffForHumans()}}</td>
                         <td><a class="btn btn-info" href="{{ url('brand/edit/'.$brand->id) }}">Edit</a> 
                             <a class="btn btn-danger" href="{{ url('brand/delete/'.$brand->id) }}">Delete</a></td>
                     </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="blog-pagination">
                    {{ $brands->links() }}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                           <div class="mb-3">
                            <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
                               @csrf
                              <label for="cat_name" class="form-label">Brand Name</label>
                              <input type="text" class="form-control" name="brand_name" id="cat_name" placeholder="">
                              @error('brand_name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <label for="formFile" class="form-label">Brand Image</label>
                              <input class="form-control" type="file" name="brand_image" id="formFile">
                              @error('brand_image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Save Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>












       
    </div>
@endsection