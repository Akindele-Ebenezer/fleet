@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr>
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)">Vehicle No</th>
                <th onclick="sortTable(2)">Status</th>
                <th onclick="sortTable(3)">Price</th>
                <th onclick="sortTable(4)">Driver</th>
                <th onclick="sortTable(5)">Consumption</th>
                <th onclick="sortTable(6)">Refueling</th>
                <th onclick="sortTable(7)">Balance</th>
            </tr> 
            <tr>
                <td>JSFSK@*IWR1</td>
                <td>JSFSK@*IWR1</td>
                <td>JSFSK@*IWR1</td>
                <td>JSFSK@*IWR1</td>
                <td>JSFSK@*IWR1</td>
                <td>JSFSK@*IWR1</td>
                <td>JSFSK@*IWR1</td>
                <td>JSFSK@*IWR1</td>
            </tr>
            <tr>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
            </tr>
            <tr>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
            </tr>
            <tr>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
            </tr>
            <tr>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
            </tr>
            <tr>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
            </tr>
            <tr>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
            </tr>
            <tr>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
                <td>JSFSK@*IWR</td>
            </tr>
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By #" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle No " onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Status" onkeyup="FilterStatus()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Price" onkeyup="FilterPrice()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Driver" onkeyup="FilterDriver()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Consumption" onkeyup="FilterConsumption()"></span>  
                <span><input type="text" id="SearchInput6" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span>  
                <span><input type="text" id="SearchInput7" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span>  
            </div>
        </table>
    </div>
@endsection