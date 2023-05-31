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
            @foreach ($Cars as $Car)  
            @if (empty($Car->CardNumber)) @continue; @endif
            <tr> 
                {{-- <td>{{ $Car->id }}</td> --}}
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>{{ $Car->CardNumber }}</h1> 
                                <span class="type">Credit Card</span>
                                <span class="{{ $Car->Status === 'ACTIVE' ? 'active' : '' }}{{ $Car->Status === 'INACTIVE' ? 'inactive' : '' }}">{{ $Car->Status === 'ACTIVE' ? 'active' : '' }}{{ $Car->Status === 'INACTIVE' ? 'inactive' : '' }}</span> <br> {{ $Car->DateIn }}
                            </div>  
                            <div class="inner">
                                <span class="used-by">{{ $Car->VehicleNumber }}</span>
                            </div>  
                        </div>  
                    </div> 
                 </td> 
                <td>  
                    ₦ {{ number_format($Car->MonthlyBudget) }}
                </td> 
                @php
                    $Deposits = \App\Models\Deposits::where('CardNumber', $Car->CardNumber)->sum('Amount');
                    $Refueling = \App\Models\Refueling::where('CardNumber', $Car->CardNumber)->sum('Amount');
                @endphp
                <td>  
                    ₦ {{ number_format($Deposits) }}
                </td> 
                <td>  
                    ₦ {{ number_format($Refueling) }}
                </td> 
                <td>  
                    ₦ {{ number_format($Car->Balance) }}
                </td> 
                <td>  
                    ₦ {{ number_format($Car->MonthlyBudget - $Car->Balance) }}
                </td> 
                <td>  
                    <button class="action-x manage">MANAGE</button>
                    <span class="Hide">{{ $Car->CardNumber }}</span>
                    <span class="Hide">{{ $Car->DateIn }}</span>
                    <span class="Hide">{{ $Car->MonthlyBudget }}</span>
                    <span class="Hide">{{ $Car->Balance }}</span>
                    <span class="Hide">{{ $Car->Status }}</span>
                    <span class="Hide">{{ $Car->id }}</span>
                    <span class="Hide">{{ $Car->VehicleNumber }}</span>
                </td> 
            </tr> 
            @endforeach 
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By Car Information    " onkeyup="FilterCarInformation()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Monthly Budget " onkeyup="FilterMonthlyBudget()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Deposits" onkeyup="FilterCarDeposits()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span>  
                <span><input type="text" id="SearchInput4" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span>  
                <span><input type="text" id="SearchInput5" placeholder="Filter By Brought Forward" onkeyup="FilterBroughtForward()"></span>  
            </div>
        </table>
        {{ $Cars->onEachSide(5)->links() }}
        {{-- @unless (count($Cars_Absolutes) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless --}}
    </div>
@endsection