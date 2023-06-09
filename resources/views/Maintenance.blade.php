@extends('Layouts.Layout2')

@section('Title', 'MAINTENANCE') 
@section('Heading', 'MAINTENANCE') 

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">S/N</th>
                <th onclick="sortTable(1)">Vehicle Number</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Time</th>
                <th onclick="sortTable(4)">Incident Type</th>
                <th onclick="sortTable(5)">Incident Action</th>
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
            <tr> 
                @php
                    $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Maintenancee->VehicleNumber)->first();  
                @endphp
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
        {{ $Maintenance->onEachSide(5)->links() }} 
        @if(!isset($_GET['Filter_All_Maintenance']) AND !isset($_GET['Filter_Maintenance_Yearly']) AND !isset($_GET['Filter_Maintenance_Range']))
        @php
            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')->sum('Cost');
            $Date_from = \App\Models\Maintenance::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp
        <div class="total-spent">
            <p>Total amount spent on Maintenance from "{{ $Date_from->Date ?? 'NULL' }}" till date = ₦ {{ number_format($SumOfCarMaintenance) }}</p>
        </div>
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
@endsection