@extends('Layouts.Layout2')

@section('Title', 'FLEET DB') 
@section('Heading', 'FLEET DB') 

@section('Content')
    <div class="table-wrapper"> 
        <table class="table list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">ID</th>
                <th onclick="sortTable(1)">CARS</th> 
                <th onclick="sortTable(2)">Engine Volume</th> 
                <th onclick="sortTable(2)">Used By</th> 
                <th onclick="sortTable(2)">Driver</th> 
                <th onclick="sortTable(2)">Make</th> 
                <th onclick="sortTable(2)">Model</th> 
                <th onclick="sortTable(2)">Card Number</th> 
                <th onclick="sortTable(2)">Monthly Budget</th> 
                <th onclick="sortTable(2)">Deposits</th> 
                <th onclick="sortTable(2)">Refueling</th> 
                <th onclick="sortTable(2)">Balance</th> 
                <th onclick="sortTable(2)">To Deposits</th> 
            </tr>  
            @unless (count($Cars) > 0)
            <tr>
                <td>No cars available.</td>
            </tr>    
            @endunless
            @foreach ($Cars as $Car)
                @php 
                    include('../resources/views/Includes/CompanyName.php'); 
                    $TotalDeposits = \App\Models\Deposits::where('VehicleNumber', $Car->VehicleNumber)->sum('Amount');
                    $TotalRefueling = \App\Models\Refueling::where('VehicleNumber', $Car->VehicleNumber)->sum('Amount');
                    $Mileage = \App\Models\Refueling::select('Mileage')->where('VehicleNumber', $Car->VehicleNumber)->orderBy('id', 'DESC')->first();
                @endphp  
                <tr> 
                    <td class=" ">{{ $loop->iteration  + (($Cars->currentPage() -1) * $Cars->perPage()) }}</td>
                    <td class="car">
                        <div class="car-info">
                            <div class="info-inner">
                                <span class="{{ $Car->Status }} car-status"></span>
                                <div class="">
                                    <h1 class="vehicle-number">{{ $Car->VehicleNumber }}</h1> 
                                </div> 
                                <div class="icons">
                                    <img src="{{ asset('Images/folder.png')}}" class="open-document icon"> 
                                    <span class="Hide">{{$Car->VehicleNumber }}</span>
                                    <img src="{{ asset('Images/graph.png')}}" class="open-analytics icon"> 
                                    <span class="Hide">{{$Car->VehicleNumber }}</span>
                                </div>
                            </div> 
                        </div>
                        <span class="Deposits_X_DATA Hide">₦ {{ empty($TotalDeposits) ? '0.00' : number_format($TotalDeposits) }}</span>
                        {{-- <span class="Refueling_X_DATA Hide">₦ {{ empty($Car->TotalRefueling) ? '' : number_format($Car->TotalRefueling) }}</span> --}}
                        <span class="Deposits_X_DATA Hide">₦ {{ empty($TotalRefueling) ? '0.00' : number_format($TotalRefueling) }}</span>
                        <span class="Balance_X_DATA Hide">₦ {{ empty($Car->Balance) ? '' : number_format($Car->Balance) }}</span>
                        <span class="UsedBy_X_DATA Hide">{{ $Car->CarOwner }}</span>
                        <span class="RegistrationNo_X_DATA Hide">{{ $Car->VehicleNumber }}</span>
                        <span class="Maker_X_DATA Hide">{{ $Car->Maker }}</span>
                        <span class="Model_X_DATA Hide">{{ $Car->Model }}</span>
                        <span class="SubModel_X_DATA Hide">{{ $Car->SubModel }}</span>
                        <span class="EngineType_X_DATA Hide">{{ $Car->EngineType }}</span>
                        <span class="GearType_X_DATA Hide">{{ $Car->GearType }}</span>
                        <span class="EngineNo_X_DATA Hide">{{ $Car->EngineNumber }}</span>
                        <span class="ChasisNo_X_DATA Hide">{{ $Car->ChassisNumber }}</span>
                        <span class="PurchaseDate_X_DATA Hide">{{ $Car->PurchaseDate }}</span>
                        <span class="Supplier_X_DATA Hide">{{ $Car->Supplier }}</span>
                        <span class="Price_X_DATA Hide">₦ {{ empty($Car->Price) ? '' : number_format($Car->Price) }}</span>
                        <span class="CompanyCode_X_DATA Hide">{{ $Car->CompanyCode }}</span>
                        <span class="LicenceExpiryDate_X_DATA Hide">{{ $Car->LicenceExpiryDate }}</span>
                        <span class="InsuranceExpiryDate_X_DATA Hide">{{ $Car->InsuranceExpiryDate }}</span>
                        <span class="CardNo_X_DATA Hide">{{ $Car->CardNumber }}</span>
                        <span class="PinCode_X_DATA Hide">{{ $Car->PinCode }}</span>
                        <span class="FuelMonthly_X_DATA Hide">₦ {{ empty($Car->MonthlyBudget) ? '' : number_format($Car->MonthlyBudget) }}</span>
                        <span class="FuelTankCapacity_X_DATA Hide">{{ $Car->FuelTankCapacity }}</span>
                        <span class="EngineVolume_X_DATA Hide">{{ $Car->EngineVolume }}</span>
                        <span class="ModelYear_X_DATA Hide">{{ $Car->ModelYear }}</span>
                        <span class="StopDate_X_DATA Hide">{{ $Car->StopDate }}</span>
                        <span class="Driver_X_DATA Hide">{{ $Car->Driver }}</span>
                        <span class="Status_X_DATA Hide">{{ $Car->Status  === 'ACTIVE' ? 'This CAR is active since ' . $Car->PurchaseDate . '. Licence Expires on ' . $Car->LicenceExpiryDate . '.'  : 'This CAR is inactive. Licence Expires on ' . $Car->LicenceExpiryDate . '..' }}</span>
                        <span class="BalanceBroughtForward_X_DATA Hide">{{ $Car->MonthlyBudget - $Car->Balance }}</span>
                        <span class="Mileage_X_DATA Hide">{{ $Mileage->Mileage ?? 'PENDING' }}</span> 
                    </td>
                    <td class="engine-volume">{{ $Car->EngineVolume }}</td>  
                    <td class="car-owners-x underline">{{ $Car->CarOwner }}</td>
                    <td class="drivers-x underline">{{ $Car->Driver }}</td>
                    <td class="make-x underline">{{ $Car->Maker }}</td>
                    <td class="models-x underline">{{ $Car->Model }}</td>
                    <td class="card-numbers-x underline">{{ $Car->CardNumber }}</td>
                    <td>₦ {{ number_format($Car->MonthlyBudget) }}</td>
                    <td>₦ {{ number_format($TotalDeposits ?? 0) }}</td>
                    <td>₦ {{ number_format($TotalRefueling ?? 0) }}</td>
                    <td>₦ {{ number_format($Car->Balance) }}</td>
                    <td>₦ {{ number_format($Car->MonthlyBudget - $Car->Balance) }}</td>
                </tr>
            @endforeach
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By ID" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Cars Column.. " onkeyup="FilterCars()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Engine Volume" onkeyup="FilterEngineVolume()"></span>  
                <span><input type="text" id="SearchInput3" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span>  
                <span><input type="text" id="SearchInput4" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span>   
            </div>
            {{ $Cars->onEachSide(1)->links() }}
        </table> 
        @unless (count($Cars) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection