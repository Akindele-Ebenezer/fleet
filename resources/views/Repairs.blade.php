@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">S/N</th>
                <th onclick="sortTable(1)">Vehicle no</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Time</th>
                <th onclick="sortTable(4)">Repair Action</th>
                <th onclick="sortTable(5)">Release Date</th>
                <th onclick="sortTable(6)">Release Time</th>
                <th onclick="sortTable(7)">Cost</th>
                <th onclick="sortTable(8)">Invoice No</th>
                <th onclick="sortTable(9)">Weeks</th>
            </tr>
            @foreach ($Repairs as $Repair) 
            <tr> 
                @php
                    $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Repair->VehicleNumber)->first();  
                @endphp
                <td>{{ $loop->iteration  + (($Repairs->currentPage() -1) * $Repairs->perPage()) }}</td>
                <td class="show-record-x show-record-x-2"><span class="{{ $CarStatus->Status ?? 'INACTIVE' }}"></span>{{ $Repair->VehicleNumber }}</td>
                <span class="VehicleNumber_X_DATA Hide">{{ $Repair->VehicleNumber }}</span>
                <span class="Date_X_DATA Hide">{{ $Repair->Date }}</span>
                <span class="Time_X_DATA Hide">{{ $Repair->Time }}</span>
                <span class="RepairAction_X_DATA Hide">{{ $Repair->RepairAction }}</span>
                <span class="ReleaseDate_X_DATA Hide">{{ $Repair->ReleaseDate }}</span>
                <span class="ReleaseTime_X_DATA Hide">{{ $Repair->ReleaseTime }}</span>
                <span class="Cost_X_DATA Hide">₦ {{ empty($Repair->Cost) ? '' : number_format($Repair->Cost) }}</span>
                <span class="InvoiceNumber_X_DATA Hide">{{ $Repair->InvoiceNumber }}</span>
                <span class="Week_X_DATA Hide">{{ $Repair->Week }}</span>
                <td>{{ $Repair->Date }}</td>
                <td>{{ $Repair->Time }}</td>
                <td>{{ $Repair->RepairAction }}</td>
                <td>{{ $Repair->ReleaseDate }}</td>
                <td>{{ $Repair->ReleaseTime }}</td>
                <td>₦ {{ empty($Repair->Cost) ? '' : number_format($Repair->Cost) }}</td>
                <td>{{ $Repair->InvoiceNumber }}</td>
                <td>{{ $Repair->Week }}</td>
            </tr> 
            @endforeach
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By S/N" onkeyup="FilterSN()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterCarVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Time" onkeyup="FilterTime()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Repair Action" onkeyup="FilterRepairAction()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Release Date" onkeyup="FilterReleaseDate()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Release Time" onkeyup="FilterReleaseTime()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Cost" onkeyup="FilterCost()"></span> 
                <span><input type="text" id="SearchInput8" placeholder="Filter By Invoice No" onkeyup="FilterInvoiceNo()"></span> 
                <span><input type="text" id="SearchInput9" placeholder="Filter By Weeks" onkeyup="FilterWeeks()"></span>  
            </div>
        </table>
        {{ $Repairs->onEachSide(5)->links() }}
        @unless (count($Repairs) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
        @if(!isset($_GET['Filter_All_Repairs']) AND !isset($_GET['Filter_Repairs_Yearly']) AND !isset($_GET['Filter_Repairs_Range']))
        @php
            $SumOfCarRepairs = \App\Models\Repair::select('Cost')->sum('Cost');
            $Date_from = \App\Models\Repair::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp
        <div class="total-spent">
            <p>Total amount spent on Repairs from "{{ $Date_from->Date }}" till date = ₦ {{ number_format($SumOfCarRepairs) }}</p>
        </div>
        @endif
        @isset($_GET['Filter_All_Repairs'])
        <div class="total-spent">
            <p>Total amount spent on Repairs from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarRepairs) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Repairs_Yearly'])
        <div class="total-spent">
            <p>Total amount spent on Repairs for VEHICLE "{{ $_GET['VehicleNo'] }}" in "{{ $_GET['Year'] }}" = ₦ {{ number_format($SumOfCarRepairs) }}</p>
        </div>
        @endisset
        @isset($_GET['Filter_Repairs_Range'])
        <div class="total-spent">
            <p>Total amount spent on Repairs for VEHICLE "{{ $_GET['VehicleNo'] }}", from "{{ $_GET['Date_From'] }}" to "{{ $_GET['Date_To'] }}" = ₦ {{ number_format($SumOfCarRepairs) }}</p>
        </div>
        @endisset
    </div>
@endsection