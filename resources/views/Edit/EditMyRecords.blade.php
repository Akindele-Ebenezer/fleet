@extends('Layouts.Layout2')

@section('Title', 'REGISTERATION') 
@section('Heading', 'REGISTERATION') 
@include('Components.EditCarPropertiesComponent')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">ID</th>
                <th onclick="sortTable(1)">CARS</th> 
                <th onclick="sortTable(2)">Engine Volume</th>
                <th onclick="sortTable(3)">Refueling</th>
                <th onclick="sortTable(4)">Balance</th>
            </tr>  
            @foreach ($Cars__MyRecords as $Car)
                @php include('../resources/views/Includes/CompanyName.php') @endphp
                <tr>  
                    <td class="id">{{ $Car->id }}</td>
                    <td>
                        <div class="car-info">
                            <div class="info-inner">
                                <div class="inner">
                                    <h1>{{ $Car->Maker }}</h1>
                                    <span class="used-by">{{ $Car->CarOwner }}</span>
                                    <span class="{{ $Car->Status  === 'ACTIVE' ? 'active' : 'inactive' }}">{{ $Car->Status }}</span>
                                </div>
                                <div class="inner">
                                    <div class="inner-x">
                                        <span>Monthly Budget</span>
                                        <span>₦ {{ empty($Car->MonthlyBudget) ? '' : number_format($Car->MonthlyBudget) }}</span>
                                    </div>
                                    <div class="inner-x">
                                        <span>CARD Number</span>
                                        <span>{{ $Car->CardNumber }}</span>
                                    </div>
                                    <div class="inner-x">
                                        <span>Model</span>
                                        <span>{{ $Car->Model }}</span>
                                    </div>
                                    <div class="inner-x">
                                        <span>Total Deposits</span>
                                        <span>₦ {{ empty($Car->TotalDeposits) ? '' : number_format($Car->TotalDeposits) }}</span>
                                    </div>
                                </div>
                                <div class="inner">
                                    <div class="inner-x">
                                        <span>Registration No</span>
                                        <span>{{ $Car->VehicleNumber }}</span>
                                    </div>
                                    <div class="inner-x">
                                        <span>Chassis Number</span>
                                        <span>{{ $Car->ChassisNumber }}</span>
                                    </div>
                                    <div class="inner-x">
                                        <span>PIN Code</span>
                                        <span>{{ $Car->PinCode }}</span>
                                    </div>
                                    <div class="inner-x">
                                        <span>Purchase Date</span>
                                        <span>{{ $Car->PurchaseDate }}</span>
                                    </div>
                                </div>
                                <button class="action-x open-document">document</button>
                                <span class="Hide">{{$Car->VehicleNumber }}</span>
                            </div>
                            <div class="stats-heading">
                                <h2>STATS</h2>
                                <button class="action-x show-record-button">edit</button>
                                <span class="Deposits_X_DATA Hide">₦ {{ empty($Car->TotalDeposits) ? '' : number_format($Car->TotalDeposits) }}</span>
                                <span class="Refueling_X_DATA Hide">₦ {{ empty($Car->TotalRefueling) ? '' : number_format($Car->TotalRefueling) }}</span>
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
                                <span class="Status_X_DATA_X Hide">{{ $Car->Status }}</span>
                                <span class="Comments_X_DATA_X Hide">{{ $Car->Comments }}</span>
                                <span class="CarId_X_DATA_X Hide">{{ $Car->id }}</span> 
                                <span class="BalanceBroughtForward_X_DATA Hide">{{ $Car->MonthlyBudget - $Car->Balance }}</span>
                            </div>
                            <div class="stats">
                                <div class="inner">
                                    <h3>Vehicle Number</h3>
                                    <span>{{ $Car->VehicleNumber }}</span>
                                </div> 
                                <div class="inner">
                                    <h3>Refueling</h3>
                                    <span>₦ {{ empty($Car->TotalRefueling) ? '' : number_format( $Car->TotalRefueling) }}</span>
                                </div> 
                                <div class="inner">
                                    <h3>Price</h3>
                                    <span>₦ {{ empty($Car->Price) ? '' : number_format( $Car->Price) }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Driver</h3>
                                    <span>{{ $Car->Driver }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Supplier</h3>
                                    <span>{{ $Car->Supplier }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Organisation</h3>
                                    <span>{{ $Car->CompanyCode }} - {{ $Companies->CompanyName ?? 0 }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Engine Type</h3>
                                    <span>{{ $Car->EngineType }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Stop Date</h3>
                                    <span>{{ $Car->StopDate }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Sub Model</h3>
                                    <span>{{ $Car->SubModel }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Model Year</h3>
                                    <span>{{ $Car->ModelYear }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Engine Volume</h3>
                                    <span>{{ $Car->EngineVolume }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Licence Expiry Date</h3>
                                    <span>{{ $Car->LicenceExpiryDate }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Insurance Expiry Date</h3>
                                    <span>{{ $Car->InsuranceExpiryDate }}</span>
                                </div>
                                <div class="inner">
                                    <h3>Fuel Tank Capacity</h3>
                                    <span>{{ $Car->FuelTankCapacity }}</span>
                                </div>
                            </div> 
                        </div>
                        <span class="Deposits_X_DATA Hide">₦ {{ empty($Car->TotalDeposits) ? '' : number_format($Car->TotalDeposits) }}</span>
                        <span class="Refueling_X_DATA Hide">₦ {{ empty($Car->TotalRefueling) ? '' : number_format($Car->TotalRefueling) }}</span>
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
                        <span class="Status_X_DATA_X Hide">{{ $Car->Status }}</span>
                        <span class="Comments_X_DATA_X Hide">{{ $Car->Comments }}</span>
                        <span class="CarId_X_DATA_X Hide">{{ $Car->id }}</span> 
                        <span class="BalanceBroughtForward_X_DATA Hide">{{ $Car->MonthlyBudget - $Car->Balance }}</span>
                    </td>
                    <td class="engine-volume">{{ $Car->EngineVolume }}</td>
                    <td class="refueling">₦ {{ empty($Car->TotalRefueling) ? '' : number_format($Car->TotalRefueling) }}</td>
                    <td class="balance">₦ {{ empty($Car->Balance) ? '' : number_format($Car->Balance) }}</td>
                </tr>
            @endforeach
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By ID" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Cars Column.. " onkeyup="FilterCars()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Engine Volume" onkeyup="FilterEngineVolume()"></span>  
                <span><input type="text" id="SearchInput3" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span>  
                <span><input type="text" id="SearchInput4" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span>   
            </div>
        </table>
        @unless (count($Cars__MyRecords) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
    <script>
        let OpenCarPropertiesForm_Button = document.querySelector('.open-vehicle-properties-form-button');
        let AddCarProperties = document.querySelector('.add-vehicle-properties');
        let AddCarPropertiesForm = document.querySelector('.AddCarPropertiesForm');
        let ManageCarProperties_Button = document.querySelector('.manage-vehicle-properties-button');

        OpenCarPropertiesForm_Button.addEventListener('click', () => {
            AddCarProperties.style.display = 'block';

            let CancelModalIcons = document.querySelectorAll('.cancel-modal');

            CancelModalIcons.forEach(CancelModalIcon => {
                CancelModalIcon.addEventListener('click', () => {
                    AddCarProperties.style.display = 'none';
                });
            });

            ManageCarProperties_Button.addEventListener('click', () => { 
                AddCarPropertiesForm.setAttribute('method', 'POST');
                AddCarPropertiesForm.setAttribute('action', 'Add/Properties');
                AddCarPropertiesForm.submit(); 
            });
        });
    </script>
    {{ $Cars__MyRecords->onEachSide(1)->links() }}
@endsection
