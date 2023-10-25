@php
    $Cars_Absolute = \App\Models\Car::whereNotNull('VehicleNumber')->get();
@endphp
@extends('Layouts.Layout2')

@section('Title', 'Edit | MAINTENANCE') 
@section('Heading', 'Edit | MAINTENANCE') 

@include('Components.AddMaintenanceComponent')
@include('Components.EditMaintenanceComponent')
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
            @foreach ($Maintenance__MyRecords as $Maintenance)
            <tr> 
                <td>{{ $loop->iteration  + (($Maintenance__MyRecords->currentPage() -1) * $Maintenance__MyRecords->perPage()) }}</td>
                <td class="show-record-x-edit"><img src="{{ asset('Images/adjust.png') }}" alt="">{{ $Maintenance->VehicleNumber }}</td>
                <span class="VehicleNumber_X_DATA_Edit Hide">{{ $Maintenance->VehicleNumber }}</span>
                <span class="Date_X_DATA_Edit Hide">{{ $Maintenance->Date }}</span>
                <span class="Time_X_DATA_Edit Hide">{{ $Maintenance->Time }}</span>
                <span class="IncidentAction_X_DATA_Edit Hide">{{ $Maintenance->IncidentAction }}</span>
                <span class="ReleaseDate_X_DATA_Edit Hide">{{ $Maintenance->ReleaseDate }}</span>
                <span class="ReleaseTime_X_DATA_Edit Hide">{{ $Maintenance->ReleaseTime }}</span>
                <span class="Cost_X_DATA_Edit Hide">₦ {{ empty($Maintenance->Cost) ? '' : number_format($Maintenance->Cost) }}</span>
                <span class="InvoiceNumber_X_DATA_Edit Hide">{{ $Maintenance->InvoiceNumber }}</span>
                <span class="Week_X_DATA_Edit Hide">{{ $Maintenance->Week }}</span>
                <td>{{ $Maintenance->Date }}</td>
                <td>{{ $Maintenance->Time }}</td>
                <td>
                    <center>
                        <span class="{{ $Maintenance->IncidentType === 'MAINTENANCE' ? 'MAINTENANCE' : '' }} {{ $Maintenance->IncidentType === 'ACCIDENT' ? 'ACCIDENT' : '' }} {{ $Maintenance->IncidentType === 'REPAIR' ? 'REPAIR' : '' }} maintenance-x underline">
                            {{ $Maintenance->IncidentType }}
                        </span>
                    </center>
                </td>
                <td>{{ $Maintenance->IncidentAction }}</td>
                <td>{{ $Maintenance->ReleaseDate }}</td>
                <td>{{ $Maintenance->ReleaseTime }}</td>
                <td>₦ {{ empty($Maintenance->Cost) ? '' : number_format($Maintenance->Cost) }}</td>
                <td>{{ $Maintenance->InvoiceNumber }}</td>
                <td>{{ $Maintenance->Week }}</td>
                <td class="Hide">{{ $Maintenance->id }}</td>
                <td class="Hide">{{ $Maintenance->IncidentAttachment }}</td>
            </tr> 
            @endforeach  
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By S/N" onkeyup="FilterSN()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Time" onkeyup="FilterTime()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Incident Type" onkeyup="FilterIncidentType()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Incident Action" onkeyup="FilterIncidentAction()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Release Date" onkeyup="FilterReleaseDate()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Release Time" onkeyup="FilterReleaseTime()"></span> 
                <span><input type="text" id="SearchInput8" placeholder="Filter By Cost" onkeyup="FilterCost()"></span> 
                <span><input type="text" id="SearchInput9" placeholder="Filter By Invoice No" onkeyup="FilterInvoiceNo()"></span> 
                <span><input type="text" id="SearchInput10" placeholder="Filter By Weeks" onkeyup="FilterSupplierNo()"></span>  
            </div>
        </table>
        @unless (count($Maintenance__MyRecords) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
    {{ $Maintenance__MyRecords->onEachSide(5)->links() }}
    <script src="{{ asset('Js/Edit/Maintenance.js') }}"></script>
    <script>
        let ExportButton = document.querySelector('.ExportToExcel');
        ExportButton.addEventListener('click', () => {
            window.location = '/Maintenance/Export/all'; 
        });
    </script>
@endsection
