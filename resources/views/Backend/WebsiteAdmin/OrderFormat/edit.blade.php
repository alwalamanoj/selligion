@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Order Format</h4>
                    <h6>Order Format</h6>
                </div>
            </div>
            <form action="/admin/dashboard/order-id-format/update/{{$orderIdFormat->id}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Format</label>
                                    <select class="select" name="custom_format" required>
                                        <option value="">Select Format</option>
                                        @if ($orderIdFormat->custom_format == 'A')
                                            <option selected value="A">YYMMA</option>
                                            <option value="B">YYMMB</option>
                                        @else
                                            <option selected value="B">YYMMB</option>
                                            <option value="A">YYMMA</option>
                                        @endif
                                    </select>
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
