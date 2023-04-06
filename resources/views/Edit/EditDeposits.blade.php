@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">LNO</th>
                <th onclick="sortTable(1)">Vehicle no</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Card No</th>
                <th onclick="sortTable(4)">Amount</th>
                <th onclick="sortTable(5)">Year</th>
                <th onclick="sortTable(6)">Week</th>
                <th onclick="sortTable(7)">Month</th>
            </tr>
            @foreach ($Deposits__MyRecords as $Deposit)
            <tr> 
                <td>{{ $loop->iteration }}</td>
                <td class="show-record-x-edit">{{ $Deposit->VehicleNumber }}</td>
                <span class="VehicleNumber_X_DATA_Edit Hide">{{ $Deposit->VehicleNumber }}</span>
                <span class="Date_X_DATA_Edit Hide">{{ $Deposit->Date }}</span>
                <span class="Time_X_DATA_Edit Hide">{{ $Deposit->Time }}</span>
                <span class="DepositAction_X_DATA_Edit Hide">{{ $Deposit->DepositAction }}</span>
                <span class="ReleaseDate_X_DATA_Edit Hide">{{ $Deposit->ReleaseDate }}</span>
                <span class="ReleaseTime_X_DATA_Edit Hide">{{ $Deposit->ReleaseTime }}</span>
                <span class="Cost_X_DATA_Edit Hide">{{ number_format($Deposit->Cost) }}</span>
                <span class="InvoiceNumber_X_DATA_Edit Hide">{{ $Deposit->InvoiceNumber }}</span>
                <span class="Week_X_DATA_Edit Hide">{{ $Deposit->Week }}</span>
                <td>{{ $Deposit->Date }}</td>
                <td>{{ $Deposit->CardNumber }}</td>
                <td>{{ number_format($Deposit->Amount) }}</td>
                <td>{{ $Deposit->Year }}</td>
                <td>{{ $Deposit->Week }}</td>
                <td>{{ $Deposit->Month }}</td> 
            </tr> 
            @endforeach  
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By LNO" onkeyup="FilterLNO()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Card No" onkeyup="FilterCardNo()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Amount" onkeyup="FilterAmount()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Year" onkeyup="FilterYear()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Week " onkeyup="FilterWeek()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Month" onkeyup="FilterMonth()"></span> 
            </div>
        </table>
        {{ $Deposits__MyRecords->onEachSide(5)->links() }}
    </div>
@endsection