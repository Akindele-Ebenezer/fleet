
{{-- @include('Components.AddDeposits_MasterCardComponent') --}}
{{-- @include('Components.EditDeposits_MasterCardComponent') --}}

<div class="edit-master-card-deposits-form form">
    <div class="inner">
        <div class="heading">
            <h1>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m80 619 85-253q5-14 17-22t26-8h125v-73h153q-9 32-8 66.5t9 66.5H218l-54 166h478q23 8 42.5 12t44.5 4q18 0 36-2.5t35-7.5v378q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21v-54H161v54q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21V619Zm60 3v210-210Zm106 160q23 0 39.5-15.5T302 728q0-23-16.5-39.5T246 672q-23 0-38.5 16.5T192 728q0 23 15.5 38.5T246 782Zm388 0q23 0 39.5-15.5T690 728q0-23-16.5-39.5T634 672q-23 0-38.5 16.5T580 728q0 23 15.5 38.5T634 782Zm95-264q-79 0-135-56t-56-135q0-80 56-135.5T729 136q80 0 135.5 55.5T920 327q0 79-55.5 135T729 518Zm-15-161h35V214h-35v143Zm18 85q9 0 15.5-6t6.5-16q0-10-6.5-16t-15.5-6q-10 0-16 6t-6 16q0 10 6 16t16 6ZM140 832h600V622H140v210Z"></path></svg>
                Edit Master Card Deposit
            </h1>
            <button class="refueling-route">
                Refueling
            </button>
        </div> 
        <form class="EditMasterCardDepositsForm">
            <div class="cancel-modal">✖</div> 
            <div class="new-car-inputs readonly">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M405 782h361V524H405v258ZM140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm0-60h680V316H140v520Zm0 0V316v520Z"></path></svg>
                    Card Number 
                </div>
                <input class="CardNumber_MasterCard_X" name="CardNumber" type="text">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Zm300 230q-17 0-28.5-11.5T440 616q0-17 11.5-28.5T480 576q17 0 28.5 11.5T520 616q0 17-11.5 28.5T480 656Zm-160 0q-17 0-28.5-11.5T280 616q0-17 11.5-28.5T320 576q17 0 28.5 11.5T360 616q0 17-11.5 28.5T320 656Zm320 0q-17 0-28.5-11.5T600 616q0-17 11.5-28.5T640 576q17 0 28.5 11.5T680 616q0 17-11.5 28.5T640 656ZM480 816q-17 0-28.5-11.5T440 776q0-17 11.5-28.5T480 736q17 0 28.5 11.5T520 776q0 17-11.5 28.5T480 816Zm-160 0q-17 0-28.5-11.5T280 776q0-17 11.5-28.5T320 736q17 0 28.5 11.5T360 776q0 17-11.5 28.5T320 816Zm320 0q-17 0-28.5-11.5T600 776q0-17 11.5-28.5T640 736q17 0 28.5 11.5T680 776q0 17-11.5 28.5T640 816Z"></path></svg>
                    Date
                </div>
                <input class="Date_MasterCard_X" name="Date" type="date">
            </div>
            <div class="new-car-inputs readonly">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M880 316v520q0 24-18 42t-42 18H140q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42ZM140 425h680V316H140v109Zm0 129v282h680V554H140Zm0 282V316v520Z"></path></svg>
                    Amount	
                </div>
                <input class="Amount_MasterCard_X" name="Amount" type="number" placeholder="Amount	..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M306 662q-17 0-28.5-11.5T266 622q0-17 11.5-28.5T306 582q17 0 28.5 11.5T346 622q0 17-11.5 28.5T306 662Zm177 0q-17 0-28.5-11.5T443 622q0-17 11.5-28.5T483 582q17 0 28.5 11.5T523 622q0 17-11.5 28.5T483 662Zm170 0q-17 0-28.5-11.5T613 622q0-17 11.5-28.5T653 582q17 0 28.5 11.5T693 622q0 17-11.5 28.5T653 662ZM180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Z"></path></svg>
                    Year		
                </div>
                <input class="Year_MasterCard_X" name="Year" type="text">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M405 782h361V524H405v258ZM140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm0-60h680V316H140v520Zm0 0V316v520Z"></path></svg>
                    Week	
                </div>
                <input class="Week_MasterCard_X" name="Week" type="text" placeholder="Week	..">
            </div>
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M450 855h60v-40h60q12.75 0 21.375-8.625T600 785V655q0-12.75-8.625-21.375T570 625H420v-70h180v-60h-90v-40h-60v40h-60q-12.75 0-21.375 8.625T360 525v130q0 12.75 8.625 21.375T390 685h150v70H360v60h90v40ZM220 976q-24 0-42-18t-18-42V236q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm311-581V236H220v680h520V395H531ZM220 236v159-159 680-680Z"></path></svg>
                    Month	
                </div>
                <input class="Month_MasterCard_X" name="Month" type="text" placeholder="Month	..">
            </div> 
            <input type="hidden" name="DepositsId" class="DepositsId_MasterCard_X">
        </form>
        <button class="EditMasterCardDeposits">+ Edit Master Card Deposit</button>
        <button class="ReverseMasterCardDeposits">- Reverse Transaction</button>
    </div>
</div>