<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Module\User\UserIndex;
use App\Livewire\Module\User\UserCreate;
use App\Livewire\Module\User\UserUpdate;
use App\Livewire\Module\HomPage\HomePage;
use App\Livewire\Module\Laboratory\LaboratoryEnded;
use App\Livewire\Module\Laboratory\LaboratoryIndex;
use App\Livewire\Module\Subscriber\SubscriberIndex;
use App\Livewire\Module\Laboratory\LaboratoryResult;
use App\Livewire\Module\Permission\PermissionAssign;
use App\Livewire\Module\Subscriber\SubscriberCreate;
use App\Livewire\Module\Subscriber\SubscriberUpdate;
use App\Livewire\Module\Appointment\AppointmentIndex;
use App\Livewire\Module\Appointment\AppointmentCreate;
use App\Livewire\Module\Consultation\ConsultationEnded;
use App\Livewire\Module\Laboratory\LaboratoryCancelled;
use App\Livewire\Module\Consultation\ConsultationCreate;
use App\Livewire\Module\Laboratory\AddLaboratoryExamIndex;
use App\Livewire\Module\Consultation\ConsultationCancelled;
use App\Livewire\Module\Laboratory\AddLaboratoryExamCreate;
use App\Livewire\Module\Laboratory\AddLaboratoryExamUpdate;
use App\Livewire\Module\Medicine\MedicineIndex;
use App\Livewire\Module\Medicine\MedicineCreate;
use App\Livewire\Module\Medicine\MedicineUpdate;
use App\Livewire\Module\Medicine\MedicineApprov;
use App\Livewire\Module\Pharmacy\PharmacyIndex;
use App\Livewire\Module\Pharmacy\PharmacyCreate;

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

#Laboratory routes
Route::middleware('auth')->prefix('laboratory')->name('laboratory.')->group(function () {
    Route::get('index', LaboratoryIndex::class)->name('index');
    Route::get('create', LaboratoryResult::class)->name('create');
    Route::get('ended', LaboratoryEnded::class)->name('ended');
    Route::get('cancelled', LaboratoryCancelled::class)->name('cancelled');
});

#Medicine routes
Route::middleware('auth')->prefix('medicine')->name('medicine.')->group(function () {
    Route::get('index', MedicineIndex::class)->name('index');
    Route::get('create', MedicineCreate::class)->name('create');
    Route::get('update/{id}', MedicineUpdate::class)->name('update');
    Route::get('approv', MedicineApprov::class)->name('approv');
});

#Pharmacy routes
Route::middleware('auth')->prefix('pharmacy')->name('pharmacy.')->group(function () {
    Route::get('index', PharmacyIndex::class)->name('index');
    Route::get('create/{id}', PharmacyCreate::class)->name('create');
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
