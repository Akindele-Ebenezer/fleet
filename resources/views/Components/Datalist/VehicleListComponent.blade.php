<div class="datalist Hide">
    <h1>VEHICLE LIST</h1>
    @foreach ($Cars_Absolute as $Car)
        @if (empty($Car->VehicleNumber)) @continue @endif 
        @php
            $CarStatus = \DB::table('cars')->select('Status')->where('VehicleNumber', $Car->VehicleNumber)->first();
            $CarMileage = \DB::table('refuelings')->select('Mileage')->where('VehicleNumber', $Car->VehicleNumber)->orderBy('Date', 'DESC')->first(); 
            $CarDriver = \DB::table('cars')->select('Driver')->where('VehicleNumber', $Car->VehicleNumber)->first(); 
            $CarBalance = \DB::table('cars')->select('Balance')->where('VehicleNumber', $Car->VehicleNumber)->first(); 
        @endphp 
        <div class="data-values">
            <span>{{ $Car->VehicleNumber }}</span>
            <span class="Hide CarCardNumber">{{ $Car->CardNumber }}</span>
            <span class="{{ $CarStatus->Status === 'ACTIVE' ? 'active-x' : 'inactive-x' }}"></span>
            <span class="Hide"></span>
            <span>{{ $Car->Maker }} <br> {{ $Car->CardNumber }}</span>
            <span class="Hide">{{ $CarMileage->Mileage ?? 0 }}</span>
            <span class="Hide">{{ $CarDriver->Driver ?? 'the car driver' }}</span>
            <span class="Hide">{{ $CarBalance->Balance ?? 0 }}</span> 
        </div>
    @endforeach
</div>  