<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @page {
            margin: 30px 30px;
        }
        .text-right {
            text-align: right;
        }
        table {
            border: 1px solid rgba(0, 0, 0, 0.767);
            /* width: 80%; */
        }
        /* td{
            word-wrap: break-word;
            overflow-wrap: break-word;
        } */
        th,
        td {
            border: 1px solid rgba(0, 0, 0, 0.767);
            /* border-collapse: collapse; */
        }
        .text-center {
            text-align: center;
        }
        .td-border-0 {
            border: none;
        }
    </style>
</head>

<body>
    <table width="100%" style="table-layout:auto;">
        <tr>
            <td style="padding: 6px 4px" colspan="5" class="td-border-0">
                <div>
                    <img src="{{ public_path('assets/images/logo.png') }}" class="img-fluid" width="80px">
                </div>
            </td>
            <td style="padding: 6px 4px" colspan="6" class="td-border-0">
                <div>
                    <p class="mb-0 text-right">TAX INVOICE</p>
                    <p class="mb-0 text-right">(Original for Recipient)</p>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding: 6px 4px">SOLD BY</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="4">Selligion Technologies Pvt. Ltd</td>
            <td style="padding: 6px 4px">BUYER</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="5">{{ $order->address->name }}</td>
        </tr>
        <tr>
            <td style="padding: 6px 4px">Address</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="4">Lalani Aura, Unit No. 5, 5th Floor, Situated at 34th Road, Khar (W), Mumbai -
                400 052 Maharashtra, India</td>
            <td style="padding: 6px 4px">Billing Address</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="5">{{ $order->address->address_line_1 }}{{ $order->address->address_line_2 }} {{$order->address->city}} - {{$order->address->zipcode}} {{$order->address->country}}
            </td>
        </tr>
        <tr>
            <td style="padding: 6px 4px">Email</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="4"> finance@selligion.com</td>
            <td style="padding: 6px 4px">Email</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="5"> {{ $order->address->email }}</td>
        </tr>
        <tr>
            <td style="padding: 6px 4px" rowspan="1">GSTIN</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" rowspan="1" colspan="4">27ABDCS3229A1ZQ</td>
            <td style="padding: 6px 4px">PAN</td>
            @if ($order->address->pan_number)
                <td style="padding: 6px 4px" colspan="5">{{ $order->address->pan_number }}</td>
            @else
                <td style="padding: 6px 4px" colspan="5">-</td>
            @endif
        </tr>
        <tr>
            <td style="padding: 6px 4px">Invoice No. </td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="4">{{ $order->invoice_number }}</td>
            <td style="padding: 6px 4px">GST</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            @if ($order->address->gst_number)
                <td style="padding: 6px 4px" colspan="5">{{ $order->address->gst_number }}</td>
            @else
                <td style="padding: 6px 4px" colspan="5">-</td>
            @endif
        </tr>
        <tr>
            <td style="padding: 6px 4px">Date</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="4">{{ $order->created_at->format('Y-M-d') }}</td>
            <td style="padding: 6px 4px">Shipping Address</td>
            {{-- <td style="padding: 6px 4px" class="text-center">:</td> --}}
            <td style="padding: 6px 4px" colspan="5">{{ $order->address->address_line_1 }}{{ $order->address->address_line_2 }}
            </td>
        </tr>
        <tr>
            <td style="padding: 6px 4px">Sr.No.</td>
            <td style="padding: 6px 4px">Item(s)</td>
            <td style="padding: 6px 4px">HSN/SAC Code</td>
            <td style="padding: 6px 4px">Net Amount (Rs)</td>
            <td style="padding: 6px 4px">Qty</td>
            <td style="padding: 6px 4px">Discount</td>
            <td style="padding: 6px 4px">Taxable Amount (Rs)</td>
            <td style="padding: 6px 4px">Tax Type</td>
            <td style="padding: 6px 4px">Tax Rate</td>
            <td style="padding: 6px 4px">Tax Amount (Rs)</td>
            <td style="padding: 6px 4px">Total Amount (Rs)</td>
        </tr>
        @php
            $totalTaxableAmount = 0;
            $totalTaxAmount = 0;
            $totalAmount = 0;
        @endphp
        @foreach ($order->orderedProducts as $product)
            @php
                $totalTaxableAmount += $product->taxable_amount;
                $totalTaxAmount += $product->total_tax;
            @endphp
            <tr>
                <td style="padding: 6px 4px">{{$loop->iteration}}</td>
                <td style="padding: 6px 4px">{{ $product->product }}</td>
                <td style="padding: 6px 4px">{{ $order->product->hsn_sac_code ?? '-' }}</td>
                <td style="padding: 6px 4px">{{ number_format($product->taxable_amount + $product->total_tax + $product->promo_discount + $product->combo_discount, 2, '.', ',') }}
                </td>
                <td style="padding: 6px 4px">{{ $product->quantity }}</td>
                <td style="padding: 6px 4px">{{ number_format($product->promo_discount + $product->combo_discount, 2, '.', ',') }}
                </td>
                <td style="padding: 6px 4px">{{ number_format($product->taxable_amount, 2, '.', ',') }}</td>
                <td style="padding: 6px 4px">IGST</td>
                <td style="padding: 6px 4px">{{ $product->tax_percentage }}%</td>
                <td style="padding: 6px 4px">{{ number_format($product->total_tax, 2, '.', ',') }}</td>
                <td style="padding: 6px 4px">{{ number_format($product->price * $product->quantity - ($product->promo_discount + $product->combo_discount), 2, '.', ',') }}
                </td>
            </tr>
        @endforeach
        <tr>
            <td style="padding: 6px 4px">Total</td>
            <td style="padding: 6px 4px"></td>
            <td style="padding: 6px 4px"></td>
            <td style="padding: 6px 4px"></td>
            <td style="padding: 6px 4px"></td>
            <td style="padding: 6px 4px"></td>
            <td style="padding: 6px 4px">{{ number_format($totalTaxableAmount, 2, '.', ',') }}</td>
            <td style="padding: 6px 4px"></td>
            <td style="padding: 6px 4px"></td>
            <td style="padding: 6px 4px">{{ number_format($totalTaxAmount, 2, '.', ',') }}</td>
            <td style="padding: 6px 4px">{{ number_format($order->amount, 2, '.', ',') }}</td>
        </tr>
        <tr>
            <td style="padding: 6px 4px" colspan="5" rowspan="4">
                Total Amount in words <br>
                <u> &nbsp;{{ $totalAmountInWords }} &nbsp;Rupees &nbsp;</u> Only
            </td>
        </tr>
        <tr class="text-right">
            <td style="padding: 6px 4px" colspan="3">Taxable Amount</td>
            <td style="padding: 6px 4px" colspan="3">Rs {{ number_format($totalTaxableAmount, 2, '.', ',') }}</td>
        </tr>
        <tr class="text-right">
            <td style="padding: 6px 4px" colspan="3">GST</td>
            <td style="padding: 6px 4px" colspan="3">Rs {{ number_format($totalTaxAmount, 2, '.', ',') }}</td>
        </tr>
        <tr class="text-right">
            <td style="padding: 6px 4px" colspan="3">Total Amount</td>
            <td style="padding: 6px 4px" colspan="3">Rs {{ number_format($order->amount, 2, '.', ',') }}</td>
        </tr>
        <tr>
            <td style="padding: 6px 4px" colspan="11" class="text-center">This is computer generated invoice. No physical
                signatures required.</td>
        </tr>
    </table>
</body>

</html>
