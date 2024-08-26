<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SaleDayController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\CombinedProductController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\OrderFormatController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LimitedOfferController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [PageController::class,'index']);
Route::get('/product/{slug}', [PageController::class,'productPage']);
Route::get('/privacy-policy', [PageController::class,'privacyPolicy']);
Route::get('/terms-of-service', [PageController::class,'termsOfService']);
Route::get('/about-us', [PageController::class,'aboutUs']);
Route::get('/contact-us', [PageController::class,'contactUs']);
Route::post('/send/contactUs/mail', [PageController::class,'sendContactUsMail']);
Route::get('/careers', [PageController::class,'careers']);
Route::post('/send/careers/mail', [PageController::class,'sendCareersMail']);
Route::get('/mitra', [PageController::class,'mitra']);
Route::get('/custom/login/', [UserController::class,'getCustomLogin']);
Route::post('/custom/login/dev', [UserController::class,'devLogin']);

//Order
Route::middleware(['auth'])->group(function () {
    Route::post('/logout/miniorange', [LogoutController::class,'logoutMain']);
});

Route::get('/checkout', [OrderController::class, 'checkoutProduct']);
Route::post('/initiate/payment', [OrderController::class, 'initiatePayment']);
Route::post('/save/order/details', [OrderController::class, 'saveCompleteOrderDetails']);
Route::get('/order/success', [OrderController::class, 'orderSuccess']);
Route::get('/my/orders', [OrderController::class, 'myOrders']);
Route::get('/my/orders/session', [OrderController::class, 'myOrdersSession']);
Route::get('/quantity/change', [OrderController::class, 'changeQuantity']);
Route::get('/order/invoice/{id}', [OrderController::class,'viewInvoice']);
Route::get('/order/invoice/download/{id}', [OrderController::class,'downloadInvoice']);
Route::get('/saleday/register', [SaleDayController::class,'getRegisterForSaleDay']);
Route::post('/saleday/register', [SaleDayController::class,'registerForSaleDay']);


//Blog
Route::get('blogs/{id}', [BlogController::class,'viewBlog']);
Route::get('blogs', [BlogController::class,'getUserViewBlogs']);

//Admin Routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    //Product
    Route::get('/admin/dashboard/product/add', [ProductController::class,'getAddProduct']);
    Route::post('/admin/dashboard/product/save', [ProductController::class,'addProduct']);
    Route::get('/admin/dashboard/product/edit/{id}', [ProductController::class,'getEditProduct']);
    Route::post('/admin/dashboard/product/update/{id}', [ProductController::class,'updateProduct']);
    Route::get('/admin/dashboard/product/all', [ProductController::class,'getAllProduct']);
    Route::post('/admin/dashboard/product/delete/{id}', [ProductController::class,'deleteProduct']);

    //Combinations
    Route::get('/admin/dashboard/product/combination/add', [CombinedProductController::class,'getAddProductCombination']);
    Route::post('/admin/dashboard/product/combination/save', [CombinedProductController::class,'addProductCombination']);
    Route::get('/admin/dashboard/product/combination/edit/{id}', [CombinedProductController::class,'getEditProductCombination']);
    Route::post('/admin/dashboard/product/combination/update/{id}', [CombinedProductController::class,'updateProductCombination']);
    Route::get('/admin/dashboard/product/combination/all', [CombinedProductController::class,'getAllProductCombination']);
    Route::post('/admin/dashboard/product/combination/delete/{id}', [CombinedProductController::class,'deleteProductCombination']);

    //Product image
    Route::get('/admin/dashboard/product/combination/specific/product/delete/{id}', [CombinedProductController::class,'deleteProductInCombination']);

    //Product image
    Route::get('/admin/dashboard/product/image/delete/{id}', [ProductController::class,'deleteProductImage']);

    //Category
    Route::get('/admin/dashboard/category/add', [CategoryController::class,'getAddCategory']);
    Route::post('/admin/dashboard/category/save', [CategoryController::class,'addCategory']);
    Route::get('/admin/dashboard/category/edit/{id}', [CategoryController::class,'getEditCategory']);
    Route::post('/admin/dashboard/category/update/{id}', [CategoryController::class,'updateCategory']);
    Route::get('/admin/dashboard/category/all', [CategoryController::class,'getAllCategory']);
    Route::post('/admin/dashboard/category/delete/{id}', [CategoryController::class,'deleteCategory']);

    //Tax
    Route::get('/admin/dashboard/tax/add', [TaxController::class,'getAddTax']);
    Route::post('/admin/dashboard/tax/save', [TaxController::class,'addTax']);
    Route::get('/admin/dashboard/tax/edit/{id}', [TaxController::class,'getEditTax']);
    Route::post('/admin/dashboard/tax/update/{id}', [TaxController::class,'updateTax']);
    Route::get('/admin/dashboard/tax/all', [TaxController::class,'getAllTax']);
    Route::get('/admin/dashboard/tax/delete/{id}', [TaxController::class,'deleteTax']);

    //Tax
    Route::get('/admin/dashboard/promocode/add', [PromoCodeController::class,'getAddPromoCode']);
    Route::post('/admin/dashboard/promocode/save', [PromoCodeController::class,'addPromoCode']);
    Route::get('/admin/dashboard/promocode/edit/{id}', [PromoCodeController::class,'getEditPromoCode']);
    Route::post('/admin/dashboard/promocode/update/{id}', [PromoCodeController::class,'updatePromoCode']);
    Route::get('/admin/dashboard/promocode/all', [PromoCodeController::class,'getAllPromoCode']);
    Route::get('/admin/dashboard/promocode/delete/{id}', [PromoCodeController::class,'deletePromoCode']);

    //Blog
    Route::get('/admin/dashboard/blog/add', [BlogController::class,'getAddBlog']);
    Route::post('/admin/dashboard/blog/save', [BlogController::class,'addBlog']);
    Route::get('/admin/dashboard/blog/edit/{id}', [BlogController::class,'getEditBlog']);
    Route::post('/admin/dashboard/blog/update/{id}', [BlogController::class,'updateBlog']);
    Route::get('/admin/dashboard/blog/all', [BlogController::class,'getAllBlog']);
    Route::get('/admin/dashboard/blog/delete/{id}', [BlogController::class,'deleteBlog']);


    //Orders
    Route::get('/admin/dashboard/order/view/{id}', [OrderController::class,'viewOrder']);
    Route::get('/admin/dashboard/order/all', [OrderController::class,'getAllOrders']);

    //Users
    // Route::get('/admin/dashboard/user/add', [UserController::class,'getAddUser']);
    // Route::post('/admin/dashboard/user/save', [UserController::class,'addUser']);
    Route::get('/admin/dashboard/user/edit/{id}', [UserController::class,'getEditUser']);
    Route::post('/admin/dashboard/user/update/{id}', [UserController::class,'updateUser']);
    Route::get('/admin/dashboard/user/all', [UserController::class,'getAllUser']);
    Route::get('/admin/dashboard/user/delete/{id}', [UserController::class,'deleteUser']);

    //OrderIDFormat
    Route::get('/admin/dashboard/order-id-format/edit', [OrderFormatController::class,'getOrderFormat']);
    Route::get('/admin/dashboard/order-id-format/update/{id}', [OrderFormatController::class,'updateOrderFormat']);

    //LimitedOffer
    Route::get('/admin/dashboard/limited-time-offer/add', [LimitedOfferController::class,'getAddLimitedOffer']);
    Route::post('/admin/dashboard/limited-time-offer/save', [LimitedOfferController::class,'addLimitedOffer']);
    Route::get('/admin/dashboard/limited-time-offer/edit/{id}', [LimitedOfferController::class,'getEditLimitedOffer']);
    Route::post('/admin/dashboard/limited-time-offer/update/{id}', [LimitedOfferController::class,'updateLimitedOffer']);
    Route::get('/admin/dashboard/limited-time-offer/all', [LimitedOfferController::class,'getAllLimitedOffer']);
    Route::get('/admin/dashboard/limited-time-offer/delete/{id}', [LimitedOfferController::class,'deleteLimitedOffer']);

    //SaleDay
    Route::get('/admin/dashboard/saleday/users/all', [SaleDayController::class,'getAllSaleDayUsers']);
});
// 404 Redirection to Home Page
Route::any('{query}',function() {
    return redirect('/');
})->where('query', '.*');
