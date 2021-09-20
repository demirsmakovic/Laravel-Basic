<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <b>All Category</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="card">
                      @if (session('succes'))
                        <div class="alert alert-success" role="alert">
                            {{ session('succes') }}
                        </div>
                      @endif
                   <div class="card-header">All Category</div>
                    <table class="table">
                        <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Name</th>
                             <th scope="col">User id</th>
                             <th scope="col">Created At</th>
                         </tr>
                        </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                         <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                         <td>{{ $category->category_name }}</td>
                         <td>{{ $category->user->name }}</td>
                         <td>{{ $category->created_at->diffForHumans()}}</td>
                     </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $categories->links() }}
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                           <div class="mb-3">
                            <form action="{{ route('store.category') }}" method="post">
                               @csrf
                              <label for="cat_name" class="form-label">Category name</label>
                              <input type="text" class="form-control" name="category_name" id="cat_name" placeholder="">
                              @error('category_name')
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
    </div>
</x-app-layout>