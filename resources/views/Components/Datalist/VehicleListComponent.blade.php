<div class="datalist Hide">
    <h1>VEHICLE LIST</h1>
    @foreach ($Cars_Absolute as $Car)
        @if (empty($Car->VehicleNumber)) @continue @endif 
        @php
            $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Car->VehicleNumber)->first();
            $CarMileage = \App\Models\Refueling::select('Mileage')->where('VehicleNumber', $Car->VehicleNumber)->orderBy('Date', 'DESC')->first(); 
            $CarDriver = \App\Models\Car::select('Driver')->where('VehicleNumber', $Car->VehicleNumber)->first(); 
            $CarBalance = \App\Models\Car::select('Balance')->where('VehicleNumber', $Car->VehicleNumber)->first(); 
        @endphp 
        <div class="data-values">
            <span>{{ $Car->VehicleNumber }}</span>
            <span class="Hide">{{ $Car->CardNumber }}</span>
            <span class="{{ $CarStatus->Status === 'ACTIVE' ? 'active-x' : 'inactive-x' }}"></span>
            <span class="Hide"></span>
            <span>{{ $Car->Maker }} <br> {{ $Car->CardNumber }}</span>
            <span class="Hide">{{ $CarMileage->Mileage ?? 0 }}</span>
            <span class="Hide">{{ $CarDriver->Driver ?? 'the car driver' }}</span>
            <span class="Hide">{{ $CarBalance->Balance ?? 0 }}</span>
        </div>
    @endforeach
</div>  