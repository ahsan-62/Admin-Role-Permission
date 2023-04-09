@extends('admin.layouts.master')
@section('page_title', 'Password Update')

@push('admin_style')

@endpush


@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Password Update Form</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back'></i> Back to Dashboard</a>
                </small>
            </div>
            <div class="card-body">
                <form action="{{ route('postupdate.password') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="old-password">User Old Password</label>
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old-password" placeholder="Enter your old password">
                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="old-password">User New Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="old-password" placeholder="Enter new password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="old-password">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="old-password_confirmation" placeholder="Confirm Password Confirmation">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('admin_script')

@endpush
