<div class="datalist Hide">
    <h1>VEHICLE LIST</h1>
    @foreach ($Cars_Absolute as $Car)
        @if (empty($Car->VehicleNumber)) @continue @endif 
        @php
            $Car__DATA = \DB::table('cars')->select(['Status', 'Driver', 'Balance'])->where('VehicleNumber', $Car->VehicleNumber)->first();
            $CarMileage = \DB::table('refuelings')->select('Mileage')->where('VehicleNumber', $Car->VehicleNumber)->orderBy('Date', 'DESC')->first(); 
        @endphp 
        <div class="data-values">
            <span>{{ $Car->VehicleNumber }}</span>
            <span class="Hide CarCardNumber">{{ $Car->CardNumber }}</span>
            <span class="{{ $Car__DATA->Status === 'ACTIVE' ? 'active-x' : 'inactive-x' }}"></span>
            <span class="Hide"></span>
            <span>{{ $Car->Maker }} <br> {{ $Car->CardNumber }}</span>
            <span class="Hide">{{ $CarMileage->Mileage ?? 0 }}</span>
            <span class="Hide">{{ $Car__DATA->Driver ?? 'the car driver' }}</span>
            <span class="Hide">{{ $Car__DATA->Balance ?? 0 }}</span> 
        </div>
    @endforeach
</div>  