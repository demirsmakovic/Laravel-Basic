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
                        <div class="card-header">Update Category Name</div>
                        <div class="card-body">
                           <div class="mb-3">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="post">
                               @csrf
                              <label for="cat_name" class="form-label">Category name</label>
                              <input type="text" class="form-control" name="category_name" id="cat_name" value="{{ $categories->category_name }}">
                              @error('category_name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>