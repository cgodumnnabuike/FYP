<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\MeasurementController;
use Illuminate\Support\Facades\Route;
use App\Models\Meter;
use App\Model\User;
use App\Models\Measurement;
use Carbon\Carbon;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $userId = auth()->user()->id;

        // Retrieves the current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Retrieves the meters belonging to the user
        $meters = Meter::where('user_id', $userId)->get();

        // Initialize variables for the total consumption and count of meters
        $totalConsumption = 0;
        $meterCount = $meters->count();

        // Calculates the total consumption across all meters
        foreach ($meters as $meter) {
            $measurements = $meter->measurements()
                ->whereMonth('timestamp', $currentMonth)
                ->whereYear('timestamp', $currentYear)
                ->pluck('consumption_value');

            $totalConsumption += $measurements->sum();
        }

        // Calculates the average consumption per meter
        $averageConsumption = $meterCount > 0 ? $totalConsumption / $meterCount : 0;

        // Renders the dashboard view with the calculated values
        return view('dashboard', [
            'meterCount' => $meterCount,
            'totalConsumption' => $totalConsumption,
            'averageConsumption' => $averageConsumption,
        ]);
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/meters', MeterController::class);
    Route::resource('/measurements', MeasurementController::class);
});

require __DIR__.'/auth.php';
