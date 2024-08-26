@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Blog</h4>
                    <h6>Edit Blog</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/blog/all" class="btn btn-added">
                        <img
                            src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Blog</a>
                </div>
            </div>
            <form action="/admin/dashboard/blog/update/{{$blog->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @csrf
                        <div class="form-group mb-3">
                            <label>Blog Title*</label>
                            <input type="text" class="form-control" name = "title" value="{{$blog->title}}"  required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug*</label>
                            <input type="text" class="form-control" name = "slug" value="{{$blog->slug}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label> <br>
                            <textarea name="description" id="" cols="50" rows="10">{{$blog->description}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Content*</label> <br>
                            <textarea style='min-height:600px;' class="form-control" id="blog_post_body" aria-describedby="blog_post_body_help" name='post_body'>
                                {{$blog->body}}
                            </textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Blog Image*</label>
                                <div class="image-">
                                    <input type="file" name="thumbnail" accept=".jpg, .jpeg, .png">
                                </div>
                                <p class="mt-3">Existing Image</p>
                                @if (!is_null($blog->thumbnail_img_path))
                                    <a href="{{asset($blog->thumbnail_img_path)}}" download="">
                                        <img src="{{asset($blog->thumbnail_img_path)}}" class="img-fluid" width="50px">
                                    </a>
                                @else
                                    None
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select" name="status" required>
                                    <option value="">Choose Status</option>
                                    @if ($blog->status == 'publish')
                                        <option selected value="publish">Publish</option>
                                        <option value="hide">Hide</option>
                                    @else
                                        <option value="publish">Publish</option>
                                        <option selected value="hide">Hide</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="/admin/dashboard/blog/all">
                                    <button type="button" class="btn btn-cancel">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
