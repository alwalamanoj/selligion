@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container">
            <div id="loader-overlay" style="display: none;">
                <div class="overlay">
                    <div class="loader"></div>
                    <div class="overlay-text">Updating Please Wait...</div>
                </div>
            </div>
            <form action="/initiate/payment" method="POST">
                @csrf
                <div class="row">
                    <p><b>Shipping Address</b></p>
                    <div class="col-12 col-md-4 order-md-2">
                        <div class="prod-checkout-container white-bg p-4">
                            <label for="quantity" class="form-label">Quantity</label>

                            <div class="input-group mb-3">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn knwMore-Bnt btn-number"
                                        data-type="minus" data-field="">
                                        -
                                    </button>
                                </span>
                                @if (is_null($quantity))
                                    <input type="number" id="quantity" name="quantity"
                                        class="form-control input-number quantity-field" value="1" min="1"
                                        readonly>
                                @else
                                    <input type="number" id="quantity" name="quantity"
                                        class="form-control input-number quantity-field" min="1"
                                        value="{{ $quantity }}" readonly>
                                @endif
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn knwMore-Bnt btn-number"
                                        data-type="plus" data-field="">
                                        +
                                    </button>
                                </span>
                            </div>

                            <table class="table table-striped prod-desc-table mt-3">
                                @if (!is_null($combination))
                                    <input type="text" value="{{ base64_encode($combination->id) }}"
                                        class="combination_id_val d-none" name="combination_id">
                                @else
                                    <input type="text" value="{{ base64_encode($product->id) }}"
                                        class="product_id_val d-none" name="product_id">
                                @endif
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3">Billing Information</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td scope="row">Product</th>
                                        <td>:</td>
                                        <td>
                                            @if (!is_null($combination))
                                                @foreach ($products as $product)
                                                    {{ $product->product->product_name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            @else
                                                {{ $product->product_name }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Quantity</th>
                                        <td>:</td>
                                        <td class="quantity-td">{{ $quantity }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Sub Total</th>
                                        <td>:</td>
                                        <td class="subTotal-td"> &#8377; {{ number_format($subTotal, 2, '.', ',') }}
                                            <small>Incl. Taxes</small>
                                        </td>
                                    </tr>
                                    <tr class="comboDiscount-tr">
                                        <td scope="row">Discount</th>
                                        <td>:</td>
                                        <td class="comboDiscount-td">- &#8377;
                                            {{ number_format($comboDiscount, 2, '.', ',') }}</td>
                                    </tr>
                                    <tr class="promocode-tr">
                                        <td scope="row">PromoCode</th>
                                        <td>:</td>
                                        <td class="promoDiscount-td">- &#8377;
                                            {{ number_format($promoDiscount, 2, '.', ',') }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Total</th>
                                        <td>:</td>
                                        <td class="grandTotal-td"> &#8377; {{ number_format($grandTotal, 2, '.', ',') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="promocode" class="form-label mt-2">I have Promo Code</label>
                            <div class="input-group mb-3">
                                <input type="text" id="promocode" name="promocode" class="form-control promocode-field"
                                    value="{{ $promocode }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn knwMore-Bnt apply-promocode-btn">APPLY</button>
                                </span>
                            </div>
                            <div class="promocode-status-container">

                            </div>
                            <button type="submit" class="btn knwMore-Bnt w-100 d-none d-md-block">PROCEED</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 order-md-1">
                        <div class="checkout-form-fields white-bg p-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Your Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address *</label>
                                @if (Auth::check())
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                        name="email" placeholder="Enter Your Email" required
                                        value="{{ Auth::user()->email }}">
                                @else
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                        name="email" placeholder="Enter Your Email" required>
                                @endif
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile Number *</label>
                                <input type="number" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter Your Mobile Number" required>
                            </div>
                            <div class="mb-3">
                                <label for="pan_number" class="form-label">PAN (Optional)</label>
                                <input type="text" class="form-control" id="pan" name="pan_number"
                                    placeholder="Enter Your PAN Number">
                            </div>
                            <div class="mb-3">
                                <label for="gst_number" class="form-label">GST (Optional)</label>
                                <input type="text" class="form-control" id="gst_number" name="gst_number"
                                    placeholder="Enter Your GST">
                            </div>
                            <div class="mb-3">
                                <label for="address_line_1" class="form-label">Address Line 1 *</label>
                                <input type="text" class="form-control" id="address_line_1" name="address_line_1"
                                    placeholder="Address Line 1" required>
                            </div>
                            <div class="mb-3">
                                <label for="address_line_2" class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" id="address_line_2" name="address_line_2"
                                    placeholder="Address Line 1">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="City" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipcode" class="form-label">Zip Code *</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode"
                                    placeholder="Zip Code" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country *</label>
                                <select class="form-select" aria-label="Default select example" id="country-list"
                                    name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="India">India</option>
                                    {{-- @foreach ($countries as $country)
                                        <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <button type="submit" class="btn knwMore-Bnt w-100 d-md-none">PROCEED</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div>
        </div>
    </section>
    <style>
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
    <script>
        function showLoaderOverlay() {
            var overlay = document.getElementById('loader-overlay');
            overlay.style.display = 'block';
        }

        function hideLoaderOverlay() {
            var overlay = document.getElementById('loader-overlay');
            overlay.style.display = 'none';
        }
        var quantitiy = 0;
        $('.promocode-tr').hide();
        // $('.comboDiscount-tr').hide();
        $('.quantity-left-minus').click(function(e) {
            showLoaderOverlay();
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
            const quantityValue = $('.quantity-field').val();
            const promoValue = $('.promocode-field').val();
            const combinationValue = $('.combination_id_val').val();
            const prodId = $('.product_id_val').val();
            $.ajax({
                url: '/quantity/change',
                method: 'GET',
                data: {
                    quantity: quantityValue,
                    promocode: promoValue,
                    combination_id: combinationValue,
                    product_id: prodId,
                },
                success: function(data) {
                    $('.grandTotal-td').html("&#8377; " + data['grandTotal'].toLocaleString('en-IN'));
                    $('.subTotal-td').html("&#8377; " + data['subTotal'].toLocaleString('en-IN') +
                        "  <small>Incl. Taxes</small>");
                    $('.quantity-td').html(data['quantity']);
                    $('.quantity-field').val(data['quantity']);
                    if (data['promocodeStatus']) {
                        $('.promoDiscount-td').html("- &#8377;" + data['promoDiscount'].toLocaleString(
                            'en-IN'));
                        $('.promocode-tr').show();
                    } else {
                        $('.promocode-tr').hide();
                    }
                    if (data['comboDiscount'] > 0) {
                        $('.comboDiscount-td').html("- &#8377;" + data['comboDiscount'].toLocaleString(
                            'en-IN'));
                        $('.comboDiscount-tr').show();
                    } else {
                        $('.comboDiscount-tr').hide();
                    }
                    if (data['promocode'] !== null) {
                        $('.promocode-status-container').show();
                        if (data['promocodeStatus']) {
                            $('.promocode-status-container').html(
                                '<div class="alert alert-success" role="alert"> Promo Code <b>' +
                                data['promocode'] + '</b> Applied   </div> '
                            );
                        } else {
                            $('.promocode-status-container').html(
                                '</div> <div class="alert alert-danger" role="alert"> Promo Code <b>' +
                                data['promocode'] + '</b> Invalid/ Expired/Expired  </div>'
                            );
                        }
                    } else {
                        $('.promocode-status-container').hide();
                    }
                    hideLoaderOverlay();
                },
                error: function(xhr, status, error) {
                    console.error("Failure in Updating Quantity");
                }
            });
        });

        $('.quantity-right-plus').click(function(e) {
            showLoaderOverlay();
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
            const quantityValue = $('.quantity-field').val();
            const promoValue = $('.promocode-field').val();
            const combinationValue = $('.combination_id_val').val();
            const prodId = $('.product_id_val').val();
            $.ajax({
                url: '/quantity/change',
                method: 'GET',
                data: {
                    quantity: quantityValue,
                    promocode: promoValue,
                    combination_id: combinationValue,
                    product_id: prodId,
                },
                success: function(data) {
                    $('.grandTotal-td').html("&#8377; " + data['grandTotal'].toLocaleString('en-IN'));
                    $('.subTotal-td').html("&#8377; " + data['subTotal'].toLocaleString('en-IN') +
                        "  <small>Incl. Taxes</small>");
                    $('.quantity-td').html(data['quantity']);
                    $('.quantity-field').val(data['quantity']);
                    if (data['promocodeStatus']) {
                        $('.promoDiscount-td').html("- &#8377;" + data['promoDiscount'].toLocaleString(
                            'en-IN'));
                        $('.promocode-tr').show();
                    } else {
                        $('.promocode-tr').hide();
                    }
                    if (data['comboDiscount'] > 0) {
                        $('.comboDiscount-td').html("- &#8377;" + data['comboDiscount'].toLocaleString(
                            'en-IN'));
                        $('.comboDiscount-tr').show();
                    } else {
                        $('.comboDiscount-tr').hide();
                    }
                    if (data['promocode'] !== null) {
                        $('.promocode-status-container').show();
                        if (data['promocodeStatus']) {
                            $('.promocode-status-container').html(
                                '<div class="alert alert-success" role="alert"> Promo Code <b>' +
                                data['promocode'] + '</b> Applied   </div> '
                            );
                        } else {
                            $('.promocode-status-container').html(
                                '</div> <div class="alert alert-danger" role="alert"> Promo Code <b>' +
                                data['promocode'] + '</b> Invalid/ Expired   </div>'
                            );
                        }
                    } else {
                        $('.promocode-status-container').hide();
                    }
                    hideLoaderOverlay();
                },
                error: function(xhr, status, error) {
                    console.error("Failure in Updating Quantity");
                }
            });
        });

        $('.apply-promocode-btn').click(function(e) {
            showLoaderOverlay();
            const quantityValue = $('.quantity-field').val();
            const promoValue = $('.promocode-field').val();
            const combinationValue = $('.combination_id_val').val();
            const prodId = $('.product_id_val').val();
            $.ajax({
                url: '/quantity/change',
                method: 'GET',
                data: {
                    quantity: quantityValue,
                    promocode: promoValue,
                    combination_id: combinationValue,
                    product_id: prodId,
                },
                success: function(data) {
                    $('.grandTotal-td').html("&#8377; " + data['grandTotal'].toLocaleString('en-IN'));
                    $('.subTotal-td').html("&#8377; " + data['subTotal'].toLocaleString('en-IN') +
                        "  <small>Incl. Taxes</small>");
                    $('.quantity-td').html(data['quantity']);
                    $('.quantity-field').val(data['quantity']);
                    if (data['promocodeStatus']) {
                        $('.promoDiscount-td').html("- &#8377;" + data['promoDiscount'].toLocaleString(
                            'en-IN'));
                        $('.promocode-tr').show();
                    } else {
                        $('.promocode-tr').hide();
                    }
                    if (data['comboDiscount'] > 0) {
                        $('.comboDiscount-td').html("- &#8377;" + data['comboDiscount'].toLocaleString(
                            'en-IN'));
                        $('.comboDiscount-tr').show();
                    } else {
                        $('.comboDiscount-tr').hide();
                    }
                    if (data['promocode'] !== null) {
                        $('.promocode-status-container').show();
                        if (data['promocodeStatus']) {
                            $('.promocode-status-container').html(
                                '<div class="alert alert-success" role="alert"> Promo Code <b>' +
                                data['promocode'] + '</b> Applied   </div> '
                            );
                        } else {
                            $('.promocode-status-container').html(
                                '</div> <div class="alert alert-danger" role="alert"> Promo Code <b>' +
                                data['promocode'] + '</b> Invalid/ Expired   </div>'
                            );
                        }
                    } else {
                        $('.promocode-status-container').hide();
                    }
                    hideLoaderOverlay();
                },
                error: function(xhr, status, error) {
                    console.error("Failure in Updating Quantity");
                }
            });
        });
    </script>


@endsection
