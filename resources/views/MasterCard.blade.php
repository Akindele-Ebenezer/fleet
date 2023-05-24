@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table table-2 list" id="Table">
            <tr class="table-head">
                {{-- <th onclick="sortTable(0)">#ID</th> --}}
                <th onclick="sortTable(1)">Card Infomation</th> 
                <th onclick="sortTable(2)">Monthly Budget</th> 
                <th onclick="sortTable(3)">Deposits</th> 
                <th onclick="sortTable(4)">Refueling</th> 
                <th onclick="sortTable(5)">Balance</th> 
                <th onclick="sortTable(6)">Brought Forward</th> 
                <th onclick="sortTable(7)"></th> 
            </tr> 
            @foreach ($MasterCards as $MasterCard)  
            @if (empty($MasterCard->CardNumber)) @continue; @endif
            <tr> 
                {{-- <td>{{ $MasterCard->id }}</td> --}}
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>{{ $MasterCard->CardNumber }}</h1> 
                                <span class="type">Credit Card</span>
                                <span class="{{ $MasterCard->Status === 'ACTIVE' ? 'active' : '' }}{{ $MasterCard->Status === 'INACTIVE' ? 'inactive' : '' }}">{{ $MasterCard->Status === 'ACTIVE' ? 'active' : '' }}{{ $MasterCard->Status === 'INACTIVE' ? 'inactive' : '' }}</span>
                            </div>  
                            <div class="inner">
                                <span class="used-by">{{ $MasterCard->VehicleNumber }}</span>
                            </div>  
                        </div>  
                    </div> 
                 </td> 
                <td>  
                    ₦ {{ number_format($MasterCard->MonthlyBudget) }}
                </td> 
                @php
                    $Deposits = \App\Models\Deposits::where('CardNumber', $MasterCard->CardNumber)->sum('Amount');
                    $Refueling = \App\Models\Refueling::where('CardNumber', $MasterCard->CardNumber)->sum('Amount');
                @endphp
                <td>  
                    ₦ {{ number_format($Deposits) }}
                </td> 
                <td>  
                    ₦ {{ number_format($Refueling) }}
                </td> 
                <td>  
                    ₦ {{ number_format($MasterCard->Balance) }}
                </td> 
                <td>  
                    ₦ {{ number_format($MasterCard->MonthlyBudget - $MasterCard->Balance) }}
                </td> 
                <td>  
                    <button class="action-x manage">MANAGE</button>
                </td> 
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
        {{ $MasterCards->onEachSide(5)->links() }}
        {{-- @unless (count($MasterCards_Absolutes) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless --}}
    </div>
@endsection