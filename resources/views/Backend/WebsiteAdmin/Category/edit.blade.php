@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Edit Category</h4>
                    <h6>Edit product Category</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/category/all" class="btn btn-added">
                        <img
                            src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Category</a>
                </div>
            </div>
            <form action="/admin/dashboard/category/update/{{$category->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Category Name*</label>
                                    <input type="text" name="category_name" value="{{$category->category_name}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description (Optional)</label>
                                    <textarea class="form-control" name="category_description">{{$category->category_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Category Image*</label>
                                    <div class="image-">
                                        <input type="file" name="category_file" accept=".jpg, .jpeg, .png">
                                    </div>
                                    <p class="mt-3">Existing Image</p>
                                    @if (!is_null($category->category_img_path))
                                        <a href="{{asset($category->category_img_path)}}" download="">
                                            <img src="{{asset($category->category_img_path)}}" class="img-fluid" width="50px">
                                        </a>
                                    @else
                                        None
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="/admin/dashboard/category/all">
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
@endsection
