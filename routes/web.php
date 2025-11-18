<?php

use App\Livewire\Module\Appointment\AppointmentCreate;
use App\Livewire\Module\Appointment\AppointmentIndex;
use App\Livewire\Module\Consultation\ConsultationCancelled;
use App\Livewire\Module\Consultation\ConsultationCreate;
use App\Livewire\Module\Consultation\ConsultationEnded;
use App\Livewire\Module\HomPage\HomePage;
use App\Livewire\Module\Permission\PermissionAssign;
use App\Livewire\Module\Subscriber\SubscriberIndex;
use App\Livewire\Module\Subscriber\SubscriberCreate;
use App\Livewire\Module\Subscriber\SubscriberUpdate;
use App\Livewire\Module\User\UserCreate;
use App\Livewire\Module\User\UserIndex;
use App\Livewire\Module\User\UserUpdate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});


#Subscriber routes
Route::middleware('auth')->prefix('subscriber')->name('subscriber.')->group(function () {
    Route::get('index', SubscriberIndex::class)->name('index');
    Route::get('create', SubscriberCreate::class)->name('create');
    Route::get('update/{id}', SubscriberUpdate::class)->name('update');
});

#Appointment routes
Route::middleware('auth')->prefix('appointment')->name('appointment.')->group(function () {
    Route::get('index', AppointmentIndex::class)->name('index');
    Route::get('create', AppointmentCreate::class)->name('create');
});

#Consultation routes
Route::middleware('auth')->prefix('consultation')->name('consultation.')->group(function () {
    Route::get('create/{id}', ConsultationCreate::class)->name('create');
    Route::get('cancelled', ConsultationCancelled::class)->name('cancelled');
    Route::get('ended', ConsultationEnded::class)->name('ended');
});

#Home routes
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('dashboard', HomePage::class)->name('dashboard');
});

#User route
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('usercreate', UserCreate::class)->name('create');
    Route::get('userindex', UserIndex::class)->name('index');
    Route::get('userupdate/{id}', UserUpdate::class)->name('userupdate');
});

#Permission routes
Route::middleware('auth')->prefix('permission')->name('permission.')->group(function () {
    Route::get('assign/{id}', PermissionAssign::class)->name('assign');
});

#Logout route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

require __DIR__.'/auth.php';
