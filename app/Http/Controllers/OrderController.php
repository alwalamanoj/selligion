<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCombination;
use App\Models\PromoCode;
use App\Models\Address;
use App\Models\Payment;
use App\Models\OrderedProduct;
use App\Models\Order;
use App\Models\User;
use Razorpay\Api\Api;
use Auth;
use App\Models\OrderFormat;
use App\Jobs\SendOrderConfirmationEmail;
use App\Jobs\SendNewOrderMail;
use Illuminate\Support\Facades\Log;
use App\Traits\NumberToWordsTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Jobs\GenerateInvoiceAndSendEmail;
use Carbon\Carbon;


class OrderController extends Controller
{
    use NumberToWordsTrait;
    //Checkout Page
    public function checkoutProduct(Request $request){
        $title = "Checkout - Selligion";
        $countryJsonFile = public_path('assets/json/countries+states.json');
        $countries = json_decode(file_get_contents($countryJsonFile), true);
        $combination = NULL;
        $quantity = 1;
        $promocode = NULL;
        $promocodeStatus = False;
        $promocodeFromDB = NULL;
        $comboDiscount = 0;
        $promoDiscount = 0;
        if($request->combination_id){
            $combinationId = base64_decode($request->combination_id);
            $combination = ProductCombination::with('products')->where('status','publish')->where('id',$combinationId)->first();

            $products = $combination->products;
            $minQuantity = PHP_INT_MAX;
            $minQuantityProduct = NULL;

            foreach ($products as $product) {
                if ($product->product->quantity < $minQuantity) {
                    $minQuantity = $product->product->quantity;
                }
            }

            if($request->quantity && $request->quantity > 0){
                $quantity = $request->quantity;
                if($request->quantity <= $minQuantity){
                    if($request->quantity > 19){
                        $quantity = 19;
                    }
                }
                else{
                    $quantity = $minQuantity;
                }
            }

            $subTotal = $products->sum('product.product_price') * $quantity; //()Including Taxes

            if(!is_null($combination->combination_discount_price) && ($combination->combination_discount_price > 0)){
                $comboDiscount = $combination->combination_discount_price;
            }

            if($request->promocode){
                $promocodeFromDB = PromoCode::where('promocode',$request->promocode)->first();
                if($promocodeFromDB){
                    if($promocodeFromDB->isExpiredOrNotStarted()){
                        $promocodeStatus = FALSE;
                    }
                    else{
                        $promocodeStatus = TRUE;
                        $promoDiscount = $promocodeFromDB->discount_price * $quantity;
                    }
                }
                else{
                    $promocodeStatus = FALSE;
                }
                $promocode = $request->promocode;
            }
            $totalDiscount = $promoDiscount + $comboDiscount;
            $grandTotal = $subTotal - $totalDiscount;
            return view('Frontend.Product.checkout  ',[
                'title' => $title,
                'combination' => $combination,
                'products' => $products,
                'subTotal' => $subTotal,
                'quantity' => $quantity,
                'comboDiscount' => $comboDiscount,
                'promoDiscount' => $promoDiscount,
                'promocode' => $promocode,
                'grandTotal' => $grandTotal,
                'totalDiscount' => $totalDiscount,
                'promocodeStatus' => $promocodeStatus,
                'promocodeFromDB' => $promocodeFromDB,
                'countries' => $countries,
            ]);
        }
        if($request->product_id){
            $productId = base64_decode($request->product_id);
            $product = Product::where('status','publish')->where('id',$productId)->first();

            if($request->quantity && $request->quantity > 0){
                $quantity = $request->quantity;
                if($request->quantity <= $product->quantity){
                    if($request->quantity > 19){
                        $quantity = 19;
                    }
                }
                else{
                    $quantity = $product->quantity;
                }
            }

            $subTotal = $product->product_price * $quantity; //()Including Taxes

            if($request->promocode){
                $promocodeFromDB = PromoCode::where('promocode',$request->promocode)->first();
                if($promocodeFromDB){
                    if($promocodeFromDB->isExpiredOrNotStarted()){
                        $promocodeStatus = FALSE;
                    }
                    else{
                        $promocodeStatus = TRUE;
                        $promoDiscount = $promocodeFromDB->discount_price * $quantity;
                    }
                }
                else{
                    $promocodeStatus = FALSE;
                }
                $promocode = $request->promocode;
            }
            $totalDiscount = $promoDiscount + $comboDiscount;
            $grandTotal = $subTotal - $totalDiscount;
            return view('Frontend.Product.checkout  ',[
                'title' => $title,
                'combination' => $combination,
                'product' => $product,
                'subTotal' => $subTotal,
                'quantity' => $quantity,
                'comboDiscount' => $comboDiscount,
                'promoDiscount' => $promoDiscount,
                'promocode' => $promocode,
                'grandTotal' => $grandTotal,
                'totalDiscount' => $totalDiscount,
                'promocodeStatus' => $promocodeStatus,
                'promocodeFromDB' => $promocodeFromDB,
                'countries' => $countries,
            ]);
        }
    }

    //Change Quantity
    public function changeQuantity(Request $request){
        $countryJsonFile = public_path('assets/json/countries+states.json');
        $countries = json_decode(file_get_contents($countryJsonFile), true);
        $combination = NULL;
        $quantity = 1;
        $promocode = NULL;
        $promocodeStatus = False;
        $promocodeFromDB = NULL;
        $comboDiscount = 0;
        $promoDiscount = 0;
        if($request->combination_id){
            $combinationId = base64_decode($request->combination_id);
            $combination = ProductCombination::with('products')->where('status','publish')->where('id',$combinationId)->first();

            $products = $combination->products;
            $minQuantity = PHP_INT_MAX;
            $minQuantityProduct = NULL;

            foreach ($products as $product) {
                if ($product->product->quantity < $minQuantity) {
                    $minQuantity = $product->product->quantity;
                }
            }

            if($request->quantity && $request->quantity > 0){
                $quantity = $request->quantity;
                if($request->quantity <= $minQuantity){
                    if($request->quantity > 19){
                        $quantity = 19;
                    }
                }
                else{
                    $quantity = $minQuantity;
                }
            }

            $subTotal = $products->sum('product.product_price') * $quantity; //()Including Taxes

            if(!is_null($combination->combination_discount_price) && ($combination->combination_discount_price > 0)){
                $comboDiscount = $combination->combination_discount_price * $quantity;
            }

            if($request->promocode){
                $promocodeFromDB = PromoCode::where('promocode',$request->promocode)->first();
                if($promocodeFromDB){
                    if($promocodeFromDB->isExpiredOrNotStarted()){
                        $promocodeStatus = FALSE;
                    }
                    else{
                        $promocodeStatus = TRUE;
                        $promoDiscount = $promocodeFromDB->discount_price * $quantity;
                    }
                }
                else{
                    $promocodeStatus = FALSE;
                }
                $promocode = $request->promocode;
            }
            $totalDiscount = $promoDiscount + $comboDiscount;
            $grandTotal = $subTotal - $totalDiscount;
            $data = [
                'combination' => $combination,
                'product' => $product,
                'subTotal' => $subTotal,
                'quantity' => $quantity,
                'comboDiscount' => $comboDiscount,
                'promoDiscount' => $promoDiscount,
                'promocode' => $promocode,
                'grandTotal' => $grandTotal,
                'totalDiscount' => $totalDiscount,
                'promocodeStatus' => $promocodeStatus,
                'promocodeFromDB' => $promocodeFromDB,
                'countries' => $countries,
            ];
            return response()->json($data);
        }
        if($request->product_id){
            $productId = base64_decode($request->product_id);
            $product = Product::where('status','publish')->where('id',$productId)->first();

            if($request->quantity && $request->quantity > 0){
                $quantity = $request->quantity;
                if($request->quantity <= $product->quantity){
                    if($request->quantity > 19){
                        $quantity = 19;
                    }
                }
                else{
                    $quantity = $product->quantity;
                }
            }

            $subTotal = $product->product_price * $quantity; //()Including Taxes

            if($request->promocode){
                $promocodeFromDB = PromoCode::where('promocode',$request->promocode)->first();
                if($promocodeFromDB){
                    if($promocodeFromDB->isExpiredOrNotStarted()){
                        $promocodeStatus = FALSE;
                    }
                    else{
                        $promocodeStatus = TRUE;
                        $promoDiscount = $promocodeFromDB->discount_price * $quantity;
                    }
                }
                else{
                    $promocodeStatus = FALSE;
                }
                $promocode = $request->promocode;
            }
            $totalDiscount = $promoDiscount + $comboDiscount;
            $grandTotal = $subTotal - $totalDiscount;
            $data = [
                'combination' => $combination,
                'product' => $product,
                'subTotal' => $subTotal,
                'quantity' => $quantity,
                'comboDiscount' => $comboDiscount,
                'promoDiscount' => $promoDiscount,
                'promocode' => $promocode,
                'grandTotal' => $grandTotal,
                'totalDiscount' => $totalDiscount,
                'promocodeStatus' => $promocodeStatus,
                'promocodeFromDB' => $promocodeFromDB,
                'countries' => $countries,
            ];
            return response()->json($data);
        }
    }

    //initiate Payment
    public function initiatePayment(Request $request)
    {
        $title = 'Payment - Selligion';
        $combination = NULL;
        $quantity = $request->quantity;
        $promocode = NULL;
        $promocodeStatus = False;
        $promocodeFromDB = NULL;
        $comboDiscount = 0;
        $promoDiscount = 0;
        if($request->combination_id){
            $combinationId = base64_decode($request->combination_id);
            $combination = ProductCombination::with('products')->where('status','publish')->where('id',$combinationId)->first();

            $products = $combination->products;

            if($request->quantity && $request->quantity > 0){
                $quantity = $request->quantity;
            }

            $subTotal = $products->sum('product.product_price') * $quantity; //()Including Taxes

            if(!is_null($combination->combination_discount_price) && ($combination->combination_discount_price > 0)){
                $comboDiscount = $combination->combination_discount_price * $quantity;
            }

            if($request->promocode){
                $promocodeFromDB = PromoCode::where('promocode',$request->promocode)->first();
                if($promocodeFromDB){
                    if($promocodeFromDB->isExpiredOrNotStarted()){
                        $promocodeStatus = FALSE;
                    }
                    else{
                        $promocodeStatus = TRUE;
                        $promoDiscount = $promocodeFromDB->discount_price * $quantity;
                    }
                }
                else{
                    $promocodeStatus = FALSE;
                }
                $promocode = $request->promocode;
            }
            $totalDiscount = $promoDiscount + $comboDiscount;
            $grandTotal = $subTotal - $totalDiscount;
            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
            $order = $api->order->create([
                'amount' => $grandTotal * 100, // Amount in paise
                'currency' => 'INR',
                'receipt' => 'order_' . time(),
            ]);
            $formData = $request->all();
            return view('Frontend.Product.initiatePayment', [
                'order' => $order,
                'formData' => $formData,
                'title' => $title,
                'products' => $products,
                'promoDiscount' => $promoDiscount,
                'promocode' => $promocode,
                'promocodeStatus' => $promocodeStatus,
                'combination' => $combination,
                'comboDiscount' => $comboDiscount,
                'subTotal' => $subTotal,
                'totalDiscount' => $totalDiscount,
                'grandTotal' => $grandTotal
            ]);
        }
        if($request->product_id){
            $productId = base64_decode($request->product_id);
            $product = Product::where('status','publish')->where('id',$productId)->first();

            if($request->quantity && $request->quantity > 0){
                $quantity = $request->quantity;
                if($request->quantity > 19){
                    $quantity = 19;
                }
            }

            $subTotal = $product->product_price * $quantity; //()Including Taxes

            if($request->promocode){
                $promocodeFromDB = PromoCode::where('promocode',$request->promocode)->first();
                if($promocodeFromDB){
                    if($promocodeFromDB->isExpiredOrNotStarted()){
                        $promocodeStatus = FALSE;
                    }
                    else{
                        $promocodeStatus = TRUE;
                        $promoDiscount = $promocodeFromDB->discount_price * $quantity;
                    }
                }
                else{
                    $promocodeStatus = FALSE;
                }
                $promocode = $request->promocode;
            }
            $totalDiscount = $promoDiscount + $comboDiscount;
            $grandTotal = $subTotal - $totalDiscount;
            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
            $order = $api->order->create([
                'amount' => $grandTotal * 100, // Amount in paise
                'currency' => 'INR',
                'receipt' => 'order_' . time(),
            ]);
            $formData = $request->all();
            return view('Frontend.Product.initiatePayment', [
                'order' => $order,
                'formData' => $formData,
                'title' => $title,
                'product' => $product,
                'promoDiscount' => $promoDiscount,
                'promocode' => $promocode,
                'promocodeStatus' => $promocodeStatus,
                'combination' => $combination,
                'comboDiscount' => $comboDiscount,
                'subTotal' => $subTotal,
                'totalDiscount' => $totalDiscount,
                'grandTotal' => $grandTotal
            ]);
        }
    }
    //Create Order
    public function saveCompleteOrderDetails(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            if($user){
                $userId = $user->id;
                if(is_null($user['name']) || $user['name'] == $user['email']){
                    $user['name'] = $request->name;
                    $user->save();
                }
                if(is_null($user['phonenumber'])){
                    $user['phonenumber'] = $request->mobile;
                    $user->save();
                }
            }
            else{
                $userId = NULL;
            }
        }
        else{
            $userId = NULL;
        }
        $payment = Payment::create([
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'amount' =>($request->amount)/100,
        ]);
        $address = Address::create([
            'user_id' => $userId,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'pan_number' => $request->pan_number,
            'gst_number' => $request->gst_number,
        ]);
        if(!is_null($request->promocode)){
            $promocode = PromoCode::where('promocode',$request->promocode)->first();
            if($promocode){
                $promocodeId = $promocode->id;
            }
            else{
                $promocodeId = NULL;
            }
        }
        else{
            $promocodeId = NULL;
        }
        if(!is_null($request->combination_id)){
            $combinationId = base64_decode($request->combination_id);
        }
        else{
            $combinationId = NULL;
        }
        if(!is_null($request->product_id)){
            $productId = base64_decode($request->product_id);
        }
        else{
            $productId = NULL;
        }
        $order = Order::create([
            'amount' =>($request->amount)/100,
            'product_combination_id' =>$combinationId,
            'product_id' =>$productId,
            'promo_code_id' =>$promocodeId,
            'quantity' =>$request->quantity,
            'address_id' =>$address->id,
            'user_id' => $userId,
            'payment_id' => $payment->id,
        ]);
        if(!is_null($request->product_id)){
            $selectedProduct = Product::where('id',$productId)->first();
            $promoDiscount = 0;
            $comboDiscount = 0;
            $totalDiscount = 0;
            $taxableAmount = 0;
            $totalTax = 0;
            if(!is_null($order->promo_code_id)){
                $promoDiscount = $order->promoCode->discount_price * $order->quantity;
            }
            if(!is_null($order->product_combination_id)){
                $comboDiscount = $order->productCombination->combination_discount_price * $order->quantity;
            }
            $totalDiscount =  $promoDiscount + $comboDiscount;
            $taxableAmount = (($selectedProduct['product_price'] * $order->quantity) - $totalDiscount) * (100 / 118);
            OrderedProduct::create([
                'product' => $selectedProduct['product_name'],
                'price' => $selectedProduct['product_price'],
                'promo_discount' => $promoDiscount,
                'combo_discount' => $comboDiscount,
                'taxable_amount' => $taxableAmount,
                'total_tax' => ($taxableAmount * $selectedProduct->tax->tax_percentage) / 100,
                'tax_percentage' => ($selectedProduct->tax->tax_percentage),
                'quantity' => $request->quantity,
                'order_id' => $order['id'],
            ]);
        }
        if(!is_null($request->combination_id)){
            $combination = ProductCombination::with('products')->where('status','publish')->where('id',$combinationId)->first();
            $products = $combination->products;
            foreach($products as $product){
                $selectedProduct = Product::where('id',$product->product->id)->first();
                $promoDiscount = 0;
                $comboDiscount = 0;
                $totalDiscount = 0;
                $taxableAmount = 0;
                $totalTax = 0;
                if($selectedProduct['addOn'] == 'no'){
                    if(!is_null($order->promo_code_id)){
                        $promoDiscount = $order->promoCode->discount_price * $order->quantity;
                    }
                    if(!is_null($order->product_combination_id)){
                        $comboDiscount = $order->productCombination->combination_discount_price * $order->quantity;
                    }
                }
                $totalDiscount =  $promoDiscount + $comboDiscount;
                $taxableAmount = (($selectedProduct['product_price'] * $order->quantity) - $totalDiscount) * (100 / 118);
                OrderedProduct::create([
                    'product' => $selectedProduct['product_name'],
                    'price' => $selectedProduct['product_price'],
                    'promo_discount' => $promoDiscount,
                    'combo_discount' => $comboDiscount,
                    'taxable_amount' => $taxableAmount,
                    'total_tax' => ($taxableAmount * $selectedProduct->tax->tax_percentage) / 100,
                    'tax_percentage' => ($selectedProduct->tax->tax_percentage),
                    'quantity' => $request->quantity,
                    'order_id' => $order['id'],
                ]);
            }
        }
        $orderIdFormat = OrderFormat::first();
        $formattedOrderNumber = str_pad($order->id, 5, '0', STR_PAD_LEFT);
        $newFormat = "A";
        if(($orderIdFormat->custom_format === 'A')){
            $newFormat = 'A';
        }
        if(($orderIdFormat->custom_format === 'B')){
            $newFormat = 'B';
        }
        $customGeneratedOrderId = date('ym') . $newFormat . $formattedOrderNumber;

        $currentFinancialYear = $this->getCurrentFinancialYear();
        $currentYear = $currentFinancialYear;
        $nextYear = $currentYear + 1;

        // Get the rest of the invoice_number from the request or generate it based on order id
        $restOfInvoiceNumber = str_pad($order->id, 5, '0', STR_PAD_LEFT);
        // Combine the financial year and the rest of the invoice_number
        $invoiceNumber = 'STPL/'.$currentYear.'-'.$nextYear.'/W'.$restOfInvoiceNumber;

        $order->invoice_number = $invoiceNumber;
        $order->custom_order_id = $customGeneratedOrderId;
        $order->save();

        $payment->order_id = $order->id;
        $payment->save();
        if(!is_null($request->combination_id)){
            $combination = ProductCombination::with('products')->where('status','publish')->where('id',$combinationId)->first();
            $products = $combination->products;
            foreach($products as $product){
                $selectedProductInCombo = Product::where('id',$product->product->id)->first();
                $selectedProductInCombo['quantity'] = $selectedProductInCombo['quantity'] - $request->quantity;
                $selectedProductInCombo->save();
            }
        }
        if(!is_null($request->product_id)){
            $selectedProduct = Product::where('id',$productId)->first();
            $selectedProduct['quantity'] = $selectedProduct['quantity'] - $request->quantity;
            $selectedProduct->save();
        }

        $email = $request->email;
        $totalAmount = $order->amount;
        $totalAmountInWords = $this->numberToWord($totalAmount);
        // try {
        //     dispatch(new SendOrderConfirmationEmail($email, $order, $totalAmountInWords));
        // } catch (\Exception $e) {
        //     Log::error('Error dispatching SendOrderConfirmationEmail job: ' . $e->getMessage());
        // }
        // try {
        //     dispatch(new SendNewOrderMail($order, $totalAmountInWords));
        // } catch (\Exception $e) {
        //     Log::error('Error dispatching SendNewOrderMail job: ' . $e->getMessage());
        // }
        try {
            dispatch(new GenerateInvoiceAndSendEmail($order->id));
        } catch (\Exception $e) {
            Log::error('Error Generating Invoice and Sending Mail: ' . $e->getMessage());
        }

        return response()->json([
            'message' => 'Order details saved successfully',
            'order_id' => $order->id,
        ]);
    }

    //Order Success
    public function orderSuccess(Request $request){
        $title = 'Order Success - Selligion';
        $order = NULL;
        if($request->order_id){
            $orderId = ($request->order_id);
            $order = Order::where('id',$orderId)->first();
            return view('Frontend.Product.orderSuccess',[
                'order' => $order,
                'title' => $title,
            ]);
        }
        return view('Frontend.Product.orderSuccess',[
            'title' => $title,
            'order' => $order,
        ]);
    }

    //My Order
    public function myOrders(Request $request){
        $title = "My Orders - Selligion";
        if(Auth::check()){
            $orders = Order::where('user_id',Auth::user()->id)->get();
            return view('Frontend.Product.myOrders',[
                'title' => $title,
                'orders' => $orders,
            ]);
        }
        else{
            $orders = NULL;
            return view('Frontend.Product.myOrders',[
                'title' => $title,
                'orders' => $orders,
            ]);
        }
    }

    //My Order Session
    public function myOrdersSession(Request $request){
        $title = "My Orders - Selligion";
        if($request->order_ids){
                $orders = NULL;
                $orderIdsString = $request->input('order_ids');
                $orderIdsArray = explode(',', $orderIdsString);
                $orders = Order::whereIn('id', $orderIdsArray)->get();
                return view('Frontend.Product.myOrdersSession',[
                    'title' => $title,
                    'orders' => $orders,
                ]);
        }
        else{
            $orders = NULL;
            return view('Frontend.Product.myOrdersSession',[
                'title' => $title,
                'orders' => $orders,
            ]);
        }
    }

    //All Orders for Admin
    public function getAllOrders(){
        $title = "All Orders - Selligion";
        $orders = Order::all();
        return view('Backend.WebsiteAdmin.Order.all',[
            'title' => $title,
            'orders' => $orders,
        ]);
    }

    //View Order for Admin
    public function viewOrder($id){
        $title = "All Orders - Selligion";
        $order = Order::where('id',$id)->first();
        return view('Backend.WebsiteAdmin.Order.view',[
            'title' => $title,
            'order' => $order,
        ]);
    }

    //Download Invoice
    public function viewInvoice($id){
        $title = "Invoice - Selligion";
        $orderId = base64_decode($id);
        $order = Order::where('id',$id)->first();
        $totalAmount = $order->amount;
        $totalAmountInWords = $this->numberToWord($totalAmount);
        return view('Frontend.Product.invoice',[
            'title' => $title,
            'order' => $order,
            'totalAmountInWords' => $totalAmountInWords,
        ]);
    }
    //Download Invoice
    public function downloadInvoice($id){
        $title = 'Download Invoice - Selligion';
        $orderId = base64_decode($id);
        $order = Order::where('id',$orderId)->first();
        $totalAmount = $order->amount;
        $totalAmountInWords = $this->numberToWord($totalAmount);

        $data = [
            'order' => $order,
            'totalAmountInWords' => $totalAmountInWords,
            'title' => 'Download Invoice - Selligion',
        ];

        $pdf = Pdf::loadView('Frontend.Product.invoice', $data);
        $pdf->setPaper('a4', 'potrait');
        $pdf = Pdf::loadView('Frontend.Product.invoice', $data);
        return $pdf->download('invoice_'.$order->custom_order_id.'.pdf');
    }

    private function getCurrentFinancialYear()
    {
        $currentDate = Carbon::now();
        $startOfFinancialYearMonth = 4;
        if ($currentDate->month < $startOfFinancialYearMonth) {
            return substr($currentDate->year - 1, -2);
        } else {
            return substr($currentDate->year, -2);
        }
    }
}
