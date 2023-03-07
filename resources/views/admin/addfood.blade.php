@extends('admin.backend.main')
@push('title')
    <title>Add Food Items</title>
@endpush
@section('main-content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                {{--  table sectin start here  --}}
                <div id="table-content">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card-header">
                                    <p class="h3">Add New Restaurant Food Items</p><hr>
                                </div>
                                @if (Session::has('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('msg') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form action="{{ route('add.food.items') }}" method="post" enctype="multipart/form-data">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    @csrf
                                    <div class="row mb-4">
                                      <div class="col-sm-12 col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1">Title</label>
                                          <input type="text" name="title" value="{{ old('title') }}" id="form3Example1" class="form-control text-light" placeholder="Enter your title" />
                                        </div>
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                      </div>

                                      <div class="col col-sm-12 col-md-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example2">Price</label>
                                          <input type="text" name="price" value="{{ old('price') }}" id="form3Example2" class="form-control text-light" placeholder="price" />
                                        </div>
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                      </div>

                                      {{--  <div class="col-sm-12 col-md-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example2">image</label>
                                          <input type="file" name="image" id="form3Example2" class="form-control" />
                                        </div>
                                        @error('image')
                                           <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                      </div>  --}}
                                    </div>

                                    <!-- Message input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example7">Description</label>
                                         <textarea class="form-control text-light" name="description" value="{{ old('description') }}" id="form6Example7" placeholder="Write description about your product..." rows="15"></textarea>
                                         @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Submit button -->
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-success me-3" type="submit">Add Now</button>
                                        <a class="btn btn-danger" href="{{ route('food.items') }}">Cancel</a>                                     </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
            {{--  table section end here  --}}

            </div>
          </div>
          <!-- content-wrapper ends -->

@endsection


