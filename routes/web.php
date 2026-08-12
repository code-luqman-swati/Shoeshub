<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middlware\AuthMiddleware;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use App\Http\Controllers\Admin\ProfileController;
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
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController; 
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\Customer\SearchController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SalesReportController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Customer\ContactController;


Route::middleware('auth')->group(function(){

 Route::get('/settings', [SettingController::class, 'edit'])
            ->name('admin.settings.edit');

        Route::put('/settings', [SettingController::class, 'update'])
            ->name('admin.settings.update');

   Route::get('/dashboard', function(){
    return view('admin.dashboard');
})
->middleware('permission:dashboard.view')
->name('dashboard');


Route::get('/employees', [EmployeeController::class, 'index'])
->middleware('permission:employee.view')
->name('admin.employees.index');


Route::get('Admin/employees/create', [EmployeeController::class, 'create'])
->middleware('permission:employee.create')
->name('employees.create');


Route::post('/Admin/employees/store', [EmployeeController::class, 'store'])
->middleware('permission:employee.create')
->name('admin.employees.store');


Route::get('/Admin/employees/{id}/edit', [EmployeeController::class, 'edit'])
->middleware('permission:employee.edit')
->name('employees.edit');


Route::put('/Admin/employees/{id}', [EmployeeController::class, 'update'])
->middleware('permission:employee.edit')
->name('admin.employees.update');


Route::delete('/Admin/employees/{id}', [EmployeeController::class, 'destroy'])
->middleware('permission:employee.delete')
->name('employees.destroy');

//categories
   
Route::get('/categories', [CategoryController::class, 'index'])
->middleware('permission:category.view')
->name('admin.categories.index');


Route::get('/categories/create', [CategoryController::class, 'create'])
->middleware('permission:category.create')
->name('admin.categories.create');


Route::post('/categories/store', [CategoryController::class, 'store'])
->middleware('permission:category.create')
->name('admin.categories.store');


Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
->middleware('permission:category.edit')
->name('admin.categories.edit');


Route::put('/categories/{id}', [CategoryController::class, 'update'])
->middleware('permission:category.edit')
->name('admin.categories.update');


Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
->middleware('permission:category.delete')
->name('admin.categories.destroy');

//brands routes 
 Route::get('/Brands', [BrandController::class, 'index'])
->middleware('permission:brand.view')
->name('admin.brands.index');


Route::get('/Admin/Brands/create', [BrandController::class, 'create'])
->middleware('permission:brand.create')
->name('admin.brands.create');


Route::post('/admin/brands', [BrandController::class, 'store'])
->middleware('permission:brand.create')
->name('admin.brands.store');


Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])
->middleware('permission:brand.edit')
->name('admin.brands.edit');


Route::put('/admin/brands/{id}', [BrandController::class, 'update'])
->middleware('permission:brand.edit')
->name('admin.brands.update');


Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])
->middleware('permission:brand.delete')
->name('admin.brands.destroy');
// Shoes Routes
Route::get('/shoes', [ShoeController::class, 'index'])
    ->middleware('permission:product.view')
    ->name('admin.shoes.index');


Route::get('/Admin/shoes/create', [ShoeController::class, 'create'])
    ->middleware('permission:product.create')
    ->name('admin.shoes.create');


Route::post('/admin/shoes', [ShoeController::class, 'store'])
    ->middleware('permission:product.create')
    ->name('admin.shoes.store');


Route::get('/admin/shoes/{id}/edit', [ShoeController::class, 'edit'])
    ->middleware('permission:product.edit')
    ->name('admin.shoes.edit');


Route::put('/admin/shoes/{id}', [ShoeController::class, 'update'])
    ->middleware('permission:product.edit')
    ->name('admin.shoes.update');


Route::delete('/admin/shoes/{id}', [ShoeController::class, 'destroy'])
    ->middleware('permission:product.delete')
    ->name('admin.shoes.destroy');
//showimage routes 



Route::post(
    '/admin/shoes/{shoe}/images',
    [ShoeImageController::class,'store']
)
->middleware('permission:product.image.manage')
->name('admin.shoes.images.store');


Route::delete(
    '/admin/shoe-images/{image}',
    [ShoeImageController::class,'destroy']
)
->middleware('permission:product.image.manage')
->name('admin.shoe-images.destroy');

//size routes
Route::get('/index/sizes', [SizeController::class,'index'])
    ->middleware('permission:size.view')
    ->name('admin.sizes.index');


Route::get('/sizes/create', [SizeController::class,'create'])
    ->middleware('permission:size.manage')
    ->name('admin.sizes.create');


Route::post('/sizes', [SizeController::class,'store'])
    ->middleware('permission:size.manage')
    ->name('admin.sizes.store');


Route::get('/sizes/{size}/edit', [SizeController::class,'edit'])
    ->middleware('permission:size.manage')
    ->name('admin.sizes.edit');


Route::put('/sizes/{size}', [SizeController::class,'update'])
    ->middleware('permission:size.manage')
    ->name('admin.sizes.update');


Route::delete('/sizes/{size}', [SizeController::class,'destroy'])
    ->middleware('permission:size.manage')
    ->name('admin.sizes.destroy');
//color routes
Route::get('/colours',
[ColorController::class,'index'])
->middleware('permission:color.view')
->name('admin.colors.index');


Route::get('/colors/create',
[ColorController::class,'create'])
->middleware('permission:color.manage')
->name('admin.colors.create');


Route::post('/colors',
[ColorController::class,'store'])
->middleware('permission:color.manage')
->name('admin.colors.store');


Route::get('/colors/{color}/edit',
[ColorController::class,'edit'])
->middleware('permission:color.manage')
->name('admin.colors.edit');


Route::put('/colors/{color}',
[ColorController::class,'update'])
->middleware('permission:color.manage')
->name('admin.colors.update');


Route::delete('/colors/{color}',
[ColorController::class,'destroy'])
->middleware('permission:color.manage')
->name('admin.colors.destroy');

//variants routes
Route::get('/shoe-variants',
[ShoeVariantController::class,'index'])
->middleware('permission:variant.view')
->name('admin.shoe-variants.index');


Route::get('/shoe-variants/create',
[ShoeVariantController::class,'create'])
->middleware('permission:variant.manage')
->name('admin.shoe-variants.create');


Route::post('/shoe-variants',
[ShoeVariantController::class,'store'])
->middleware('permission:variant.manage')
->name('admin.shoe-variants.store');


Route::get('/shoe-variants/edit/{id}',
[ShoeVariantController::class,'edit'])
->middleware('permission:variant.manage')
->name('admin.shoe-variants.edit');


Route::put('/shoe-variants/{shoeVariant}',
[ShoeVariantController::class,'update'])
->middleware('permission:variant.manage')
->name('admin.shoe-variants.update');


Route::delete('/shoe-variants/{id}',
[ShoeVariantController::class,'destroy'])
->middleware('permission:variant.manage')
->name('admin.shoe-variants.destroy');

//inventory routes
Route::get('/inventory', [InventoryController::class, 'index'])
    ->middleware('permission:inventory.view')
    ->name('admin.inventory.index');


Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])
    ->middleware('permission:inventory.update')
    ->name('inventory.edit');


Route::put('/inventory/{id}', [InventoryController::class, 'update'])
    ->middleware('permission:inventory.update')
    ->name('inventory.update');

//admin will see the payment
Route::get('/payments',
    [AdminPaymentController::class,'index']
)
->middleware('permission:payment.view')
->name('admin.payments.index');


Route::get('/payments/{payment}',
    [AdminPaymentController::class,'show']
)
->middleware('permission:payment.view')
->name('admin.payments.show');


Route::post('/payments/{payment}/refund',
    [AdminPaymentController::class,'refund']
)
->middleware('permission:payment.refund')
->name('admin.payments.refund');

//admin
 Route::get('/customers',
    [CustomerController::class,'index']
)
->middleware('permission:customer.view')
->name('admin.customers.index');


Route::get('/customers/{customer}',
    [CustomerController::class,'show']
)
->middleware('permission:customer.view')
->name('admin.customers.show');


Route::patch('/customers/{customer}/status',
    [CustomerController::class,'status']
)
->middleware('permission:customer.update')
->name('admin.customers.status');

//admin seeing the order records

Route::get('/orders',
    [AdminOrderController::class, 'index']
)
->middleware('permission:order.view')
->name('admin.orders.index');


Route::get('/orders/{order}',
    [AdminOrderController::class, 'show']
)
->middleware('permission:order.view')
->name('admin.orders.show');


Route::put('/orders/{order}',
    [AdminOrderController::class, 'update']
)
->middleware('permission:order.update')
->name('admin.orders.update');
// admin kpi dashbord

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


    //admin profile
Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');

        Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])
    ->name('admin.profile.edit');

    Route::put('/profile/update', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');

   
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

//supplierroutes

Route::resource('/suppliers', SupplierController::class)
    ->names('admin.suppliers');

    Route::post('/suppliers/ajax-store', [SupplierController::class, 'ajaxStore'])
    ->name('admin.suppliers.ajax.store');

    //pusrchase routes

    Route::resource('purchases', PurchaseController::class)->names('admin.purchases');

    Route::post(
    '/shoes/ajax-store',
    [ShoeController::class,'ajaxStore']
)->name('admin.shoes.ajax.store');

Route::get(
    'purchases/{purchase}/price-history',
    [PurchaseController::class,'priceHistory']
)->name('admin.purchases.price.history');


Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');

Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});
//admin login and logout
Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

     

Route::get('forgot-password', [ForgotPasswordController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [ForgotPasswordController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showNewPasswordForm'])
    ->name('password.reset');

Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])
    ->name('password.update');

//customer registration and login
    Route::get('/register',
    [AuthController::class,'register'])
    ->name('customer.register.store');

    Route::post('/customer/login',
    [AuthController::class,'authenticate'])
    ->name('customer.login.check');

    Route::post('/logout',
    [AuthController::class,'logout'])
    ->name('customer.logout');

  Route::post('/register',
    [AuthController::class,'store'])
    ->name('customer.register');

    Route::get('/customer/login',
    [AuthController::class,'login'])
    ->name('customer.login');

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

       Route::get('/sales-report', [SalesReportController::class, 'index'])
    ->name('sales.report');

Route::get('/sales', [SalesController::class,'index'])
    ->name('sales.index');

    
});





     Route::post('/order/store',
        [CustomerOrderController::class,'store']
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


  Route::get('/wishlist', [WishlistController::class, 'index'])
        ->name('wishlist.index');

    Route::post('/wishlist/{shoe}', [WishlistController::class, 'store'])
        ->name('wishlist.store');

    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])
        ->name('wishlist.destroy');


    Route::post('/wishlist/cart/{shoe}', [WishlistController::class, 'addToCart'])
    ->name('wishlist.cart');

    Route::get('/wishlist/cart/{shoe}/variant', [WishlistController::class, 'variant'])
    ->name('wishlist.cart.variant');
    

    Route::post(
        '/products/{shoe}/review',
        [ReviewController::class,'store']
    )->name('reviews.store');

});

Route::get('/contact', [ContactController::class, 'index'])
    ->name('customer.contact');

Route::get(
    '/search/products',
    [SearchController::class,'search']
)
->name('search.products');
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

// Brand products
Route::get('/shop/brand/{brand}', [ProductController::class, 'brand'])
    ->name('shop.brand');


// Category products
Route::get('/shop/category/{category}', [ProductController::class, 'category'])
    ->name('shop.category');

Route::get('/sale', [ProductController::class, 'sale'])
    ->name('sale');




Route::get('/category/{slug}', 
    [CustomerCategoryController::class, 'show']
)->name('category.show');

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



// dashboard pages


// calender pages
Route::get('/calendar', function () {
    return view('pages.calender', ['title' => 'Calendar']);
})->name('calendar');

// profile pages


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






















