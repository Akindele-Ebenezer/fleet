@extends('Layouts.Layout2') 
@php 
    $HandleNumbers = fn($Value) => 
                        ($Value > 999 AND $Value < 1000000) ? number_format($Value / 1000, 1) . 'K' : 
                        ($Value > 999999 ? number_format($Value / 1000, 1) . 'M' : $Value); 

                        
    function get_average_cost($Sum, $Count) {
        $HandleNumbers = fn($Value) => 
                            ($Value > 999 AND $Value < 1000000) ? number_format($Value / 1000, 1) . 'K' : 
                            ($Value > 999999 ? number_format($Value / 1000, 1) . 'M' : $Value); 

        $Result = $Count === 0 ? 0 : $Sum / $Count;
        $Result = $HandleNumbers($Result);
        return $Result; 
    }

    // function get_fleet_survey_currency_in_dollars($Value) {
    //     // ONE NAIRA TO DOLLAR CURRENTLY
    //     $USD = 0.0022;
    //     //
    //     $Result = $USD * $Value; 
    //     return number_format(round($Result, 0));
    // } 
 
    $FirstDaysOfEachMonths = [];
    $LastDaysOfEachMonths = [];

    for ($i = 0; $i < count($MonthNames); $i++) {   
        ${"Timestamp_" . $MonthNames[$i]} = strtotime("" . $MonthNames[$i] . '' . "2023");           
        ${$MonthNames[$i] . '_First'} = date('Y-m-01', ${"Timestamp_" . $MonthNames[$i]});
        ${$MonthNames[$i] . '_Last'} = date('Y-m-t', ${"Timestamp_" . $MonthNames[$i]}); 
        array_push($FirstDaysOfEachMonths, ${$MonthNames[$i] . '_First'});
        array_push($LastDaysOfEachMonths, ${$MonthNames[$i] . '_Last'});
    
        ${'NumberOfCarRepairs_' . $MonthNames[$i]} = \App\Models\Maintenance::select('VehicleNumber')->where('IncidentType', 'REPAIR')->whereBetween('Date', [$FirstDaysOfEachMonths[$i], $LastDaysOfEachMonths[$i]])->count();
        ${'NumberOfCarMaintenance_' . $MonthNames[$i]} = \App\Models\Maintenance::select('VehicleNumber')->whereBetween('Date', [$FirstDaysOfEachMonths[$i], $LastDaysOfEachMonths[$i]] )->count();
        ${'NumberOfCarDeposits_' . $MonthNames[$i]} = \App\Models\Deposits::select('VehicleNumber')->whereBetween('Date', [$FirstDaysOfEachMonths[$i], $LastDaysOfEachMonths[$i]] )->count();
        ${'NumberOfCarRefueling_' . $MonthNames[$i]} = \App\Models\Refueling::select('VehicleNumber')->whereBetween('Date', [$FirstDaysOfEachMonths[$i], $LastDaysOfEachMonths[$i]] )->count(); 

        ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} = ${'NumberOfCarRepairs_' . $MonthNames[$i]} + ${'NumberOfCarMaintenance_' . $MonthNames[$i]} + ${'NumberOfCarDeposits_' . $MonthNames[$i]} + ${'NumberOfCarRefueling_' . $MonthNames[$i]};
        ${'FleetSurvey_TOTAL_PERCENTAGE' . $MonthNames[$i]} = $FleetSurvey_TOTAL == 0 ? 0 : ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} / $FleetSurvey_TOTAL * 100;
        ${'FleetSurvey_Repairs_PERCENTAGE_' . $MonthNames[$i]} = ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} == 0 ? 0 : ${'NumberOfCarRepairs_' . $MonthNames[$i]} / ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} * 100;
        ${'FleetSurvey_Maintenance_PERCENTAGE_' . $MonthNames[$i]} = ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} == 0 ? 0 : ${'NumberOfCarMaintenance_' . $MonthNames[$i]} / ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} * 100;
        ${'FleetSurvey_Deposits_PERCENTAGE_' . $MonthNames[$i]} = ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} == 0 ? 0 : ${'NumberOfCarDeposits_' . $MonthNames[$i]} / ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} * 100;
        ${'FleetSurvey_Refueling_PERCENTAGE_' . $MonthNames[$i]} = ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} == 0 ? 0 : ${'NumberOfCarRefueling_' . $MonthNames[$i]} / ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} * 100;
    } 
@endphp
@section('Content')
    <style> 
        .report-inner {
            height: unset; 
            overflow: unset; 
        }

        .report-data-heading .inner h1 {
            background: #000;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
        }

        .report-data-heading .inner h1 span {
            background: #000;
            position: absolute;
        } 

    </style>
 
    <div class="analytics">
        <h1 class="analytics-summary-heading">  
            @if(isset($_GET['Filter_All_Analytics']))
                Vehicle summary from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" 
            @elseif(isset($_GET['Filter__Yearly_Analytics']))
                Vehicle summary for VEHICLE "{{ $VehicleNumber }}" in the YEAR "{{ $_GET['Year'] }}" 
            @elseif(isset($_GET['Filter__Range_Analytics']))
                Vehicle summary for VEHICLE "{{ $VehicleNumber }}", from {{ $_GET['Date_From'] }} to {{ $_GET['Date_To'] }}  
            @endif
        </h1>
        @if(
            isset($_GET['Filter__Yearly_Analytics']) ||
            isset($_GET['Filter__Range_Analytics'])
        )
            <div class="inner-1 inner-1-x">
                <div class="x">
                    <div class="inner">
                        <img src="{{ asset('Images/car-x.png') }}">
                    </div>
                    <div class="inner">
                        <span>{{ $VehicleNumber }}</span>
                        <br>
                        <span>Vehicle Number</span>
                    </div>
                </div>
                <div class="x">
                    <div class="inner">
                        <img src="{{ asset('Images/used-by.png') }}">
                    </div>
                    <div class="inner">
                        <span>{{ $UsedBy ?? 'Pool' }}</span>
                        <br>
                        <span>Used by</span>
                    </div>
                </div>
                <div class="x">
                    <div class="inner">
                        <img src="{{ asset('Images/km.png') }}">
                    </div>
                    <div class="inner">
                        <span>{{ number_format($Mileage) }}</span>
                        <br>
                        <span>Mileage</span>
                    </div>
                </div>
                <div class="x">
                    <div class="inner">
                        <img src="{{ asset('Images/balance.png') }}">
                    </div>
                    <div class="inner">
                        <span>₦ {{ number_format($Balance) }}</span>
                        <br>
                        <span>Balance</span>
                    </div>
                </div>
                <div class="x">
                    <div class="inner">
                        <img src="{{ asset('Images/balance-brought-forward.png') }}">
                    </div>
                    <div class="inner">
                        <span>₦ {{ number_format($BalanceBroughtForward) }}</span>
                        <br>
                        <span>Brought Forward</span>
                    </div>
                </div>
            </div>
        @endif
        <div class="inner-1 {{ isset($_GET['Filter_All_Analytics']) ?  'inner-1-x' : '' }}">
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/refueling.png') }}">
                </div>
                <div class="inner">
                    <span>{{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($SumOfCarRefueling) : '₦ ' . $HandleNumbers($SumOfCarRefueling) }}</span>
                    <br>
                    <span class="refueling-route">Fuel Cost</span>
                </div>
            </div>
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/service.png') }}">
                </div>
                <div class="inner">
                    <span> {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($SumOfCarMaintenance) : '₦ ' . $HandleNumbers($SumOfCarMaintenance) }}</span>
                    <br>
                    <span class="maintenance-route">Total Service</span>
                </div>
            </div>
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/deposit.png') }}">
                </div>
                <div class="inner">
                    <span>{{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($SumOfCarDeposits) : '₦ ' . $HandleNumbers($SumOfCarDeposits) }}</span>
                    <br>
                    <span class="deposits-route">Deposits</span>
                </div>
            </div>
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/repair.png') }}">
                </div>
                <div class="inner">
                    <span>{{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($SumOfCarRepairs) : '₦ ' . $HandleNumbers($SumOfCarRepairs) }}</span>
                    <br>
                    <span class="repair-route">Repair Cost</span>
                </div>
            </div>
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/car-accident.png') }}">
                </div>
                <div class="inner">
                    <span>{{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($SumOfCarAccidents) : '₦ ' . $HandleNumbers($SumOfCarAccidents) }}</span>
                    <br>
                    <span class="accident-route">Accidents</span>
                </div>
            </div>
        </div>
        <div class="inner-2">
           <div class="x">
                <div class="x-inner">
                    <h2>Vehicles Condition</h2>
                    <div class="chart">  
                        <div class="chart-inner">   
                            <h3 class="active-cars-route">Active</h3>                   
                            <div class="block">
                                <span id="val"></span>
                                <canvas id="canvas" width="260" height="260">
                                Your browser does not support the HTML5 canvas tag.
                                </canvas>
                            </div>
                            <p class="Hide">First Value <span id="val-1"></span></p>
                            <p class="Hide">Second Value <span id="val-2"></span></p>
                            <p class="Hide">Percentage of First Value and Second Value <span id="val-result"></span></p>
                            <div class="info-inner">
                                {{ $NumberOfCars_ACTIVE }} <br>
                                <span>Operating</span>
                            </div>
                        </div>
                        <div class="chart-inner">    
                            <h3 class="inactive-cars-route">Inactive</h3>                     
                            <div class="block">
                                <span id="val2"></span>
                                <canvas id="canvas2" width="260" height="260">
                                Your browser does not support the HTML5 canvas tag.
                                </canvas>
                            </div>
                            <p class="Hide">First Value <span id="val2-1"></span></p>
                            <p class="Hide">Second Value <span id="val2-2"></span></p>
                            <p class="Hide">Percentage of First Value and Second Value <span id="val2-result"></span></p>
                            <div class="info-inner">
                                {{ $NumberOfCars_INACTIVE }} <br>
                                <span>Idle</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function circle(s,f){

                        document.getElementById('val-1').innerHTML = s;
                        document.getElementById('val-2').innerHTML = f;

                        var v = f/s*100;
                        var s = 0/100 * 6.29;
                        var f = v/100 * 6.29;
                        var val = document.getElementById("val");
                        var canvas = document.getElementById("canvas"); 
                        var ctx = canvas.getContext("2d"); 

                        //value alignment 
                        // if ( v < 10 ) {
                        // val.style.left = "40%";
                        // }
                        // if ( v == 100 ) {
                        // val.style.left = "26%";
                        // }
                        val.innerHTML = Math.floor(v) + "%";

                        document.getElementById('val-result').innerHTML = v + '%';

                        //Outer gray circle 
                        ctx.beginPath();
                        ctx.arc(130, 130, 130, 0.0, 6.30);
                        ctx.fillStyle = "#dddddd";
                        // ctx.fill();
                        ctx.closePath();


                        //Main green progress bar
                        ctx.beginPath();
                        ctx.arc(130, 130, 110, s, f);
                        ctx.lineWidth = 10;
                        ctx.strokeStyle = "green"; 
                        ctx.stroke();
                        ctx.closePath();

                        //Inner white circle 
                        ctx.beginPath();
                        ctx.arc(130, 130, 100, 0.0, 6.30);
                        ctx.fillStyle = "#222";
                        ctx.fill();
                        ctx.closePath();

                        }
                        
                    function circle2(s,f){

                        document.getElementById('val-1').innerHTML = s;
                        document.getElementById('val-2').innerHTML = f;

                        var v = f/s*100;
                        var s = 0/100 * 6.29;
                        var f = v/100 * 6.29;
                        var val2 = document.getElementById("val2");
                        var canvas2 = document.getElementById("canvas2"); 
                        var ctx2 = canvas2.getContext("2d"); 

                        //value alignment 
                        // if ( v < 10 ) {
                        // val2.style.left = "40%";
                        // }
                        // if ( v == 100 ) {
                        // val2.style.left = "26%";
                        // }
                        val2.innerHTML = Math.floor(v) + "%";

                        document.getElementById('val2-result').innerHTML = v + '%';

                        //Outer gray circle 
                        ctx2.beginPath();
                        ctx2.arc(130, 130, 130, 0.0, 6.30);
                        ctx2.fillStyle = "#dddddd";
                        // ctx2.fill();
                        ctx2.closePath();


                        //Main green progress bar
                        ctx2.beginPath();
                        ctx2.arc(130, 130, 110, s, f);
                        ctx2.lineWidth = 10;
                        ctx2.strokeStyle = "#DF2E38";
                        ctx2.stroke();
                        ctx2.closePath();

                        //Inner white circle 
                        ctx2.beginPath();
                        ctx2.arc(130, 130, 100, 0.0, 6.30);
                        ctx2.fillStyle = "#222";
                        ctx2.fill();
                        ctx2.closePath();

                        }

                        //Calling Circle function
                        circle(100,0);
                        circle2(100,0);
                        setTimeout(() => {  
                            circle(100, 12); 
                        }, 1000);
                        setTimeout(() => {  
                            circle(100, 41); 
                        }, 2000);
                        setTimeout(() => {  
                            circle2(100, 24); 
                        }, 1500);
                        setTimeout(() => {  
                            circle2(100, 41); 
                        }, 2500);
                        setTimeout(() => {  
                            circle(100, {{ round($NumberNumberOfCars_ACTIVE_PERCENTAGE, 0) }}); 
                        }, 3000);
                        setTimeout(() => {   
                            circle2(100, {{ round($NumberNumberOfCars_INACTIVE_PERCENTAGE, 0) }}); 
                        }, 3000);
                    </script>
           </div>
           <div class="x">
                <div class="x-inner">
                    <h2>Total Vehicles</h2> 
                    <div class="chart">  
                        <div class="chart-inner">   
                            <h3 class="cars-route">Aggregate</h3>                   
                            <div class="block">
                                <span id="val3"></span>
                                <canvas id="canvas3" width="260" height="260">
                                Your browser does not support the HTML5 canvas tag.
                                </canvas>
                            </div>
                            <p class="Hide">First Value <span id="val3-1"></span></p>
                            <p class="Hide">Second Value <span id="val3-2"></span></p>
                            <p class="Hide">Percentage of First Value and Second Value <span id="val3-result"></span></p>
                            <div class="info-inner">
                                {{ $NumberOfCars }} <br>
                                <span>Vehicles</span>
                            </div>
                        </div> 
                        <div class="chart-xx">
                            <div class="xx-inner active active-cars-route">
                                ACTIVE <br>
                                {{ $NumberOfCars_ACTIVE }} <em>+ {{ round($NumberNumberOfCars_ACTIVE_PERCENTAGE, 0) }}%</em>
                            </div>
                            <div class="xx-inner inactive inactive-cars-route">
                                INACTIVE <br>
                                {{ $NumberOfCars_INACTIVE }} <em>+ {{ round($NumberNumberOfCars_INACTIVE_PERCENTAGE, 0) }}%</em>
                            </div>
                            <div class="xx-inner aggregate cars-route">
                                AGGREGATE <br>
                                {{ $NumberOfCars }} <em>+ 100%</em>
                            </div>
                        </div>
                    </div>
                    <script>
                        function circle3(s,f){
    
                            document.getElementById('val-1').innerHTML = s;
                            document.getElementById('val-2').innerHTML = f;
    
                            var v = f/s*100;
                            var s = 0/100 * 6.29;
                            var f = v/100 * 6.29;
                            var val3 = document.getElementById("val3");
                            var canvas3 = document.getElementById("canvas3"); 
                            var ctx3 = canvas3.getContext("2d"); 
    
                            //value alignment 
                            // if ( v < 10 ) {
                            // val3.style.left = "40%";
                            // }
                            // if ( v == 100 ) {
                            // val3.style.left = "26%";
                            // }
                            val3.innerHTML = Math.floor(v) + "%";
    
                            document.getElementById('val3-result').innerHTML = v + '%';
    
                            //Outer gray circle 
                            ctx3.beginPath();
                            ctx3.arc(130, 130, 130, 0.0, 6.30);
                            ctx3.fillStyle = "#dddddd";
                            // ctx3.fill();
                            ctx3.closePath();
    
    
                            //Main green progress bar
                            ctx3.beginPath();
                            ctx3.arc(130, 130, 110, s, f);
                            ctx3.lineWidth = 10;
                            ctx3.strokeStyle = "#3034b5";
                            ctx3.stroke();
                            ctx3.closePath();
    
                            //Inner white circle 
                            ctx3.beginPath();
                            ctx3.arc(130, 130, 100, 0.0, 6.30);
                            ctx3.fillStyle = "#222";
                            ctx3.fill();
                            ctx3.closePath();
    
                            }
    
                            //Calling Circle function 
                            circle3(100,0); 
                        setTimeout(() => {   
                            circle3(100, 75); 
                        }, 2000);
                        setTimeout(() => {   
                            circle3(100, 100); 
                        }, 3000);
                        </script>
                </div>
           </div>
           <div class="x">
                <div class="x-inner">
                    <h2 class="maintenance-route">
                        Maintenance Cost 
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m753 452-44-94-94-44 94-44 44-94 44 94 94 44-94 44-44 94Zm84 289-29.76-63.24L744 648l63.24-29.76L837 555l29.76 63.24L930 648l-63.24 29.76L837 741ZM314 976l-10-92q-14-2-29-9t-26-17l-78 33-88-144 76-50q-5-17-5-30t5-30l-76-50 88-144 78 33q11-10 26-17t29-9l10.075-92H482l10 92q14 2 29 9t26 17l78-33 88 144-76 50q5 17 5 30t-5 30l76 50-88 144-78-33q-11 10-26 17t-29 9l-10.075 92H314Zm84-194q50 0 82.5-32.5T513 667q0-50-32.5-82.5T398 552q-50 0-82.5 32.5T283 667q0 50 32.5 82.5T398 782Zm0-60q-24 0-39.5-15.5T343 667q0-24 15.5-39.5T398 612q24 0 39.5 15.5T453 667q0 24-15.5 39.5T398 722Zm-34 194h68l8-76q29-7 53-20t43.767-34L602 815l33-52-62-44q11-25 11-52t-11-52l62-44-33-52-65.233 29Q517 527 493 514q-24-13-53-20l-8-76h-68l-8 76q-29 7-53 20t-43.767 34L194 519l-33 52 62 44q-11 25-11 52t11 52l-62 44 33 52 65.233-29Q279 807 303 820q24 13 53 20l8 76Zm34-249Z"></path></svg>
                    </h2>
                    <div class="inner-x">
                        <div class="-x">
                            <big>{{ $NumberOfCars_MAINTENANCE }}</big>
                            <br>
                            Vehicles
                        </div>
                        <div class="-x">
                            <ul>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        Average 
                                    </div>
                                    <div class="-xx">₦ {{ get_average_cost($SumOfCarMaintenance, $NumberOfCars_MAINTENANCE) }}</div>
                                </li>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        Current Year
                                    </div>
                                    <div class="-xx">{{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($MaintenanceCosts_CURRENT_YEAR) : '₦ ' . $HandleNumbers($MaintenanceCosts_CURRENT_YEAR) }}</div>
                                </li>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        Previous Year
                                    </div>
                                    <div class="-xx"> {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($MaintenanceCosts_PREVIOUS_YEAR) : '₦ ' . $HandleNumbers($MaintenanceCosts_PREVIOUS_YEAR) }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="x-inner">
                    <h2 class="repair-route">
                        Repair Cost 
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                    </h2>
                    <div class="inner-x">
                        <div class="-x">
                            <big>{{ $NumberOfCars_REPAIRS }}</big>
                            <br>
                            Vehicles
                        </div>
                        <div class="-x">
                            <ul>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"></path></svg>
                                        Average
                                    </div>
                                    <div class="-xx">₦ {{ get_average_cost($SumOfCarRepairs, $NumberOfCars_REPAIRS) }}</div>
                                </li>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"></path></svg>
                                        Current Year
                                    </div>
                                    <div class="-xx"> {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($RepairCosts_CURRENT_YEAR) : '₦ ' . $HandleNumbers($RepairCosts_CURRENT_YEAR) }}</div>
                                </li> 
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"></path></svg>
                                        Previous Year
                                    </div>
                                    <div class="-xx"> {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($RepairCosts_PREVIOUS_YEAR) : '₦ ' . $HandleNumbers($RepairCosts_PREVIOUS_YEAR) }}</div>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="inner-3">
            <div class="x">
                <div class="x-inner">
                    <h2 class="refueling-route">
                        Fuel Cost
                        <br>
                        <small>Since January {{ date('Y') - 1 }}</small>
                    </h2>  
                </div>
                <div class="inner-x">
                    <div class="x1">
                        <ul>
                            <li class="first">
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"></path></svg> Average
                                </div>
                                <div class="x1-inner">
                                    <span>₦ {{ get_average_cost($SumOfCarRefueling, $NumberOfCars_REEFUELING) }}</span> <strong>></strong>
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"></path></svg> Current Year
                                </div>
                                <div class="x1-inner">
                                    <span> {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($RefuelingCosts_CURRENT_YEAR) : '₦ ' . $HandleNumbers($RefuelingCosts_CURRENT_YEAR) }}</span> <strong>></strong>
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"></path></svg> Previous Year
                                </div>
                                <div class="x1-inner">
                                    <span> {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($RefuelingCosts_PREVIOUS_YEAR) : '₦ ' . $HandleNumbers($RefuelingCosts_PREVIOUS_YEAR) }}</span> <strong>></strong>
                                </div>
                            </li> 
                        </ul>
                        <div class="-x">
                            <big>{{ $NumberOfCars_REEFUELING }}</big>
                            <br>
                            Vehicles
                        </div>
                    </div>
                    <div class="x1">
                        <div class="x1-last">
                            <div class="last-inner">
                                <strong class="deposits-route">Deposits</strong>
                                <br>
                                {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($DepositsCosts_CURRENT_YEAR) : '₦ ' . $HandleNumbers($DepositsCosts_CURRENT_YEAR) }}
                            </div>
                            <div class="last-inner">
                               This Year
                            </div>
                        </div>
                        <div class="x1-last">
                            <div class="last-inner">
                                <strong>Average Cost</strong>
                                <br>
                                ₦ {{ get_average_cost($SumOfCarDeposits, $NumberOfCars_DEPOSITS) }}
                            </div> 
                        </div>
                        <div class="x1-last">
                            <div class="last-inner">
                                <strong>{{ $NumberOfCars_DEPOSITS }}</strong>
                                <br>
                                Vehicles
                            </div>
                            <div class="last-inner">
                               Since {{ date('Y') - 1 }}
                            </div>
                        </div>
                        <div class="x1-last">
                            <div class="last-inner">
                                <strong>Other Costs (Deposits)</strong>
                                <br>
                                {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($DepositsCosts_PREVIOUS_YEAR) : '₦ ' . $HandleNumbers($DepositsCosts_PREVIOUS_YEAR) }}
                                <br><br>
                                <strong>Current Year</strong>
                                <br>
                                {{ isset($_GET['Filter_All_Analytics']) || isset($_GET['Filter__Yearly_Analytics']) || isset($_GET['Filter__Range_Analytics']) ? '₦ ' . $HandleNumbers($DepositsCosts_CURRENT_YEAR) : '₦ ' . $HandleNumbers($DepositsCosts_CURRENT_YEAR) }}
                            </div>
                            <div class="last-inner">
                                Last Year
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            <div class="x">
                <div class="x-inner">
                    <h2>
                        Data Summary
                        <br>
                         <small>24 hours Trips Data</small>
                    </h2>
                </div>
                <div class="inner-x">
                    <div class="x1 x2">
                        <ul>
                            <li class="first">
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M705 928 447 668q-23 8-46 13t-47 5q-97.083 0-165.042-67.667Q121 550.667 121 454q0-31 8.158-60.388Q137.316 364.223 152 338l145 145 92-86-149-149q25.915-15.158 54.957-23.579Q324 216 354 216q99.167 0 168.583 69.417Q592 354.833 592 454q0 24-5 47t-13 46l259 258q11 10.957 11 26.478Q844 847 833 858l-76 70q-10.696 11-25.848 11T705 928Zm28-57 40-40-273-273q16-21 24-49.5t8-54.5q0-75-55.5-127T350 274l101 103q9 9 9 22t-9 22L319 545q-9 9-22 9t-22-9l-97-96q3 77 54.668 127T354 626q25 0 53-8t49-24l277 277ZM476 572Z"></path></svg> Repairs
                                </div>
                                <div class="x1-inner">
                                    <span>{{ number_format($NumberOfCarRepairs) }}</span> <strong>></strong>
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"></path></svg> Accidents
                                </div>
                                <div class="x1-inner">
                                    <span>{{ number_format($NumberOfCarAccidents) }}</span> <strong>></strong>
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"></path></svg> Maintenance
                                </div>
                                <div class="x1-inner">
                                    <span>{{ number_format($NumberOfCarMaintenance) }}</span> <strong>></strong>
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M451 936v-84q-57-10-93.5-43.5T305 724l56-23q17 48 49 71.5t77 23.5q48 0 79-24t31-66q0-44-27.5-68T466 589q-72-23-107.5-61T323 433q0-55 35.5-92t92.5-42v-83h60v83q45 5 77.5 29.5T638 391l-56 24q-14-32-37.5-46.5T483 354q-46 0-73 21t-27 57q0 38 30 61.5T524 542q68 21 100.5 60.5T657 702q0 63-37 101.5T511 853v83h-60Z"></path></svg> Deposits
                                </div>
                                <div class="x1-inner">
                                    <span>{{ number_format($NumberOfCarDeposits) }}</span> <strong>></strong>
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"></path></svg> Refueling
                                </div>
                                <div class="x1-inner">
                                    <span>{{ number_format($NumberOfCarRefueling) }}</span> <strong>></strong>
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/service.png') }}" alt=""> Drivers
                                </div>
                                <div class="x1-inner">
                                    <span>{{ $NumberOfDrivers }}</span> <strong>></strong>
                                </div>
                            </li>
                        </ul>
                    </div> 
                </div>
           </div>
            <div class="x">
                <div class="x-inner">
                    <h2>Fleet Utilization</h2>
                    <div class="x-top">
                        <span>
                            <strong>{{ number_format($FleetSurvey_TOTAL) }}</strong>
                            Activities Completed
                        </span>
                        <span>
                            Cars: {{ $NumberOfCars_ACTIVE }} Left
                        </span>
                    </div>  
                    <div class="progress">
                        <div class="data" style="width: {{ $FleetSurvey_Repairs_PERCENTAGE }}%;"></div>
                        <div class="data" style="width: {{ $FleetSurvey_Maintenance_PERCENTAGE }}%;"></div>
                        <div class="data" style="width: {{ $FleetSurvey_Deposits_PERCENTAGE }}%;"></div>
                        <div class="data" style="width: {{ $FleetSurvey_Refueling_PERCENTAGE }}%;"></div>
                    </div>
                    <div class="x-middle">
                        <div class="middle-x">
                            <div class="middle-x-inner">
                                {{ round($FleetSurvey_Refueling_PERCENTAGE, 1) }}% / {{ number_format($NumberOfCarRefueling) }} <br>
                                <span class="x-1">Refueling</span>
                            </div>
                            <div class="middle-x-inner">
                                {{ round($FleetSurvey_Deposits_PERCENTAGE, 1) }}% / {{ number_format($NumberOfCarDeposits) }} <br>
                                <span class="x-2">Deposits</span>
                            </div>
                        </div>
                        <div class="middle-x">
                            <div class="middle-x-inner">
                                {{ round($FleetSurvey_Repairs_PERCENTAGE, 1) }}% / {{ number_format($NumberOfCarRepairs) }} <br>
                                <span class="x-3">Repairs</span>
                            </div>
                            <div class="middle-x-inner">
                                {{ round($FleetSurvey_Maintenance_PERCENTAGE, 1) }}% / {{ number_format($NumberOfCarMaintenance) }} <br>
                                <span class="x-4">Service</span>
                            </div>
                        </div> 
                    </div>
                    <div class="x-top">
                        <span>
                            <strong>{{ $NumberOfDrivers }}</strong>
                            Drivers available 
                        </span> 
                    </div>
                </div>
           </div>
           
        </div>
        <div class="inner-4">
            <div class="x--inner">
                <div class="chart-heading">
                    <h2>
                        Monthly Analysis
                        <br>
                        <small>Year {{ date('Y') }}</small>
                    </h2>
                    <div class="legend">
                        <div class="legend-x"> <span class="legend-1"></span> Maintenance</div>
                        <div class="legend-x"> <span class="legend-2"></span> Repairs</div>
                        <div class="legend-x"> <span class="legend-3"></span> Refueling</div>
                        <div class="legend-x"> <span class="legend-4"></span> Deposits</div>
                        <div class="legend-x"> <span class="legend-5"></span> Total</div>
                    </div>
                </div>
                <div class="custom-chart">  
                    @for ($i = 0; $i < count($MonthNames); $i++) 
                        @unless (empty(${'NumberOfCarMaintenance_' . $MonthNames[$i]}) AND empty(${'NumberOfCarDeposits_' . $MonthNames[$i]}) AND empty(${'NumberOfCarRefueling_' . $MonthNames[$i]}) AND empty(${'NumberOfCarRepairs_' . $MonthNames[$i]}))
                            <div class="custom-chart-inner">
                                <div class="chart-label">{{ $MonthNames[$i] }}</div><div class="chart-data Total tooltip-x" style="width: {{ ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} }}%">
                                    <div class="tooltip-inner">
                                        <h3><span class="legend-total"></span> Total</h3>
                                        <span class="legend-data">100% / {{ ${'FleetSurvey_TOTAL_' . $MonthNames[$i]} }}</span>
                                    </div>
                                </div>
                                    @unless (empty(${'NumberOfCarMaintenance_' . $MonthNames[$i]}))
                                        <div class="chart-label chart-label-2"></div><div class="chart-data chart-data-2 Maintenance tooltip-x" style="width: {{ ${'NumberOfCarMaintenance_' . $MonthNames[$i]} }}%">
                                            <div class="tooltip-inner">
                                                <h3><span class="legend-maintenance"></span> Maintenance</h3>
                                                <span class="legend-data">{{ round(${'FleetSurvey_Maintenance_PERCENTAGE_' . $MonthNames[$i]}, 0) }}% / {{ ${'NumberOfCarMaintenance_' . $MonthNames[$i]} }}</span>
                                            </div>
                                        </div>
                                    @endunless
                                    @unless (empty(${'NumberOfCarDeposits_' . $MonthNames[$i]}))
                                    <div class="chart-label chart-label-2"></div><div class="chart-data chart-data-2 Deposits tooltip-x" style="width: {{ ${'NumberOfCarDeposits_' . $MonthNames[$i]} }}%">
                                        <div class="tooltip-inner">
                                            <h3><span class="legend-deposits"></span> Deposits</h3>
                                            <span class="legend-data">{{ round(${'FleetSurvey_Deposits_PERCENTAGE_' . $MonthNames[$i]}, 0) }}% / {{ ${'NumberOfCarDeposits_' . $MonthNames[$i]} }}</span>
                                        </div>
                                    </div>
                                    @endunless
                                    @unless (empty(${'NumberOfCarRefueling_' . $MonthNames[$i]}))
                                    <div class="chart-label chart-label-2"></div><div class="chart-data chart-data-2 Refueling tooltip-x" style="width: {{ ${'NumberOfCarRefueling_' . $MonthNames[$i]} }}%">
                                        <div class="tooltip-inner">
                                            <h3><span class="legend-refueling"></span> Refueling</h3>
                                            <span class="legend-data">{{ round(${'FleetSurvey_Refueling_PERCENTAGE_' . $MonthNames[$i]}, 0) }}% / {{ ${'NumberOfCarRefueling_' . $MonthNames[$i]} }}</span>
                                        </div>
                                    </div>
                                    @endunless
                                    @unless (empty(${'NumberOfCarRepairs_' . $MonthNames[$i]}))
                                    <div class="chart-label chart-label-2"></div><div class="chart-data chart-data-2 Repairs tooltip-x" style="width: {{ ${'NumberOfCarRepairs_' . $MonthNames[$i]} }}%">
                                        <div class="tooltip-inner">
                                            <h3><span class="legend-repairs"></span> Repairs</h3>
                                            <span class="legend-data">{{ round(${'FleetSurvey_Repairs_PERCENTAGE_' . $MonthNames[$i]}, 0) }}% / {{ ${'NumberOfCarRepairs_' . $MonthNames[$i]} }}</span>
                                        </div>
                                    </div>
                                    @endunless 
                            </div>
                        @endunless
                    @endfor 
                </div>
            </div>
            <div class="x--inner">
                <div class="chart-heading">
                    <h2>
                        Recent Comments
                        <br>
                        <small>Issues and observations</small>
                    </h2> 
                </div> 
                <div class="comments">
                    @foreach ($MaintenanceComments as $Comment) 
                    @foreach (\App\Models\User::where('id', $Comment->UserId)->get() as $User)
                    <div class="comments-x">
                        <div class="x-inner-wrapper">
                            <div class="x-inner"><img src="{{ asset('Images/profile-pic.jpg') }}" alt=""></div>
                            <div class="x-inner">
                                {{ $User->name }} commented on Maintenance
                                <br>
                                {{ $Comment->IncidentAction }}
                            </div>
                        </div>
                        <div class="x-inner">{{ $Comment->Date }}</div>
                    </div>
                    @endforeach 
                    @endforeach
                    @foreach ($RepairComments as $Comment) 
                    @foreach (\App\Models\User::where('id', $Comment->UserId)->get() as $User)
                    <div class="comments-x">
                        <div class="x-inner-wrapper">
                            <div class="x-inner"><img src="{{ asset('Images/profile-pic.jpg') }}" alt=""></div>
                            <div class="x-inner">
                                {{ $User->name }} commented on Repair
                                <br>
                                {{ $Comment->IncidentAction }}
                            </div>
                        </div>
                        <div class="x-inner">{{ $Comment->Date }}</div>
                    </div>
                    @endforeach 
                    @endforeach
                </div>
            </div>
    </div>
@endsection