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
              <h5 class="mb-0">Role Create Page</h5>
              <small class="text-muted float-end"> <a href="" class="btn btn-secondary"><i class='bx bx-left-arrow-alt'></i> Back to Role List</a> </small>
            </div>
            <div class="card-body">
              <form action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Role Name</label>
                  <input type="text" name="role_name" class="form-control" id="basic-default-fullname" placeholder="Enter Module Name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Role Note</label>
                    <input type="text" name="role_note" class="form-control" id="basic-default-fullname" placeholder="Enter Role Note">
                  </div>

                <div class="mb-2 mt-4">
                    <strong>Manage Permission For Role</strong>
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox"  id="select-all">
                    <label class="form-check-label" for="select-all" > Select All </label>
                </div>

                <div class="mb-5">
                    @foreach ($modules->chunk(2) as $key=>$chunks)
                    <div class="row">
                        @foreach ($chunks as $module)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <h5 class="text-primary">Module:{{ $module->module_name }}</h5>
                            @foreach ($module->permissions as $permission)
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                value="{{ $permission->id }}"
                                id="permission-{{ $permission->id }}">
                                <label class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->permission_name }}</label>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>


                <button type="submit" class="btn btn-primary">Add Role</button>
              </form>
            </div>
          </div>

    </div>
 </div>

@endsection


@push('admin_script')
<script>
    $('#select-all').click(function(event){
        if(this.checked)
        {
            $(':checkbox').each(function(){
                this.checked=true;
            })
        }else{
                $(':checkbox').each(function(){
                this.checked=false;
            })

            }
    })
</script>
@endpush

