@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Tax</h4>
                    <h6>Create new Tax</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/tax/all" class="btn btn-added">
                        <img
                            src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Tax</a>
                </div>
            </div>
            <form action="/admin/dashboard/tax/save" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Tax Title*</label>
                                    <input type="text" name="tax_name" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Tax Percentage(%)*</label>
                                    <small>Enter Numeric Values without any Special Characters</small>
                                    <input type="text" class="form-control" name="tax_percentage" required>
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
@endsection
