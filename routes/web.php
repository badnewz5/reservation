<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Checkout\CheckOutController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;





Route::get('/', [WelcomeController::class, 'index']);
Route::get('/about_us', [WelcomeController::class, 'about'])->name('about');


Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'StorestepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class );
    Route::resource('/menus', MenuController::class );
    Route::resource('/tables', TableController::class );
    Route::resource('/reservations', ReservationController::class );
    Route::resource('/orders', OrderController::class );
    Route::resource('/settings', SettingController::class );
    
    
});


Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
Route::post('cart', [CartController::class, 'addToCart'])->name('carts.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('carts.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('carts.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('carts.clear');

Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckOutController::class, 'storecheckout'])->name('checkout.storecheckout');
Route::get('/complete', [CheckOutController::class, 'complete']);




Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);


Route::get('payment', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');


require __DIR__.'/auth.php';
