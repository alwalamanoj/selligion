@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Offer Add</h4>
                    <h6>Create New Offer</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/limited-time-offer/all" class="btn btn-added">
                        <img src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Offer</a>
                </div>
            </div>
            <form action="/admin/dashboard/limited-time-offer/update/{{$offer->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Offer Title *</label>
                                    <input type="text" name="offer_title" required value="{{ $offer->offer_title }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description (Optional)</label>
                                    <textarea class="form-control" name="offer_description">{{ $offer->offer_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product</label>
                                    <select class="select select-category" name="product_id" required>
                                        @foreach ($products as $product)
                                            @if ($offer->product_id == $product->id)
                                                <option value="{{ $product->id }}" selected>{{ $product->product_name }}
                                                </option>
                                            @else
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity*</label>
                                    <input type="text" name="offer_quantity" required value="{{$offer->offer_quantity}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select" name="is_activated" required>
                                        @if ($offer->is_activated == 0)
                                            <option value="0" selected>Deactivate</option>
                                            <option value="1">Activate</option>
                                        @endif
                                        @if ($offer->is_activated == 1)
                                            <option value="1" selected>Activate</option>
                                            <option value="0">Deactivate</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Price*</label>
                                    <input type="text" name="offer_price" required value="{{$offer->offer_price}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Offer End Date*</label>
                                    <input type="date" name="offer_start_date" class="form-control" required value="{{ \Carbon\Carbon::parse($offer->offer_start_date)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Offer End Date*</label>
                                    <input type="date" name="offer_end_date" class="form-control" required value="{{ \Carbon\Carbon::parse($offer->offer_end_date)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="/admin/dashboard/limited-time-offer/all/" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
