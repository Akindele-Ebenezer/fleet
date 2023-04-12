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
            @foreach ($Cars as $Car)
            @php include('../resources/views/Includes/CompanyName.php') @endphp
            <tr> 
                <td class="id">
                    {{ $Car->CompanyCode }}
                    <br>
                    <button class="action-x">{{ $Companies->CompanyName }}</button>
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
                                    <span>₦ {{ number_format($Car->MonthlyBudget) }}</span>
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
                                    <span>₦ {{ number_format($Car->TotalDeposits) }}</span>
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
                        </div>
                        <div class="stats-heading">
                            <h2></h2>
                            <button class="action-x show-record-button">action</button>
                            <span class="Deposits_X_DATA Hide">₦ {{ number_format($Car->TotalDeposits) }}</span>
                            <span class="Refueling_X_DATA Hide">₦ {{ number_format($Car->TotalRefueling) }}</span>
                            <span class="Balance_X_DATA Hide">₦ {{ number_format($Car->Balance) }}</span>
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
                            <span class="Price_X_DATA Hide">₦ {{ number_format($Car->Price) }}</span>
                            <span class="CompanyCode_X_DATA Hide">{{ $Car->CompanyCode }}</span>
                            <span class="LicenceExpiryDate_X_DATA Hide">{{ $Car->LicenceExpiryDate }}</span>
                            <span class="InsuranceExpiryDate_X_DATA Hide">{{ $Car->InsuranceExpiryDate }}</span>
                            <span class="CardNo_X_DATA Hide">{{ $Car->CardNumber }}</span>
                            <span class="PinCode_X_DATA Hide">{{ $Car->PinCode }}</span>
                            <span class="FuelMonthly_X_DATA Hide">₦ {{ number_format($Car->MonthlyBudget) }}</span>
                            <span class="FuelTankCapacity_X_DATA Hide">{{ $Car->FuelTankCapacity }}</span>
                            <span class="EngineVolume_X_DATA Hide">{{ $Car->EngineVolume }}</span>
                            <span class="ModelYear_X_DATA Hide">{{ $Car->ModelYear }}</span>
                            <span class="StopDate_X_DATA Hide">{{ $Car->StopDate }}</span>
                            <span class="Driver_X_DATA Hide">{{ $Car->Driver }}</span>
                            <span class="Status_X_DATA Hide">{{ $Car->Status  === 'ACTIVE' ? 'This CAR is active since ' . $Car->PurchaseDate . '. Licence Expires on ' . $Car->LicenceExpiryDate . '.'  : 'This CAR is inactive. Licence Expires on ' . $Car->LicenceExpiryDate . '..' }}</span>
                        </div> 
                    </div>
                </td>
                <td class="refueling">₦ {{ number_format($Car->TotalRefueling) }}</td>
                <td class="balance">₦ {{ number_format($Car->Balance) }}</td>
                <td class="to-deposit">₦ {{ number_format($Car->TotalDeposits) }}</td>
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
        @unless (count($Cars) > 1)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div> 
@endsection