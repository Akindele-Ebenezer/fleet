@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table table-2 list" id="Table">
            <tr class="table-head">
                {{-- <th onclick="sortTable(0)">#ID</th> --}}
                <th onclick="sortTable(0)">Card Infomation</th> 
                <th onclick="sortTable(1)">Monthly Budget</th> 
                <th onclick="sortTable(2)">Deposits</th> 
                <th onclick="sortTable(3)">Refueling</th> 
                <th onclick="sortTable(4)">Balance</th> 
                <th onclick="sortTable(5)">Brought Forward</th> 
                <th onclick="sortTable(6)"></th> 
            </tr> 
            @php 
                $CardManagement_USER = \DB::table('user_privileges')
                                                ->select('CardManagement')
                                                ->where('UserId', session()->get('Id'))
                                                ->first();   
            @endphp
            @foreach ($MasterCards as $MasterCard)  
            @if (empty($MasterCard->CardNumber)) @continue; @endif
            <tr> 
                {{-- <td>{{ $MasterCard->id }}</td> --}}
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1 class="card-number">{{ $MasterCard->CardNumber }}</h1> 
                                <span class="type">Master Card</span>
                                <span class="{{ $MasterCard->Status === 'ACTIVE' ? 'active' : '' }}{{ $MasterCard->Status === 'INACTIVE' ? 'inactive' : '' }} status">{{ $MasterCard->Status === 'ACTIVE' ? 'active' : '' }}{{ $MasterCard->Status === 'INACTIVE' ? 'inactive' : '' }}</span> <br>
                                <span class="used-by">MASTER</span>  {{ $MasterCard->Date }} :: {{ $MasterCard->Vendor }}
                            </div>   
                        </div>  
                    </div> 
                 </td> 
                <td>  
                    ₦ {{ number_format($MasterCard->MonthlyBudget) }}
                </td> 
                @php
                    $Deposits = \App\Models\DepositsMasterCard::where('CardNumber', $MasterCard->CardNumber)->sum('Amount');
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
                    <button class="action-x {{ $CardManagement_USER->CardManagement ?? 'off' === 'on' ? 'manage-master-card' : 'permission-denied' }}">MANAGE</button>
                    <span class="Hide">{{ $MasterCard->CardNumber }}</span>
                    <span class="Hide">{{ $MasterCard->Date }}</span>
                    <span class="Hide">{{ $MasterCard->MonthlyBudget }}</span>
                    <span class="Hide">{{ $MasterCard->Balance }}</span>
                    <span class="Hide">{{ $MasterCard->Status }}</span>
                    <span class="Hide">{{ $MasterCard->id }}</span>
                    <span class="Hide">{{ $MasterCard->Vendor }}</span>
                </td> 
            </tr> 
            @endforeach 
            @foreach ($Cars as $Car)  
            @if (empty($Car->CardNumber)) @continue; @endif
            <tr> 
                {{-- <td>{{ $Car->id }}</td> --}}
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1 class="card-number">{{ $Car->CardNumber }}</h1> 
                                <span class="type">{{ $Car->Maker . ' :: ' }}{{ $Car->Model ?? 'Fleet Card' }}</span>
                                <span class="{{ $Car->Status === 'ACTIVE' ? 'active' : '' }}{{ $Car->Status === 'INACTIVE' ? 'inactive' : '' }} status">{{ $Car->Status === 'ACTIVE' ? 'active' : '' }}{{ $Car->Status === 'INACTIVE' ? 'inactive' : '' }}</span> <br>
                                <span class="used-by">{{ $Car->VehicleNumber }}</span>
                                 {{ $Car->DateIn }} :: {{ $Car->CardVendor }}
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
                    <button class="action-x {{ ($CardManagement_USER->CardManagement ?? 'off' === 'on') ? 'manage' : 'permission-denied' }}">MANAGE</button>
                    <span class="Hide">{{ $Car->CardNumber }}</span>
                    <span class="Hide">{{ $Car->DateIn }}</span>
                    <span class="Hide">{{ $Car->MonthlyBudget }}</span>
                    <span class="Hide">{{ $Car->Balance }}</span>
                    <span class="Hide">{{ $Car->Status }}</span>
                    <span class="Hide">{{ $Car->id }}</span>
                    <span class="Hide">{{ $Car->VehicleNumber }}</span>
                    <span class="Hide">{{ $Car->CardVendor }}</span>
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
        @unless (count($Cars) > 0 AND count($MasterCards) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection