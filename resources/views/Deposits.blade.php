@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <h1 class="table-title">VEHICLE CARDS</h1>
            <tr class="table-head">
                {{-- <th onclick="sortTable(0)">LNO</th> --}}
                <th onclick="sortTable(0)">Vehicle Number</th>
                <th onclick="sortTable(1)">Date</th>
                <th onclick="sortTable(2)">Card No</th>
                <th onclick="sortTable(3)">Amount</th>
                <th onclick="sortTable(4)">Year</th>
                <th onclick="sortTable(5)">Week</th>
                <th onclick="sortTable(6)">Month</th>
                <th onclick="sortTable(7)">Comments</th>
            </tr>
            @unless (count(\App\Models\Deposits::all()) > 0)
            <tr>
                <td>No Deposits for vehicle cards.</td>
            </tr>    
            @endunless
            @foreach ($Deposits as $Deposit) 
            <tr> 
                @php
                    $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Deposit->VehicleNumber)->first();  
                @endphp 
                <td class="show-record-x show-record-x-2"><img src="{{ asset('Images/deposit_.png') }}" alt="">{{ $Deposit->VehicleNumber }}<span class="{{ $CarStatus->Status ?? 'INACTIVE' }}"></span></td>
                <span class="VehicleNumber_X_DATA_Edit Hide">{{ $Deposit->VehicleNumber }}</span>
                <span class="Date_X_DATA_Edit Hide">{{ $Deposit->Date }}</span>
                <span class="CardNumber_X_DATA_Edit Hide">{{ $Deposit->CardNumber }}</span>
                <span class="Amount_X_DATA_Edit Hide">{{ $Deposit->Amount }}</span>
                <span class="Year_X_DATA_Edit Hide">{{ $Deposit->Year }}</span>
                <span class="Week_X_DATA_Edit Hide">{{ $Deposit->Week }}</span> 
                <span class="Month_X_DATA_Edit Hide">{{ $Deposit->Month }}</span> 
                <td>{{ $Deposit->Date }}</td>
                <td class="card-numbers-x underline">{{ $Deposit->CardNumber }}</td>
                <td>₦ {{ empty($Deposit->Amount) ? '' : number_format($Deposit->Amount) }}</td> 
                <td>{{ $Deposit->Year }}</td>
                <td>{{ $Deposit->Week }}</td>
                <td>{{ $Deposit->Month }}</td>
                <td>{{ $Deposit->Comments }}</td>
            </tr> 
            @endforeach 
            <div class="table-head filter"> 
                {{-- <span><input type="text" id="SearchInput0" placeholder="Filter By LNO" onkeyup="FilterLNO()"></span>  --}}
                <span><input type="text" id="SearchInput0" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Card No" onkeyup="FilterCardNo()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Amount" onkeyup="FilterAmount()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Year" onkeyup="FilterYear()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Week " onkeyup="FilterWeek()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Month" onkeyup="FilterMonth()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Comments" onkeyup="FilterComments()"></span> 
            </div>
        </table> 
        {{ $Deposits->onEachSide(5)->links() }}
        @if(!isset($_GET['Filter_All_Deposits']) AND !isset($_GET['Filter_Deposits_Yearly']) AND !isset($_GET['Filter_Deposits_Range']))
        @php
            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')->sum('Amount');
            $Date_from = \App\Models\Deposits::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
            $SumOfCarDeposits_MasterCard = \App\Models\DepositsMasterCard::select('Amount')->sum('Amount');
            $Date_from_MasterCard = \App\Models\DepositsMasterCard::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp
        <div class="total-spent">
            <p>Total (Vehicle Card) Deposits from "{{ $Date_from->Date ?? 'NULL' }}" till date = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endif
        @isset($_GET['Filter_All_Deposits'])
        <div class="total-spent">
            <p>Total (Vehicle Card) Deposits from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Deposits_Yearly'])
        <div class="total-spent">
            <p>Total amount spent on (Vehicle Card) Deposits for VEHICLE "{{ $_GET['VehicleNo'] }}" in "{{ $_GET['Year'] }}" = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Deposits_Range'])
        <div class="total-spent">
            <p>Total amount spent on (Vehicle Card) Deposits for VEHICLE "{{ $_GET['VehicleNo'] }}", from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarDeposits) }}</p>
        </div>
        @endisset
        <table class="table" id="Table2">
            <h1 class="table-title">MASTER CARDS</h1>
            <tr class="table-head">
                {{-- <th onclick="sortTable(0)">LNO</th> --}}
                <th onclick="sortTable2(0)">Card Type</th>
                <th onclick="sortTable2(1)">Date</th>
                <th onclick="sortTable2(2)">Card No</th>
                <th onclick="sortTable2(3)">Amount</th>
                <th onclick="sortTable2(4)">Year</th>
                <th onclick="sortTable2(5)">Week</th>
                <th onclick="sortTable2(6)">Month</th>
                <th onclick="sortTable2(7)">Comments</th>
            </tr>  
            @unless (count(\App\Models\DepositsMasterCard::all()) > 0)
            <tr>
                <td>No Deposits for master cards.</td>
            </tr>   
            @endunless
            @unless (isset($_GET['Filter']) || isset($_GET['FilterValue']))
                @foreach ($Deposits_MasterCards as $Deposits_MasterCard) 
                <tr>   
                    @php
                        $Status = \App\Models\MasterCard::select('Status')->where('CardNumber', $Deposits_MasterCard->CardNumber)->first();
                    @endphp
                    <td class="show-record-x show-record-x-2"><img src="{{ asset('Images/deposit_.png') }}" alt=""> MASTER<span class="{{ $Status->Status ?? 'INACTIVE' }}"></span></td>  
                    <td>{{ $Deposits_MasterCard->Date }}</td>
                    <td class="card-numbers-x underline">{{ $Deposits_MasterCard->CardNumber }}</td>
                    <td>₦ {{ empty($Deposits_MasterCard->Amount) ? '' : number_format($Deposits_MasterCard->Amount) }}</td> 
                    <td>{{ $Deposits_MasterCard->Year }}</td>
                    <td>{{ $Deposits_MasterCard->Week }}</td>
                    <td>{{ $Deposits_MasterCard->Month }}</td> 
                    <td>{{ $Deposits_MasterCard->Comments }}</td> 
                </tr> 
                @endforeach 
            @endunless
            <div class="table-head filter"> 
                {{-- <span><input type="text" id="SearchInput0" placeholder="Filter By LNO" onkeyup="FilterLNO()"></span>  --}}
                <span><input type="text" id="SearchInputX0" placeholder="Filter By Card Type" onkeyup="Filter2CardType()"></span> 
                <span><input type="text" id="SearchInputX1" placeholder="Filter By Date" onkeyup="Filter2Date()"></span> 
                <span><input type="text" id="SearchInputX2" placeholder="Filter By Card No" onkeyup="Filter2CardNo()"></span> 
                <span><input type="text" id="SearchInputX3" placeholder="Filter By Amount" onkeyup="Filter2Amount()"></span> 
                <span><input type="text" id="SearchInputX4" placeholder="Filter By Year" onkeyup="Filter2Year()"></span> 
                <span><input type="text" id="SearchInputX5" placeholder="Filter By Week " onkeyup="Filter2Week()"></span> 
                <span><input type="text" id="SearchInputX6" placeholder="Filter By Month" onkeyup="Filter2Month()"></span> 
                <span><input type="text" id="SearchInputX7" placeholder="Filter By Comments" onkeyup="Filter2Comments()"></span> 
            </div>
        </table>
        {{ $Deposits_MasterCards->onEachSide(5)->links() }}
        @if(!isset($_GET['Filter_All_Deposits']) AND !isset($_GET['Filter_Deposits_Yearly']) AND !isset($_GET['Filter_Deposits_Range']))
        @php 
            $SumOfCarDeposits_MasterCard = \App\Models\DepositsMasterCard::select('Amount')->sum('Amount');
            $Date_from_MasterCard = \App\Models\DepositsMasterCard::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp
        <div class="total-spent">
            <p>Total (Master Card) Deposits from "{{ $Date_from_MasterCard->Date ?? 'NULL' }}" till date = ₦ {{ number_format($SumOfCarDeposits_MasterCard) }}</p>
        </div>
        @endif
        @isset($_GET['Filter_All_Deposits'])
        <div class="total-spent">
            <p>Total (Master Card) Deposits from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarDeposits_MasterCard) }}</p>
        </div>
        @endisset
        @unless (count($Deposits) > 0 || count($Deposits_MasterCards) > 0)
        <center>
            <div class="empty-records" style="background: url('{{ asset('Images/empty-records.png') }}')"></div> 
        </center>
        @endunless
    </div>
@endsection