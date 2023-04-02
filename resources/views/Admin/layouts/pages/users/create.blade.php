@extends('Admin.layouts.master')

@push('admin_style')
@endpush

@section('page_title')
Module Create
@endsection

@section('admin_content')
 <div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Users Create Page</h5>
              <small class="text-muted float-end"> <a href="{{ route('permission.index') }}" class="btn btn-secondary"><i class='bx bx-left-arrow-alt'></i> Back to Users List</a> </small>
            </div>
            <div class="card-body">
              <form action="{{ route('user.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">Role Name</label>
                    <select  name="role_id" id="" class="form-select">
                      <option><b>Select role</b></option>
                        @foreach ($roles as $role )
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Name</label>
                    <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Enter User Name">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Email</label>
                    <input type="email" name="email" class="form-control" id="basic-default-fullname" placeholder="Enter User Email">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Password</label>
                    <input type="password" name="password" class="form-control" id="basic-default-fullname" placeholder="Enter user Password">
                </div>


                <button type="submit" class="btn btn-primary">Create User</button>
              </form>
            </div>
          </div>

    </div>
 </div>

@endsection


@push('admin_script')
@endpush


