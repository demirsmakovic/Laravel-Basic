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
                   <div class="card-header">All Service</div>
                    <table class="table">
                        <thead>
                         <tr>
                             <th scope="col" width="5%">#</th>
                             <th scope="col"width="15%">Title</th>
                             <th scope="col" width="15%">Icon</th>
                             <th scope="col" width="35%">Description</th>
                             <th scope="col" width="25%">Action</th>
                         </tr>
                        </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                         <th scope="row">{{ $services->firstItem()+$loop->index }}</th>
                         <td>{{ $service->title }}</td>
                         <td><img src="{{ asset($service->icon) }}" style="height:40px; width:70px;"></td>
                         <td>{{ $service->description }}</td>
                         <td><a class="btn btn-info" href="{{ url('service/edit/'.$service->id) }}">Edit</a> 
                             <a class="btn btn-danger" href="{{ url('service/delete/'.$service->id) }}">Delete</a></td>
                     </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Service</div>
                        <div class="card-body">
                           <div class="mb-3">
                            <form action="{{route('store.service')}}" method="post" enctype="multipart/form-data">
                              @csrf
			                    <div class="form-group">
				                    <label for="exampleFormControlInput1">Title</label>
				                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror  
			                    </div>
			                    <div class="form-group">
			                    	<label for="exampleFormControlTextarea1">Description</label>
			                    	<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
			                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
			                    <div class="form-group">
			                    	<label for="exampleFormControlFile1">Icon</label>
				                    <input type="file" name="icon" class="form-control-file" id="exampleFormControlFile1">
                                      @error('icon')
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
            </div>
        </div>     
    </div>
@endsection