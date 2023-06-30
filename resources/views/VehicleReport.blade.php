@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">ORG</th>
                <th onclick="sortTable(1)">Car Number</th>
                <th onclick="sortTable(2)">Refueling</th>
                <th onclick="sortTable(3)">Balance</th>
                <th onclick="sortTable(4)">To Deposit</th>
                <th onclick="sortTable(5)">Comments</th> 
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
                <td class="id">
                    {{ $Car->CompanyCode }}
                    <br>
                    <button class="action-x">{{ $Companies->CompanyName ?? 0 }}</button>
                </td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>{{ $Car->VehicleNumber }}</h1>
                                <span class="used-by">{{ $Car->CarOwner }}</span>
                                <span class="{{ $Car->Status  === 'ACTIVE' ? 'active' : 'inactive' }}">{{ $Car->Status }}</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Card Number</span>
                                    <span>{{ $Car->CardNumber }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ {{ empty($Car->MonthlyBudget) ? '' : number_format($Car->MonthlyBudget) }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>{{ $Car->ChassisNumber }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>Driver</span>
                                    <span>{{ $Car->Driver }}</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>{{ $Car->Model }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>Deposits</span>
                                    <span>₦ {{ empty($TotalDeposits) ? '' : number_format($TotalDeposits) }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span> {{ $Car->PinCode }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>Maker</span>
                                    <span>{{ $Car->Maker }}</span>
                                </div>
                            </div>
                            <div class="icons">
                                <img src="{{ asset('Images/folder.png')}}" class="open-document icon">  
                                <span class="Hide">{{$Car->VehicleNumber }}</span>
                            </div>
                        </div> 
                    </div>
                    <span class="Deposits_X_DATA Hide">₦ {{ empty($TotalDeposits) ? '0.00' : number_format($TotalDeposits) }}</span>
                    <span class="Refueling_X_DATA Hide">₦ {{ empty($TotalRefueling) ? '0.00' : number_format($TotalRefueling) }}</span>
                    <span class="Balance_X_DATA Hide">₦ {{ empty($Car->Balance) ? '0.00' : number_format($Car->Balance) }}</span>
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
                <td class="refueling">₦ {{ empty($TotalRefueling) ? '' : number_format($TotalRefueling) }}</td>
                <td class="balance">₦ {{ empty($Car->Balance) ? '' : number_format($Car->Balance) }}</td>
                <td class="to-deposit">₦ {{ empty($TotalDeposits) ? '' : number_format($TotalDeposits) }}</td>
                <td class="comments"> {{ substr($Car->Comments, 0, 25) }}{{ strlen($Car->Comments) > 25 ? '...' : '' }}</td>
            </tr>  
            @endforeach 
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By ORG" onkeyup="FilterORG()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Car Number" onkeyup="FilterCarNumber()"></span>  
                <span><input type="text" id="SearchInput2" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By To Deposit" onkeyup="FilterToDeposit()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Comments.." onkeyup="FilterComments()"></span> 
            </div>
        </table>
        {{ $Cars->onEachSide(5)->links() }} 
    </div> 
@endsection