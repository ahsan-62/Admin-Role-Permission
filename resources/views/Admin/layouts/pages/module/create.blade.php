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
              <h5 class="mb-0">Module Create Page</h5>
              <small class="text-muted float-end"> <a href="" class="btn btn-secondary"><i class='bx bx-left-arrow-alt'></i> Back to Module List</a> </small>
            </div>
            <div class="card-body">
              <form action="{{ route('module.store') }}" method="post">
                @csrf
                <div class="mb-3 @error('module_name') is-invalid @enderror">
                  <label class="form-label" for="basic-default-fullname">Module Name</label>
                  <input type="text" name="module_name" class="form-control" id="basic-default-fullname" placeholder="Enter Module Name">
                </div>
                @error('module_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <button type="submit" class="btn btn-primary">Add Module</button>
              </form>
            </div>
          </div>

    </div>
 </div>

@endsection


@push('admin_script')
@endpush




