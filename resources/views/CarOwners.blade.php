@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)">Name</th>
                <th onclick="sortTable(2)">Car Details</th>
                <th onclick="sortTable(3)">Registration Number</th> 
            </tr> 
            @foreach ($CarOwners as $CarOwner)
            @php 
                $CarOwners_TOTAL = \App\Models\Car::select('id')
                                                    ->where('CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%') 
                                                    ->count(); 
                $CarOwners_ACTIVE = \App\Models\Car::select('id')
                                                    ->where('CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                                    ->where('Status', 'ACTIVE')
                                                    ->count();
                $CarOwners_INACTIVE = \App\Models\Car::select('id')
                                                    ->where('CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                                    ->where('Status', 'INACTIVE')
                                                    ->count(); 
                $CarOwners_Cars = \App\Models\Car::select(['VehicleNumber', 'Maker'])
                                                    ->where('CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                                    ->get(); 
                                                    
                $CarOwners_MAINTENANCE = \App\Models\Maintenance::select(['maintenances.VehicleNumber', 'cars.VehicleNumber'])
                                            ->join('cars', 'maintenances.VehicleNumber', '=', 'cars.VehicleNumber')
                                            ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                            ->count();
                $CarOwners_REPAIRS = \App\Models\Repair::select(['repairs.VehicleNumber', 'cars.VehicleNumber'])
                                        ->join('cars', 'repairs.VehicleNumber', '=', 'cars.VehicleNumber')
                                        ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                        ->count();
                $CarOwners_REFUELING = \App\Models\Refueling::select(['refuelings.VehicleNumber', 'cars.VehicleNumber'])
                                        ->join('cars', 'refuelings.VehicleNumber', '=', 'cars.VehicleNumber')
                                        ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                        ->count();
                $CarOwners_DEPOSITS = \App\Models\Deposits::select(['deposits.VehicleNumber', 'cars.VehicleNumber'])
                                        ->join('cars', 'deposits.VehicleNumber', '=', 'cars.VehicleNumber')
                                        ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                        ->count();
                $Aggregate = $CarOwners_MAINTENANCE + $CarOwners_REPAIRS + $CarOwners_REFUELING + $CarOwners_DEPOSITS;                                                                    
  
                $SumOfMaintenance = \App\Models\Maintenance::select(['maintenances.VehicleNumber', 'cars.VehicleNumber'])
                                        ->join('cars', 'maintenances.VehicleNumber', '=', 'cars.VehicleNumber')
                                        ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                        ->sum('maintenances.Cost');             
                $SumOfRepair = \App\Models\Repair::select(['repairs.VehicleNumber', 'cars.VehicleNumber'])
                                        ->join('cars', 'repairs.VehicleNumber', '=', 'cars.VehicleNumber')
                                        ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                        ->sum('repairs.Cost');             
                $SumOfDeposits = \App\Models\Deposits::select(['deposits.VehicleNumber', 'cars.VehicleNumber'])
                                        ->join('cars', 'deposits.VehicleNumber', '=', 'cars.VehicleNumber')
                                        ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                        ->sum('deposits.Amount');             
                $SumOfRefueling = \App\Models\Refueling::select(['refuelings.VehicleNumber', 'cars.VehicleNumber'])
                                        ->join('cars', 'refuelings.VehicleNumber', '=', 'cars.VehicleNumber')
                                        ->where('cars.CarOwner', 'LIKE', '%' . $CarOwner->CarOwner . '%')
                                        ->sum('refuelings.Amount');     
                $AggregateSum = $SumOfMaintenance + $SumOfRepair + $SumOfDeposits + $SumOfRefueling;     
                
            @endphp
            <tr> 
                <td>{{ $CarOwner->id }}</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>{{ $CarOwner->CarOwner }}</h1> 
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Maintenance</span>
                                    <span>₦ {{ number_format($SumOfMaintenance) }} ({{ $CarOwners_MAINTENANCE }})</span> 
                                </div>
                                <div class="inner-x">
                                    <span>Repairs</span>
                                    <span>₦ {{ number_format($SumOfRepair) }} ({{ $CarOwners_REPAIRS }})</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Deposits</span>
                                    <span>₦ {{ number_format($SumOfDeposits) }} ({{ $CarOwners_DEPOSITS }})</span>
                                </div>
                                <div class="inner-x">
                                    <span>Refueling</span>
                                    <span>₦ {{ number_format($SumOfRefueling) }} ({{ $CarOwners_REFUELING }})</span>
                                </div>
                                <hr>
                                <div class="inner-x">
                                    <span>Aggregate</span>
                                    <span>₦ {{ number_format($AggregateSum) }} ({{ $Aggregate }})</span>
                                </div>
                                <hr>
                            </div>
                        </div>  
                    </div> 
                 </td>
                <td> 
                    <span class="active-x">ACTIVE</span> &nbsp;  {{ $CarOwners_ACTIVE }} &nbsp;&nbsp;
                    <span class="inactive-x">INACTIVE</span> &nbsp;  {{ $CarOwners_INACTIVE }} &nbsp;&nbsp;
                    <span class="total-x">TOTAL</span> &nbsp;  {{ $CarOwners_TOTAL }} &nbsp;&nbsp;
                </td>
                <td>  
                    <div class="car-owner-cars">
                        @foreach ($CarOwners_Cars as $Car)
                            {{ empty($Car->VehicleNumber) ? $loop->iteration .  ' :: '  . $CarOwner->CarOwner : $loop->iteration .  ' :: '  . $Car->VehicleNumber .  ' - ['  . $Car->Maker .  ']'  }} <br>
                        @endforeach
                    </div>
                </td> 
            </tr> 
            @endforeach 
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By #" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Names " onkeyup="FilterNames()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Car Details" onkeyup="FilterCarDetails()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Registration Number" onkeyup="FilterRegistrationNumber()"></span>  
            </div>
        </table>
        {{ $CarOwners->onEachSide(5)->links() }}
        {{-- @unless (count($CarOwners) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless --}}
    </div>
@endsection