@extends('admin.admin_master')
@section('admin')


<div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                  <div class="card">
                      @if (session('succes'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('succes') }}
                        </div>
                      @endif
                   <div class="card-header">Contact Messages</div>
                    <table class="table">
                        <thead>
                         <tr>
                             <th scope="col" widht="5%">#</th>
                             <th scope="col" widht="15%">Name</th>
                             <th scope="col" widht="15%">Email</th>
                             <th scope="col" widht="15%">Subject</th>
                             <th scope="col" widht="35%">Messages</th>
                             <th scope="col" widht="10%">Action</th>
                         </tr>
                        </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($messages as $msg)
                            <tr>
                         <th scope="row">{{ $i++ }}</th>
                         <td>{{ $msg->name }}</td>
                         <td>{{ $msg->email }}</td>
                         <td>{{ $msg->subject }}</td>
                         <td>{{ $msg->message }}</td>
                         <td>
                             <a class="btn btn-danger" href="{{ url('/contact/delete_msg/'.$msg->id) }}">Delete</a></td>
                     </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>








@endsection