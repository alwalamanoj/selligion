@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container">
            <div class="row">
                <!-- Add this somewhere in your HTML body -->
                <div id="loader-overlay" style="display: none;">
                    <div class="overlay">
                        <div class="loader"></div>
                        <div class="overlay-text">Creating Order...</div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="white-bg p-4">
                        <h5 class="mb-4"><b>Confirm Shipping Details</b></h5>
                        <p><strong>Name:</strong> {{ $formData['name'] }}</p>
                        <p><strong>Email:</strong> {{ $formData['email'] }}</p>
                        <p><strong>Mobile:</strong> {{ $formData['mobile'] }}</p>
                        <p><strong>Address Line 1:</strong> {{ $formData['address_line_1'] }}</p>
                        <p><strong>Address Line 2:</strong> {{ $formData['address_line_2'] }}</p>
                        <p><strong>City:</strong> {{ $formData['city'] }}</p>
                        <p><strong>Zip Code:</strong> {{ $formData['zipcode'] }}</p>
                        <p><strong>Country:</strong> {{ $formData['country'] }}</p>
                        <p><strong>PAN:</strong> {{ $formData['pan_number'] }}</p>
                        <p><strong>GST:</strong> {{ $formData['gst_number'] }}</p>
                    </div>
                </div>
                @if (isset($formData['product_id']))
                    @php
                        $selectedChoice = [
                            'product_id' => $formData['product_id'],
                            'combination_id' => null,
                        ];
                    @endphp
                    <div class="col-12 col-md-6">
                        <div class="white-bg p-4">
                            <h5 class="mb-4"><b>Product Details</b></h5>
                            <p class="d-flex justify-content-between"><strong>Product:</strong>
                                {{ $product->product_name }}</p>
                            <p class="d-flex justify-content-between"><strong>Quantity:</strong>
                                {{ $formData['quantity'] }}</p>
                            <p class="d-flex justify-content-between"><strong>SubTotal (Incl. Taxes):</strong> &#8377;
                                {{ number_format($subTotal, 2, '.', ',') }}</p>
                            @if ($promocodeStatus)
                                <p class="d-flex justify-content-between"><strong>PromoCode:</strong>
                                    {{ $promocode }}</p>
                                <p class="d-flex justify-content-between"><strong>Discount From Promo Code:</strong>
                                    &#8377; {{ number_format($promoDiscount, 2, '.', ',') }}</p>
                            @endif
                            @php
                                if ($promocodeStatus) {
                                    $selectedChoice['promocode'] = $promocode;
                                } else {
                                    $selectedChoice['promocode'] = null;
                                }
                            @endphp
                            <hr>
                            @if ($totalDiscount > 0)
                                <p class="d-flex justify-content-between"><strong>Total Discount:</strong> - &#8377;
                                    {{ number_format($totalDiscount, 2, '.', ',') }}</p>
                            @endif
                            <hr>
                            <p class="d-flex justify-content-between"><strong>Grand Total (Incl. Taxes):</strong>
                                &#8377;
                                {{ number_format($grandTotal, 2, '.', ',') }}</p>
                        </div>
                    </div>
                @endif
                @if (isset($formData['combination_id']))
                    @php
                        $selectedChoice = [
                            'combination_id' => $formData['combination_id'],
                            'product_id' => null,
                        ];
                    @endphp
                    <div class="col-12 col-md-6">
                        <div class="white-bg p-4">
                            <h5 class="mb-4"><b>Product Details</b></h5>
                            <p class="d-flex justify-content-between"><strong>Products</strong>
                                @foreach ($products as $product)
                                    {{ $product->product->product_name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                            <p class="d-flex justify-content-between"><strong>Quantity:</strong>
                                {{ $formData['quantity'] }}</p>
                            <p class="d-flex justify-content-between"><strong>SubTotal (Incl. Taxes):</strong> &#8377;
                                {{ number_format($subTotal, 2, '.', ',') }}</p>
                            @if ($promocodeStatus)
                                <p class="d-flex justify-content-between"><strong>PromoCode:</strong>
                                    {{ $promocode }}</p>
                                <p class="d-flex justify-content-between"><strong>Discount from Promo Code:</strong>
                                    &#8377; {{ number_format($promoDiscount, 2, '.', ',') }}</p>
                            @endif
                            @php
                                if ($promocodeStatus) {
                                    $selectedChoice['promocode'] = $promocode;
                                } else {
                                    $selectedChoice['promocode'] = null;
                                }
                            @endphp
                            @if ($comboDiscount > 0)
                                <p class="d-flex justify-content-between"><strong>Discount of this Combo:</strong>
                                    &#8377; {{ number_format($comboDiscount, 2, '.', ',') }}</p>
                            @endif
                            <hr>
                            @if ($totalDiscount > 0)
                                <p class="d-flex justify-content-between"><strong>Total Discount:</strong> - &#8377;
                                    {{ number_format($totalDiscount, 2, '.', ',') }}</p>
                            @endif
                            <hr>
                            <p class="d-flex justify-content-between"><strong>Grand Total (Incl. Taxes):</strong>
                                &#8377;
                                {{ number_format($grandTotal, 2, '.', ',') }}</p>
                        </div>
                    </div>
                @endif
            </div>
            <button id="rzp-button1" class="btn knwMore-Bnt w-100 mt-2">MAKE PAYMENT</button>

        </div>
        <div class="container">
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                var options = {
                    "key": "{{ env('RAZORPAY_KEY_ID') }}", // Enter the Key ID generated from the Dashboard
                    "amount": "{{ $order->amount }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Selligion Tecnologies",
                    "description": "Test Transaction",
                    "image": "{{asset('assets/images/logo.png')}}",
                    "order_id": "{{ $order->id }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function(response) {
                        showLoaderOverlay();
                        savePaymentDetails(response);
                    },
                    "prefill": {
                        "name": "{{ $formData['name'] }}",
                        "email": "{{ $formData['email'] }}",
                        "contact": "{{ $formData['mobile'] }}"
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#0930ff"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function(response) {
                    // alert(response.error.code);
                    // alert(response.error.description);
                    // alert(response.error.source);
                    // alert(response.error.step);
                    // alert(response.error.reason);
                    // alert(response.error.metadata.order_id);
                    // alert(response.error.metadata.payment_id);
                    alert("Razorpay Failed");
                });
                document.getElementById('rzp-button1').onclick = function(e) {
                    rzp1.open();
                    e.preventDefault();
                }

                function savePaymentDetails(response) {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    $.ajax({
                        method: 'POST',
                        url: '/save/order/details', // Replace with your Laravel route
                        data: {
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_payment_id: response.razorpay_payment_id,
                            amount: "{{ $order->amount }}",
                            combination_id: "{{ $selectedChoice['combination_id'] }}",
                            product_id: "{{ $selectedChoice['product_id'] }}",
                            name: "{{ $formData['name'] }}",
                            email: "{{ $formData['email'] }}",
                            mobile: "{{ $formData['mobile'] }}",
                            address_line_1: "{{ $formData['address_line_1'] }}",
                            address_line_2: "{{ $formData['address_line_2'] }}",
                            city: "{{ $formData['city'] }}",
                            zipcode: "{{ $formData['zipcode'] }}",
                            country: "{{ $formData['country'] }}",
                            promocode: "{{ $promocode }}",
                            quantity: "{{ $formData['quantity'] }}",
                            pan_number: "{{ $formData['pan_number'] }}",
                            gst_number: "{{ $formData['gst_number'] }}"
                        },
                        success: function(data) {
                            var existingOrderIds = JSON.parse(localStorage.getItem('order_ids')) || [];
                            existingOrderIds.push(data.order_id);
                            localStorage.setItem('order_ids', JSON.stringify(existingOrderIds));
                            window.location.href = '/order/success?order_id=' + data.order_id;
                        },
                        error: function(error) {
                            console.error('Error saving payment details:', error);
                        }
                    });
                }

                function showLoaderOverlay() {
                    var overlay = document.getElementById('loader-overlay');
                    overlay.style.display = 'block';
                }

                function hideLoaderOverlay() {
                    var overlay = document.getElementById('loader-overlay');
                    overlay.style.display = 'none';
                }
            </script>
        </div>
    </section>
    <style>
        /* Add this in your stylesheet or in a <style> tag in the HTML head */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid var(--secondary-color);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        .overlay-text {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
