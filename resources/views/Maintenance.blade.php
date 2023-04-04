@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">S/N</th>
                <th onclick="sortTable(1)">Vehicle no</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Time</th>
                <th onclick="sortTable(4)">Maintenance Action</th>
                <th onclick="sortTable(5)">Release Date</th>
                <th onclick="sortTable(6)">Release Time</th>
                <th onclick="sortTable(7)">Cost</th>
                <th onclick="sortTable(8)">Invoice No</th>
                <th onclick="sortTable(9)">Supplier No</th>
            </tr> 
            @foreach ($Maintenance as $Maintenancee) 
            <tr> 
                <td>{{ $loop->iteration }}</td>
                <td>{{ $Maintenancee->VehicleNumber }}</td>
                <td>{{ $Maintenancee->Date }}</td>
                <td>{{ $Maintenancee->Time }}</td>
                <td>{{ $Maintenancee->MaintenanceAction }}</td>
                <td>{{ $Maintenancee->ReleaseDate }}</td>
                <td>{{ $Maintenancee->ReleaseTime }}</td>
                <td>{{ $Maintenancee->Cost }}</td>
                <td>{{ $Maintenancee->InvoiceNumber }}</td>
                <td>{{ $Maintenancee->Week }}</td>
            </tr>  
            @endforeach
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By S/N" onkeyup="FilterSN()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Time" onkeyup="FilterTime()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Maintenance Action" onkeyup="FilterMaintenanceAction()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Release Date" onkeyup="FilterReleaseDate()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Release Time" onkeyup="FilterReleaseTime()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Cost" onkeyup="FilterCost()"></span> 
                <span><input type="text" id="SearchInput8" placeholder="Filter By Invoice No" onkeyup="FilterInvoiceNo()"></span> 
                <span><input type="text" id="SearchInput9" placeholder="Filter By Supplier No" onkeyup="FilterSupplierNo()"></span>  
            </div>
        </table>
    </div>
@endsection