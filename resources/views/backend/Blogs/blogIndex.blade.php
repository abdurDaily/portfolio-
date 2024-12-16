@extends('backend.layout')
@section('backend_contains')
@push('backend_css')
<link rel="stylesheet" href="{{ asset('assets/css/richEditor/rte_theme_default.css') }}">
@endpush

<div class="container">

    <form action="{{ route('backend.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <label for="title">Title <b class="text-danger">*</b> </label>
                <input type="text" name="blog_title" placeholder="Title" class="form-control p-4 mb-2">
                @error('blog_title')
                <b class="text-danger">{{ $message }}</b> <br>
                @enderror
            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-xl-5">
                        <label for="blog_preview_image">Preview image <b class="text-danger">*</b> </label>
                        <input name="blog_preview_image" type="file" class="form-control p-4" id="blog_preview_image">
                        @error('blog_preview_image')
                        <b class="text-danger">{{ $message }}</b> <br>
                        @enderror
                    </div>
                    <div class="col-xl-2 text-center mt-2">
                        <img height="110" id="imagePreview" src="{{ asset('assets/images/placeholder.jpg') }}" alt="Image Preview">
                    </div>
                    <div class="col-xl-5">
                            <label for="">Select Category <b class="text-danger">*</b></label>
                            <select name="blog_category" id="" class="form-control p-4 mb-2 text-center">
                                <option value="" selected disabled>----Select Category----</option>
                                <option value="1">Web Development</option>
                            </select>
                            @error('blog_category')
                            <b class="text-danger">{{ $message }}</b> <br>
                            @enderror
                    </div>
                </div>
    
            </div>


            <div class="col-12">
                <label for="blog_details">Blog Details <b class="text-danger">*</b></label>
                <textarea name="blog_details" id="richEditor"></textarea>
                @error('blog_details')
                <b class="text-danger">{{ $message }}</b> <br>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 p-3 mt-3">Submit</button>
    </form>
</div>




@push('backend_js')
<script src="{{ asset('assets/js/richEditor/rte.js') }}"></script>
<script src="{{ asset('assets/js/richEditor/all_plugins.js') }}"></script>
<script>
    var editor1 = new RichTextEditor("#richEditor");


    // IMAGE PREVIEW 
    $(document).ready(function() {
        $('#blog_preview_image').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const imageUrl = URL.createObjectURL(file);
                $('#imagePreview').attr('src', imageUrl).show();
            } else {
                $('#imagePreview').hide(); 
            }
        });
    });
</script>
@endpush
@endsection