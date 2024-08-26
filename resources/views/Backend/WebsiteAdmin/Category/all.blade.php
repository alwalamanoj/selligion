@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Category List</h4>
                    <h6>Manage your Categories</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/category/add" class="btn btn-added"><img
                            src="{{ asset('assets/admin/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add
                        Category</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img
                                        src="{{ asset('assets/admin/assets/img/icons/search-white.svg') }}"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table data-selligion table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        <img src="{{asset($category->category_img_path)}}" class="img-fluid" width="30px">
                                    </td>
                                    <td class="text-center">
                                        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="/admin/dashboard/category/edit/{{$category->id}}" class="dropdown-item"><img
                                                        src="{{asset('assets/admin/assets/img/icons/edit.svg')}}" class="me-2" alt="img">Edit
                                                    Category</a>
                                            </li>
                                            <li>
                                                <form action="/admin/dashboard/category/delete/{{$category->id}}" id="deleteForm" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item submitdeleteForm" type="submit">
                                                        <img src="{{asset('assets/admin/assets/img/icons/delete1.svg')}}" class="me-2" alt="img">Delete Category</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
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
    @if (session('warning'))
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
    @include('Backend.WebsiteAdmin.layout.dataTablesAddon')
@endsection
