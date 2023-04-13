@extends('admin.layouts.master')
@section('page_title', 'General Setting')

@push('admin_style')

@endpush


@section('admin_content')
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">General Setting Form</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back'></i> Back to Dashboard</a>
                </small>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.general.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="site_title">Site Title</label>
                        <input type="text" name="site_title" value="{{ setting('site_title') }}" class="form-control @error('site_title') is-invalid @enderror"  id="site_title" placeholder="Site title">
                        @error('site_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="site_address">Site Address</label>
                        <input type="text" name="site_address" value="{{ setting('site_address') }}" class="form-control @error('site_address') is-invalid @enderror"  id="site_address" placeholder="Site Address">
                        @error('site_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="site_phone">Site Phone Number</label>
                        <input type="phone" name="site_phone" value="{{ setting('site_phone') }}" class="form-control @error('site_phone') is-invalid @enderror"  id="site_phone" placeholder="Site Phone Number">
                        @error('site_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="site_facebook_link">Site Facebook Link (<i class='bx bxl-facebook'></i>)</label>
                        <input type="text" name="site_facebook_link" value="{{ setting('site_facebook_link') }}" class="form-control @error('site_facebook_link') is-invalid @enderror"  id="site_facebook_link" placeholder="Site Facebook Link">
                        @error('site_facebook_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="site_twitter_link">Site Twitter Link (<i class='bx bxl-twitter'></i>)</label>
                        <input type="text" name="site_twitter_link" value="{{ setting('site_twitter_link') }}" class="form-control @error('site_twitter_link') is-invalid @enderror"  id="site_twitter_link" placeholder="Site Twitter Link">
                        @error('site_twitter_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="site_instagram_link">Site Instagram Link (<i class='bx bxl-instagram'></i>)</label>
                        <input type="text" name="site_instagram_link" value="{{ setting('site_instagram_link') }}"  class="form-control @error('site_instagram_link') is-invalid @enderror"  id="site_instagram_link" placeholder="Site Instagram Link">
                        @error('site_instagram_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="site_description">Site Description</label>
                        <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror" id="site_description" cols="30" rows="10">{{ setting('site_description') }}</textarea>
                        @error('site_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('admin_script')

@endpush
