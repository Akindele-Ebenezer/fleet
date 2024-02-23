@extends('Layouts.Layout2')

@section('Title', 'MAINTENANCE') 
@section('Heading', 'MAINTENANCE')  
@include('Components.ReadOnly.MaintenanceComponent')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">S/N</th>
                <th onclick="sortTable(1)">Vehicle Number</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Time</th>
                <th onclick="sortTable(4)">Incident Type</th>
                <th onclick="sortTable(5)" class="table-head-x">Incident Action</th>
                <th onclick="sortTable(6)">Release Date</th>
                <th onclick="sortTable(7)">Release Time</th>
                <th onclick="sortTable(8)">Cost</th>
                <th onclick="sortTable(9)">Invoice No</th>
                <th onclick="sortTable(10)">Weeks</th>
            </tr> 
            @unless (count($Maintenance) > 0)
            <tr>
                <td>No car maintenace.</td>
            </tr>    
            @endunless
            @foreach ($Maintenance as $Maintenancee) 
            <tr class="HistoryTableRow"> 
                @switch($Maintenancee->Date)
                    @case(date('Y-m-d'))
                        @php
                            $NumberOfRecords_Today = \App\Models\Maintenance::select('id')->where('Date', date('Y-m-d'))->count();
                            $MaintenanceCost_Today = \App\Models\Maintenance::select('Cost')->where('Date', date('Y-m-d'))->sum('Cost');
                        @endphp
                        <td class="Today Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_Today) ?? 0 }} :: Today</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_Today Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_Today) ?? 0 }}</td>
                            @endif  
                        @break 
                    @case($Maintenancee->Date >= date('Y-m-d', strtotime("this week")))
                        @php
                            $NumberOfRecords_ThisWeek = \App\Models\Maintenance::select('id')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->count();
                            $MaintenanceCost_ThisWeek = \App\Models\Maintenance::select('Cost')->where('Date', '>=', date('Y-m-d', strtotime("this week")))->sum('Cost');
                        @endphp
                        <td class="ThisWeek Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_ThisWeek) ?? 0 }} :: This week</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_ThisWeek Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_ThisWeek) ?? 0 }}</td>
                            @endif
                        @break 
                    @case(($Maintenancee->Date >= date('Y-m-d', strtotime("last week")))) 
                        @php
                            $NumberOfRecords_LastWeek = \App\Models\Maintenance::select('id')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->count();
                            $MaintenanceCost_LastWeek = \App\Models\Maintenance::select('Cost')->where('Date', '>=', date('Y-m-d', strtotime("last week")))->where('Date', '<', date('Y-m-d', strtotime("this week")))->sum('Cost');
                        @endphp
                        <td class="OneWeekAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_LastWeek) ?? 0 }} :: Last week</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_LastWeek Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_LastWeek) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-2 weeks"))))
                        @php
                            $NumberOfRecords_TwoWeeksAgo = \App\Models\Maintenance::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->count();
                            $MaintenanceCost_TwoWeeksAgo = \App\Models\Maintenance::select('Cost')->where('Date', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('Date', '<', date('Y-m-d', strtotime("last week")))->sum('Cost');
                        @endphp
                        <td class="TwoWeeksAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_TwoWeeksAgo) ?? 0 }} :: Two weeks ago</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_TwoWeeksAgo Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_TwoWeeksAgo) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-3 weeks"))))
                        @php
                            $NumberOfRecords_ThreeWeeksAgo = \App\Models\Maintenance::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->count();
                            $MaintenanceCost_ThreeWeeksAgo = \App\Models\Maintenance::select('Cost')->where('Date', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('Date', '<', date('Y-m-d', strtotime("-2 weeks")))->sum('Cost');
                        @endphp
                        <td class="ThreeWeeksAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_ThreeWeeksAgo) ?? 0 }} :: Three weeks ago</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_ThreeWeeksAgo Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_ThreeWeeksAgo) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-1 month"))))
                        @php
                            $NumberOfRecords_OneMonthAgo = \App\Models\Maintenance::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->count();
                            $MaintenanceCost_OneMonthAgo = \App\Models\Maintenance::select('Cost')->where('Date', '>=', date('Y-m-d', strtotime("-1 month")))->where('Date', '<', date('Y-m-d', strtotime("-3 weeks")))->sum('Cost');
                        @endphp
                        <td class="OneMonthAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_OneMonthAgo) ?? 0 }} :: Last month</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_OneMonthAgo Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_OneMonthAgo) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_TwoMonthsAgo = \App\Models\Maintenance::select('id')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->count();
                            $MaintenanceCost_TwoMonthsAgo = \App\Models\Maintenance::select('Cost')->where('Date', '>=', date('Y-m-d', strtotime("-2 month")))->where('Date', '<', date('Y-m-d', strtotime("-1 month")))->sum('Cost');
                        @endphp
                        <td class="TwoMonthsAgo Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_TwoMonthsAgo) ?? 0 }} :: Two months ago</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_TwoMonthsAgo Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_TwoMonthsAgo) ?? 0 }}</td>
                            @endif
                        @break
                    @case(($Maintenancee->Date < date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_Older = \App\Models\Maintenance::select('id')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->count();
                            $MaintenanceCost_Older = \App\Models\Maintenance::select('Cost')->where('Date', '<', date('Y-m-d', strtotime("-2 month")))->sum('Cost');
                        @endphp
                        <td class="Older Hide HistoryTitle">{{ isset($_GET['FilterValue']) ? '' : number_format($NumberOfRecords_Older) ?? 0 }} :: Older</td>
                            @if (!isset($_GET['FilterValue']))
                                <td class="Cost_Older Hide HistoryTableData">Maintenance cost => ₦ {{ number_format($MaintenanceCost_Older) ?? 0 }}</td>
                            @endif
                        @break
                    @default 
                @endswitch 
            </tr>
            <tr> 
                @php
                    $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Maintenancee->VehicleNumber)->first();  
                @endphp
                <tr> 
                @switch($Maintenancee->Date)
                        @case(date('Y-m-d'))
                            <td class="Today Hide">Today</td>
                            @break 
                        @case($Maintenancee->Date >= date('Y-m-d', strtotime("this week")))
                            <td class="ThisWeek Hide">This week</td>
                            @break 
                        @case(($Maintenancee->Date >= date('Y-m-d', strtotime("last week")))) 
                            <td class="OneWeekAgo Hide">Last week</td>
                            @break
                        @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-2 weeks"))))
                            <td class="TwoWeeksAgo Hide">Two weeks ago</td>
                            @break
                        @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-3 weeks"))))
                            <td class="ThreeWeeksAgo Hide">Three weeks ago</td>
                            @break
                        @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-1 month"))))
                            <td class="OneMonthAgo Hide">Last month</td>
                            @break
                        @case(($Maintenancee->Date >= date('Y-m-d', strtotime("-2 month"))))
                            <td class="TwoMonthsAgo Hide">Two months ago</td>
                            @break
                        @case(($Maintenancee->Date < date('Y-m-d', strtotime("-2 month"))))
                            <td class="Older Hide">Older</td>
                            @break
                        @default 
                    @endswitch 
                </tr> 
                <td>{{ $loop->iteration  + (($Maintenance->currentPage() -1) * $Maintenance->perPage()) }}</td>
                <td class="show-record-x show-record-x-2"><span class="{{ $CarStatus->Status ?? 'INACTIVE' }}"></span>{{ $Maintenancee->VehicleNumber }} <img src="{{ asset('Images/service.png') }}" alt=""></td>
                <span class="VehicleNumber_X_DATA Hide">{{ $Maintenancee->VehicleNumber }}</span>
                <span class="Date_X_DATA Hide">{{ $Maintenancee->Date }}</span>
                <span class="Time_X_DATA Hide">{{ $Maintenancee->Time }}</span>
                <span class="IncidentAction_X_DATA Hide">{{ $Maintenancee->IncidentAction }}</span>
                <span class="ReleaseDate_X_DATA Hide">{{ $Maintenancee->ReleaseDate }}</span>
                <span class="ReleaseTime_X_DATA Hide">{{ $Maintenancee->ReleaseTime }}</span>
                <span class="Cost_X_DATA Hide">₦ {{ empty($Maintenancee->Cost) ? '' : number_format($Maintenancee->Cost) }}</span>
                <span class="InvoiceNumber_X_DATA Hide">{{ $Maintenancee->InvoiceNumber }}</span>
                <span class="Week_X_DATA Hide">{{ $Maintenancee->Week }}</span>
                <td>{{ $Maintenancee->Date }}</td>
                <td>{{ $Maintenancee->Time }}</td>
                <td>
                    <center>
                        <span class="{{ $Maintenancee->IncidentType === 'MAINTENANCE' ? 'MAINTENANCE' : '' }}{{ $Maintenancee->IncidentType === 'ACCIDENT' ? 'ACCIDENT' : '' }}{{ $Maintenancee->IncidentType === 'REPAIR' ? 'REPAIR' : '' }}">
                            {{ $Maintenancee->IncidentType }}
                        </span>
                    </center>
                </td>
                <td>{{ $Maintenancee->IncidentAction }}</td>
                <td>{{ $Maintenancee->ReleaseDate }}</td>
                <td>{{ $Maintenancee->ReleaseTime }}</td>
                <td>₦ {{ empty($Maintenancee->Cost) ? '' : number_format($Maintenancee->Cost) }}</td>
                <td>{{ $Maintenancee->InvoiceNumber }}</td>
                <td>{{ $Maintenancee->Week }}</td>
                <td class="Hide">{{ $Maintenancee->IncidentAttachment }}</td>
            </tr>  
            @endforeach
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By S/N" onkeyup="FilterSN()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Time" onkeyup="FilterTime()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Incident Action" onkeyup="FilterIncidentAction()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Release Date" onkeyup="FilterReleaseDate()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Release Time" onkeyup="FilterReleaseTime()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Cost" onkeyup="FilterCost()"></span> 
                <span><input type="text" id="SearchInput8" placeholder="Filter By Invoice No" onkeyup="FilterInvoiceNo()"></span> 
                <span><input type="text" id="SearchInput9" placeholder="Filter By Weeks" onkeyup="FilterSupplierNo()"></span>  
            </div>
        </table>
        @if(!isset($_GET['Filter_All_Maintenance']) AND !isset($_GET['Filter_Maintenance_Yearly']) AND !isset($_GET['Filter_Maintenance_Range']))
        @php
            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')->sum('Cost');
            $Date_from = \App\Models\Maintenance::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp
        @endif
        @isset($_GET['Filter_All_Maintenance'])
        <div class="total-spent">
            <p>Total amount spent on Maintenance from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarMaintenance) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Maintenance_Yearly'])
        <div class="total-spent">
            <p>Total amount spent on Maintenance for VEHICLE "{{ $_GET['VehicleNo'] }}" in "{{ $_GET['Year'] }}" = ₦ {{ number_format($SumOfCarMaintenance) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Maintenance_Range'])
        <div class="total-spent">
            <p>Total amount spent on Maintenance for VEHICLE "{{ $_GET['VehicleNo'] }}", from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarMaintenance) }}</p>
        </div>
        @endisset
    </div>
    {{ $Maintenance->onEachSide(5)->links() }} 
    <div class="total-spent">
        <p>Total amount spent on Maintenance from "{{ $Date_from->Date ?? 'NULL' }}" till date = ₦ {{ number_format($SumOfCarMaintenance) }}</p>
    </div>
    <script src="{{ asset('Js/ReadOnly/Maintenance.js') }}"></script>
    <script> 
        if (!(window.location.search)) {
            let ExportButton = document.querySelector('.ExportToExcel');
            ExportButton.addEventListener('click', () => {
                window.location = '/Maintenance/Export/all'; 
            });  
        } else {
            let ExportButton = document.querySelector('.ExportToExcel');
            ExportButton.addEventListener('click', () => {
                window.location = '/Maintenance/Export/one'; 
            });  
        }
    </script>
@endsection
