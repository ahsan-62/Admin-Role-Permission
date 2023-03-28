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
              <h5 class="mb-0">Permission Create Page</h5>
              <small class="text-muted float-end"> <a href="{{ route('permission.index') }}" class="btn btn-secondary"><i class='bx bx-left-arrow-alt'></i> Back to Permission List</a> </small>
            </div>
            <div class="card-body">
              <form action="{{ route('permission.update',$permission->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">Module Name</label>
                    <select  name="module_id" id="" class="form-select">
                        @foreach ($modules as $module )
                        <option value="{{ $module->id }}" @if($permission->module_id == $module->id)selected
                        @endif>{{ $module->module_name }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Permission Name</label>
                  <input type="text" value="{{ $permission->permission_name }}" name="permission_name" class="form-control" id="basic-default-fullname" placeholder="Enter Permission Name">
                </div>
                <button type="submit" class="btn btn-primary">Update Permission</button>
              </form>
            </div>
          </div>

    </div>
 </div>

@endsection


@push('admin_script')
@endpush


