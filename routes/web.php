<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminProductListXML;
use App\Http\Livewire\UserXMLController;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\TrackingController;
use App\Http\Livewire\OrderXMLController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\BlogDetailsComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\PnpComponent;
use App\Http\Livewire\TncComponent;
use App\Http\Livewire\FAQXML;
use App\Http\Livewire\CustomerReportXML;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home.index');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('shop.cart');

Route::get('/wishlist', WishlistComponent::class)->name('shop.wishlist');

Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');

Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/pnp', PnpComponent::class)->name('pnp');

Route::get('/tnc', TncComponent::class)->name('tnc');

Route::get('/about', AboutComponent::class)->name('about');

Route::get('/blog', BlogComponent::class)->name('blog');

Route::get('/blog-details', BlogDetailsComponent::class)->name('blog-details');

Route::get('/contact', ContactComponent::class)->name('contact');

Route::get('/user-xml', [UserXMLController::class, 'getUsersXml'])->name('users.xml');
Route::get('/export-xml-file', [UserXMLController::class, 'exportXmlToFile'])->name('export.xml.file');
Route::middleware(['auth'])->group(function () {
   // Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth', 'authadmin'])->group(function () {
    Route::get('/admin/categories',AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_id}',AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/xproducts',AdminProductListXML::class)->name('admin.xproducts');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/product/edit/{product_id}',AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('/admin/export-xml', [AdminProductListXML::class, 'exportXmlToFile'])->name('admin.productsxml');
    Route::get('faq_crud',[\App\Http\Controllers\FAQPageController::class,'view_faq_crud_page'])->name("admin.faqcrud");
    Route::get('faq/faq_crud',[\App\Http\Controllers\FAQPageController::class,'view_faq_crud_page']);
    Route::delete('faq/faq_crud/{id}',[\App\Http\Controllers\FAQPageController::class,'delete']);
    Route::get('faq/faq_crud_form',[\App\Http\Controllers\FAQPageController::class,'view_faq_crud_form_page']);
    Route::post('faq/faq_crud_form',[\App\Http\Controllers\FAQPageController::class,'create']);
    Route::get('faq/faq_crud_form2/{id}',[\App\Http\Controllers\FAQPageController::class,'view_faq_crud_form2_page']);
    Route::post('faq/faq_crud_form2',[\App\Http\Controllers\FAQPageController::class,'update']);
});

Route::get('/courier/login', function() {
    return view('auth.courierLogin');
})->name('courier.login');

Route::middleware(['auth:courier'])->group(function () {
    Route::get('/courierData', function() {
        $xmlContent = Storage::disk('local')->get('courier_data.xml');
        return response($xmlContent, 200)->header('Content-Type', 'text/xml');
    });

    Route::get('/courier/dashboard', [CourierController::class, 'dashboard'])->name('courier.dashboard');

    Route::get('/courier/createReport', [CourierController::class, 'createReport'])->name('courier.report');
    
    Route::get('/courier/tracking', function () {
        return view('layouts.tracking');
    });
    
    Route::get('/courier/tracking/{trckId}', [CourierController::class, 'trackingDetail'])->name('tracking.detail');

    Route::post('/courier/trackingDetail', [CourierController::class, 'updateTrckDetail'])->name('courier.tracking.update');

    Route::post("/courier/logout", [CourierController::class, 'courierLogout'])->name('courier.logout');
});

Route::post("/courier/courierLogin", [CourierController::class, 'courierLogin']);

Route::get('/tracking/{usrId}', [TrackingController::class, 'tracking'])->name('get.track');

Route::get('/usrTrack/{trackId}', [TrackingController::class, 'usrTrackDetail'])->name('usr.tracking.detail');

Route::get('/trackingDetail/{trackId}', [TrackingController::class, 'trackDelete'])->name('tracking.delete');

Route::post('/payment', 'App\Http\Controllers\StripeController@payment')->name('payment');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

Route::get('/order-xml', [OrderXMLController::class, 'getOrderXml'])->name('order.xml');
Route::get('/export-xml-file', [OrderXMLController::class, 'exportXmlToFile'])->name('export.xml.file');

Route::post('/designPatternController', 'App\Http\Controllers\designPatternController@store')->name('designPatternController');
Route::get('/thankyou/storingdb', [ThankyouComponent::class, 'storingdb'])->name('thankyou.storingdb');

Route::get('view_report_form',[\App\Http\Controllers\CustomerReportController::class,'view_report_form'])->name('view_report_form');
Route::get('view_customer_report',[\App\Http\Controllers\CustomerReportController::class,'view_customer_report'])->name('view_customer_report');
Route::get('/report-xml',[CustomerReportXML::class,'getCustomerReportXML'])->name('customer_report.xml');
Route::post('report_form/{id}',[\App\Http\Controllers\CustomerReportController::class,'createReport']);
Route::post('update_report_form_rating',[\App\Http\Controllers\CustomerReportController::class,'updateRating']);
Route::get('customer_report_reply/{id}',[\App\Http\Controllers\CustomerReportController::class,'view_reply_Customer']);
Route::post('customer_report_reply',[\App\Http\Controllers\CustomerReportController::class,'update_reply']);

Route::get('faq',[\App\Http\Controllers\FAQPageController::class,'view_faq_page'])->name('faq');
Route::get('/faq-xml',[FAQXML::class,'getFAQXml'])->name('faq.xml');

Route::post('send-email', [App\Http\Controllers\MailController::class, 'sendEmail']);
Route::get('send-email', [App\Http\Controllers\MailController::class, 'view_send_email_page'])->name('send_email');

require __DIR__ . '/auth.php';
