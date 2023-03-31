@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr>
                <th onclick="sortTable(0)">RFL NO</th>
                <th onclick="sortTable(1)">Vehicle no</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Time</th>
                <th onclick="sortTable(4)">K.METER</th>
                <th onclick="sortTable(5)">Terminal No</th>
                <th onclick="sortTable(6)">Card No</th>
                <th onclick="sortTable(7)">Quantity</th>
                <th onclick="sortTable(8)">Amount</th>
                <th onclick="sortTable(9)">Receipt No</th>
                <th onclick="sortTable(10)">KM</th>
                <th onclick="sortTable(11)">[KM/LITER]</th>
            </tr>
            <tr>
                <td>28478f9WUR1</td>
                <td>Vehicle no1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
                <td>28478f9WUR1</td>
            </tr>
            <tr>
                <td>28478f9WUR</td>
                <td>Vehicle no</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
            </tr>
            <tr>
                <td>28478f9WUR</td>
                <td>Vehicle no</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
            </tr>
            <tr>
                <td>28478f9WUR</td>
                <td>Vehicle no</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
            </tr>
            <tr>
                <td>28478f9WUR</td>
                <td>Vehicle no</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
                <td>28478f9WUR</td>
            </tr>
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By S/N" onkeyup="FilterSN()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Time" onkeyup="FilterTime()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By K.METER" onkeyup="FilterKMETER()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Terminal No" onkeyup="FilterTerminalNo()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Card No" onkeyup="FilterCardNo()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Quantity" onkeyup="FilterQuantity()"></span> 
                <span><input type="text" id="SearchInput8" placeholder="Filter By Amount " onkeyup="FilterAmount()"></span> 
                <span><input type="text" id="SearchInput9" placeholder="Filter By Receipt No" onkeyup="FilterReceiptNo()"></span>  
                <span><input type="text" id="SearchInput10" placeholder="Filter By KM " onkeyup="FilterKM()"></span>  
                <span><input type="text" id="SearchInput11" placeholder="Filter By [KM/LITER]" onkeyup="FilterKMLITER()"></span>  
            </div>
        </table>
    </div>
@endsection