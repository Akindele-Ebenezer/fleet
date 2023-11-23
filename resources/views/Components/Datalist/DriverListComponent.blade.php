<div class="datalist Hide">
    <h1>DRIVERS LIST</h1>
    <div class="data-values">
        <span>Chief Driver</span> 
    </div>
    <div class="data-values">
        <span>Transport Officer</span> 
    </div>
    @foreach ($Drivers as $Driver)
        <div class="data-values">
            <span>{{ $Driver->Driver }}</span> 
        </div>
    @endforeach
</div> 