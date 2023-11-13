@extends('Layouts.Layout2')

@section('Title', 'REFUELING') 
@section('Heading', 'FUEL HISTORY')  
@include('Components.ReadOnly.RefuelingComponent')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">S/N</th>
                <th onclick="sortTable(1)">Vehicle Number</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Time</th>
                <th onclick="sortTable(4)">Mileage</th>
                <th onclick="sortTable(5)">Terminal No</th>
                <th onclick="sortTable(6)">Card No</th>
                <th onclick="sortTable(7)">Quantity</th>
                <th onclick="sortTable(8)">Amount</th>
                {{-- <th onclick="sortTable(9)">Receipt No</th> --}}
                <th onclick="sortTable(10)">Distance</th> 
                <th class="text-center" onclick="sortTable(11)">Fuel Consumption</th> 
            </tr> 
            @unless (count($Refuelings) > 0)
            <tr>
                <td>No fuel history.</td>
            </tr>    
            @endunless  
        @foreach ($Refuelings as $Refueling) 
            <tr class="HistoryTableRow"> 
                @switch($Refueling->Date)
                    @case(date('Y-m-d'))
                        @php
                            $NumberOfRecords_Today = \App\Models\Refueling::select('id')->where('Date', date('Y-m-d'))->count();
                            $DistanceTraveled_Today = \App\Models\Refueling::select('KM')->where('Date', date('Y-m-d'))->sum('KM');
                            $Cost_Today = \App\Models\Refueling::select('Amount')->where('Date', date('Y-m-d'))->sum('Amount');
                            $Quantity_Today = \App\Models\Refueling::select('Quantity')->where('Date', date('Y-m-d'))->sum('Quantity');
                            $FuelConsumption_Today = \App\Models\Refueling::select('Consumption')->where('Date', date('Y-m-d'))->sum('Consumption');
                        @endphp
                        <td class="Today Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_Today) ?? 0 }} :: Today</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_Today Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_Today ?? 0 }} KM</td>
                                <td class="Cost_Today Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_Today) ?? 0 }}</td>
                                <td class="Quantity_Today Hide HistoryTableData">Quantity => {{ $Quantity_Today ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_Today Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_Today, 1) ?? 0 }}</td>
                            @endif
                        @break 
                    @case($Refueling->Date >= date('Y-m-d', strtotime("this week")))
                        @php
                            $NumberOfRecords_ThisWeek = \App\Models\Refueling::select('id')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->count();
                            $DistanceTraveled_ThisWeek = \App\Models\Refueling::select('KM')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('KM');
                            $Cost_ThisWeek = \App\Models\Refueling::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('Amount');
                            $Quantity_ThisWeek = \App\Models\Refueling::select('Quantity')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('Quantity');
                            $FuelConsumption_ThisWeek = \App\Models\Refueling::select('Consumption')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('Consumption');
                        @endphp
                        <td class="ThisWeek Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_ThisWeek) ?? 0 }} :: This week</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_ThisWeek Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_ThisWeek ?? 0 }} KM</td>
                                <td class="Cost_ThisWeek Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_ThisWeek) ?? 0 }}</td>
                                <td class="Quantity_ThisWeek Hide HistoryTableData">Quantity => {{ $Quantity_ThisWeek ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_ThisWeek Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_ThisWeek, 1) ?? 0 }}</td>
                            @endif
                        @break 
                    @case(($Refueling->Date >= date('Y-m-d', strtotime("last week")))) 
                        @php
                            $NumberOfRecords_LastWeek = \App\Models\Refueling::select('id')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->count();
                            $DistanceTraveled_LastWeek = \App\Models\Refueling::select('KM')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->sum('KM');
                            $Cost_LastWeek = \App\Models\Refueling::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->sum('Amount');
                            $Quantity_LastWeek = \App\Models\Refueling::select('Quantity')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->sum('Quantity');
                            $FuelConsumption_LastWeek = \App\Models\Refueling::select('Consumption')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->sum('Consumption');
                        @endphp
                        <td class="OneWeekAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_LastWeek) ?? 0 }} :: Last week</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_LastWeek Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_LastWeek ?? 0 }} KM</td>
                                <td class="Cost_LastWeek Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_LastWeek) ?? 0 }}</td>
                                <td class="Quantity_LastWeek Hide HistoryTableData">Quantity => {{ $Quantity_LastWeek ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_LastWeek Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_LastWeek, 1) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Refueling->Date >= date('Y-m-d', strtotime("-2 weeks"))))
                        @php
                            $NumberOfRecords_TwoWeeksAgo = \App\Models\Refueling::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->count();
                            $DistanceTraveled_TwoWeeksAgo = \App\Models\Refueling::select('KM')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->sum('KM');
                            $Cost_TwoWeeksAgo = \App\Models\Refueling::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->sum('Amount');
                            $Quantity_TwoWeeksAgo = \App\Models\Refueling::select('Quantity')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->sum('Quantity');
                            $FuelConsumption_TwoWeeksAgo = \App\Models\Refueling::select('Consumption')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->sum('Consumption');
                        @endphp
                        <td class="TwoWeeksAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_TwoWeeksAgo) ?? 0 }} :: Two weeks ago</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_TwoWeeksAgo Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_TwoWeeksAgo ?? 0 }} KM</td>
                                <td class="Cost_TwoWeeksAgo Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_TwoWeeksAgo) ?? 0 }}</td>
                                <td class="Quantity_TwoWeeksAgo Hide HistoryTableData">Quantity => {{ $Quantity_TwoWeeksAgo ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_TwoWeeksAgo Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_TwoWeeksAgo, 1) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Refueling->Date >= date('Y-m-d', strtotime("-3 weeks"))))
                        @php
                            $NumberOfRecords_ThreeWeeksAgo = \App\Models\Refueling::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->count();
                            $DistanceTraveled_ThreeWeeksAgo = \App\Models\Refueling::select('KM')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->sum('KM');
                            $Cost_ThreeWeeksAgo = \App\Models\Refueling::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->sum('Amount');
                            $Quantity_ThreeWeeksAgo = \App\Models\Refueling::select('Quantity')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->sum('Quantity');
                            $FuelConsumption_ThreeWeeksAgo = \App\Models\Refueling::select('Consumption')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->sum('Consumption');
                        @endphp
                        <td class="ThreeWeeksAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_ThreeWeeksAgo) ?? 0 }} :: Three weeks ago</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_ThreeWeeksAgo Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_ThreeWeeksAgo ?? 0 }} KM</td>
                                <td class="Cost_ThreeWeeksAgo Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_ThreeWeeksAgo) ?? 0 }}</td>
                                <td class="Quantity_ThreeWeeksAgo Hide HistoryTableData">Quantity => {{ $Quantity_ThreeWeeksAgo ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_ThreeWeeksAgo Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_ThreeWeeksAgo, 1) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Refueling->Date >= date('Y-m-d', strtotime("-1 month"))))
                        @php
                            $NumberOfRecords_OneMonthAgo = \App\Models\Refueling::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->count();
                            $DistanceTraveled_OneMonthAgo = \App\Models\Refueling::select('KM')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->sum('KM');
                            $Cost_OneMonthAgo = \App\Models\Refueling::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->sum('Amount');
                            $Quantity_OneMonthAgo = \App\Models\Refueling::select('Quantity')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->sum('Quantity');
                            $FuelConsumption_OneMonthAgo = \App\Models\Refueling::select('Consumption')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->sum('Consumption');
                        @endphp
                        <td class="OneMonthAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_OneMonthAgo) ?? 0 }} :: Last month</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_OneMonthAgo Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_OneMonthAgo ?? 0 }} KM</td>
                                <td class="Cost_OneMonthAgo Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_OneMonthAgo) ?? 0 }}</td>
                                <td class="Quantity_OneMonthAgo Hide HistoryTableData">Quantity => {{ $Quantity_OneMonthAgo ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_OneMonthAgo Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_OneMonthAgo, 1) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Refueling->Date >= date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_TwoMonthsAgo = \App\Models\Refueling::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->count();
                            $DistanceTraveled_TwoMonthsAgo = \App\Models\Refueling::select('KM')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->sum('KM');
                            $Cost_TwoMonthsAgo = \App\Models\Refueling::select('Amount')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->sum('Amount');
                            $Quantity_TwoMonthsAgo = \App\Models\Refueling::select('Quantity')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->sum('Quantity');
                            $FuelConsumption_TwoMonthsAgo = \App\Models\Refueling::select('Consumption')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->sum('Consumption');
                        @endphp
                        <td class="TwoMonthsAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_TwoMonthsAgo) ?? 0 }} :: Two months ago</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_TwoMonthsAgo Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_TwoMonthsAgo ?? 0 }} KM</td>
                                <td class="Cost_TwoMonthsAgo Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_TwoMonthsAgo) ?? 0 }}</td>
                                <td class="Quantity_TwoMonthsAgo Hide HistoryTableData">Quantity => {{ $Quantity_TwoMonthsAgo ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_TwoMonthsAgo Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_TwoMonthsAgo, 1) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Refueling->Date < date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_Older = \App\Models\Refueling::select('id')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->count();
                            $DistanceTraveled_Older = \App\Models\Refueling::select('KM')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('KM');
                            $Cost_Older = \App\Models\Refueling::select('Amount')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('Amount');
                            $Quantity_Older = \App\Models\Refueling::select('Quantity')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('Quantity');
                            $FuelConsumption_Older = \App\Models\Refueling::select('Consumption')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('Consumption');
                        @endphp
                        <td class="Older Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_Older) ?? 0 }} :: Older</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="DistanceTraveled_Older Hide HistoryTableData">Distance traveled => {{ $DistanceTraveled_Older ?? 0 }} KM</td>
                                <td class="Cost_Older Hide HistoryTableData">Fuel cost => ₦ {{ number_format($Cost_Older) ?? 0 }}</td>
                                <td class="Quantity_Older Hide HistoryTableData">Quantity => {{ $Quantity_Older ?? 0 }} LITER(S)</td>
                                <td class="FuelConsumption_Older Hide HistoryTableData">Fuel consumption => {{ round($FuelConsumption_Older, 1) ?? 0 }}</td>
                            @endif
                        @break
                    @default 
                @endswitch 
            </tr> 
            <tr>
                @php
                    $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Refueling->VehicleNumber)->first(); 
                @endphp
                <td>{{ $loop->iteration  + (($Refuelings->currentPage() -1) * $Refuelings->perPage()) }}</td>
                <td class="show-record-x show-record-x-2"><span class="{{ $CarStatus->Status ?? 'INACTIVE' }}"></span>{{ $Refueling->VehicleNumber }} <img src="{{ asset('Images/focus.png') }}" alt=""></td>
                <span class="VehicleNumber_X_DATA_Edit Hide">{{ $Refueling->VehicleNumber }}</span>
                <span class="Date_X_DATA_Edit Hide">{{ $Refueling->Date }}</span>
                <span class="Time_X_DATA_Edit Hide">{{ $Refueling->Time }}</span>
                <span class="Mileage_X_DATA_Edit Hide">{{ $Refueling->Mileage }}</span>
                <span class="TerminalNo_X_DATA_Edit Hide">{{ $Refueling->TerminalNo }}</span>
                <span class="CardNumber_X_DATA_Edit Hide">{{ $Refueling->CardNumber }}</span>
                <span class="Quantity_X_DATA_Edit Hide">₦ {{ empty($Refueling->Quantity) ? '' : number_format($Refueling->Quantity) }}</span>
                <span class="Amount_X_DATA_Edit Hide">{{ $Refueling->Amount }}</span>
                {{-- <span class="ReceiptNo_X_DATA_Edit Hide">{{ $Refueling->ReceiptNo }}</span> --}}
                <span class="Hide"></span>
                <span class="KMLITER_X_DATA_Edit Hide">{{ $Refueling->KMLITER }}</span>
                <td>{{ $Refueling->Date }}</td>
                <td>{{ $Refueling->Time }}</td>
                <td>{{ $Refueling->Mileage }}</td>
                <td>{{ $Refueling->TERNO }}</td>
                <td class="card-numbers-x underline">{{ $Refueling->CardNumber }}</td>
                <td>{{ $Refueling->Quantity }}</td>
                <td>₦ {{ empty($Refueling->Amount) ? '' : number_format($Refueling->Amount) }}</td>
                {{-- <td>{{ $Refueling->ReceiptNumber }}</td>  --}}
                <td> 
                    {{ $Refueling->KM }} km
                </td> 
                <td class="fuel-consumption">{{ round($Refueling->Consumption, 1) }}</td>
            </tr>
            @endforeach  
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By S/N" onkeyup="FilterSN()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Time" onkeyup="FilterTime()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Mileage" onkeyup="FilterMileage()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Terminal No" onkeyup="FilterTerminalNo()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Card No" onkeyup="FilterCardNo()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Quantity" onkeyup="FilterQuantity()"></span> 
                <span><input type="text" id="SearchInput8" placeholder="Filter By Amount " onkeyup="FilterAmount()"></span> 
                <span><input type="text" id="SearchInput9" placeholder="Filter By Receipt No" onkeyup="FilterReceiptNo()"></span>  
                <span><input type="text" id="SearchInput10" placeholder="Filter By KM " onkeyup="FilterKM()"></span>   
            </div>
        </table> 
        @if(!isset($_GET['Filter_All_Refueling']) AND !isset($_GET['Filter_Refueling_Yearly']) AND !isset($_GET['Filter_Refueling_Range']))
        @php
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')->sum('Amount');
            $Date_from = \App\Models\Refueling::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp 
        @endif
        @isset($_GET['Filter_All_Refueling'])
        <div class="total-spent">
            <p>Total amount spent on Refueling from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarRefueling) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Refueling_Yearly'])
        <div class="total-spent">
            <p>Total amount spent on Refueling for VEHICLE "{{ $_GET['VehicleNo'] }}" in "{{ $_GET['Year'] }}" = ₦ {{ number_format($SumOfCarRefueling) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Refueling_Range'])
        <div class="total-spent">
            <p>Total amount spent on Refueling for VEHICLE "{{ $_GET['VehicleNo'] }}", from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarRefueling) }}</p>
        </div>
        @endisset
    </div>
    {{ $Refuelings->onEachSide(5)->links() }} 
    <div class="total-spent">
        <p>Total amount spent on Refueling from "{{ $Date_from->Date ?? 'NULL' }}" till date = ₦ {{ number_format($SumOfCarRefueling) }}</p>
    </div>
    <script src="{{ asset('Js/ReadOnly/Refueling.js') }}"></script>
    <script>
        let ExportButton = document.querySelector('.ExportToExcel');
        ExportButton.addEventListener('click', () => {
            window.location = '/Refueling/Export/all'; 
        });
    </script>
@endsection
