@extends('Layouts.Layout2')

@section('Title', 'Edit / REFUELING') 
@section('Heading', 'Edit / REFUELING') 

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">RFL NO</th>
                <th onclick="sortTable(1)">Vehicle Number</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Time</th>
                <th onclick="sortTable(4)">Mileage</th>
                <th onclick="sortTable(5)">Terminal No</th>
                <th onclick="sortTable(6)">Card No</th>
                <th onclick="sortTable(7)">Quantity</th>
                <th onclick="sortTable(8)">Amount</th>
                <th onclick="sortTable(9)">Receipt No</th>
                <th onclick="sortTable(10)">KM</th> 
                <th onclick="sortTable(11)">Fuel Consumption</th> 
            </tr>
            @foreach ($Refueling__MyRecords as $Refueling)
            <tr> 
                <td>{{ $loop->iteration  + (($Refueling__MyRecords->currentPage() -1) * $Refueling__MyRecords->perPage()) }}</td>
                <td class="show-record-x-edit"><img src="{{ asset('Images/oil.png') }}" alt="">{{ $Refueling->VehicleNumber }}</td>
                <span class="VehicleNumber_X_DATA_Edit Hide">{{ $Refueling->VehicleNumber }}</span>
                <span class="Date_X_DATA_Edit Hide">{{ $Refueling->Date }}</span>
                <span class="Time_X_DATA_Edit Hide">{{ $Refueling->Time }}</span>
                <span class="Mileage_X_DATA_Edit Hide">{{ $Refueling->Mileage }}</span>
                <span class="TerminalNo_X_DATA_Edit Hide">{{ $Refueling->TerminalNo }}</span>
                <span class="CardNumber_X_DATA_Edit Hide">{{ $Refueling->CardNumber }}</span>
                <span class="Quantity_X_DATA_Edit Hide">₦ {{ empty($Refueling->Quantity) ? '' : number_format($Refueling->Quantity) }}</span>
                <span class="Amount_X_DATA_Edit Hide">{{ $Refueling->Amount }}</span>
                <span class="ReceiptNo_X_DATA_Edit Hide">{{ $Refueling->ReceiptNo }}</span>
                <span class="Hide"></span>
                <span class="KMLITER_X_DATA_Edit Hide">{{ $Refueling->KMLITER }}</span>
                <td>{{ $Refueling->Date }}</td>
                <td>{{ $Refueling->Time }}</td>
                <td>{{ $Refueling->Mileage }}</td>
                <td>{{ $Refueling->TERNO }}</td>
                <td>{{ $Refueling->CardNumber }}</td>
                <td>{{ $Refueling->Quantity }}</td>
                <td>₦ {{ empty($Refueling->Amount) ? '' : number_format($Refueling->Amount) }}</td>
                <td>{{ $Refueling->ReceiptNumber }}</td> 
                <td>{{ $Refueling->KM }}</td> 
                <td class="Hide">{{ $Refueling->id }}</td>
                <td>{{ $Refueling->Consumption }}</td>
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
        {{ $Refueling__MyRecords->onEachSide(5)->links() }}
        @unless (count($Refueling__MyRecords) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection