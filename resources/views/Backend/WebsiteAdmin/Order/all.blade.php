@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Order List</h4>
                    <h6>Manage All Orders</h6>
                </div>
                {{-- <div class="page-btn">
                    <a href="/admin/dashboard/blog/all" class="btn btn-added"><img
                            src="{{ asset('assets/admin/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add
                        Order</a>
                </div> --}}
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
                                    <th>Order ID</th>
                                    <th>User Name</th>
                                    <th>PromoCode</th>
                                    <th>Product(s)</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Ordered On</th>
                                    <th>City</th>
                                    <th>ZipCode</th>
                                    <th>Country</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a
                                                href="/admin/dashboard/order/view/{{ $order->id }}">#{{ $order->custom_order_id }}</a>
                                        </td>
                                        <td>
                                            <p>{{$order->address->name}}</p>
                                        </td>
                                        <td>
                                            @if (!is_null($order->promo_code_id))
                                            <p>{{ $order->promocode->promocode }}</p>
                                        @else
                                            <p>NA</p>
                                        </td>
                                        @endif
                                        <td>
                                            @foreach ($order->orderedProducts as $product)
                                                {{$product->product}} <br>
                                            @endforeach
                                        </td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ number_format($order->amount, 2, '.', ',') }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $order->address->city }}</td>
                                        <td>{{ $order->address->zipcode }}</td>
                                        <td>{{ $order->address->country }}</td>
                                        <td class="text-center">
                                            <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                                aria-expanded="true">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/admin/dashboard/order/view/{{ $order->id }}"
                                                        class="dropdown-item"><img
                                                            src="{{ asset('assets/admin/assets/img/icons/edit.svg') }}"
                                                            class="me-2" alt="img">View
                                                        Order</a>
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
