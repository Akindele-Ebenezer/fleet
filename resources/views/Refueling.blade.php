@extends('Layouts.Layout2')

@section('Title', 'REFUELING') 
@section('Heading', 'FUEL HISTORY') 

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
                <th onclick="sortTable(9)">Receipt No</th>
                <th onclick="sortTable(10)">KM</th> 
            </tr> 
            @unless (count($Refuelings) > 0)
            <tr>
                <td>No fuel history.</td>
            </tr>    
            @endunless
            @foreach ($Refuelings as $Key => $Refueling) 
            <tr>
                @php
                    $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Refueling->VehicleNumber)->first(); 
                    ////////
                    $CurrentCar = \App\Models\Refueling::select('Mileage')->where('VehicleNumber', $Refueling->VehicleNumber)->orderBy('Date', 'DESC')->get(); 
                    ///////
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
                <span class="ReceiptNo_X_DATA_Edit Hide">{{ $Refueling->ReceiptNo }}</span>
                <span class="Hide"></span>
                <span class="KMLITER_X_DATA_Edit Hide">{{ $Refueling->KMLITER }}</span>
                <td>{{ $Refueling->Date }}</td>
                <td>{{ $Refueling->Time }}</td>
                <td>{{ $Refueling->Mileage }}</td>
                <td>{{ $Refueling->TERNO }}</td>
                <td class="card-numbers-x underline">{{ $Refueling->CardNumber }}</td>
                <td>{{ $Refueling->Quantity }}</td>
                <td>₦ {{ empty($Refueling->Amount) ? '' : number_format($Refueling->Amount) }}</td>
                <td>{{ $Refueling->ReceiptNumber }}</td>
                {{-- ///// --}}
                @for ($i = 0; $i < count($CurrentCar); $i++)  
                    <td>{{ $Refueling->Mileage . ' - ' . $CurrentCar[$i]['Mileage'] . ' - ' . $loop->index }} 
                    </td>
                        @php
                            if (count($CurrentCar) > count($CurrentCar) - 1) {
                                break;
                            } 
                        @endphp 
                @endfor   
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
        {{ $Refuelings->onEachSide(5)->links() }} 
        @if(!isset($_GET['Filter_All_Refueling']) AND !isset($_GET['Filter_Refueling_Yearly']) AND !isset($_GET['Filter_Refueling_Range']))
        @php
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')->sum('Amount');
            $Date_from = \App\Models\Refueling::select('Date')->whereNotNull('Date')->orderBy('Date', 'ASC')->first();
        @endphp
        <div class="total-spent">
            <p>Total amount spent on Refueling from "{{ $Date_from->Date ?? 'NULL' }}" till date = ₦ {{ number_format($SumOfCarRefueling) }}</p>
        </div>
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
@endsection