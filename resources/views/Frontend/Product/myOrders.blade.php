@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container">
            <div class="orders-container p-3">
                <div class="row ">
                    <h4>My Orders</h4>
                    @if (!is_null($orders))
                        @foreach ($orders as $order)
                            <div class="col-12 col-md-12">
                                <div class="white-bg">
                                    <div class="row order-card my-3 p-3">
                                        <p><b>Order #{{ $order->custom_order_id }}</b></p>
                                        <hr>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="my-2">
                                                <p><b>Shipping Address</b></p>
                                                <p class="mb-0">{{ $order->address->name }}</p>
                                                <p class="mb-0">{{ $order->address->email }}</p>
                                                <p class="mb-0">{{ $order->address->mobile }}</p>
                                                <p class="mb-0">{{ $order->address->address_line_1 }}</p>
                                                <p class="mb-0">{{ $order->address->address_line_2 }}</p>
                                                <p class="mb-0">{{ $order->address->city }}</p>
                                                <p class="mb-0">{{ $order->address->zipcode }}</p>
                                                <p class="mb-0">{{ $order->address->country }}</p>
                                            </div>
                                            <hr class="d-md-none">
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="my-2">
                                                <p><b>Payment Details: </b></p>
                                                <p>Payment ID: <br>{{ $order->payment->razorpay_payment_id }}</p>
                                                @if ($order->address->pan_number)
                                                    <p>PAN : <br>{{ $order->address->pan_number }}</p>
                                                @endif
                                                @if ($order->address->pan_number)
                                                    <p>GST : <br>{{ $order->address->pan_number }}</p>
                                                @endif
                                            </div>
                                            <hr class="d-md-none">
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="my-2">
                                                <p class="mb-0"><b>Products</b></p>
                                                @foreach ($order->orderedProducts as $product)
                                                    <p class="mb-0">{{ $product->product }}</p>
                                                @endforeach
                                            </div>
                                            <hr class="d-md-none">
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="my-2">
                                                <p><b>Order Summary</b></p>
                                                @php
                                                    $totalTaxableAmount = 0;
                                                    $totalTax = 0;
                                                    $totalDiscount = 0;
                                                @endphp
                                                @foreach ($order->orderedProducts as $product)
                                                    @php
                                                        $totalTaxableAmount += $product->taxable_amount;
                                                        $totalTax += $product->total_tax;
                                                        $totalDiscount += $product->promo_discount + $product->combo_discount;
                                                    @endphp
                                                @endforeach
                                                <p class="d-flex justify-content-between mb-0">
                                                    <custom>Taxable Amount :</custom>
                                                    &#8377; {{ number_format($totalTaxableAmount, 2, '.', ',') }}
                                                </p>
                                                <p class="d-flex justify-content-between mb-0">
                                                    <custom>Total Tax :</custom>
                                                    &#8377; {{ number_format($totalTax, 2, '.', ',') }}
                                                </p>
                                                @if ($totalDiscount > 0)
                                                    <p class="d-flex justify-content-between mb-0">
                                                        <custom>Discount :</custom>
                                                        &#8377; {{ number_format($totalDiscount, 2, '.', ',') }}
                                                    </p>
                                                @endif
                                                <hr>
                                                <p class="d-flex justify-content-between mb-0">
                                                    <custom>Total :</custom>
                                                    &#8377; {{ number_format($order->amount, 2, '.', ',') }}
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-md-8">
                                                <p><i>Order Created On: {{ $order->created_at->format('d M Y') }}</i></p>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <a href="/order/invoice/download/{{ base64_encode($order->id) }}"
                                                    class="btn knwMore-Bnt w-100 w-50">DOWNLOAD INVOICE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <button class="myOrdersSessionBtn d-none" type="hidden"></button>
    </section>
    <style>
        * {
            word-wrap: break-word;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var isAuthenticated = @json(Auth::check());
            if (!isAuthenticated) {
                var button = document.querySelector('.myOrdersSessionBtn');
                if (button) {
                    button.click();
                }
            }
        });
        $('.myOrdersSessionBtn').click(function() {
            var orderIds = JSON.parse(localStorage.getItem('order_ids')) || [];
            var orderIdsString = orderIds.join(',');
            window.location.href = '/my/orders/session?order_ids=' + orderIdsString;
        });
    </script>
@endsection
