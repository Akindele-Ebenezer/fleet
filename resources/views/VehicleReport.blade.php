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
            <tr> 
                <td class="id">{{ $Car->id }}</td>
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
                                    <span>₦ {{ $Car->MonthlyBudget }}</span>
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
                                    <span>₦ {{ $Car->TotalDeposits }}</span>
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
                            <button class="action-x">action</button>
                        </div> 
                    </div>
                </td>
                <td class="refueling">₦ {{ $Car->TotalRefueling }}</td>
                <td class="balance">₦ {{ $Car->Balance }}</td>
                <td class="to-deposit">₦ {{ $Car->TotalDeposits }}</td>
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
    </div> 
@endsection