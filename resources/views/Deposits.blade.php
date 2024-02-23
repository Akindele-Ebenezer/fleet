@extends('Layouts.Layout2')

@section('Title', 'DEPOSITS') 
@section('Heading', 'DEPOSITS') 
@include('Components.ReadOnly.DepositsComponent')

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
            <tr class="HistoryTableRow"> 
                @switch($Deposit->Date)
                    @case(date('Y-m-d'))
                        @php
                            $NumberOfRecords_Today = \App\Models\Deposits::select('id')->where('Date', date('Y-m-d'))->count();
                            $Cost_Today = \App\Models\Deposits::select('Amount')->where('Date', date('Y-m-d'))->sum('Amount');
                        @endphp
                        <td class="Today Hide HistoryTitle">{{ number_format($NumberOfRecords_Today) ?? 0 }} :: Today</td>
                        <td class="Cost_Today Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_Today) ?? 0 }}</td>
                        @break 
                    @case($Deposit->Date >= date('Y-m-d', strtotime("this week")))
                        @php
                            $NumberOfRecords_ThisWeek = \App\Models\Deposits::select('id')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->count();
                            $Cost_ThisWeek = \App\Models\Deposits::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('Amount');
                        @endphp
                        <td class="ThisWeek Hide HistoryTitle">{{ number_format($NumberOfRecords_ThisWeek) ?? 0 }} :: This week</td>
                        <td class="Cost_ThisWeek Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_ThisWeek) ?? 0 }}</td>
                        @break 
                    @case(($Deposit->Date >= date('Y-m-d', strtotime("last week")))) 
                        @php
                            $NumberOfRecords_LastWeek = \App\Models\Deposits::select('id')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->count();
                            $Cost_LastWeek = \App\Models\Deposits::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->sum('Amount');
                        @endphp
                        <td class="OneWeekAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_LastWeek) ?? 0 }} :: Last week</td>
                        <td class="Cost_LastWeek Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_LastWeek) ?? 0 }}</td>
                        @break
                    @case(($Deposit->Date >= date('Y-m-d', strtotime("-2 weeks"))))
                        @php
                            $NumberOfRecords_TwoWeeksAgo = \App\Models\Deposits::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->count();
                            $Cost_TwoWeeksAgo = \App\Models\Deposits::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->sum('Amount');
                        @endphp
                        <td class="TwoWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoWeeksAgo) ?? 0 }} :: Two weeks ago</td>
                        <td class="Cost_TwoWeeksAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_TwoWeeksAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposit->Date >= date('Y-m-d', strtotime("-3 weeks"))))
                        @php
                            $NumberOfRecords_ThreeWeeksAgo = \App\Models\Deposits::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->count();
                            $Cost_ThreeWeeksAgo = \App\Models\Deposits::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->sum('Amount');
                        @endphp
                        <td class="ThreeWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_ThreeWeeksAgo) ?? 0 }} :: Three weeks ago</td>
                        <td class="Cost_ThreeWeeksAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_ThreeWeeksAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposit->Date >= date('Y-m-d', strtotime("-1 month"))))
                        @php
                            $NumberOfRecords_OneMonthAgo = \App\Models\Deposits::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->count();
                            $Cost_OneMonthAgo = \App\Models\Deposits::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->sum('Amount');
                        @endphp
                        <td class="OneMonthAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_OneMonthAgo) ?? 0 }} :: Last month</td>
                        <td class="Cost_OneMonthAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_OneMonthAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposit->Date >= date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_TwoMonthsAgo = \App\Models\Deposits::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->count();
                            $Cost_TwoMonthsAgo = \App\Models\Deposits::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->sum('Amount');
                        @endphp
                        <td class="TwoMonthsAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoMonthsAgo) ?? 0 }} :: Two months ago</td>
                        <td class="Cost_TwoMonthsAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_TwoMonthsAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposit->Date < date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_Older = \App\Models\Deposits::select('id')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->count();
                            $Cost_Older = \App\Models\Deposits::select('Amount')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('Amount');
                        @endphp
                        <td class="Older Hide HistoryTitle">{{ number_format($NumberOfRecords_Older) ?? 0 }} :: Older</td>
                        <td class="Cost_Older Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_Older) ?? 0 }}</td>
                        @break
                    @default 
                @endswitch 
            </tr>
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
            @foreach ($Deposits_MasterCards as $Deposits_MasterCard) 
            <tr class="HistoryTableRow"> 
                @switch($Deposits_MasterCard->Date)
                    @case(date('Y-m-d'))
                        @php
                            $NumberOfRecords_Today = \DB::table('deposits_master_cards')->select('id')->where('Date', date('Y-m-d'))->count();
                            $Cost_Today = \DB::table('deposits_master_cards')->select('Amount')->where('Date', date('Y-m-d'))->sum('Amount');
                        @endphp
                        <td class="Today Hide HistoryTitle">{{ number_format($NumberOfRecords_Today) ?? 0 }} :: Today</td>
                        <td class="Cost_Today Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_Today) ?? 0 }}</td>
                        @break 
                    @case($Deposits_MasterCard->Date >= date('Y-m-d', strtotime("this week")))
                        @php
                            $NumberOfRecords_ThisWeek = \DB::table('deposits_master_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->count();
                            $Cost_ThisWeek = \DB::table('deposits_master_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('Amount');
                        @endphp
                        <td class="ThisWeek Hide HistoryTitle">{{ number_format($NumberOfRecords_ThisWeek) ?? 0 }} :: This week</td>
                        <td class="Cost_ThisWeek Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_ThisWeek) ?? 0 }}</td>
                        @break 
                    @case(($Deposits_MasterCard->Date >= date('Y-m-d', strtotime("last week")))) 
                        @php
                            $NumberOfRecords_LastWeek = \DB::table('deposits_master_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->count();
                            $Cost_LastWeek = \DB::table('deposits_master_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->sum('Amount');
                        @endphp
                        <td class="OneWeekAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_LastWeek) ?? 0 }} :: Last week</td>
                        <td class="Cost_LastWeek Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_LastWeek) ?? 0 }}</td>
                        @break
                    @case(($Deposits_MasterCard->Date >= date('Y-m-d', strtotime("-2 weeks"))))
                        @php
                            $NumberOfRecords_TwoWeeksAgo = \DB::table('deposits_master_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->count();
                            $Cost_TwoWeeksAgo = \DB::table('deposits_master_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->sum('Amount');
                        @endphp
                        <td class="TwoWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoWeeksAgo) ?? 0 }} :: Two weeks ago</td>
                        <td class="Cost_TwoWeeksAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_TwoWeeksAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_MasterCard->Date >= date('Y-m-d', strtotime("-3 weeks"))))
                        @php
                            $NumberOfRecords_ThreeWeeksAgo = \DB::table('deposits_master_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->count();
                            $Cost_ThreeWeeksAgo = \DB::table('deposits_master_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->sum('Amount');
                        @endphp
                        <td class="ThreeWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_ThreeWeeksAgo) ?? 0 }} :: Three weeks ago</td>
                        <td class="Cost_ThreeWeeksAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_ThreeWeeksAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_MasterCard->Date >= date('Y-m-d', strtotime("-1 month"))))
                        @php
                            $NumberOfRecords_OneMonthAgo = \DB::table('deposits_master_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->count();
                            $Cost_OneMonthAgo = \DB::table('deposits_master_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->sum('Amount');
                        @endphp
                        <td class="OneMonthAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_OneMonthAgo) ?? 0 }} :: Last month</td>
                        <td class="Cost_OneMonthAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_OneMonthAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_MasterCard->Date >= date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_TwoMonthsAgo = \DB::table('deposits_master_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->count();
                            $Cost_TwoMonthsAgo = \DB::table('deposits_master_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->sum('Amount');
                        @endphp
                        <td class="TwoMonthsAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoMonthsAgo) ?? 0 }} :: Two months ago</td>
                        <td class="Cost_TwoMonthsAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_TwoMonthsAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_MasterCard->Date < date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_Older = \DB::table('deposits_master_cards')->select('id')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->count();
                            $Cost_Older = \DB::table('deposits_master_cards')->select('Amount')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('Amount');
                        @endphp
                        <td class="Older Hide HistoryTitle">{{ number_format($NumberOfRecords_Older) ?? 0 }} :: Older</td>
                        <td class="Cost_Older Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_Older) ?? 0 }}</td>
                        @break
                    @default 
                @endswitch 
            </tr>
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
        
        <table class="table" id="Table2">
            <h1 class="table-title">VOUCHER CARDS</h1>
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
            @unless (count(\DB::table('deposits_voucher_cards')->get()) > 0)
            <tr>
                <td>No Deposits for voucher cards.</td>
            </tr>   
            @endunless
            @foreach ($Deposits_VoucherCards as $Deposits_VoucherCard) 
            <tr class="HistoryTableRow"> 
                @switch($Deposits_VoucherCard->Date)
                    @case(date('Y-m-d'))
                        @php
                            $NumberOfRecords_Today = \DB::table('deposits_voucher_cards')->select('id')->where('Date', date('Y-m-d'))->count();
                            $Cost_Today = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', date('Y-m-d'))->sum('Amount');
                        @endphp
                        <td class="Today Hide HistoryTitle">{{ number_format($NumberOfRecords_Today) ?? 0 }} :: Today</td>
                        <td class="Cost_Today Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_Today) ?? 0 }}</td>
                        @break 
                    @case($Deposits_VoucherCard->Date >= date('Y-m-d', strtotime("this week")))
                        @php
                            $NumberOfRecords_ThisWeek = \DB::table('deposits_voucher_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->count();
                            $Cost_ThisWeek = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('Amount');
                        @endphp
                        <td class="ThisWeek Hide HistoryTitle">{{ number_format($NumberOfRecords_ThisWeek) ?? 0 }} :: This week</td>
                        <td class="Cost_ThisWeek Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_ThisWeek) ?? 0 }}</td>
                        @break 
                    @case(($Deposits_VoucherCard->Date >= date('Y-m-d', strtotime("last week")))) 
                        @php
                            $NumberOfRecords_LastWeek = \DB::table('deposits_voucher_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->count();
                            $Cost_LastWeek = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->sum('Amount');
                        @endphp
                        <td class="OneWeekAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_LastWeek) ?? 0 }} :: Last week</td>
                        <td class="Cost_LastWeek Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_LastWeek) ?? 0 }}</td>
                        @break
                    @case(($Deposits_VoucherCard->Date >= date('Y-m-d', strtotime("-2 weeks"))))
                        @php
                            $NumberOfRecords_TwoWeeksAgo = \DB::table('deposits_voucher_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->count();
                            $Cost_TwoWeeksAgo = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->sum('Amount');
                        @endphp
                        <td class="TwoWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoWeeksAgo) ?? 0 }} :: Two weeks ago</td>
                        <td class="Cost_TwoWeeksAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_TwoWeeksAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_VoucherCard->Date >= date('Y-m-d', strtotime("-3 weeks"))))
                        @php
                            $NumberOfRecords_ThreeWeeksAgo = \DB::table('deposits_voucher_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->count();
                            $Cost_ThreeWeeksAgo = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->sum('Amount');
                        @endphp
                        <td class="ThreeWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_ThreeWeeksAgo) ?? 0 }} :: Three weeks ago</td>
                        <td class="Cost_ThreeWeeksAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_ThreeWeeksAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_VoucherCard->Date >= date('Y-m-d', strtotime("-1 month"))))
                        @php
                            $NumberOfRecords_OneMonthAgo = \DB::table('deposits_voucher_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->count();
                            $Cost_OneMonthAgo = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->sum('Amount');
                        @endphp
                        <td class="OneMonthAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_OneMonthAgo) ?? 0 }} :: Last month</td>
                        <td class="Cost_OneMonthAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_OneMonthAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_VoucherCard->Date >= date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_TwoMonthsAgo = \DB::table('deposits_voucher_cards')->select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->count();
                            $Cost_TwoMonthsAgo = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->sum('Amount');
                        @endphp
                        <td class="TwoMonthsAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoMonthsAgo) ?? 0 }} :: Two months ago</td>
                        <td class="Cost_TwoMonthsAgo Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_TwoMonthsAgo) ?? 0 }}</td>
                        @break
                    @case(($Deposits_VoucherCard->Date < date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_Older = \DB::table('deposits_voucher_cards')->select('id')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->count();
                            $Cost_Older = \DB::table('deposits_voucher_cards')->select('Amount')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('Amount');
                        @endphp
                        <td class="Older Hide HistoryTitle">{{ number_format($NumberOfRecords_Older) ?? 0 }} :: Older</td>
                        <td class="Cost_Older Hide HistoryTableData">Total deposits => ₦ {{ number_format($Cost_Older) ?? 0 }}</td>
                        @break
                    @default 
                @endswitch 
            </tr>
            <tr>   
                @php
                    $Status = \DB::table('voucher_cards')->select('Status')->where('CardNumber', $Deposits_VoucherCard->CardNumber)->first();
                @endphp
                <td class="show-record-x show-record-x-2"><img src="{{ asset('Images/deposit_.png') }}" alt=""> VOUCHER<span class="{{ $Status->Status ?? 'INACTIVE' }}"></span></td>  
                <td>{{ $Deposits_VoucherCard->Date }}</td>
                <td class="card-numbers-x underline">{{ $Deposits_VoucherCard->CardNumber }}</td>
                <td>₦ {{ empty($Deposits_VoucherCard->Amount) ? '' : number_format($Deposits_VoucherCard->Amount) }}</td> 
                <td>{{ $Deposits_VoucherCard->Year }}</td>
                <td>{{ $Deposits_VoucherCard->Week }}</td>
                <td>{{ $Deposits_VoucherCard->Month }}</td> 
                {{-- <td>{{ $Deposits_VoucherCard->Comments }}</td>  --}}
            </tr> 
            @endforeach  
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
        {{ $Deposits_VoucherCards->onEachSide(5)->links() }}
    </div>
    <script src="{{ asset('Js/ReadOnly/Deposits.js') }}"></script>
    <script> 
        if (!(window.location.search)) {
            let ExportButton = document.querySelector('.ExportToExcel');
            ExportButton.addEventListener('click', () => {
                window.location = '/Deposits/Export/all'; 
            });  
        } else {
            let ExportButton = document.querySelector('.ExportToExcel');
            ExportButton.addEventListener('click', () => {
                window.location = '/Deposits/Export/one'; 
            });  
        }
    </script>
@endsection
