<div class="notification-readonly readonly form">
    <div class="inner">
        <div class="heading">
            <div class="cancel-modal cancel-modal-notification">✖</div>
            <h1>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m80 619 85-253q5-14 17-22t26-8h125v-73h153q-9 32-8 66.5t9 66.5H218l-54 166h478q23 8 42.5 12t44.5 4q18 0 36-2.5t35-7.5v378q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21v-54H161v54q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21V619Zm60 3v210-210Zm106 160q23 0 39.5-15.5T302 728q0-23-16.5-39.5T246 672q-23 0-38.5 16.5T192 728q0 23 15.5 38.5T246 782Zm388 0q23 0 39.5-15.5T690 728q0-23-16.5-39.5T634 672q-23 0-38.5 16.5T580 728q0 23 15.5 38.5T634 782Zm95-264q-79 0-135-56t-56-135q0-80 56-135.5T729 136q80 0 135.5 55.5T920 327q0 79-55.5 135T729 518Zm-15-161h35V214h-35v143Zm18 85q9 0 15.5-6t6.5-16q0-10-6.5-16t-15.5-6q-10 0-16 6t-6 16q0 10 6 16t16 6ZM140 832h600V622H140v210Z"></path></svg>
                Alerts & Notifications
            </h1>
            <button class="deposits-route">
                Deposits
            </button>
        </div>  
        @php
            $ActiveCars = \DB::table('cars')->select(['VehicleNumber', 'Odometer'])->whereNotNull('VehicleNumber')->where('Status', 'ACTIVE')->get();
        @endphp
        @foreach ($ActiveCars as $Car)  
            @php
                $ActiveCars_Refueling = \DB::table('refuelings')->select(['Date', 'VehicleNumber', 'Consumption', 'Mileage'])->where('VehicleNumber', $Car->VehicleNumber)->orderBy('Date', 'DESC')->first();
                $ActiveCars_Maintenance = \DB::table('maintenances')->select('Date')->where('VehicleNumber', $Car->VehicleNumber)->orderBy('Date', 'DESC')->first();
                $ActiveCars_Refueling_Mileage = \DB::table('refuelings')->select('Mileage', 'Date')->where('VehicleNumber', $Car->VehicleNumber)->whereBetween('Date', [date('Y-m-d', strtotime('-3 months')), date('Y-m-d')])->orderBy('Date', 'DESC')->sum('KM');
                $ActiveCars_Refueling_Mileage_ = \DB::table('refuelings')->select('Date')->where('VehicleNumber', $Car->VehicleNumber)->whereBetween('Date', [date('Y-m-d', strtotime('-3 months')), date('Y-m-d')])->orderBy('Date', 'DESC')->first();
            @endphp 
            @if (
                !empty($ActiveCars_Maintenance->Date) &&
                $ActiveCars_Maintenance->Date <= date('Y-m-d', strtotime('-3 months'))
            )
            <div class="inner-x"> 
                <img src="{{ asset('Images/service.png') }}"> <p><small class="vehicle-number color-x">{{ $Car->VehicleNumber }}</small> is ready for some maintenance. Don't forget to schedule a check-up to keep it running like a champ and serving its purpose. <small class="color-b color-x">maintenance</small></p> <small>{{ $ActiveCars_Maintenance->Date }}</small>
            </div>
            @endif
            @if (
                !empty($ActiveCars_Refueling->Date) &&
                $ActiveCars_Refueling->Consumption <= 3 &&
                !empty($ActiveCars_Refueling->VehicleNumber) &&
                $Car->Odometer === 'Kilometer'
            )
            <div class="inner-x">
                <img src="{{ asset('Images/service.png') }}"> <p><small class="vehicle-number color-x">{{ $ActiveCars_Refueling->VehicleNumber }}</small> is consuming fuel more than normal. Just a friendly reminder that it's time to check your vehicle's fuel consumption.<small class="color-a color-x">fuel efficiency</small> <br>* ODOMETER :: {{ $Car->Odometer }}  <br>* LAST CONSUMPTION RATE :: @ {{ round($ActiveCars_Refueling->Consumption, 1) }}</p> <small>{{ $ActiveCars_Refueling->Date }}</small>
            </div>
            @endif
            @if (
                !empty($ActiveCars_Refueling->Date) &&
                $ActiveCars_Refueling->Consumption <= 1.7 &&
                !empty($ActiveCars_Refueling->VehicleNumber) &&
                $Car->Odometer === 'Mileage'
            )
            <div class="inner-x">
                <img src="{{ asset('Images/service.png') }}"> <p><small class="vehicle-number color-x">{{ $ActiveCars_Refueling->VehicleNumber }}</small> is consuming fuel more than normal. Just a friendly reminder that it's time to check your vehicle's fuel consumption.<small class="color-a color-x">fuel efficiency</small> <br> * ODOMETER :: {{ $Car->Odometer }}  <br>  * LAST CONSUMPTION RATE :: @ {{ round($ActiveCars_Refueling->Consumption, 1) }}</p> <small>{{ $ActiveCars_Refueling->Date }}</small>
            </div>
            @endif
            @if ( 
                !empty($ActiveCars_Maintenance->Date) &&
                $ActiveCars_Maintenance->Date <= date('Y-m-d', strtotime('-3 months')) && 
                ($ActiveCars_Refueling_Mileage >= 3000) && 
                $Car->Odometer === 'Kilometer'
            )
            <div class="inner-x">
                <img src="{{ asset('Images/service.png') }}"> <p><small class="vehicle-number color-x">{{ $ActiveCars_Refueling->VehicleNumber ?? '' }}</small> has reached the 3,000 km mark! "{{ number_format($ActiveCars_Refueling_Mileage) }} km" :: It's time to give it some attention and schedule a maintenance check. Regular maintenance helps keep your vehicle in top shape and ensures its longevity. Don't forget to take care of your cars so they can take care of you on the road!<small class="color-c color-x">due for servicing</small></p> <small>{{ $ActiveCars_Refueling_Mileage_->Date }}</small>
            </div>
            @endif
            @if ( 
                !empty($ActiveCars_Maintenance->Date) &&
                $ActiveCars_Maintenance->Date <= date('Y-m-d', strtotime('-3 months')) && 
                ($ActiveCars_Refueling_Mileage >= 1864) && 
                $Car->Odometer === 'Mileage'
            )
            <div class="inner-x">
                <img src="{{ asset('Images/service.png') }}"> <p><small class="vehicle-number color-x">{{ $ActiveCars_Refueling->VehicleNumber ?? '' }}</small> has reached the 3,000 km mark! "{{ number_format($ActiveCars_Refueling_Mileage) }} miles" :: It's time to give it some attention and schedule a maintenance check. Regular maintenance helps keep your vehicle in top shape and ensures its longevity. Don't forget to take care of your cars so they can take care of you on the road!<small class="color-c color-x">due for servicing</small></p> <small>{{ $ActiveCars_Refueling_Mileage_->Date }}</small>
            </div>
            @endif
        @endforeach 
    </div>
</div>