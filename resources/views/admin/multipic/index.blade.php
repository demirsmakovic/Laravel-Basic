<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <b>Multi Image</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if (session('succes'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('succes') }}
                        </div>
                      @endif
                 <div class="card-group">
                     @foreach ($images as $multi)
                       <div class="col-md-4 mt-5">
                          <div class="card">
                      
                            <img src="{{ asset($multi->image) }}" class="card-img-top" alt="">
                    
                          </div>
                       </div>
                         
                     @endforeach
                </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Multi Image</div>
                        <div class="card-body">
                           <div class="mb-3">
                            <form action="{{route('store.image')}}" method="post" enctype="multipart/form-data">
                               @csrf
                              <label for="formFile" class="form-label">Multi Image</label>
                              <input class="form-control" type="file" name="image[]" id="formFile" multiple>
                              @error('image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Save Image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>












       
    </div>
</x-app-layout>