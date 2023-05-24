@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">LNO</th>
                <th onclick="sortTable(1)">Card Number</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Amount</th>
                <th onclick="sortTable(4)">Year</th>
                <th onclick="sortTable(5)">Week</th>
                <th onclick="sortTable(6)">Month</th> 
            </tr>
            @foreach ($Deposits_MasterCards as $Deposits_MasterCard)
            <tr> 
                <td>{{ $loop->iteration  + (($Deposits_MasterCards->currentPage() -1) * $Deposits_MasterCards->perPage()) }}</td>
                <td class="show-record-x-edit">{{ $Deposits_MasterCard->CardNumber }}</td> 
                <span class="Date_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Date }}</span>
                <span class="CardNumber_X_DATA_Edit Hide">{{ $Deposits_MasterCard->CardNumber }}</span>
                <span class="Amount_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Amount }}</span>
                <span class="Year_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Year }}</span>
                <span class="Week_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Week }}</span> 
                <span class="Month_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Month }}</span> 
                <td>{{ $Deposits_MasterCard->Date }}</td> 
                <td>₦ {{ empty($Deposits_MasterCard->Amount) ? '' : number_format($Deposits_MasterCard->Amount) }}</td>
                <td>{{ $Deposits_MasterCard->Year }}</td>
                <td>{{ $Deposits_MasterCard->Week }}</td>
                <td>{{ $Deposits_MasterCard->Month }}</td> 
                <td class="Hide">{{ $Deposits_MasterCard->id }}</td>
            </tr> 
            @endforeach  
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By Car infomation    " onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Monthly Budget " onkeyup="FilterNames()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Deposits" onkeyup="FilterCarDetails()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Refueling" onkeyup="FilterRegistrationNumber()"></span>  
                <span><input type="text" id="SearchInput3" placeholder="Filter By Balance" onkeyup="FilterRegistrationNumber()"></span>  
                <span><input type="text" id="SearchInput3" placeholder="Filter By Brought Forward" onkeyup="FilterRegistrationNumber()"></span>  
            </div>
        </table>
        {{ $Deposits_MasterCards->onEachSide(5)->links() }}
        @unless (count($Deposits_MasterCards) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection