<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middlware\AuthMiddleware;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ShoeController;
use App\Http\Controllers\Admin\ShoeImageController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ShoeVariantController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Customer\PaymentController as CustomerPaymentController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController; 

Route::middleware(['auth','admin'])->group(function(){


    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
Route::get('/Admin/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/Admin/employees/store', [EmployeeController::class, 'store'])->name('admin.employees.store');
Route::get('/Admin/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/Admin/employees/{id}', [EmployeeController::class, 'update'])->name('admin.employees.update');
Route::delete('/Admin/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

//catogories route

Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/Admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/Admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/Admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/Admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/Admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

//brands routes
Route::get('/Brands', [BrandController::class, 'index'])->name('admin.brands.index');
Route::get('/Admin/Brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
Route::post('/admin/brands', [BrandController::class, 'store'])->name('admin.brands.store');
Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
Route::put('/admin/brands/{id}', [BrandController::class, 'update'])->name('admin.brands.update');
Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

// Shoes Routes

Route::get('/shoes', [ShoeController::class, 'index'])
    ->name('admin.shoes.index');

Route::get('/Admin/shoes/create', [ShoeController::class, 'create'])
    ->name('admin.shoes.create');

Route::post('/admin/shoes', [ShoeController::class, 'store'])
    ->name('admin.shoes.store');

Route::get('/admin/shoes/{id}/edit', [ShoeController::class, 'edit'])
    ->name('admin.shoes.edit');

Route::put('/admin/shoes/{id}', [ShoeController::class, 'update'])
    ->name('admin.shoes.update');

Route::delete('/admin/shoes/{id}', [ShoeController::class, 'destroy'])
    ->name('admin.shoes.destroy');

//showimage routes 



Route::post(
'/admin/shoes/{shoe}/images',
[ShoeImageController::class,'store']
)
->name('admin.shoes.images.store');


Route::delete(
'/admin/shoe-images/{image}',
[ShoeImageController::class,'destroy']
)
->name('admin.shoe-images.destroy');

//size routes

Route::get('/index/sizes', [SizeController::class,'index'])
    ->name('admin.sizes.index');


Route::get('/sizes/create', [SizeController::class,'create'])
    ->name('admin.sizes.create');


Route::post('/sizes', [SizeController::class,'store'])
    ->name('admin.sizes.store');


Route::get('/sizes/{size}/edit', [SizeController::class,'edit'])
    ->name('admin.sizes.edit');


Route::put('/sizes/{size}', [SizeController::class,'update'])
    ->name('admin.sizes.update');


Route::delete('/sizes/{size}', [SizeController::class,'destroy'])
    ->name('admin.sizes.destroy');

//color routes
Route::get('/colours',
[ColorController::class,'index'])
->name('admin.colors.index');


Route::get('/colors/create',
[ColorController::class,'create'])
->name('admin.colors.create');


Route::post('/colors',
[ColorController::class,'store'])
->name('admin.colors.store');


Route::get('/colors/{color}/edit',
[ColorController::class,'edit'])
->name('admin.colors.edit');


Route::put('/colors/{color}',
[ColorController::class,'update'])
->name('admin.colors.update');


Route::delete('/colors/{color}',
[ColorController::class,'destroy'])
->name('admin.colors.destroy');

//variants routes

Route::get('/shoe-variants',
[ShoeVariantController::class,'index'])
->name('admin.shoe-variants.index');



Route::get('/shoe-variants/create',
[ShoeVariantController::class,'create'])
->name('admin.shoe-variants.create');



Route::post('/shoe-variants',
[ShoeVariantController::class,'store'])
->name('admin.shoe-variants.store');


Route::get('/shoe-variants/edit/{id}',
[ShoeVariantController::class,'edit'])
->name('admin.shoe-variants.edit');



Route::put('/shoe-variants/{shoeVariant}',
[ShoeVariantController::class,'update'])
->name('admin.shoe-variants.update');



Route::delete('/shoe-variants/{id}',
[ShoeVariantController::class,'destroy'])
->name('admin.shoe-variants.destroy');


//inventory routes

Route::get('/inventory', [InventoryController::class, 'index'])
    ->name('admin.inventory.index');

Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])
    ->name('inventory.edit');

Route::put('/inventory/{id}', [InventoryController::class, 'update'])
    ->name('inventory.update');

//admin will see the payment



    Route::get('/payments',
        [AdminPaymentController::class,'index']
    )->name('admin.payments.index');


    Route::get('/payments/{payment}',
        [AdminPaymentController::class,'show']
    )->name('admin.payments.show');


    Route::post('/payments/{payment}/refund',
        [AdminPaymentController::class,'refund']
    )->name('admin.payments.refund');

//admin profile
Route::get('/profile',
    [EmployeeController::class,'profile']
)->name('profile');


//admin see the customer details 

    Route::get('/customers',
    [CustomerController::class,'index'])->name('admin.customers.index');


    Route::get('/customers/{customer}',
    [CustomerController::class,'show'])
    ->name('admin.customers.show');


    Route::patch('/customers/{customer}/status',
    [CustomerController::class,'status'])
    ->name('admin.customers.status');

//admin seeing the order records


    Route::get('/orders',
        [AdminOrderController::class,'index']
    )->name('admin.orders.index');



    Route::get('/orders/{order}',
        [AdminOrderController::class,'show']
    )->name('admin.orders.show');

Route::patch('/orders/{order}',
    [AdminOrderController::class,'update']
)->name('admin.orders.update');



});

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::get('forgot-password', [ForgotPasswordController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [ForgotPasswordController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showNewPasswordForm'])
    ->name('password.reset');

Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])
    ->name('password.update');







 Route::prefix('customer')->name('customer.')->group(function(){

//customer registration and login
    Route::get('/register',
    [AuthController::class,'register'])
    ->name('register');


    Route::post('/register',
    [AuthController::class,'store'])
    ->name('register.store');


    Route::get('/customer/login',
    [AuthController::class,'login'])
    ->name('login');


    Route::post('/customer/login',
    [AuthController::class,'authenticate'])
    ->name('login.check');


    Route::post('/logout',
    [AuthController::class,'logout'])
    ->name('logout');


});





//order
Route::middleware('auth:customer')->group(function(){

    Route::get('/payment/success',
        [CustomerPaymentController::class,'success']
    )->name('payment.success');


    Route::get('/payment/cancel',
        [CustomerPaymentController::class,'cancel']
    )->name('payment.cancel');


    Route::get('/payment/{order}',
        [CustomerPaymentController::class,'pay']
    )->name('payment');


Route::get('/orders/{order}/invoice', [CustomerOrderController::class, 'invoice'])
    ->name('orders.invoice');

    Route::get('/orders/{order}/invoice/download',
    [CustomerOrderController::class,'downloadInvoice'])->name('orders.invoice.download');

    Route::get('/customer/orders', [CustomerOrderController::class, 'index'])
        ->name('customer.orders');
    
});





     Route::post('/order/store',
        [OrderController::class,'store']
    )->name('order.store');

//cart routes
Route::middleware('auth:customer')->group(function(){

Route::get('/cart',
    [CartController::class,'index']
)->name('cart.index');

 Route::post('/cart/add',
        [CartController::class,'add']
    )->name('cart.add');

    Route::delete('/cart/remove/{id}',
        [CartController::class,'remove']
    )->name('cart.remove');

   Route::post('/cart/update/{id}', [CartController::class,'update'])
    ->name('cart.update');

});

//customer home page routes

Route::get('/', [HomeController::class,'index'])
    ->name('customer.home');

//customer product

Route::get('/products',
[ProductController::class,'index'])
->name('customer.shop');

Route::get('/products/{shoe}',
    [ProductController::class,'show']
)->name('products.show');

//checkout for payment


Route::middleware('auth:customer')->group(function(){


    Route::get('/checkout',
        [CheckoutController::class,'index']
    )->name('checkout');


    Route::post('/checkout/store',
        [CheckoutController::class,'store']
    )->name('checkout.store');


});

//customer shop

Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop.index');

Route::get('/shoe/{shoe}', [ShopController::class, 'show'])
    ->name('shop.show');

    //stripe
Route::get('/stripe/{id}',
[StripeController::class,'checkout']
)->name('stripe');

Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');

Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

//admin dashboard routes
Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');

});
// dashboard pages
Route::get('/dashboard12', function () {
    return view('pages.dashboard.ecommerce', ['title' => 'E-commerce Dashboard']);
})->name('dashboard')->middleware('auth');

// calender pages
Route::get('/calendar', function () {
    return view('pages.calender', ['title' => 'Calendar']);
})->name('calendar');

// profile pages
use App\Http\Controllers\Admin\ProfileController;

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::put('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

});

// form pages
Route::get('/form-elements', function () {
    return view('pages.form.form-elements', ['title' => 'Form Elements']);
})->name('form-elements');

// tables pages
Route::get('/basic-tables', function () {
    return view('pages.tables.basic-tables', ['title' => 'Basic Tables']);
})->name('basic-tables');

// pages

Route::get('/blank', function () {
    return view('pages.blank', ['title' => 'Blank']);
})->name('blank');

// error pages
Route::get('/error-404', function () {
    return view('pages.errors.error-404', ['title' => 'Error 404']);
})->name('error-404');

// chart pages
Route::get('/line-chart', function () {
    return view('pages.chart.line-chart', ['title' => 'Line Chart']);
})->name('line-chart');

Route::get('/bar-chart', function () {
    return view('pages.chart.bar-chart', ['title' => 'Bar Chart']);
})->name('bar-chart');


// authentication pages
Route::get('/signin', function () {
    return view('pages.auth.signin', ['title' => 'Sign In']);
})->name('signin');

Route::get('/signup', function () {
    return view('pages.auth.signup', ['title' => 'Sign Up']);
})->name('signup');

// ui elements pages
Route::get('/alerts', function () {
    return view('pages.ui-elements.alerts', ['title' => 'Alerts']);
})->name('alerts');

Route::get('/avatars', function () {
    return view('pages.ui-elements.avatars', ['title' => 'Avatars']);
})->name('avatars');

Route::get('/badge', function () {
    return view('pages.ui-elements.badges', ['title' => 'Badges']);
})->name('badges');

Route::get('/buttons', function () {
    return view('pages.ui-elements.buttons', ['title' => 'Buttons']);
})->name('buttons');

Route::get('/image', function () {
    return view('pages.ui-elements.images', ['title' => 'Images']);
})->name('images');

Route::get('/videos', function () {
    return view('pages.ui-elements.videos', ['title' => 'Videos']);
})->name('videos');






















