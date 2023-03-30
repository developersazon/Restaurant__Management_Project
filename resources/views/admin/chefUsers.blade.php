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
            <div class="row">
               <div class="card">
                <div class="card-body">
                        <div class="col-md-12 col-lg-12">
                            <div class="card-header">
                                <p class="h3">Restaurant Chefs User Information</p>
                            </div>
                            @if (Session::has('msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('msg') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{--  new table start here  --}}
                            <table class="table table-hover bg-dark">
                                <thead>
                                  <tr>
                                    <th scope="col"><strong>Id</strong></th>
                                    <th scope="col"><strong>Chef Name</strong></th>
                                    <th scope="col"><strong>Chef Designation</strong></th>
                                    <th scope="col"><strong>Profile Image</strong></th>
                                    <th scope="col"><strong>Description</strong></th>
                                    <th scope="col"><strong>Action</strong></th>
                                  </tr>
                                </thead>
                                <tbody>
                                        @foreach ($chefs_data as $chef_data)
                                        <tr style="border-radius: 25px !important;">
                                            <td>{{ $chef_data->id }}</td>
                                            <td>{{ $chef_data->name }}</td>
                                            <td>{{ $chef_data->designation }}</td>
                                            <td>
                                                <img style="width:45px;" src="{{ asset('images/' .$chef_data->image) }}" alt="food image">
                                            </td>
                                            <td>{{ $chef_data->description }}</td>
                                            <td>
                                                <a class="btn btn-success me-2" href="{{ route('edit.ChefsUsers', ['id'=> $chef_data->id]) }}">Edit</a>
                                                <a class="btn btn-danger" href="{{ route('delete.foodItems', ['id' => $chef_data->id]) }}" onclick="return confirm('Are you sure to delete this Food Items ?')">Delete</a>
                                            </td>
                                       </tr>
                                        @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
               </div>
            </div>
          {{--  table section end here  --}}
          </div>
          <!-- content-wrapper ends -->

@endsection


