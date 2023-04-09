@extends('Admin.layouts.master')

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('page_title')
Update Profile
@endsection

@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Update Your Profile</h5>
              <small class="text-muted float-end"> <a href="{{ route('home') }}" class="btn btn-secondary"><i class='bx bx-left-arrow-alt'></i> Dashboard</a> </small>
            </div>
            <div class="card-body">
              <form action="{{ route('postupdate.profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">Profile Image</label>
                    <input type="file" class="dropify" data-default-file="{{ asset('uploads/profile_images') }}/{{ $authuser->user_image }}" name="user_image" />
                </div>
                <div class="mb-3 @error('name') is-invalid @enderror">
                  <label class="form-label" for="basic-default-fullname">User Name</label>
                  <input type="text" value="{{ $authuser->name }}" name="name" class="form-control" id="basic-default-fullname" placeholder="Enter User Name">
                </div>
                @error('module_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="mb-3 @error('email') is-invalid @enderror">
                    <label class="form-label" for="basic-default-fullemail">Email</label>
                    <input type="email" value="{{ $authuser->email }}" name="email" class="form-control" id="basic-default-fullemail" placeholder="Enter Email Name">
                  </div>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>

    </div>
 </div>
@endsection


@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.dropify').dropify({
    messages: {
        'default': 'Drag/Drop Your Profile Picture',
    }
});
</script>
@endpush
