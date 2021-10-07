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
                   <div class="card-header">Contact</div>
                    <table class="table">
                        <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Company Address</th>
                             <th scope="col">Company Email</th>
                             <th scope="col">Company Phone</th>
                             <th scope="col">Action</th>
                         </tr>
                        </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($contact as $con)
                            <tr>
                         <th scope="row">{{ $i++ }}</th>
                         <td>{{ $con->address }}</td>
                         <td>{{ $con->email }}</td>
                         <td>{{ $con->phone }}</td>
                         <td><a class="btn btn-info" href="{{ url('contact/edit/'.$con->id) }}">Edit</a> 
                             <a class="btn btn-danger" href="{{ url('contact/delete/'.$con->id) }}">Delete</a></td>
                     </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Contact Info</div>
                        <div class="card-body">
                           <div class="mb-3">
                            <form action="{{route('contact.store')}}" method="post" enctype="multipart/form-data">
                               @csrf
                              <label for="address" class="form-label">Address</label>
                              <input type="text" class="form-control" name="address" placeholder="">
                              @error('address')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <label for="email" class="form-label">Email</label>
                              <input type="text" class="form-control" name="email" placeholder="">
                              @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control" name="phone" placeholder="">
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