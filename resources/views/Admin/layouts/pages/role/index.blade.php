@extends('Admin.layouts.master')

@push('admin_style')
@endpush

@section('page_title')
Role Index
@endsection

@section('admin_content')
<div class="row">
    <div class="col">
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="card-header">Permission</h5>
        <a class="btn btn-primary me-4" href="{{ route('role.create') }}">Add new</a>
    </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Role Name</th>
                    <th>Role Slug</th>
                    <th>Permission</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($roles as $role)
                    <tr>
                        <td><strong>{{ $loop->index+1 }}</strong></td>
                        <td>{{ $role->role_name }}</td>
                        <td>{{ $role->role_slug }}</td>
                        <td>
                            @foreach ($role->permissions->chunk(5) as $key=>$chunks)
                            <div class="row">
                                <div class="col">
                                    @foreach ($chunks as $permission )
                                    <span class="badge bg-success">{{ $permission->permission_slug }}</span>
                                    @endforeach
                                </div>

                            </div>
                            @endforeach
                        </td>
                        <td>{{ $role->updated_at->format('(D)-d-M-Y') }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('role.edit',$role->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                             <form action="{{ route('role.destroy',$role->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item show_confirm" href=""><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @empty

                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection


@push('admin_script')
<script>
$(document).ready(function(){

    $('.show_confirm').click(function(event){
        let form=$(this).closest('form');
        event.preventDefault();

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();s
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })

    });
});

</script>

@endpush
