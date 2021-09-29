@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                      @if (session('succes'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('succes') }}
                        </div>
                      @endif
                   <div class="card-header">All About
                       <a href="{{ route('create.about') }}" class="float-right btn btn-info">Add About</a>
                   </div>
                    <table class="table">
                        <thead>
                         <tr>
                             <th scope="col" width="5%">#</th>
                             <th scope="col" width="10%">Title</th>
                             <th scope="col" width="25%">Short Description</th>
                             <th scope="col" width="35%">Long Description</th>
                             <th scope="col" width="15%">Action</th>
                         </tr>
                        </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($abouts as $about)
                            <tr>
                         <th scope="row">{{ $i++ }}</th>
                         <td>{{ $about->title }}</td>
                         <td>{{ $about->short_des }}</td>
                         <td>{{ $about->long_des }}</td>
                         <td><a class="btn btn-info" href="{{ url('about/edit/'.$about->id) }}">Edit</a> 
                             <a class="btn btn-danger" href="{{ url('about/delete/'.$about->id) }}">Delete</a></td>
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