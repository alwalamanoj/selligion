@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit User</h4>
                    <h6>Edit User</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/user/all" class="btn btn-added">
                        <img src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        User</a>
                </div>
            </div>
            <form action="/admin/dashboard/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input type="text" name="email" required value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" name="name" required value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="mobile" value="{{ $user->mobile }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select" name="role" required>
                                        <option value="">Role</option>
                                        @if ($user->role == 'USER')
                                            <option selected value="USER">USER</option>
                                            <option value="ADMIN">ADMIN</option>
                                        @endif
                                        @if($user->role == 'ADMIN')
                                            <option selected value="ADMIN">ADMIN</option>
                                            <option value="USER">USER</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="/admin/dashboard/user/all">
                                    <button type="button" class="btn btn-cancel">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
@endsection
