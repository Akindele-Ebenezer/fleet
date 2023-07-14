<div class="datalist Hide">
    <h1>DRIVERS LIST</h1>
    @foreach ($Drivers as $Driver)
        <div class="data-values">
            <span>{{ $Driver->Driver }}</span> 
        </div>
    @endforeach
</div> 