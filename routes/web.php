<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;


use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


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

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/home', function () {
    return view('home.index');
})->name('home');

Route::get('/about-us', function () {
    return view('about.index');
})->name('about-us');

Route::get('/invoice', function () {
    return view('invoicepdf.index');
});

Route::match(['get', 'post'], 'contact', 'App\Http\Controllers\ContactController@contact')->name('contact');
Route::match(['get', 'post'], 'question', 'App\Http\Controllers\CustomerController@questionAsk')->name('question');
Route::match(['get', 'post'], 'review', 'App\Http\Controllers\CustomerController@customerReview')->name('review');
Route::match(['get', 'post'], 'newsletter', 'App\Http\Controllers\CustomerController@newsletter')->name('newsletter');


Route::get('products', 'App\Http\Controllers\ProductsController@discount')->name('products');
Route::get('products/{category:slug}/{subcategory:slug}', 'App\Http\Controllers\ProductsController@showAllProducts')->name('category.subcategory.show');
Route::get('products/{category:slug}', 'App\Http\Controllers\ProductsController@showCategorySubcategories')->name('category.show');
Route::get('product/{product:slug}', 'App\Http\Controllers\ProductsController@showOneProduct')->name('product');

Route::post('products/{category:slug}/{subcategory:slug}', 'App\Http\Controllers\ProductsController@removeQueryString')->name('remove.query.string');
Route::match(['get', 'post'], 'search-result', 'App\Http\Controllers\ProductsController@searchResult')->name('search');

Route::get('cart', 'App\Http\Controllers\CartController@show')->name('cart.show');
Route::post('cart/store/{id}', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::post('cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::post('cart/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');

Route::get('order', 'App\Http\Controllers\CustomerController@show')->name('order.page');
Route::get('shopping-history', 'App\Http\Controllers\CustomerController@orderSummary')->name('order.summary')->middleware('auth');
Route::post('order/{total}', 'App\Http\Controllers\CustomerController@store')->name('order.store');

Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], 'update-profile', 'App\Http\Controllers\RegisterController@updateProfile')->name('update.profile');
    Route::get('remove-profile-image', 'App\Http\Controllers\RegisterController@removeProfileImage')->name('remove.profile.image');

});

Route::middleware(['guest'])->group(function () {
    Route::match(['get', 'post'], 'sign-in', 'App\Http\Controllers\RegisterController@signIn')->name('sign-in');
    Route::match(['get', 'post'], 'sign-up', 'App\Http\Controllers\RegisterController@signUp')->name('sign-up');
});

Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], 'sign-out', 'App\Http\Controllers\RegisterController@signOut')->name('sign-out');
});

######################## RESETING PASSWORD ############################

Route::post('forgot-password', function (Request $request) {
    $request->validate([
        'email' => ['required', 'email']
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        
                ? response()->json(['status' => __($status)])
                : response()->json(['email' => __($status)]);

})->middleware('guest')->name('password.email');

Route::get('reset-password/{token}', function ($token) {
    return view('reset-password.index', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
                ? redirect()->route('sign-in')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

###############################################################################

############################## EMAIL VERIFIED ################################

Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('sign-in')->with('account-verified-success', 'You can sign in now.');
})->name('verification.verify');

Route::post('email/verification-notification', function (Request $request) {

    $user = User::where('email', $request->email)->first();

        if($user) {

            $user->sendEmailVerificationNotification();

            return response()->json(['verify' => 'Verification link sent! Check your email']);

        }
        
    return response()->json(['unverify' => '<p>There is undefined error.</p> Please contact administrator!']);
    
    
})->middleware(['guest', 'throttle:6,1'])->name('verification.send');