@extends('admin.backend.main')
@push('title')
    <title>All Food Items</title>
@endpush
@section('main-content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$12.34</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Potential growth</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$17.34</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Revenue current</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$12.34</h3>
                          <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Daily Income</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$31.53</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                  </div>
                </div>
              </div>
            </div>

          {{--  table sectin start here  --}}
          <div id="table-content">
               <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-header">
                                <p class="h3">Users Data Table</p>
                            </div>
                            @if (Session::has('msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('msg') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td><strong>Id</strong></td>
                                        <td><strong>Food Item Title</strong></td>
                                        <td><strong>Food Image</strong></td>
                                        <td><strong>Food Price</strong></td>
                                        <td><strong>Food Description</strong></td>
                                        <td><strong>History</strong></td>
                                        <td><strong>Action</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($food_Items as $food_Item)
                                    <tr>
                                        <td>{{ $food_Item->id }}</td>
                                        <td>{{ $food_Item->title }}</td>
                                        <td>
                                            <img src="{{ url('app/uploads/' .$food_Item->image) }}" alt="food image">
                                            {{--  <img src="{{ asset('images/'.$food_Item->image) }}" alt="hhg">  --}}
                                        </td>
                                        <td>{{ $food_Item->price }}</td>
                                        <td>{{ $food_Item->description }}</td>
                                        <td>{{ $food_Item->created_at }}</td>
                                        <td>

                                            {{--  start toggle button  --}}
                                            <!-- Button trigger modal -->
                                            <a href="{{  }}"><button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#exampleModalCenter">
                                              Update
                                            </button></a>

                                            <!-- Modal -->
                                            <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title text-light" id="exampleModalLongTitle">Update Food Items Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body bg-light">
                                                     {{--  form section start here  --}}
                                                     <form action="{{ route('submit.foodItems') }}" method="post" enctype="multipart/form-data">
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

                                                          <div class="col-sm-12 col-md-3">
                                                            <div class="form-outline">
                                                                <label class="form-label" for="form3Example2">image</label>
                                                              <input type="file" name="image" id="form3Example2" class="form-control" />
                                                            </div>
                                                            @error('image')
                                                               <span class="text-danger">{{ $message }}</span>
                                                           @enderror
                                                          </div>
                                                        </div>

                                                        <!-- Message input -->
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label" for="form6Example7">Description</label>
                                                             <textarea class="form-control text-light" name="description" value="{{ old('description') }}" id="form6Example7" placeholder="Write description about your product..." rows="15"></textarea>
                                                             @error('description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                      </form>
                                                     {{--  form section end here  --}}
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            {{--  end toggle button  --}}

                                            <a class="btn btn-danger" href="{{ route('delete.foodItems', ['id' => $food_Item->id]) }}" onclick="return confirm('Are you sure to delete this Food Items ?')">Delete</a>
                                        </td>
                                   </tr>
                                    @endforeach
                                </tbody>
                          </table>
                        </div>
                    </div>
                </div>
               </div>
          </div>
          {{--  table section end here  --}}


          </div>
          <!-- content-wrapper ends -->

@endsection


