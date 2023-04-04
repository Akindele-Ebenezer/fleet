@extends('Layouts.Layout2')

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
                    {{-- <td class="id">{{ $loop->iteration }}</td> --}}
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
                                        <span>₦ {{ number_format($Car->MonthlyBudget) }}</span>
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
                                        <span>₦ {{ number_format($Car->TotalDeposits) }}</span>
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
                            </div>
                            <div class="stats-heading">
                                <h2>STATS</h2>
                                <button class="action-x">action</button>
                            </div>
                            <div class="stats">
                                <div class="inner">
                                    <h3>Vehicle No</h3>
                                    <span>{{ $Car->VehicleNumber }}</span>
                                </div> 
                                <div class="inner">
                                    <h3>Refueling</h3>
                                    <span>₦ {{ number_format( $Car->TotalRefueling) }}</span>
                                </div> 
                                <div class="inner">
                                    <h3>Price</h3>
                                    <span>₦ {{ number_format( $Car->Price) }}</span>
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
                                    <span>{{ $Car->CompanyCode }} - {{ $Companies->CompanyName }}</span>
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
                    </td>
                    <td class="engine-volume">{{ $Car->EngineVolume }}</td>
                    <td class="refueling">₦ {{ number_format($Car->TotalRefueling) }}</td>
                    <td class="balance">₦ {{ number_format($Car->Balance) }}</td>
                </tr>
            @endforeach
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By ID" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Cars Column.. " onkeyup="FilterCars()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Engine Volume" onkeyup="FilterEngineVolume()"></span>  
                <span><input type="text" id="SearchInput3" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span>  
                <span><input type="text" id="SearchInput4" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span>   
            </div>
            {{ $Cars__MyRecords->onEachSide(1)->links() }}
        </table>
    </div>
@endsection