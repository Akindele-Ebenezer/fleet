<div class="add-refueling-form form">
    <div class="inner">
        <div class="error"></div>
        <div class="heading">
            <h1>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m80 619 85-253q5-14 17-22t26-8h125v-73h153q-9 32-8 66.5t9 66.5H218l-54 166h478q23 8 42.5 12t44.5 4q18 0 36-2.5t35-7.5v378q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21v-54H161v54q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21V619Zm60 3v210-210Zm106 160q23 0 39.5-15.5T302 728q0-23-16.5-39.5T246 672q-23 0-38.5 16.5T192 728q0 23 15.5 38.5T246 782Zm388 0q23 0 39.5-15.5T690 728q0-23-16.5-39.5T634 672q-23 0-38.5 16.5T580 728q0 23 15.5 38.5T634 782Zm95-264q-79 0-135-56t-56-135q0-80 56-135.5T729 136q80 0 135.5 55.5T920 327q0 79-55.5 135T729 518Zm-15-161h35V214h-35v143Zm18 85q9 0 15.5-6t6.5-16q0-10-6.5-16t-15.5-6q-10 0-16 6t-6 16q0 10 6 16t16 6ZM140 832h600V622H140v210Z"></path></svg>
                Refueling 
            </h1>
            <button class="deposits-route">
                Deposits
            </button>
        </div> 
        @php
            $MasterCardBalance = \App\Models\MasterCard::select('Balance')->orderBy('Date', 'DESC')->first();
            // $VoucherCardBalance = \DB::table('voucher_cards')->select('Balance')->orderBy('Date', 'DESC')->first();
            $VoucherCardBalance = \DB::table('voucher_cards')->select(['CardNumber', 'Balance'])->orderBy('Date', 'DESC')->get();
        @endphp
        <div class="car-data">
            <div class="data-x">Previous Mileage <br> <span class="Car-Data-Mileage">0</span></div>
            <div class="data-x">Balance <br> <span class="Car-Data-Balance">₦ 0</span></div>
            <div class="data-x">Driver <br> <span class="Car-Data-Driver">Null</span></div>
            <div class="data-x">Balance (MASTER) <br> <span>₦ {{ empty($MasterCardBalance) ? 0 : number_format($MasterCardBalance->Balance) ?? 0 }}</span></div>
            @foreach ($VoucherCardBalance as $VoucherCard)
            <div class="data-x">Balance (VOUCHER) <br> <span>{{ $VoucherCard->CardNumber }}: ₦ {{ empty($VoucherCardBalance) ? 0 : number_format($VoucherCard->Balance) ?? 0 }}</span></div>
            @endforeach
        </div>
        <form class="AddRefuelingForm">
            <div class="cancel-modal">✖</div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                    Vehicle Number	
                </div>
                <input type="text" placeholder="PLATE Number	.." name="VehicleNumber_REFUELING" autocomplete="off" class="datalist-input">
                @include('Components.Datalist.VehicleListComponent')
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Zm300 230q-17 0-28.5-11.5T440 616q0-17 11.5-28.5T480 576q17 0 28.5 11.5T520 616q0 17-11.5 28.5T480 656Zm-160 0q-17 0-28.5-11.5T280 616q0-17 11.5-28.5T320 576q17 0 28.5 11.5T360 616q0 17-11.5 28.5T320 656Zm320 0q-17 0-28.5-11.5T600 616q0-17 11.5-28.5T640 576q17 0 28.5 11.5T680 616q0 17-11.5 28.5T640 656ZM480 816q-17 0-28.5-11.5T440 776q0-17 11.5-28.5T480 736q17 0 28.5 11.5T520 776q0 17-11.5 28.5T480 816Zm-160 0q-17 0-28.5-11.5T280 776q0-17 11.5-28.5T320 736q17 0 28.5 11.5T360 776q0 17-11.5 28.5T320 816Zm320 0q-17 0-28.5-11.5T600 776q0-17 11.5-28.5T640 736q17 0 28.5 11.5T680 776q0 17-11.5 28.5T640 816Z"></path></svg>
                    Date
                </div>
                <input  type="date" name="Date" value="{{ date('Y-m-d') }}">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M405 782h361V524H405v258ZM140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm0-60h680V316H140v520Zm0 0V316v520Z"></path></svg>
                    Time 
                </div>
                <input  type="time" step='any' name="Time" value="{{ date('h:i') }}">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M880 316v520q0 24-18 42t-42 18H140q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42ZM140 425h680V316H140v109Zm0 129v282h680V554H140Zm0 282V316v520Z"></path></svg>
                    Mileage	
                </div>
                <input  type="number" placeholder="KM Traveled	.." name="Mileage">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M306 662q-17 0-28.5-11.5T266 622q0-17 11.5-28.5T306 582q17 0 28.5 11.5T346 622q0 17-11.5 28.5T306 662Zm177 0q-17 0-28.5-11.5T443 622q0-17 11.5-28.5T483 582q17 0 28.5 11.5T523 622q0 17-11.5 28.5T483 662Zm170 0q-17 0-28.5-11.5T613 622q0-17 11.5-28.5T653 582q17 0 28.5 11.5T693 622q0 17-11.5 28.5T653 662ZM180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Z"></path></svg>
                    Terminal Number		
                </div>
                <input  type="text" placeholder="Terminal Number	.." name="TerminalNumber">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M405 782h361V524H405v258ZM140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm0-60h680V316H140v520Zm0 0V316v520Z"></path></svg>
                    Card Number	
                </div> 
                <select name="CardNumber" class="CardNumber_Select">
                    <option value="" class="fleet-card"></option>
                    @foreach (\App\Models\MasterCard::select('CardNumber')->where('Status', 'ACTIVE')->groupBy('CardNumber')->get() as $MasterCard)
                        <option value="{{ $MasterCard->CardNumber }}" class="master-card">MASTER CARD :: {{ $MasterCard->CardNumber }}</option>
                    @endforeach
                    @foreach (\DB::table('voucher_cards')->select('CardNumber')->where('Status', 'ACTIVE')->groupBy('CardNumber')->get() as $VoucherCard)
                        <option value="{{ $VoucherCard->CardNumber }}" class="voucher-card">VOUCHER CARD :: {{ $VoucherCard->CardNumber }}</option>
                    @endforeach
                </select>
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M450 855h60v-40h60q12.75 0 21.375-8.625T600 785V655q0-12.75-8.625-21.375T570 625H420v-70h180v-60h-90v-40h-60v40h-60q-12.75 0-21.375 8.625T360 525v130q0 12.75 8.625 21.375T390 685h150v70H360v60h90v40ZM220 976q-24 0-42-18t-18-42V236q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm311-581V236H220v680h520V395H531ZM220 236v159-159 680-680Z"></path></svg>
                    Quantity	
                </div>
                <input  type="text" placeholder="Quantity	.." name="Quantity">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M680 976v-60h100v-30h-60v-60h60v-30H680v-60h120q17 0 28.5 11.5T840 776v40q0 17-11.5 28.5T800 856q17 0 28.5 11.5T840 896v40q0 17-11.5 28.5T800 976H680Zm0-280V586q0-17 11.5-28.5T720 546h60v-30H680v-60h120q17 0 28.5 11.5T840 496v70q0 17-11.5 28.5T800 606h-60v30h100v60H680Zm60-280V236h-60v-60h120v240h-60ZM120 847v-60h471v60H120Zm0-243v-60h471v60H120Zm0-243v-60h471v60H120Z"></path></svg>
                    Amount
                </div>
                <input  type="number" placeholder="Amount.." name="Amount">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M386 677h87q24.75 0 42.375-18T533 617V415q0-24-17.625-42T473 355h-71q-24 0-42 18t-18 42v71q0 24 18 42t42 18h71v71h-87v60Zm87-191h-71v-71h71v71ZM260 856q-24 0-42-18t-18-42V236q0-24 18-42t42-18h560q24 0 42 18t18 42v560q0 24-18 42t-42 18H260Zm0-60h560V236H260v560ZM140 976q-24 0-42-18t-18-42V296h60v620h620v60H140Zm120-740v560-560Zm406 395h60v-87h83v-60h-83v-83h-60v83h-83v60h83v87Z"></path></svg>
                    Receipt Number
                </div>
                <input  type="text" placeholder="Receipt Number.." name="ReceiptNumber">
            </div>   
            <input type="hidden" name="CardType" class="CardType">      
            <input type="hidden" name="CarMileage" class="CarMileage">      
            <input type="hidden" name="CarDriver" class="CarDriver">      
            <input type="hidden" name="CarBalance" class="CarBalance">      
            <input type="hidden" name="CarCardNumber_" class="CarCardNumber_">      
        </form>
        <button class="AddRefueling">+ Refuel</button>
    </div>
</div>