@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                      @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('succes') }}
                        </div>
                      @endif
                   <div class="card-header">All Sliders
                       <a href="{{ route('create.slider') }}" class="float-right btn btn-info">Add Slider</a>
                   </div>
                    <table class="table">
                        <thead>
                         <tr>
                             <th scope="col" width="5%">#</th>
                             <th scope="col" width="15%">Title</th>
                             <th scope="col" width="25%">Description</th>
                             <th scope="col" width="15%">Image</th>
                             <th scope="col" width="15%">Action</th>
                         </tr>
                        </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($sliders as $slider)
                            <tr>
                         <th scope="row">{{ $i++ }}</th>
                         <td>{{ $slider->title }}</td>
                         <td>{{ $slider->description }}</td>
                         <td><img src="{{ asset($slider->image) }}" style="height:40px; width:70px;"></td>
                         <td><a class="btn btn-info" href="{{ url('slider/edit/'.$slider->id) }}">Edit</a> 
                             <a class="btn btn-danger" href="{{ url('slider/delete/'.$slider->id) }}">Delete</a></td>
                     </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
                </div>
            </div>
        </div>  
@endsection