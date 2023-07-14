<div class="datalist Hide">
    <h1>VEHICLE LIST</h1>
    @foreach ($Cars_Absolute as $Car)
        @if (empty($Car->VehicleNumber)) @continue @endif 
        @php
            $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Car->VehicleNumber)->first();  
        @endphp 
        <div class="data-values">
            <span>{{ $Car->VehicleNumber }}</span>
            <span class="Hide">{{ $Car->CardNumber }}</span>
            <span class="{{ $CarStatus->Status === 'ACTIVE' ? 'active-x' : 'inactive-x' }}"></span>
            <span class="Hide"></span>
            <span>{{ $Car->Maker }} <br> {{ $Car->CardNumber }}</span>
        </div>
    @endforeach
</div>  