@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Promo Code</h4>
                    <h6>Edit Promo Code</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/promocode/all" class="btn btn-added">
                        <img
                            src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Promo Code</a>
                </div>
            </div>
            <form action="/admin/dashboard/promocode/update/{{$promoCode->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Promo Code*</label>
                                    <input type="text" name="promocode" required value="{{$promoCode->promocode}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>PromoCode Discount Price*</label>
                                    <small>Enter Numeric Values without any Special Characters (in Rupees)</small>
                                    <input type="text" class="form-control" name="discount_price" required value="{{$promoCode->discount_price}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Start Date*</label>
                                    <input type="date" name="start_date" class="form-control" required value="{{$promoCode->start_date->format('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>PromoCode Validity (In Days)*</label>
                                    <input type="text" class="form-control" name="validity" required value="{{$promoCode->validity}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="/admin/dashboard/promocode/all">
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
