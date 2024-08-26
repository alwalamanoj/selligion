<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .knwMore-Bnt {
            background-color: var(--secondary-color);
            padding: 0.843vw 2.109vw;
            border-radius: 0.158vw;
            color: #ffffff;
            font-size: var(--font-sz-15);
            font-weight: bold;
            letter-spacing: 5px;
        }

        .knwMore-Bnt:hover {
            background-color: #211974;
            color: #FFFFFF;
        }

        .text-right {
            text-align: right;
        }

        .border-2x {
            border: 2px solid #000;
        }
        table{
            border: 1px solid #000;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center
        }
        table, th, td {
            border: 1px solid rgba(0, 0, 0, 0.767);
            border-collapse: collapse;
        }
        td{
            padding: 4px 6px;
        }
        .text-center{
            text-align: center;
        }
        .top-header{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>


<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <table class="">
                    <tr>
                        <td colspan="10">
                            <div class="top-header">
                                <img src="{{public_path('assets/images/logo.png')}}" class="img-fluid" width="80px">
                                <div>
                                    <p class="mb-0 text-right">TAX INVOICE</p>
                                    <p class="mb-0 text-right">(Original for Recipient)</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>SOLD BY</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">Selligion Technologies Pvt. Ltd</td>
                        <td>BUYER</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">{{ $order->address->name }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">Lalani Aura, Unit No. 5, 5th Floor, Situated at 34th Road, Khar (W), Mumbai -
                            400 052 Maharashtra, India</td>
                        <td>Billing Address</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">{{ $order->address->address_line_1 }}{{ $order->address->address_line_2 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4"> finance@selligion.com</td>
                        <td>Email</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4"> {{ $order->address->email }}</td>
                    </tr>
                    <tr>
                        <td>GSTIN</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">27ABDCS3229A1ZQ</td>
                        <td>PAN</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">27ABDCS3229A1ZQ</td>
                    </tr>
                    <tr>
                        <td>Invoice No. </td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">27ABDCS3229A1ZQ</td>
                        <td>GST</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">27ABDCS3229A1ZQ</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">{{ $order->created_at->format('Y-M-d') }}</td>
                        <td>Attn</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">27ABDCS3229A1ZQ</td>
                    </tr>
                    <tr>
                        <td>Reference No</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">27ABDCS3229A1ZQ</td>
                        <td>Reference</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">BU</td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Shipping Address</td>
                        {{-- <td class="text-center">:</td> --}}
                        <td colspan="4">{{ $order->address->address_line_1 }}{{ $order->address->address_line_2 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Sr.No.</td>
                        <td>Item(s)</td>
                        <td>HSN/SAC Code</td>
                        <td>Net Amount (&#8377;)</td>
                        <td>Qty</td>
                        <td>Taxable Amount (&#8377;)</td>
                        <td>Tax Type</td>
                        <td>Tax Rate</td>
                        <td>Tax Amount (&#8377;)</td>
                        <td>Total Amount (&#8377;)</td>
                    </tr>
                    {{-- Single Start --}}
                    @if (!is_null($order->product_id))
                        <tr>
                            <td>1</td>
                            <td>{{ $order->product->product_name }}</td>
                            <td>997315</td>
                            <td> - </td>
                            <td>{{ $order->quantity }}</td>
                            <td> - </td>
                            <td>IGST</td>
                            <td>{{ $order->product->tax->tax_percentage }}%</td>
                            <td>{{ $order->product->product_price * ($order->product->tax->tax_percentage / 100) }}
                            </td>
                            <td>{{ $order->product->product_price }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>0.00</td>
                            <td></td>
                            <td></td>
                            <td>{{ $order->product->product_price * ($order->product->tax->tax_percentage / 100) }}
                            </td>
                            <td>{{ $order->product->product_price }}</td>
                        </tr>
                    @endif
                    {{-- Single End --}}
                    {{-- Combo Start --}}
                    @if (!is_null($order->product_combination_id))
                        @php
                            $subTotal = 0;
                            $grandTotal = 0;
                            $promoDiscount = 0;
                            $comboDiscount = 0;
                        @endphp
                        @foreach ($order->productCombination->products as $product)
                            @php
                                $subTotal += $product->product->product_price * $order->quantity;
                            @endphp
                        @endforeach
                        @foreach ($order->productCombination->products as $products)
                            <tr>
                                <td>1</td>
                                <td>{{ $products->product->product_name }}</td>
                                <td>997315</td>
                                <td> - </td>
                                <td>{{ $order->quantity }}</td>
                                <td> - </td>
                                <td>IGST</td>
                                <td>{{ $products->product->tax->tax_percentage }}%</td>
                                <td>{{ number_format($products->product->product_price * ($products->product->tax->tax_percentage / 100) * $order->quantity, 2, '.', ',') }}
                                </td>
                                <td>{{ number_format($products->product->product_price * $order->quantity, 2, '.', ',') }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>0.00</td>
                            <td></td>
                            <td></td>
                            <td>-</td>
                            <td>{{ number_format($order->amount, 2, '.', ',') }}</td>
                        </tr>
                    @endif
                    {{-- Combo End --}}
                    <tr>
                        <td colspan="5" rowspan="4">
                            Total Amount in words <br>
                            <u> &nbsp;{{ $totalAmountInWords }} &nbsp;</u> Only
                        </td>
                    </tr>
                    <tr class="text-right">
                        <td colspan="5">&#8377; 00.00</td>
                    </tr>
                    <tr class="text-right">
                        <td colspan="5">&#8377; 00.00</td>
                    </tr>
                    <tr class="text-right">
                        <td colspan="5">&#8377; 00.00</td>
                    </tr>
                    <tr>
                        <td colspan="5">HDFC Bank Ltd.</td>
                        <td rowspan="4" colspan="5" class="text-right">Selligion Pvt Ltd.</td>
                    </tr>
                    <tr>
                        <td colspan="5">A/c Name: Selligion Technologies Pvt. Ltd.</td>
                    </tr>
                    <tr>
                        <td colspan="5">A/c No. 50200048126051</td>

                    </tr>
                    <tr>
                        <td colspan="5">IFSC Code : HDFC0004417</td>
                    </tr>
                    <tr>
                        <td colspan="10" class="text-center">This is computer generated invoice. No physical
                            signatures required.</td>
                    </tr>
                </table>
            </div>
            <a href="https://selligion.com/order/invoice/download/{{base64_encode($order->id)}}">Download Invoice</a>
        </div>
    </div>
</body>

</html>
