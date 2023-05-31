<div class="add-vehicle-form form">
    <div class="cancel-modal">✖</div>
    <div class="inner">
        <div class="error"></div>
        <div class="heading">
            <h1>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m80 619 85-253q5-14 17-22t26-8h125v-73h153q-9 32-8 66.5t9 66.5H218l-54 166h478q23 8 42.5 12t44.5 4q18 0 36-2.5t35-7.5v378q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21v-54H161v54q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21V619Zm60 3v210-210Zm106 160q23 0 39.5-15.5T302 728q0-23-16.5-39.5T246 672q-23 0-38.5 16.5T192 728q0 23 15.5 38.5T246 782Zm388 0q23 0 39.5-15.5T690 728q0-23-16.5-39.5T634 672q-23 0-38.5 16.5T580 728q0 23 15.5 38.5T634 782Zm95-264q-79 0-135-56t-56-135q0-80 56-135.5T729 136q80 0 135.5 55.5T920 327q0 79-55.5 135T729 518Zm-15-161h35V214h-35v143Zm18 85q9 0 15.5-6t6.5-16q0-10-6.5-16t-15.5-6q-10 0-16 6t-6 16q0 10 6 16t16 6ZM140 832h600V622H140v210Z"></path></svg>
                New Car 
            </h1>
            <button class="maintenance-route">
                Maintenance
            </button>
        </div>
        <form class="AddCarForm">
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M226 896q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm0-254q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm0-254q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 254q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47l-66 66Zm0-254q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm-40 508v-65l243-243 65 65-243 243h-65Zm294-508q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm40 239-65-65 25-25q8-8 20-8.5t20 7.5l26 26q8 8 7.5 20t-8.5 20l-25 25Z"></path></svg>
                    Registration Number
                </div>
                <input type="text" name="VehicleNumber_CAR" placeholder="Registration Number..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M249.899 976Q196 976 158 937.929 120 899.857 120 846V505q-24-23-52-49.5T40 392q0-22.909 16.545-39.455Q73.091 336 96 336q17 0 30 9t24 21q11-12 24.5-21t29.5-9q22.909 0 39.455 16.545Q260 369.091 260 392q0 37-28 63.5T180 505v341q0 29.167 20.382 49.583Q220.765 916 249.882 916 279 916 299.5 895.583 320 875.167 320 846V371q0-80.925 57.053-137.963Q434.106 176 515.053 176T653 233.037Q710 290.075 710 371v7q72 11 121 66.997Q880 500.995 880 576v200q0 83-58.5 141.5T680 976q-83 0-141.5-58.5T480 776V576q0-75 49-131t121-67v-7q0-57-39-96t-96-39q-57 0-96 39t-39 96v475q0 53.857-38.101 91.929-38.101 38.071-92 38.071Zm429.866-60Q738 916 779 875.167q41-40.834 41-99.167V576q0-58.333-40.765-99.167-40.764-40.833-99-40.833Q622 436 581 476.833 540 517.667 540 576v200q0 58.333 40.765 99.167 40.764 40.833 99 40.833ZM680 696q-33 0-56.5 23.5T600 776q0 33 23.5 56.5T680 856q33 0 56.5-23.5T760 776q0-33-23.5-56.5T680 696Zm0 80Z"></path></svg>
                    Maker
                </div>
                <select name="Maker">
                    @foreach ($Cars_Maker as $Car)
                        <option value="{{ $Car->Maker }}">{{ $Car->Maker }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"></path></svg>
                    Model
                </div>
                <input type="text" name="Model" placeholder="Model..">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M206 850q-41-48-63.5-107.5T120 616q0-150 105-254.5T480 257q10 0 20.5.5T519 259l-81-81 42-42 160 160-160 160-43-43 92-92q-11-2-26-3t-23-1q-125 0-212.5 87T180 616q0 51 17 102t52 89l-43 43Zm236-4q0-21-15-43t-32.5-45Q377 735 362 709.5T347 656q0-55 39-94t94-39q55 0 94 39t39 94q0 28-15 53.5T565.5 758Q548 781 533 803t-15 43h-76Zm-2 90v-50h80v50h-80Zm314-86-42-42q30-36 49-85t19-107q0-66-27.5-125.5T670 386l44-44q58 50 92 120.5T840 616q0 67-22.5 126.5T754 850Z"></path></svg>
                    Sub Model
                </div>
                <input type="text" name="SubModel" placeholder="Sub Model..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m388 976-20-126q-19-7-40-19t-37-25l-118 54-93-164 108-79q-2-9-2.5-20.5T185 576q0-9 .5-20.5T188 535L80 456l93-164 118 54q16-13 37-25t40-18l20-127h184l20 126q19 7 40.5 18.5T669 346l118-54 93 164-108 77q2 10 2.5 21.5t.5 21.5q0 10-.5 21t-2.5 21l108 78-93 164-118-54q-16 13-36.5 25.5T592 850l-20 126H388Zm92-270q54 0 92-38t38-92q0-54-38-92t-92-38q-54 0-92 38t-38 92q0 54 38 92t92 38Zm0-60q-29 0-49.5-20.5T410 576q0-29 20.5-49.5T480 506q29 0 49.5 20.5T550 576q0 29-20.5 49.5T480 646Zm0-70Zm-44 340h88l14-112q33-8 62.5-25t53.5-41l106 46 40-72-94-69q4-17 6.5-33.5T715 576q0-17-2-33.5t-7-33.5l94-69-40-72-106 46q-23-26-52-43.5T538 348l-14-112h-88l-14 112q-34 7-63.5 24T306 414l-106-46-40 72 94 69q-4 17-6.5 33.5T245 576q0 17 2.5 33.5T254 643l-94 69 40 72 106-46q24 24 53.5 41t62.5 25l14 112Z"></path></svg>
                    Engine Type
                </div>
                <select name="EngineType">
                    @foreach ($Cars_EngineType as $Car)
                        <option value="{{ $Car->EngineType }}">{{ $Car->EngineType }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m753 452-44-94-94-44 94-44 44-94 44 94 94 44-94 44-44 94Zm84 289-29.76-63.24L744 648l63.24-29.76L837 555l29.76 63.24L930 648l-63.24 29.76L837 741ZM314 976l-10-92q-14-2-29-9t-26-17l-78 33-88-144 76-50q-5-17-5-30t5-30l-76-50 88-144 78 33q11-10 26-17t29-9l10.075-92H482l10 92q14 2 29 9t26 17l78-33 88 144-76 50q5 17 5 30t-5 30l76 50-88 144-78-33q-11 10-26 17t-29 9l-10.075 92H314Zm84-194q50 0 82.5-32.5T513 667q0-50-32.5-82.5T398 552q-50 0-82.5 32.5T283 667q0 50 32.5 82.5T398 782Zm0-60q-24 0-39.5-15.5T343 667q0-24 15.5-39.5T398 612q24 0 39.5 15.5T453 667q0 24-15.5 39.5T398 722Zm-34 194h68l8-76q29-7 53-20t43.767-34L602 815l33-52-62-44q11-25 11-52t-11-52l62-44-33-52-65.233 29Q517 527 493 514q-24-13-53-20l-8-76h-68l-8 76q-29 7-53 20t-43.767 34L194 519l-33 52 62 44q-11 25-11 52t11 52l-62 44 33 52 65.233-29Q279 807 303 820q24 13 53 20l8 76Zm34-249Z"></path></svg>
                    Gear Type 
                </div>
                <select name="GearType">
                    @foreach ($Cars_GearType as $Car)
                        <option value="{{ $Car->GearType }}">{{ $Car->GearType }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M206 850q-41-48-63.5-107.5T120 616q0-150 105-254.5T480 257q10 0 20.5.5T519 259l-81-81 42-42 160 160-160 160-43-43 92-92q-11-2-26-3t-23-1q-125 0-212.5 87T180 616q0 51 17 102t52 89l-43 43Zm236-4q0-21-15-43t-32.5-45Q377 735 362 709.5T347 656q0-55 39-94t94-39q55 0 94 39t39 94q0 28-15 53.5T565.5 758Q548 781 533 803t-15 43h-76Zm-2 90v-50h80v50h-80Zm314-86-42-42q30-36 49-85t19-107q0-66-27.5-125.5T670 386l44-44q58 50 92 120.5T840 616q0 67-22.5 126.5T754 850Z"></path></svg>
                    Engine Number
                </div>
                <input type="text" name="EngineNumber" placeholder="Engine Number..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M386 677h87q24.75 0 42.375-18T533 617V415q0-24-17.625-42T473 355h-71q-24 0-42 18t-18 42v71q0 24 18 42t42 18h71v71h-87v60Zm87-191h-71v-71h71v71ZM260 856q-24 0-42-18t-18-42V236q0-24 18-42t42-18h560q24 0 42 18t18 42v560q0 24-18 42t-42 18H260Zm0-60h560V236H260v560ZM140 976q-24 0-42-18t-18-42V296h60v620h620v60H140Zm120-740v560-560Zm406 395h60v-87h83v-60h-83v-83h-60v83h-83v60h83v87Z"></path></svg>
                    Chasis Number
                </div>
                <input type="text" name="ChassisNumber" placeholder="Chasis Number..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M450 855h60v-40h60q12.75 0 21.375-8.625T600 785V655q0-12.75-8.625-21.375T570 625H420v-70h180v-60h-90v-40h-60v40h-60q-12.75 0-21.375 8.625T360 525v130q0 12.75 8.625 21.375T390 685h150v70H360v60h90v40ZM220 976q-24 0-42-18t-18-42V236q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm311-581V236H220v680h520V395H531ZM220 236v159-159 680-680Z"></path></svg>
                    Price
                </div>
                <input type="number" name="Price" placeholder="Price..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M40 856V296h85v560H40Zm120 0V296h80v560h-80Zm120 0V296h40v560h-40Zm120 0V296h80v560h-80Zm120 0V296h120v560H520Zm160 0V296h40v560h-40Zm120 0V296h120v560H800Z"></path></svg>
                    ORG
                </div>
                <select name="CompanyCode">
                    @foreach ($Cars_Organisation as $Car)
                        <option value="{{ $Car->CompanyCode }}">{{ $Car->CompanyCode }} ::: {{ $Car->CompanyName }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M483 936q-75 0-141-28.5T226.5 830q-49.5-49-78-115T120 574q0-75 28.5-140t78-113.5Q276 272 342 244t141-28q80 0 151.5 35T758 347V241h60v208H609v-60h105q-44-51-103.5-82T483 276q-125 0-214 85.5T180 571q0 127 88 216t215 89q125 0 211-88t86-213h60q0 150-104 255.5T483 936Zm122-197L451 587V373h60v189l137 134-43 43Z"></path></svg>
                    Purchase Date
                </div>
                <input type="date" name="PurchaseDate">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M386 677h87q24.75 0 42.375-18T533 617V415q0-24-17.625-42T473 355h-71q-24 0-42 18t-18 42v71q0 24 18 42t42 18h71v71h-87v60Zm87-191h-71v-71h71v71ZM260 856q-24 0-42-18t-18-42V236q0-24 18-42t42-18h560q24 0 42 18t18 42v560q0 24-18 42t-42 18H260Zm0-60h560V236H260v560ZM140 976q-24 0-42-18t-18-42V296h60v620h620v60H140Zm120-740v560-560Zm406 395h60v-87h83v-60h-83v-83h-60v83h-83v60h83v87Z"></path></svg>
                    Supplier
                </div>
                <input type="text" name="Supplier" placeholder="Supplier..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m250 896 43-170H140l15-60h153l45-180H180l15-60h173l42-170h59l-42 170h181l42-170h59l-42 170h153l-15 60H652l-45 180h173l-15 60H592l-42 170h-60l43-170H352l-42 170h-60Zm117-230h181l45-180H412l-45 180Z"></path></svg>
                    Licence Expiry Date
                </div>
                <input type="date" name="LicenceExpiryDate"> 
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Zm300 230q-17 0-28.5-11.5T440 616q0-17 11.5-28.5T480 576q17 0 28.5 11.5T520 616q0 17-11.5 28.5T480 656Zm-160 0q-17 0-28.5-11.5T280 616q0-17 11.5-28.5T320 576q17 0 28.5 11.5T360 616q0 17-11.5 28.5T320 656Zm320 0q-17 0-28.5-11.5T600 616q0-17 11.5-28.5T640 576q17 0 28.5 11.5T680 616q0 17-11.5 28.5T640 656ZM480 816q-17 0-28.5-11.5T440 776q0-17 11.5-28.5T480 736q17 0 28.5 11.5T520 776q0 17-11.5 28.5T480 816Zm-160 0q-17 0-28.5-11.5T280 776q0-17 11.5-28.5T320 736q17 0 28.5 11.5T360 776q0 17-11.5 28.5T320 816Zm320 0q-17 0-28.5-11.5T600 776q0-17 11.5-28.5T640 736q17 0 28.5 11.5T680 776q0 17-11.5 28.5T640 816Z"></path></svg>
                    Insurance Expiry Date
                </div>
                <input type="date" name="InsuranceExpiryDate"> 
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M880 316v520q0 24-18 42t-42 18H140q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42ZM140 425h680V316H140v109Zm0 129v282h680V554H140Zm0 282V316v520Z"></path></svg>
                    Card No (TOTAL)
                </div>
                <input type="text" name="CardNumber" placeholder="Card No (TOTAL)..">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v239H140v281h399v60H140Zm0-480h680V316H140v100Zm640 560V856H660v-60h120V676h60v120h120v60H840v120h-60ZM140 836V316v520Z"></path></svg>
                    PIN Code
                </div>
                <input type="text" name="PinCode" placeholder="PIN Code..">
            </div>  
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936q-12 0-21-9t-9-21.5q0-12.5 9-21t21-8.5h40V606h-50q-12 0-21-9t-9-21.5q0-12.5 9-21t21-8.5h50V276h-40q-12 0-21-9t-9-21.5q0-12.5 9-21t21-8.5h640q12.75 0 21.375 8.625T830 246q0 12-8.625 21T800 276h-40v270h50q12.75 0 21.375 8.625T840 576q0 12-8.625 21T810 606h-50v270h40q12.75 0 21.375 8.625T830 906q0 12-8.625 21T800 936H160Zm100-60h440V606q-12 0-21-9t-9-21.5q0-12.5 9-21t21-8.5V276H260v270q12.75 0 21.375 8.625T290 576q0 12-8.625 21T260 606v270Zm220.118-153Q526 723 558 691.357q32-31.644 32-76.586Q590 579 569.5 554T480 449q-69 79-89.5 104.5T370 614.771q0 44.942 32.118 76.586 32.117 31.643 78 31.643ZM260 876V276v600Z"></path></svg>
                    Monthly Budget
                </div>
                <input type="number" name="MonthlyBudget" placeholder="Monthly Budget..">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M160 936V276q0-24 18-42t42-18h269q24 0 42 18t18 42v288h65q20.625 0 35.312 14.688Q664 593.375 664 614v219q0 21.675 15.5 36.338Q695 884 717 884t37.5-14.662Q770 854.675 770 833V538q-11 6-23 9t-24 3q-39.48 0-66.74-27.26Q629 495.48 629 456q0-31.614 18-56.807T695 366l-95-95 36-35 153 153q14 14 22.5 30.5T820 456v377q0 43.26-29.817 73.13-29.817 29.87-73 29.87T644 906.13q-30-29.87-30-73.13V614h-65v322H160Zm60-432h269V276H220v228Zm503-4q18 0 31-13t13-31q0-18-13-31t-31-13q-18 0-31 13t-13 31q0 18 13 31t31 13ZM220 876h269V564H220v312Zm269 0H220h269Z"></path></svg>
                    Fuel Tank Capacity
                </div>
                <input type="text" name="FuelTankCapacity" placeholder="Fuel Tank Capacity..">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M452 770h56l10-54q20-6 34-15t26-21l62 19 26-54-47-30q4-21 4-39t-4-39l47-30-26-54-62 19q-12-12-26-21t-34-15l-10-54h-56l-10 54q-20 6-34 15t-26 21l-62-19-26 54 47 30q-4 21-4 39t4 39l-47 30 26 54 62-19q12 12 26 21t34 15l10 54Zm28-109q-36 0-60.5-24.5T395 576q0-36 24.5-60.5T480 491q36 0 60.5 24.5T565 576q0 36-24.5 60.5T480 661ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h600q24 0 42 18t18 42v600q0 24-18 42t-42 18H180Zm0-60h600V276H180v600Zm0-600v600-600Z"></path></svg>
                    Engine Volume
                </div>
                <input type="text" name="EngineVolume" placeholder="Engine Volume..">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M306 662q-17 0-28.5-11.5T266 622q0-17 11.5-28.5T306 582q17 0 28.5 11.5T346 622q0 17-11.5 28.5T306 662Zm177 0q-17 0-28.5-11.5T443 622q0-17 11.5-28.5T483 582q17 0 28.5 11.5T523 622q0 17-11.5 28.5T483 662Zm170 0q-17 0-28.5-11.5T613 622q0-17 11.5-28.5T653 582q17 0 28.5 11.5T693 622q0 17-11.5 28.5T653 662ZM180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Z"></path></svg>
                    Model Year
                </div>
                <input type="text" name="ModelYear" placeholder="Model Year..">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M483 936q-75 0-141-28.5T226.5 830q-49.5-49-78-115T120 574q0-75 28.5-140t78-113.5Q276 272 342 244t141-28q80 0 151.5 35T758 347V241h60v208H609v-60h105q-44-51-103.5-82T483 276q-125 0-214 85.5T180 571q0 127 88 216t215 89q125 0 211-88t86-213h60q0 150-104 255.5T483 936Zm122-197L451 587V373h60v189l137 134-43 43Z"></path></svg>
                    Stop Date
                </div>
                <input type="date" name="StopDate">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M410 606ZM110 966q-24.75 0-42.375-17.625T50 906V306q0-24.75 17.625-42.375T110 246h370v60H110v600h600V616h60v290q0 24.75-17.625 42.375T710 966H110Zm104-157h60V534h-60v275Zm166 0h60V403h-60v406Zm166 0h60V661h-60v148Zm184-253q-31 0-59.5-10.5T616 518l-21 20q-9 8-21 8.5t-21-8.5q-9-9-9-21t9-21l22-22q-16-24-25.5-51.325Q540 395.349 540 366q0-78.85 55.575-134.425Q651.15 176 730 176h190v190q0 78.85-55.575 134.425Q808.85 556 730 556Zm0-60q54.167 0 92.083-37.917Q860 420.167 860 366V236H730q-54.167 0-92.083 37.917Q600 311.833 600 366q0 17 4.5 33.5T616 433l115-115q9-9 21-9t21 9q9 9.067 9 21.533Q782 352 773 361L659 475q17 8 34.5 14.5T730 496Zm-15-120Z"></path></svg>
                    Used By
                </div>
                <input type="text" name="CarOwner" placeholder="Used By..">
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M730 656V526H600v-60h130V336h60v130h130v60H790v130h-60Zm-370-81q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM40 896v-94q0-35 17.5-63.5T108 696q75-33 133.338-46.5 58.339-13.5 118.5-13.5Q420 636 478 649.5 536 663 611 696q33 15 51 43t18 63v94H40Zm60-60h520v-34q0-16-9-30.5T587 750q-71-33-120-43.5T360 696q-58 0-107.5 10.5T132 750q-15 7-23.5 21.5T100 802v34Zm260-321q39 0 64.5-25.5T450 425q0-39-25.5-64.5T360 335q-39 0-64.5 25.5T270 425q0 39 25.5 64.5T360 515Zm0-90Zm0 411Z"></path></svg>
                    Driver
                </div>
                <input type="text" name="Driver" placeholder="Driver..">
            </div>  
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M249.899 976Q196 976 158 937.929 120 899.857 120 846V505q-24-23-52-49.5T40 392q0-22.909 16.545-39.455Q73.091 336 96 336q17 0 30 9t24 21q11-12 24.5-21t29.5-9q22.909 0 39.455 16.545Q260 369.091 260 392q0 37-28 63.5T180 505v341q0 29.167 20.382 49.583Q220.765 916 249.882 916 279 916 299.5 895.583 320 875.167 320 846V371q0-80.925 57.053-137.963Q434.106 176 515.053 176T653 233.037Q710 290.075 710 371v7q72 11 121 66.997Q880 500.995 880 576v200q0 83-58.5 141.5T680 976q-83 0-141.5-58.5T480 776V576q0-75 49-131t121-67v-7q0-57-39-96t-96-39q-57 0-96 39t-39 96v475q0 53.857-38.101 91.929-38.101 38.071-92 38.071Zm429.866-60Q738 916 779 875.167q41-40.834 41-99.167V576q0-58.333-40.765-99.167-40.764-40.833-99-40.833Q622 436 581 476.833 540 517.667 540 576v200q0 58.333 40.765 99.167 40.764 40.833 99 40.833ZM680 696q-33 0-56.5 23.5T600 776q0 33 23.5 56.5T680 856q33 0 56.5-23.5T760 776q0-33-23.5-56.5T680 696Zm0 80Z"></path></svg>
                    Status
                </div>
                <select name="Status"> 
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="INACTIVE">INACTIVE</option>
                </select>
            </div> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M452 770h56l10-54q20-6 34-15t26-21l62 19 26-54-47-30q4-21 4-39t-4-39l47-30-26-54-62 19q-12-12-26-21t-34-15l-10-54h-56l-10 54q-20 6-34 15t-26 21l-62-19-26 54 47 30q-4 21-4 39t4 39l-47 30 26 54 62-19q12 12 26 21t34 15l10 54Zm28-109q-36 0-60.5-24.5T395 576q0-36 24.5-60.5T480 491q36 0 60.5 24.5T565 576q0 36-24.5 60.5T480 661ZM180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h600q24 0 42 18t18 42v600q0 24-18 42t-42 18H180Zm0-60h600V276H180v600Zm0-600v600-600Z"></path></svg>
                    Comments
                </div>
                <input type="text" name="Comments" placeholder="Comments..">
            </div>  
        </form>
        <button class="AddCar">+ Add New Car</button>
    </div>
</div>