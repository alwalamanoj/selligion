@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Blog</h4>
                    <h6>Create new Blog</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/blog/all" class="btn btn-added">
                        <img
                            src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Blog</a>
                </div>
            </div>
            <form action="/admin/dashboard/blog/save" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @csrf
                        <div class="form-group mb-3">
                            <label>Blog Title*</label>
                            <input type="text" class="form-control" name = "title"  required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug*</label>
                            <input type="text" class="form-control" name = "slug" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label> <br>
                            <textarea name="description" id="" cols="50" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Content*</label> <br>
                            <textarea style='min-height:600px;' class="form-control" id="blog_post_body" aria-describedby="blog_post_body_help" name='post_body'>
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="col-lg-2 col-form-label"
                                   for="example-fileinput">Thumbnail*</label>
                            <div class="col-lg-10">
                                <input type="file" name="thumbnail" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select" name="status" required>
                                    <option value="">Choose Status</option>
                                    <option value="publish">Publish</option>
                                    <option value="hide">Hide</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <button type="reset" class="btn btn-cancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(session('warning'))
        <div id="toast-container" class="toast-container toast-top-right">
            <div class="toast toast-warning" aria-live="polite" style="display: block;">
                <button type="button"class="toast-close-button" role="button">
                    ×
                </button>
                <div class="toast-title">Warning</div>
                <div class="toast-message">{{ session('warning') }}</div>
            </div>
        </div>
    @endif
    @if(session('success'))
        <div id="toast-container" class="toast-container toast-top-right">
            <div class="toast toast-success" aria-live="polite" style="display: block;">
                <button type="button"class="toast-close-button" role="button">
                    ×
                </button>
                <div class="toast-title">Success</div>
                <div class="toast-message">{{ session('success') }}</div>
            </div>
        </div>
    @endif
    <script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
    <script>
        if( typeof(CKEDITOR) !== "undefined" ) {
            CKEDITOR.replace('post_body');
        }
    </script>
@endsection
