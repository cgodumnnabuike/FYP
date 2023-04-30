<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-sm mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Meter Count</h5>
                            <p class="card-text">
                                <span class="d-flex align-items-center">
                                    You have created {{ $meterCount }} 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer ml-2" viewBox="0 0 16 16">
                                        <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                        <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            
            
                <div class="col-sm mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Seasonal Energy-Saving Tips</h5>
                            @php
                                $currentMonth = date('n');
                                $currentSeason = '';

                                if ($currentMonth >= 3 && $currentMonth <= 5) {
                                    $currentSeason = 'spring';
                                } elseif ($currentMonth >= 6 && $currentMonth <= 8) {
                                    $currentSeason = 'summer';
                                } elseif ($currentMonth >= 9 && $currentMonth <= 11) {
                                    $currentSeason = 'fall';
                                } else {
                                    $currentSeason = 'winter';
                                }

                                $seasonalTips = [
                                    'spring' => [
                                        'Insulate your windows during the transition period to keep your home comfortable.',
                                        'Plant shade trees to reduce direct sunlight and lower cooling costs.',
                                    ],
                                    'summer' => [
                                        'Use natural ventilation by opening windows and using ceiling fans to reduce the need for air conditioning.',
                                        'Install window films or shades to block heat from entering your home.',
                                    ],
                                    'fall' => [
                                        'Take advantage of the cooler weather by opening windows and letting fresh air in.',
                                        'Seal gaps and cracks around windows and doors to prevent drafts.',
                                    ],
                                    'winter' => [
                                        'Seal any air leaks and insulate your windows to keep the cold air out and the warm air in.',
                                        'Use thick curtains or blinds to trap heat inside your home.',
                                    ],
                                ];
                            @endphp

                            @foreach ($seasonalTips[$currentSeason] as $tip)
                                <p>{{ $tip }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Energy Consumption Overview</h5>
                            <p class="card-text">Display relevant information about the user's energy consumption, such as current usage, historical data, and trends.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Energy Overview</h3>
                            <p class="card-text">Total Consumption: {{ $totalConsumption }}</p>
                            <p class="card-text">Average Consumption: {{ $averageConsumption }}</p>
                        </div>
                    </div>
                    
                </div>
                
            </div>

        </div>
        <div class="text-center">
            <a class="btn btn1" href="{{ route('meters.index') }}" role="button">View Meter Details</a>
        </div>
    </section>
</x-app-layout>

