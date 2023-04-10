@extends('Admin.layouts.master')
@section('page_title', 'Page Edit')

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>
@endpush


@section('admin_content')
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Your Page</h5>
                    <small class="text-muted float-end">
                        <a href="{{ route('page.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back'></i>All Page</a>
                    </small>
                </div>
                <div class="card-body">
                    <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label" for="page_short">Page Short Description</label>
                                        <textarea name="page_short" class="form-control @error('page_short') is-invalid @enderror" id="page_short" cols="30" rows="10">{{ $page->page_short }}</textarea>
                                        @error('page_short')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label" for="page_long">Page Long Description</label>
                                        <textarea name="page_long" class="form-control @error('page_long') is-invalid @enderror" id="page_long" cols="30" rows="10">{{ $page->page_long }}</textarea>
                                        @error('page_long')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label" for="page_long">Page Meta Description</label>
                                        <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" cols="30" rows="10">{{ $page->meta_description }}</textarea>
                                        @error('meta_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="profile-image">Page Image Upload</label>
                                    <input type="file" class="dropify @error('page_image') is-invalid @enderror" name="page_image" data-default-file="{{ asset('uploads/page_images') }}/{{ $page->page_image }}" />
                                    @error('page_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="page_title">Page Title</label>
                                            <input type="text" name="page_title" value="{{ $page->page_title }}" class="form-control @error('page_title') is-invalid @enderror" id="page_title" placeholder="page title">
                                            @error('page_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="page_slug">Page Slug <small class="text-danger text-lowercase">(slug value sholud have '-' example: 'about-us') *</small></label>
                                            <input type="text" name="page_slug" value="{{ $page->page_slug }}" class="form-control @error('page_slug') is-invalid @enderror" id="page_slug" placeholder="page slug">
                                            @error('page_slug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_title">Meta  Title</label>
                                            <input type="text" name="meta_title" value="{{ $page->meta_title }}" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="page title">
                                            @error('meta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                            <input type="text" name="meta_keywords" value="{{ $page->meta_keywords }}" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" placeholder="page slug">
                                            @error('meta_keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin_script')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#page_short' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
    ClassicEditor
    .create( document.querySelector( '#page_long' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
    ClassicEditor
    .create( document.querySelector( '#meta_description' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('.dropify').dropify({
    messages: {
        'default': 'Upload Page image',
    }
});
</script>
@endpush
