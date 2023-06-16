@if (Session::missing('Id')) 
    <script>window.location = "/";</script>
@else 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Fleet Management |
        {{ Route::is('Analytics') ? 'ANALYTICS' : '' }}

        {{ Route::is('Cars') ? 'FLEET DB' : '' }}
        {{ Route::is('Documents') ? 'DOCUMENTS' : '' }}
        {{ Route::is('CarOwners') ? 'CAR OWNERS' : '' }}
        {{ Route::is('VehicleReport') ? 'REPORT' : '' }}

        {{ Route::is('Maintenance') ? 'MAINTENANCE' : '' }}
        {{ Route::is('Refueling') ? 'REFUELING' : '' }}
        {{ Route::is('Deposits') ? 'DEPOSITS' : '' }}
        {{ Route::is('Deposits_MasterCard') ? 'DEPOSITS' : '' }}

        {{ Route::is('Cars_Registration') ? 'REGISTERATION' : '' }}
        {{ Route::is('EditMaintenance') ? 'Edit / MAINTENANCE' : '' }}
        {{ Route::is('EditRefueling') ? 'Edit / REFUELING' : '' }}
        {{ Route::is('EditDeposits') ? 'Make Deposits' : '' }}
        {{ Route::is('EditDeposits_MasterCard') ? 'Make Deposits' : '' }}

        {{ Route::is('Users') ? 'USERS' : '' }}

        {{ Route::is('FleetCard') ? 'FLEET CARDS' : '' }}
        {{ Route::is('MasterCard') ? 'MASTER CARDS' : '' }}
    </title>

    <link rel="shortcut icon" href="{{ asset('Images/car.jpg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@900&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400&display=swap" rel="stylesheet">
     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@900&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@900&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Css/Styles.css') }}">
</head>
<body> 
    @php
        include('../resources/Globals.php');
    @endphp 
    @include('Components.LoaderComponent')

    @if (Route::is('Cars_Registration') || Route::is('Cars') || Route::is('VehicleReport'))
        @include('Components.EditCarComponent')
        @include('Components.AddCarComponent')
        @include('Components.VehicleDataComponent')
        @include('Components.EditVehicleDataComponent')
    @endif
 
    @if (Route::is('Documents'))
        {{-- @include('Components.AddCarDocumentComponent') --}}
        @include('Components.EditCarDocumentComponent')
    @endif

 
    @if (Route::is('EditMaintenance'))
        @include('Components.AddMaintenanceComponent')
        @include('Components.EditMaintenanceComponent')
    @endif

    @if (Route::is('Maintenance'))
        @include('Components.ReadOnly.MaintenanceComponent')
    @endif

    @if (Route::is('EditDeposits'))
        @include('Components.AddMonthlyDepositsComponent')
        @include('Components.EditMonthlyDepositsComponent')
        @include('Components.EditDeposits_MasterCardComponent')
    @endif

    @if (Route::is('EditDeposits_MasterCard'))
        @include('Components.AddDeposits_MasterCardComponent')
        @include('Components.EditDeposits_MasterCardComponent')
    @endif

    @if (Route::is('Deposits'))
        @include('Components.ReadOnly.DepositsComponent')
    @endif
    
    @if (Route::is('FleetCard'))
        @include('Components.AddFleetCardComponent')
        @include('Components.EditFleetCardComponent')
        @include('Components.AddMasterCardComponent')
        @include('Components.EditMasterCardComponent')
    @endif

    @if (Route::is('Deposits_MasterCard'))
        @include('Components.ReadOnly.Deposits_MasterCardComponent')
    @endif
    
    @if (Route::is('MasterCard'))
        @include('Components.AddMasterCardComponent')
        @include('Components.EditMasterCardComponent')
    @endif
    
    @if (Route::is('EditRefueling'))
        @include('Components.AddRefuelingComponent')
        @include('Components.EditRefuelingComponent')   
    @endif
    
    @if (Route::is('Refueling'))
        @include('Components.ReadOnly.RefuelingComponent')
    @endif
    
    @if (Route::is('Users'))
        @include('Components.AddUserComponent')
        @include('Components.EditUserComponent')   
    @endif

    @include('Components.AlertComponent')   

    <div class="report" style="background-image: url('Images/bg-3.gif');">
        <div class="left-nav report-inner">
            <div class="report-inner-heading">
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M229.882 856Q184 856 152 823.917 120 791.833 120 746H40V366q0-28.875 20.563-49.438Q81.124 296 110 296h576l234 234v216h-80q0 45.833-32.118 77.917-32.117 32.083-78 32.083Q684 856 652 823.917 620 791.833 620 746H340q0 46-32.118 78-32.117 32-78 32ZM600 496h194L654 356h-54v140Zm-250 0h190V356H350v140Zm-250 0h190V356H100v140Zm129.859 310Q255 806 272.5 788.641t17.5-42.5Q290 721 272.641 703.5t-42.5-17.5Q205 686 187.5 703.359t-17.5 42.5Q170 771 187.359 788.5t42.5 17.5Zm500 0Q755 806 772.5 788.641t17.5-42.5Q790 721 772.641 703.5t-42.5-17.5Q705 686 687.5 703.359t-17.5 42.5Q670 771 687.359 788.5t42.5 17.5ZM100 686h37q17-26 42.5-38t50.5-12q25 0 50.5 12t42.5 38h314q17-26 42.5-38t50.5-12q25 0 50.5 12t42.5 38h37V556H100v130Zm760-130H100h760Z"/></svg>
                <h1>
                    FLEET MANAGEMENT
                </h1>
            </div>
            <center>
                <img src="{{ asset('Images/depasa-logo.png') }}" alt="">
            </center>
            <ul>
                <li>
                    <form action="">
                        <input type="text" placeholder="Search.." name="FilterValue">
                    </form>
                </li>
                <a href='{{ route('Analytics') }}'>
                    <li class="{{ Route::is('Analytics') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M120 936v-76l60-60v136h-60Zm165 0V700l60-60v296h-60Zm165 0V640l60 61v235h-60Zm165 0V701l60-60v295h-60Zm165 0V540l60-60v456h-60ZM120 700v-85l280-278 160 160 280-281v85L560 582 400 422 120 700Z"/></svg>                    
                        Analytics 
                    </li>
                </a>
                <a href='{{ route('Cars') }}'>
                    <li class="{{ Route::is('Cars') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"/></svg>                  
                        Cars
                        <span>{{ $NumberOfCars }}</span>
                    </li>
                </a>
                <a href='{{ route('Documents') }}'>
                    <li class="{{ Route::is('Documents') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"/></svg>                   
                        Documents
                    </li>
                </a>
                <div class="sub-nav-wrapper">
                    <a class="my-records action-x">
                        <li class="">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M222 976q-43.75 0-74.375-30.625T117 871V746h127V176l59.8 60 59.8-60 59.8 60 59.8-60 59.8 60 60-60 60 60 60-60 60 60 60-60v695q0 43.75-30.625 74.375T738 976H222Zm516-60q20 0 32.5-12.5T783 871V276H304v470h389v125q0 20 12.5 32.5T738 916ZM357 434v-60h240v60H357Zm0 134v-60h240v60H357Zm333-134q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9Zm0 129q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9ZM221 916h412V806H177v65q0 20 12.65 32.5T221 916Zm-44 0V806v110Z"/></svg>                  
                            Fleet Entries 
                            <span>{{ MyRecords_TOTAL() }}</span>
                            <svg class="arrow" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 696 280 497h400L480 696Z"/></svg>
                        </li> 
                    </a>
                    <div class="sub-nav {{ Route::is('Cars_Registration') || Route::is('EditMaintenance') || Route::is('EditRefueling') ? 'Show' : '' }}">
                        <a href='{{ route('Cars_Registration') }}'>
                            <li class="{{ Route::is('Cars_Registration') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"></path></svg>                
                                Car Registration 
                            </li>
                        </a> 
                        <a href='{{ route('EditMaintenance') }}'>
                            <li class="{{ Route::is('EditMaintenance') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"/></svg>           
                                Maintenance 
                            </li>
                        </a> 
                        <a href='{{ route('EditRefueling') }}'>
                            <li class="{{ Route::is('EditRefueling') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"/></svg>                  
                                Fuel Management 
                            </li>
                        </a>
                    </div>
                </div>
                <a href='{{ route('VehicleReport') }}'>
                    <li class="{{ Route::is('VehicleReport') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"/></svg>                   
                        Vehicle REPORT
                    </li>
                </a>
                <a href='{{ route('CarOwners') }}'>
                    <li class="{{ Route::is('CarOwners') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 575q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160 896v-94q0-38 19-65t49-41q67-30 128.5-45T480 636q62 0 123 15.5t127.921 44.694q31.301 14.126 50.19 40.966Q800 764 800 802v94H160Zm60-60h520v-34q0-16-9.5-30.5T707 750q-64-31-117-42.5T480 696q-57 0-111 11.5T252 750q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570 425q0-39-25.5-64.5T480 335q-39 0-64.5 25.5T390 425q0 39 25.5 64.5T480 515Zm0-90Zm0 411Z"/></svg>                   
                        Car Owners
                        <span>{{ $NumberOfCarOwners }}</span>
                    </li>
                </a> 
                <div class="sub-nav-wrapper">
                    <a class="card-management action-x">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M705 928 447 668q-23 8-46 13t-47 5q-97.083 0-165.042-67.667Q121 550.667 121 454q0-31 8.158-60.388Q137.316 364.223 152 338l145 145 92-86-149-149q25.915-15.158 54.957-23.579Q324 216 354 216q99.167 0 168.583 69.417Q592 354.833 592 454q0 24-5 47t-13 46l259 258q11 10.957 11 26.478Q844 847 833 858l-76 70q-10.696 11-25.848 11T705 928Zm28-57 40-40-273-273q16-21 24-49.5t8-54.5q0-75-55.5-127T350 274l101 103q9 9 9 22t-9 22L319 545q-9 9-22 9t-22-9l-97-96q3 77 54.668 127T354 626q25 0 53-8t49-24l277 277ZM476 572Z"/></svg>                 
                            Card Management
                            <svg class="arrow" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 696 280 497h400L480 696Z"></path></svg>
                        </li>
                        <div class="sub-nav {{ Route::is('EditDeposits') || Route::is('EditDeposits_MasterCard') || Route::is('Deposits') || Route::is('FleetCard') || Route::is('Deposits_MasterCard') || Route::is('MasterCard') ? 'Show' : '' }}">
                            <a class="card-management action-x">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"></path></svg>                
                                    Manage
                                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 696 280 497h400L480 696Z"></path></svg>
                                </li>
                            </a>   
                            <div class="sub-nav {{ Route::is('EditDeposits') || Route::is('Deposits') || Route::is('FleetCard') ? 'Show' : '' }}"><a class="card-management action-x"> 
                                <a href="{{ route('EditDeposits') }}">
                                    <li class="{{ Route::is('EditDeposits') ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"></path></svg>                
                                        Make Deposit 
                                    </li>
                                </a>   
                                <a href="{{ route('Deposits') }}">
                                    <li class="{{ Route::is('Deposits') ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"></path></svg>                
                                        Deposits 
                                    </li> 
                                </a>
                                <a href="{{ route('FleetCard') }}">
                                    <li class="{{ Route::is('FleetCard') ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"></path></svg>                
                                        Fleet Cards 
                                    </li> 
                                </a> 
                            </div>
                        </div>
                    </a> 
                    <a href='{{ route('Maintenance') }}'>
                        <li class="{{ Route::is('Maintenance') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"/></svg>           
                            Maintenance  ({{ number_format($NumberOfCarMaintenance) }})
                        </li>
                    </a> 
                    <a href='{{ route('Refueling') }}'>
                        <li class="{{ Route::is('Refueling') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"/></svg>                  
                            Refueling ({{ number_format($NumberOfCarRefueling) }})
                        </li>
                    </a>
                </div>
                <a href='{{ route('Users') }}'>
                    <li class="{{ Route::is('Users') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 575q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160 896v-94q0-38 19-65t49-41q67-30 128.5-45T480 636q62 0 123 15.5t127.921 44.694q31.301 14.126 50.19 40.966Q800 764 800 802v94H160Zm60-60h520v-34q0-16-9.5-30.5T707 750q-64-31-117-42.5T480 696q-57 0-111 11.5T252 750q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570 425q0-39-25.5-64.5T480 335q-39 0-64.5 25.5T390 425q0 39 25.5 64.5T480 515Zm0-90Zm0 411Z"/></svg>                   
                        Users
                        <span>{{ $NumberOfFleetUsers }}</span>
                    </li>
                </a>
                <a href='{{ route('Logout') }}'>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h291v60H180v600h291v60H180Zm486-185-43-43 102-102H375v-60h348L621 444l43-43 176 176-174 174Z"/></svg>                  
                        Logout 
                    </li>
                </a>
            </ul>
            <div class="nav-footer">
                <div class="inner">
                    <img src="{{ asset('Images/profile-pic.jpg')  }}" alt="">
                </div>
                <div class="inner">
                    <span>{{ request()->session()->get('Name')  }}</span>
                    <br>
                    <span>{{ request()->session()->get('Role')  }}</span>
                </div>
            </div>
        </div>
        <div class="report-data report-inner">
            <div class="report-data-heading">
                <div class="inner">
                    <h1>
                        {{-- <img src="{{ asset('Images/car1.png') }}" alt=""> --}}
                        {{ Route::is('Analytics') ? 'FLEET DASHBOARD' : '' }}

                        {{ Route::is('Cars') ? 'FLEET DB' : '' }}
                        {{ Route::is('Documents') ? 'DOCUMENTS' : '' }}
                        {{ Route::is('CarOwners') ? 'CAR OWNERS' : '' }}
                        {{ Route::is('VehicleReport') ? 'REPORT' : '' }}

                        {{ Route::is('Maintenance') ? 'MAINTENANCE' : '' }}
                        {{ Route::is('Refueling') ? 'FUEL HISTORY' : '' }}
                        {{ Route::is('Deposits') ? 'DEPOSITS' : '' }} 

                        {{ Route::is('Cars_Registration') ? 'REGISTERATION' : '' }}
                        {{ Route::is('EditMaintenance') ? 'Edit / MAINTENANCE' : '' }}
                        {{ Route::is('EditRefueling') ? 'FUEL MANAGEMENT' : '' }}
                        {{ Route::is('EditDeposits') ? 'Make Deposits' : '' }}
                        {{ Route::is('EditDeposits_MasterCard') ? 'Make Deposits' : '' }}
                        {{ Route::is('EditMasterCardDeposits') ? 'Make Deposits' : '' }}

                        {{ Route::is('Users') ? 'USERS' : '' }}

                        {{ Route::is('FleetCard') ? 'FLEET CARDS' : '' }}
                        {{ Route::is('MasterCard') ? 'MASTER CARDS' : '' }}
                         
                    <br>
                    <span>Vehicle Management System</span>
                    </h1> 
                    @unless (Route::is('Analytics'))
                    <div class="inner-x">
                        <p>
                            <img src="{{ asset('Images/car.png') }}" alt="">
                            Cars ({{ number_format($NumberOfCars) }})
                        </p>
                        <p>
                            <img src="{{ asset('Images/active.png') }}" alt="">
                            Active ({{ number_format($NumberOfCars_ACTIVE) }})
                        </p>
                        <p>
                            <img src="{{ asset('Images/inactive.png') }}" alt="">
                            Inactive ({{ number_format($NumberOfCars_INACTIVE) }})
                        </p>
                        <p>
                            <img src="{{ asset('Images/driver.png') }}" alt="">
                            Drivers ({{ number_format($NumberOfDrivers) }})
                        </p>
                    </div>
                    @endunless
                </div>
                @unless (Route::is('Analytics'))
                <div class="inner wrapper">
                    <div class="inner-x deposit">
                        <table>
                            <tr>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                    Repairs
                                </th>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"/></svg>
                                    Refueling 
                                </th>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M405 782h361V524H405v258ZM140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm0-60h680V316H140v520Zm0 0V316v520Z"></path></svg>
                                    Deposits
                                </th>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M880 316v520q0 24-18 42t-42 18H140q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42ZM140 425h680V316H140v109Zm0 129v282h680V554H140Zm0 282V316v520Z"/></svg>
                                    Maintenance
                                </th>
                            </tr>
                            <tr>
                                @php
                                                                    
                                    $SumOfCarRepairs = \App\Models\Maintenance::select('Cost')->where('IncidentType', 'REPAIR')->sum('Cost');
                                    $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')->sum('Cost');
                                    $SumOfCarDeposits = \App\Models\Deposits::select('Amount')->sum('Amount');
                                    $SumOfCarRefueling = \App\Models\Refueling::select('Amount')->sum('Amount');
                                
                                    function get_fleet_survey_currency_in_dollars($Value) {
                                        // ONE NAIRA TO DOLLAR CURRENTLY
                                        $USD = 0.0022;
                                        //
                                        $Result = $USD * $Value; 
                                        return number_format(round($Result, 0));
                                    } 
                                    
                                @endphp
                                <td>${{ get_fleet_survey_currency_in_dollars($SumOfCarRepairs) }}</td>
                                <td>${{ get_fleet_survey_currency_in_dollars($SumOfCarRefueling) }}</td>
                                <td>${{ get_fleet_survey_currency_in_dollars($SumOfCarDeposits) }}</td>
                                <td>${{ get_fleet_survey_currency_in_dollars($SumOfCarMaintenance) }}</td>
                            </tr>
                        </table>
                        <button class="deposits-route-edit">Deposit</button>
                    </div>
                    @php
            
                        $SearchInputs = [];

                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Cars') {
                            $SearchInputs = [
                                "ID",
                                "Cars", 
                                "EngineVolume",
                                "Refueling",
                                "Balance", 
                            ];
                        }
                        
                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Cars/Registration') {
                            $SearchInputs = [
                                "ID",
                                "Cars", 
                                "EngineVolume",
                                "Refueling",
                                "Balance",
                            ];
                        }

                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Cars/Report') {
                            $SearchInputs = [
                                "ORG",
                                "CarNumber", 
                                "Refueling",
                                "Balance",
                                "ToDeposit",
                                "Comments",
                            ];
                        }
             
                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Cars/Owners') {
                            $SearchInputs = [
                                "ID",
                                "Names", 
                                "CarDetails",
                                "RegistrationNumber", 
                            ];
                        }
                 
                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Maintenance') {
                            $SearchInputs = [
                                "SN",
                                "VehicleNo",
                                "Date",
                                "Time",
                                "IncidentType",
                                "IncidentAction",
                                "ReleaseDate",
                                "ReleaseTime",
                                "Cost",
                                "InvoiceNo",
                                "SupplierNo", 
                            ];
                        }
                
                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Management/Fleet/Deposits/Entries' || strtok($_SERVER['REQUEST_URI'], '?') === '/Deposits') {
                            $SearchInputs = [ 
                                "VehicleNo",
                                "Date",
                                "CardNo",
                                "Amount",
                                "Year",
                                "Week",
                                "Month", 
                                "Comments", 
                            ];

                            $SearchInputs2 = [ 
                                "CardType",
                                "Date",
                                "CardNo",
                                "Amount",
                                "Year",
                                "Week",
                                "Month", 
                                "Comments", 
                            ];
                        }  
                        
                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Refueling') {
                            $SearchInputs = [
                                "SN",
                                "VehicleNo",
                                "Date",
                                "Time",
                                "Mileage",
                                "TerminalNo",
                                "CardNo",
                                "Quantity", 
                                "Amount", 
                                "ReceiptNo", 
                                "KM",  
                            ];
                        } 
                
                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Edit/Maintenance') {
                            $SearchInputs = [
                                "SN",
                                "VehicleNo",
                                "Date",
                                "Time",
                                "IncidentType",
                                "IncidentAction",
                                "ReleaseDate",
                                "ReleaseTime",
                                "Cost",
                                "InvoiceNo",
                                "SupplierNo", 
                            ];
                        }
                
                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Management/Fleet/Cards') {
                            $SearchInputs = [ 
                                "CarInformation",
                                "MonthlyBudget",
                                "CarDeposits",
                                "Refueling",
                                "Balance",
                                "BroughtForward", 
                            ];
                        } 

                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Edit/Refueling') {
                            $SearchInputs = [
                                "SN",
                                "VehicleNo",
                                "Date",
                                "Time",
                                "Mileage",
                                "TerminalNo",
                                "CardNo",
                                "Quantity", 
                                "Amount", 
                                "ReceiptNo", 
                                "KM",  
                            ];
                        }

                        if(strtok($_SERVER['REQUEST_URI'], '?') === '/Users') {
                            $SearchInputs = [
                                "ID",
                                "Email",
                                "Username",
                                "Role",
                                "Records",
                                "Status", 
                                "CarsRegistered", 
                            ];
                        } 
                    @endphp
                    <div class="search">
                        <h2>Master Card No: 83783742</h2>
                            <form action="">
                                <input type="text" placeholder="Search..." id="SearchInput" name="FilterValue">
                                <button name="Filter">Filter</button>
                                <button name="ClearFilter">Clear</button>
                        </form>
                    </div>
                </div> 
            </div>
            <div class="action">
                @unless (!(Route::is('Maintenance') || Route::is('Deposits') || Route::is('Refueling'))) 
                <div class="FilterWrapper">
                    <button class="action-x Filter-X">Vehicle {{ Route::is('Maintenance') ? 'Maintenance' : '' }}{{ Route::is('Deposits') ? 'Deposits' : '' }}{{ Route::is('Refueling') ? 'Refueling' : '' }}  :: (Specify)<svg class="arrow" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 696 280 497h400L480 696Z"></path></svg></button>
                    <div class="inner-filter">
                        <form action="">
                            <h3>Global Time Period</h3>
                            <p>All Vehicles</p>
                            <ul>
                                <li>From: <input type="date" name="Date_From"></li>
                                <li>To: <input type="date" name="Date_To"></li>
                            </ul>
                            <button class="action-x" name="Filter_All_{{ Route::is('Maintenance') ? 'Maintenance' : '' }}{{ Route::is('Deposits') ? 'Deposits' : '' }}{{ Route::is('Refueling') ? 'Refueling' : '' }}">Apply</button>
                        </form>
                        <form action="">
                            <h3>Vehicle Time Period</h3>
                            <p>{{ Route::is('Maintenance') ? 'Maintenance' : '' }}{{ Route::is('Deposits') ? 'Deposits' : '' }}{{ Route::is('Refueling') ? 'Refueling' : '' }}  Yearly</p>
                            <ul>
                                <li>Vehicle No.: <input type="text" name="VehicleNo"></li>
                                <li>Specify Year: <input type="number" name="Year"></li>
                            </ul>
                            <button class="action-x" name="Filter_{{ Route::is('Maintenance') ? 'Maintenance' : '' }}{{ Route::is('Deposits') ? 'Deposits' : '' }}{{ Route::is('Refueling') ? 'Refueling' : '' }}_Yearly">Apply</button>
                        </form>
                        <form action="">
                            <h3>Time Period</h3>
                            <p>{{ Route::is('Maintenance') ? 'Maintenance' : '' }}{{ Route::is('Deposits') ? 'Deposits' : '' }}{{ Route::is('Refueling') ? 'Refueling' : '' }}  (Range)</p>
                            <ul>
                                <li>Vehicle No.: <input type="text" name="VehicleNo"></li> 
                                <li>Start Date: <input type="date" name="Date_From"></li>
                                <li>End Date: <input type="date" name="Date_To"></li>
                            </ul>
                            <button class="action-x" name="Filter_{{ Route::is('Maintenance') ? 'Maintenance' : '' }}{{ Route::is('Deposits') ? 'Deposits' : '' }}{{ Route::is('Refueling') ? 'Refueling' : '' }}_Range">Apply</button>
                        </form>
                    </div>
                </div>
                @endunless
                @php
                    $CarRegistration_USER = \DB::table('user_privileges')
                                                ->select('CarRegistration')
                                                ->where('UserId', session()->get('Id'))
                                                ->first(); 

                    $AddMaintenance_USER = \DB::table('user_privileges')
                                                ->select('AddMaintenance')
                                                ->where('UserId', session()->get('Id'))
                                                ->first(); 

                    $FuelManagement_USER = \DB::table('user_privileges')
                                                ->select('FuelManagement')
                                                ->where('UserId', session()->get('Id'))
                                                ->first(); 

                    $MakeDeposits_USER = \DB::table('user_privileges')
                                                ->select('MakeDeposits')
                                                ->where('UserId', session()->get('Id'))
                                                ->first(); 

                    $CardManagement_USER = \DB::table('user_privileges')
                                                ->select('CardManagement')
                                                ->where('UserId', session()->get('Id'))
                                                ->first(); 
                @endphp
                <div class="inner">
                    <button class="action-x {{ (Route::is('Cars_Registration') AND $CarRegistration_USER->CarRegistration ?? 'off' === 'on') ? 'add-car' : 'permission-denied' }}  {{ (Route::is('EditMaintenance') AND $AddMaintenance_USER->AddMaintenance ?? 'off' === 'on') ? 'add-maintenance' : 'permission-denied' }} {{ (Route::is('EditDeposits') AND $MakeDeposits_USER->MakeDeposits ?? 'off' === 'on') ? 'add-monthly-deposits' : 'permission-denied' }} {{ Route::is('EditDeposits_MasterCard') ? 'add-master-card-deposits' : '' }} {{ (Route::is('EditRefueling') AND $FuelManagement_USER->FuelManagement ?? 'off' === 'on') ? 'add-refueling' : 'permission-denied' }} {{ Route::is('Users') && Session::get('Role') === 'ADMIN' ? 'add-user' : '' }}{{ Route::is('Users') && !(Session::get('Role') === 'ADMIN') ? 'cars-route' : '' }}{{ Route::is('Cars') || Route::is('VehicleReport') || Route::is('CarOwners') || Route::is('Maintenance') || Route::is('Deposits') || Route::is('Refueling') || Route::is('Documents') ? 'cars-route' : '' }} {{ (Route::is('FleetCard') AND $CardManagement_USER->CardManagement ?? 'off' === 'on') ? 'add-fleet-card' : 'permission-denied' }}"> {{ Route::is('Cars_Registration') ? '+ Add Vehicle' : '' }} {{ Route::is('EditMaintenance') ? '+ Add Maintenance' : '' }} {{ Route::is('EditDeposits') ? '+ Add Deposits' : '' }} {{ Route::is('EditDeposits_MasterCard') ? '+ Add Deposits' : '' }} {{ Route::is('EditRefueling') ? '+ Add Refueling' : '' }} {{ Route::is('Users') && Session::get('Role') === 'ADMIN' ? '+ Add User' : '' }} {{ Route::is('Users') && !(Session::get('Role') === 'ADMIN') ? 'Explore Cars' : '' }} {{ Route::is('Cars') || Route::is('VehicleReport') || Route::is('CarOwners') || Route::is('Maintenance') || Route::is('Deposits') || Route::is('Refueling') || Route::is('Documents') ? 'Explore Cars' : '' }} {{ Route::is('FleetCard') ? '+ New Fleet Card' : '' }}</button><button class="ExportToExcel" style="{{ Route::is('CarOwners') ? 'display: none' : '' }}">Export to EXCEL</button>
                </div>
            </div> 
            @endunless
            @yield('Content') 
        </div>
    </div> 
    <script src="{{ asset('Js/SortTables.js') }}"></script>
    @unless (Route::is('Analytics'))
    <script> 
        @for($i = 0; $i < count($SearchInputs); $i++)
            function Filter{{ $SearchInputs[$i] }}() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("SearchInput{{ $i }}");
                filter = input.value.toUpperCase();
                table = document.getElementById("Table");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[{{ $i }}];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }       
                }
            }
        @endfor 
 
        @if(Route::is('EditDeposits') || Route::is('Deposits'))  
            @for($i = 0; $i < count($SearchInputs); $i++)
                function Filter{{ $SearchInputs[$i] }}() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("SearchInput{{ $i }}");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("Table");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[{{ $i }}];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }       
                    }
                }
            @endfor 

            @for($i = 0; $i < count($SearchInputs2); $i++)
                function Filter2{{ $SearchInputs2[$i] }}() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("SearchInputX{{ $i }}");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("Table2");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[{{ $i }}];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }       
                    }
                }
            @endfor
        @endif
        </script>
        @endunless 
        @if (Route::is('Documents'))
            <script src="{{ asset('Js/Edit/Documents/Cars.js') }}"></script>
            <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Deposits/Export'; 
                });
            </script>
        @endif
        @if (Route::is('Maintenance') || Route::is('Deposits') || Route::is('Refueling'))
        <script>
            let VehicleFilterButton = document.querySelector('.Filter-X');
            let VehicleFilterDropdown = document.querySelector('.FilterWrapper .inner-filter');
            let VehicleFilterWrapper = document.querySelector('.FilterWrapper');

            VehicleFilterWrapper.addEventListener('click', e => e.stopPropagation())
            VehicleFilterButton.addEventListener('click', (e) => { 
                VehicleFilterDropdown.classList.toggle('Show'); 
            }); 
            document.addEventListener('click', () => VehicleFilterDropdown.classList.remove('Show'));
        </script>
        @endif
        @if (Route::is('Cars') || Route::is('VehicleReport'))
        <script>
            let ExportButton = document.querySelector('.ExportToExcel');
            ExportButton.addEventListener('click', () => {
                window.location = '/Cars/Export'; 
            });
        </script>
        @endif
        <script src="{{ asset('Js/Scripts.js') }}"></script>
        @if (Route::is('Cars_Registration'))
            <script src="{{ asset('Js/Edit/CarsRegistration.js') }}"></script>
        @endif 
        @if (Route::is('EditMaintenance'))
            <script src="{{ asset('Js/Edit/Maintenance.js') }}"></script>
            <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Maintenance/Export'; 
                });
            </script>
        @endif
        @if (Route::is('EditDeposits'))
            <script src="{{ asset('Js/Edit/MonthlyDeposits.js') }}"></script>
            <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Deposits/Export'; 
                });
                let VehicleNumbers = document.getElementById('VehicleNumbers'); 
                let VehicleNumberInput = document.querySelector('input[list]'); 
                let CardNumberInput = document.querySelector('input[name=CardNumber]');   
            
                VehicleNumberInput.addEventListener('change', () => { 
                    let VehicleNumberInput = document.querySelector('input[list]').value;
                    let VehicleNumbers = document.getElementById('VehicleNumbers').childNodes;

                    for (var i = 0; i < VehicleNumbers.length; i++) {
                        if (VehicleNumbers[i].value === VehicleNumberInput) { 
                            CardNumberInput.value = VehicleNumbers[i].firstChild.textContent.trim();
                        break;
                        }
                    } 
                }); 
            </script>
        @endif 
        @if (Route::is('EditRefueling'))
            <script src="{{ asset('Js/Edit/Refueling.js') }}"></script>
            <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Refueling/Export'; 
                });

                let VehicleNumbers = document.getElementById('VehicleNumbers'); 
                let VehicleNumberInput = document.querySelector('input[list]'); 
                let CardNumberInput = document.querySelector('input[name=CardNumber]');   
            
                VehicleNumberInput.addEventListener('change', () => { 
                    let VehicleNumberInput = document.querySelector('input[list]').value;
                    let VehicleNumbers = document.getElementById('VehicleNumbers').childNodes;

                    for (var i = 0; i < VehicleNumbers.length; i++) {
                        if (VehicleNumbers[i].value === VehicleNumberInput) { 
                            CardNumberInput.value = VehicleNumbers[i].firstChild.textContent.trim();
                        break;
                        }
                    } 
                }); 
            </script>
        @endif
        @if (Route::is('Users'))
            <script src="{{ asset('Js/Edit/Users.js') }}"></script>
        @endif
        {{--  --}}
         
        @if (Route::is('Maintenance'))
            <script src="{{ asset('Js/ReadOnly/Maintenance.js') }}"></script>
            <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Maintenance/Export'; 
                });
            </script>
        @endif
        @if (Route::is('Deposits'))
            <script src="{{ asset('Js/ReadOnly/Deposits.js') }}"></script>
            <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Deposits/Export'; 
                });
            </script>
        @endif
        @if (Route::is('FleetCard'))
            <script src="{{ asset('Js/Edit/FleetCard.js') }}"></script>
            {{-- <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Deposits/Master/Cards/Export'; 
                });
            </script> --}}
        @endif 
        @if (Route::is('Refueling'))
            <script src="{{ asset('Js/ReadOnly/Refueling.js') }}"></script>
            <script>
                let ExportButton = document.querySelector('.ExportToExcel');
                ExportButton.addEventListener('click', () => {
                    window.location = '/Refueling/Export'; 
                });
            </script>
        @endif
        <script src="{{ asset('Js/Loader.js') }}"></script> 
        <script src="{{ asset('Js/Tooltips.js') }}"></script> 
</body>
</html>
@endif