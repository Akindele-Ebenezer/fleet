@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <h1 class="table-title">VEHICLE CARDS</h1>
            <tr class="table-head">
                {{-- <th onclick="sortTable(0)">LNO</th> --}}
                <th onclick="sortTable(1)">Vehicle Number</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Card No</th>
                <th onclick="sortTable(4)">Amount</th>
                <th onclick="sortTable(5)">Year</th>
                <th onclick="sortTable(6)">Week</th>
                <th onclick="sortTable(7)">Month</th>
            </tr>
            @unless (count(\App\Models\Deposits::where('UserId', session()->get('Id'))->get()) > 0)
            <tr>
                <td>You don't have Deposits for vehicle cards.</td>
            </tr>    
            @endunless
            @foreach ($Deposits__MyRecords as $Deposit)
            <tr>  
                <td class="show-record-x-edit"><img src="{{ asset('Images/edit.png') }}" alt="">{{ $Deposit->VehicleNumber }}</td>
                <span class="VehicleNumber_X_DATA_Edit Hide">{{ $Deposit->VehicleNumber }}</span>
                <span class="Date_X_DATA_Edit Hide">{{ $Deposit->Date }}</span>
                <span class="CardNumber_X_DATA_Edit Hide">{{ $Deposit->CardNumber }}</span>
                <span class="Amount_X_DATA_Edit Hide">{{ $Deposit->Amount }}</span>
                <span class="Year_X_DATA_Edit Hide">{{ $Deposit->Year }}</span>
                <span class="Week_X_DATA_Edit Hide">{{ $Deposit->Week }}</span> 
                <span class="Month_X_DATA_Edit Hide">{{ $Deposit->Month }}</span> 
                <td>{{ $Deposit->Date }}</td>
                <td>{{ $Deposit->CardNumber }}</td>
                <td>₦ {{ empty($Deposit->Amount) ? '' : number_format($Deposit->Amount) }}</td>
                <td>{{ $Deposit->Year }}</td>
                <td>{{ $Deposit->Week }}</td>
                <td>{{ $Deposit->Month }}</td> 
                <td class="Hide">{{ $Deposit->id }}</td>
            </tr> 
            @endforeach    
            <div class="table-head filter"> 
                {{-- <span><input type="text" id="SearchInput0" placeholder="Filter By LNO" onkeyup="FilterLNO()"></span>  --}}
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Card No" onkeyup="FilterCardNo()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Amount" onkeyup="FilterAmount()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Year" onkeyup="FilterYear()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Week " onkeyup="FilterWeek()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Month" onkeyup="FilterMonth()"></span> 
            </div>
        </table>
        {{ $Deposits__MyRecords->onEachSide(5)->links() }}
        <table class="table" id="Table">
            <h1 class="table-title">MASTER CARDS</h1>
            <tr class="table-head">
                {{-- <th onclick="sortTable(0)">LNO</th> --}}
                <th onclick="sortTable(1)">Card Type</th>
                <th onclick="sortTable(2)">Date</th>
                <th onclick="sortTable(3)">Card No</th>
                <th onclick="sortTable(4)">Amount</th>
                <th onclick="sortTable(5)">Year</th>
                <th onclick="sortTable(6)">Week</th>
                <th onclick="sortTable(7)">Month</th>
            </tr> 
            @unless (count(\App\Models\DepositsMasterCard::where('UserId', session()->get('Id'))->get()) > 0)
            <tr>
                <td>You don't have Deposits for master cards.</td>
            </tr>    
            @endunless
            @foreach ($DepositsMasterCard__MyRecords as $Deposits_MasterCard)
            <tr>  
                <td class="show-master-card-record-x-edit"><img src="{{ asset('Images/edit.png') }}" alt="">MASTER</td> 
                <span class="Date_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Date }}</span>
                <span class="CardNumber_X_DATA_Edit Hide">{{ $Deposits_MasterCard->CardNumber }}</span>
                <span class="Amount_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Amount }}</span>
                <span class="Year_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Year }}</span>
                <span class="Week_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Week }}</span> 
                <span class="Month_X_DATA_Edit Hide">{{ $Deposits_MasterCard->Month }}</span> 
                <td>{{ $Deposits_MasterCard->Date }}</td> 
                <td>{{ $Deposits_MasterCard->CardNumber }}</td> 
                <td>₦ {{ empty($Deposits_MasterCard->Amount) ? '' : number_format($Deposits_MasterCard->Amount) }}</td>
                <td>{{ $Deposits_MasterCard->Year }}</td>
                <td>{{ $Deposits_MasterCard->Week }}</td>
                <td>{{ $Deposits_MasterCard->Month }}</td> 
                <td class="Hide">{{ $Deposits_MasterCard->id }}</td>
            </tr> 
            @endforeach  
            <div class="table-head filter"> 
                {{-- <span><input type="text" id="SearchInput0" placeholder="Filter By LNO" onkeyup="FilterLNO()"></span>  --}}
                <span><input type="text" id="SearchInput1" placeholder="Filter By Vehicle no" onkeyup="FilterVehicleNo()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Date" onkeyup="FilterDate()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Card No" onkeyup="FilterCardNo()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Amount" onkeyup="FilterAmount()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Year" onkeyup="FilterYear()"></span> 
                <span><input type="text" id="SearchInput6" placeholder="Filter By Week " onkeyup="FilterWeek()"></span> 
                <span><input type="text" id="SearchInput7" placeholder="Filter By Month" onkeyup="FilterMonth()"></span> 
            </div>
        </table>
        {{ $DepositsMasterCard__MyRecords->onEachSide(5)->links() }}
        @unless (count($Deposits__MyRecords) > 0 || count($DepositsMasterCard__MyRecords) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection