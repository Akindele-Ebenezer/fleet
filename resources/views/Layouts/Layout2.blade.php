<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
    @include('Components.EditCarComponent')
    @include('Components.AddCarComponent')
    @include('Components.VehicleDataComponent')
    @include('Components.EditVehicleDataComponent')
    @include('Components.EditRepairComponent')
    @include('Components.EditMonthlyDepositsComponent')
    @include('Components.EditMaintainanceComponent')
    @include('Components.EditRefuelingComponent')

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
                <li><input type="text" placeholder="Search.."></li>
                <a href='/'>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M120 936v-76l60-60v136h-60Zm165 0V700l60-60v296h-60Zm165 0V640l60 61v235h-60Zm165 0V701l60-60v295h-60Zm165 0V540l60-60v456h-60ZM120 700v-85l280-278 160 160 280-281v85L560 582 400 422 120 700Z"/></svg>                    
                        Analytics 
                    </li>
                </a>
                <a href='{{ route('Cars') }}'>
                    <li class="{{ Route::is('Cars') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"/></svg>                  
                        Cars
                        <span>24</span>
                    </li>
                </a>
                <a href='{{ route('MyRecords') }}'>
                    <li class="{{ Route::is('MyRecords') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M222 976q-43.75 0-74.375-30.625T117 871V746h127V176l59.8 60 59.8-60 59.8 60 59.8-60 59.8 60 60-60 60 60 60-60 60 60 60-60v695q0 43.75-30.625 74.375T738 976H222Zm516-60q20 0 32.5-12.5T783 871V276H304v470h389v125q0 20 12.5 32.5T738 916ZM357 434v-60h240v60H357Zm0 134v-60h240v60H357Zm333-134q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9Zm0 129q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9ZM221 916h412V806H177v65q0 20 12.65 32.5T221 916Zm-44 0V806v110Z"/></svg>                  
                        My
                        RECORDS 
                        <span>24</span>
                    </li>
                </a>
                <a href='{{ route('VehicleReport') }}'>
                    <li class="{{ Route::is('VehicleReport') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M309 435q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm0 171q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm0-600v171.429V276v600-600Z"/></svg>                   
                        Vehicle REPORT
                    </li>
                </a>
                <div class="sub-nav">
                    <a href='{{ route('Repairs') }}'>
                        <li class="{{ Route::is('Repairs') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M705 928 447 668q-23 8-46 13t-47 5q-97.083 0-165.042-67.667Q121 550.667 121 454q0-31 8.158-60.388Q137.316 364.223 152 338l145 145 92-86-149-149q25.915-15.158 54.957-23.579Q324 216 354 216q99.167 0 168.583 69.417Q592 354.833 592 454q0 24-5 47t-13 46l259 258q11 10.957 11 26.478Q844 847 833 858l-76 70q-10.696 11-25.848 11T705 928Zm28-57 40-40-273-273q16-21 24-49.5t8-54.5q0-75-55.5-127T350 274l101 103q9 9 9 22t-9 22L319 545q-9 9-22 9t-22-9l-97-96q3 77 54.668 127T354 626q25 0 53-8t49-24l277 277ZM476 572Z"/></svg>                 
                            Repairs (24)
                        </li>
                    </a>
                    <a href='{{ route('Maintainance') }}'>
                        <li class="{{ Route::is('Maintainance') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M768 936 517 685l57-57 251 251-57 57Zm-581 0-57-57 290-290-107-107-23 23-44-44v85l-24 24-122-122 24-24h86l-48-48 131-131q17-17 37-23t44-6q24 0 44 8.5t37 25.5L348 357l48 48-24 24 104 104 122-122q-8-13-12.5-30t-4.5-36q0-53 38.5-91.5T711 215q15 0 25.5 3t17.5 8l-85 85 75 75 85-85q5 8 8.5 19.5T841 347q0 53-38.5 91.5T711 477q-18 0-31-2.5t-24-7.5L187 936Z"/></svg>           
                            Maintainance  (24)
                        </li>
                    </a>
                    <a href='{{ route('Deposits') }}'>
                        <li class="{{ Route::is('Deposits') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M451 936v-84q-57-10-93.5-43.5T305 724l56-23q17 48 49 71.5t77 23.5q48 0 79-24t31-66q0-44-27.5-68T466 589q-72-23-107.5-61T323 433q0-55 35.5-92t92.5-42v-83h60v83q45 5 77.5 29.5T638 391l-56 24q-14-32-37.5-46.5T483 354q-46 0-73 21t-27 57q0 38 30 61.5T524 542q68 21 100.5 60.5T657 702q0 63-37 101.5T511 853v83h-60Z"/></svg>            
                            Fuel Monthly Deposits (24)
                        </li>
                    </a>
                    <a href='{{ route('Refueling') }}'>
                        <li class="{{ Route::is('Refueling') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"/></svg>                  
                            Refueling (24)
                        </li>
                    </a>
                </div>
                <a href='{{ route('Users') }}'>
                    <li class="{{ Route::is('Users') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M480 575q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160 896v-94q0-38 19-65t49-41q67-30 128.5-45T480 636q62 0 123 15.5t127.921 44.694q31.301 14.126 50.19 40.966Q800 764 800 802v94H160Zm60-60h520v-34q0-16-9.5-30.5T707 750q-64-31-117-42.5T480 696q-57 0-111 11.5T252 750q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570 425q0-39-25.5-64.5T480 335q-39 0-64.5 25.5T390 425q0 39 25.5 64.5T480 515Zm0-90Zm0 411Z"/></svg>                   
                        USERS
                        <span>24</span>
                    </li>
                </a>
                <a href='/'>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h291v60H180v600h291v60H180Zm486-185-43-43 102-102H375v-60h348L621 444l43-43 176 176-174 174Z"/></svg>                  
                        LOGOUT 
                    </li>
                </a>
            </ul>
            <div class="nav-footer">
                <div class="nav-footer-inner">
                    <img src="{{ asset('Images/profile-pic.png')  }}" alt="">
                </div>
                <div class="nav-footer-inner">

                </div>
            </div>
        </div>
        <div class="report-data report-inner">
            <div class="report-data-heading">
                <div class="inner">
                    <h1>
                        {{-- <img src="{{ asset('Images/car1.png') }}" alt=""> --}}
                        FLEET DB 
                    <br>
                    <span>Vehicle Management System</span>
                    </h1> 
                    <div class="inner-x">
                        <p>
                            <img src="{{ asset('Images/car.png') }}" alt="">
                            Cars (24)
                        </p>
                        <p>
                            <img src="{{ asset('Images/active.png') }}" alt="">
                            Active (24)
                        </p>
                        <p>
                            <img src="{{ asset('Images/inactive.png') }}" alt="">
                            Inactive (24)
                        </p>
                        <p>
                            <img src="{{ asset('Images/driver.png') }}" alt="">
                            Drivers (24)
                        </p>
                    </div>
                </div>
                <div class="inner wrapper">
                    <div class="inner-x deposit">
                        <table>
                            <tr>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M451 936v-84q-57-10-93.5-43.5T305 724l56-23q17 48 49 71.5t77 23.5q48 0 79-24t31-66q0-44-27.5-68T466 589q-72-23-107.5-61T323 433q0-55 35.5-92t92.5-42v-83h60v83q45 5 77.5 29.5T638 391l-56 24q-14-32-37.5-46.5T483 354q-46 0-73 21t-27 57q0 38 30 61.5T524 542q68 21 100.5 60.5T657 702q0 63-37 101.5T511 853v83h-60Z"/></svg>
                                    Deposits
                                </th>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"/></svg>
                                    Refueling
                                </th>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M450 855h60v-40h60q12.75 0 21.375-8.625T600 785V655q0-12.75-8.625-21.375T570 625H420v-70h180v-60h-90v-40h-60v40h-60q-12.75 0-21.375 8.625T360 525v130q0 12.75 8.625 21.375T390 685h150v70H360v60h90v40ZM220 976q-24 0-42-18t-18-42V236q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm311-581V236H220v680h520V395H531ZM220 236v159-159 680-680Z"/></svg>
                                    Balance
                                </th>
                                <th>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M880 316v520q0 24-18 42t-42 18H140q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42ZM140 425h680V316H140v109Zm0 129v282h680V554H140Zm0 282V316v520Z"/></svg>
                                    To Deposit
                                </th>
                            </tr>
                            <tr>
                                <td>₦ 87,654,345</td>
                                <td>₦ 87,654,345</td>
                                <td>₦ 87,654,345</td>
                                <td>₦ 87,654,345</td>
                            </tr>
                        </table>
                        <button>Deposit</button>
                    </div>
                    @php
            
                        $SearchInputs = [];

                        if($_SERVER['REQUEST_URI'] === '/Cars') {
                            $SearchInputs = [
                                "ID",
                                "Cars", 
                                "Consumption",
                                "Refueling",
                                "Balance", 
                            ];
                        }
                        
                        if($_SERVER['REQUEST_URI'] === '/MyRecords') {
                            $SearchInputs = [
                                "ORG",
                                "CarNumber",
                                "UsedBy",
                                "Driver",
                                "Maker",
                                "Model",
                                "Total",
                                "MonthlyBudget",
                                "Deposits",
                                "Refueling",
                                "Balance",
                                "ToDeposit",
                                "Comments",
                            ];
                        }

                        if($_SERVER['REQUEST_URI'] === '/VehicleReport') {
                            $SearchInputs = [
                                "ORG",
                                "CarNumber",
                                "UsedBy",
                                "Driver",
                                "Maker",
                                "Model",
                                "Total",
                                "MonthlyBudget",
                                "Deposits",
                                "Refueling",
                                "Balance",
                                "ToDeposit",
                                "Comments",
                            ];
                        }
             
                        if($_SERVER['REQUEST_URI'] === '/Repairs') {
                            $SearchInputs = [
                                "SN",
                                "CarVehicleNo",
                                "Date",
                                "Time",
                                "RepairAction",
                                "ReleaseDate",
                                "ReleaseTime",
                                "Cost",
                                "InvoiceNo",
                                "SupplierNo", 
                            ];
                        }
                
                        if($_SERVER['REQUEST_URI'] === '/Maintainance') {
                            $SearchInputs = [
                                "SN",
                                "VehicleNo",
                                "Date",
                                "Time",
                                "MaintainanceAction",
                                "ReleaseDate",
                                "ReleaseTime",
                                "Cost",
                                "InvoiceNo",
                                "SupplierNo", 
                            ];
                        }
                
                        if($_SERVER['REQUEST_URI'] === '/Deposits') {
                            $SearchInputs = [
                                "LNO",
                                "VehicleNo",
                                "Date",
                                "CardNo",
                                "Amount",
                                "Year",
                                "Week",
                                "Month", 
                            ];
                        } 

                        if($_SERVER['REQUEST_URI'] === '/Refueling') {
                            $SearchInputs = [
                                "SN",
                                "VehicleNo",
                                "Date",
                                "Time",
                                "KMETER",
                                "TerminalNo",
                                "CardNo",
                                "Quantity", 
                                "Amount", 
                                "ReceiptNo", 
                                "KM", 
                                "KMLITER", 
                            ];
                        }

                        if($_SERVER['REQUEST_URI'] === '/Users') {
                            $SearchInputs = [
                                "ID",
                                "Email",
                                "Username",
                                "Role",
                                "Records",
                                "Status", 
                            ];
                        }

                    @endphp
                    <div class="search">
                        <h2>Master Card No: 83783742</h2>
                        <input type="text" placeholder="Search..." id="SearchInput">
                        <button>Filter</button>
                        <button>Clear</button>
                    </div>
                </div> 
            </div>
            <div class="action">
                <div class="inner">
                    <button>+ Add Vehicle</button><button>Export to EXCEL</button>
                </div>
            </div> 
            @yield('Content') 
        </div>
    </div> 
    <script src="{{ asset('Js/SortTables.js') }}"></script>
    <script>
        // let NumberOfTableHeads = document.querySelectorAll('th').length;

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
    </script>
</body>
</html>