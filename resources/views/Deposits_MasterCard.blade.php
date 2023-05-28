@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">LNO</th> 
                <th onclick="sortTable(1)">Card Number</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Amount</th>
                <th onclick="sortTable(4)">Year</th>
                <th onclick="sortTable(5)">Week</th>
                <th onclick="sortTable(6)">Month</th> 
            </tr>
            @foreach ($Deposits_MasterCards as $Deposits_MasterCard) 
            <tr>  
                <td>{{ $loop->iteration  + (($Deposits_MasterCards->currentPage() -1) * $Deposits_MasterCards->perPage()) + (($Deposits_MasterCards->currentPage() -1) * $Deposits_MasterCards->perPage()) }}</td>
                @php
                    $Status = \App\Models\MasterCard::select('Status')->where('CardNumber', $Deposits_MasterCard->CardNumber)->first();
                @endphp
                <td class="show-record-x show-record-x-2"><span class="{{ $Status->Status ?? 'INACTIVE' }}"></span>{{ $Deposits_MasterCard->CardNumber }}</td>  
                <td>{{ $Deposits_MasterCard->Date }}</td>
                <td>₦ {{ empty($Deposits_MasterCard->Amount) ? '' : number_format($Deposits_MasterCard->Amount) }}</td> 
                <td>{{ $Deposits_MasterCard->Year }}</td>
                <td>{{ $Deposits_MasterCard->Week }}</td>
                <td>{{ $Deposits_MasterCard->Month }}</td> 
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
        {{ $Deposits_MasterCards->onEachSide(5)->links() }}
        @unless (count($Deposits_MasterCards) > 0)
        <center>
            <div class="empty-records" style="background: url('{{ asset('Images/empty-records.png') }}')"></div> 
        </center>
        @endunless
        @if(!isset($_GET['Filter_All_Deposits']) AND !isset($_GET['Filter_Deposits_Yearly']) AND !isset($_GET['Filter_Deposits_Range']))
        @php
            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')->sum('Amount');
            $Date_from = \App\Models\Deposits::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp
        <div class="total-spent">
            <p>Total amount spent on Deposits from "{{ $Date_from->Date }}" till date = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endif
        @isset($_GET['Filter_All_Deposits'])
        <div class="total-spent">
            <p>Total amount spent on Deposits from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Deposits_Yearly'])
        <div class="total-spent">
            <p>Total amount spent on Deposits for VEHICLE "{{ $_GET['VehicleNo'] }}" in "{{ $_GET['Year'] }}" = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Deposits_Range'])
        <div class="total-spent">
            <p>Total amount spent on Deposits for VEHICLE "{{ $_GET['VehicleNo'] }}", from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endisset
    </div>
@endsection