<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\load_website;

Route::get('/', [load_website::class, 'home']);
Route::get('/product/{product}', [load_website::class, 'product']);
Route::get('/cart', [load_website::class, 'cart'])->name('cart');
Route::get('/account', [load_website::class, 'account'])->name('account');
Route::get('/category/{category}', [load_website::class, 'category']);
Route::get('/checkout', [load_website::class, 'checkout']);
Route::get('/order-confirm', [load_website::class, 'order_confirm']);
Route::get('/orders', [load_website::class, 'orders']);

use Laravel\Socialite\Socialite;
Route::get('/google/login', function () {
    return Socialite::driver('google')->redirect();
})->name('google.auth');

use App\Models\User;
use Illuminate\Support\Facades\Auth;
Route::get('/google/callback', function () {
    $user = Socialite::driver('google')->user();

    // user detail 
    $aa = User::where('google_id', $user->id)->first();
    if($aa){
        Auth::login($aa);
        return redirect()->route('dashboard');
    }else{
        $new_user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt("kdalkiew;akd-3!!"),
            'google_id' => $user->id,
        ]);
        if($new_user) {
            Auth::login($new_user);
            return redirect()->route('dashboard');
        }else {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
