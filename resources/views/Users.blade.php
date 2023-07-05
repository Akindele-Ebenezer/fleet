@extends('Layouts.Layout2')
@php
    
    $HandleNumbers = fn($Value) => 
                        ($Value > 999 AND $Value < 1000000) ? number_format($Value / 1000, 1) . 'K' : 
                        ($Value > 999999 ? number_format($Value / 1000, 1) . 'M' : $Value); 
@endphp
@section('Title', 'USERS') 
@section('Heading', 'USERS') 

@section('Content')
    <div class="table-wrapper"> 
        <table class="table table-2 list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">Username</th>
                <th onclick="sortTable(3)">Role</th>
                <th onclick="sortTable(4)">Records</th> 
                <th onclick="sortTable(6)">Cars Registered</th>
                <th onclick="sortTable(7)">Last Login</th>
                <th onclick="sortTable(8)">Last Logout</th>
            </tr>
            @foreach ($Users as $User)
            @php
                $Id_CURRENT_USER = $User->id;
                $NumberOfMaintenance_CURRENT_USER = \App\Models\Maintenance::select('id')->where('UserId', $Id_CURRENT_USER)->count();
                $NumberOfRepairs_CURRENT_USER = \App\Models\Maintenance::select('id')->where('UserId', $Id_CURRENT_USER)->select('id')->where('IncidentType', 'REPAIR')->count();
                $NumberOfRefueling_CURRENT_USER = \App\Models\Refueling::select('id')->where('UserId', $Id_CURRENT_USER)->count();
                $NumberOfDeposits_CURRENT_USER = \App\Models\Deposits::select('id')->where('UserId', $Id_CURRENT_USER)->count();
                $NumberOfCarsRegistered_CURRENT_USER = \App\Models\Car::select('id')->whereNotNull('VehicleNumber')->where('UserId', $Id_CURRENT_USER)->count();
 
                $NumberOfAllRecords_CURRENT_USER = $NumberOfMaintenance_CURRENT_USER + $NumberOfRepairs_CURRENT_USER + $NumberOfRefueling_CURRENT_USER + $NumberOfDeposits_CURRENT_USER;

                
                $CarRegistration_PRIVILEGE = \DB::table('user_privileges')
                                                        ->select('CarRegistration')
                                                        ->where('UserId', $User->id) 
                                                        ->orderBy('Date', 'DESC') 
                                                        ->orderBy('TimeIn', 'DESC') 
                                                        ->first(); 
                    $AddMaintenance_PRIVILEGE = \DB::table('user_privileges')
                                                        ->select('AddMaintenance')
                                                        ->where('UserId', $User->id) 
                                                        ->orderBy('Date', 'DESC') 
                                                        ->orderBy('TimeIn', 'DESC') 
                                                        ->first(); 
                    $FuelManagement_PRIVILEGE = \DB::table('user_privileges')
                                                        ->select('FuelManagement')
                                                        ->where('UserId', $User->id) 
                                                        ->orderBy('Date', 'DESC') 
                                                        ->orderBy('TimeIn', 'DESC') 
                                                        ->first(); 
                    $MakeDeposits_PRIVILEGE = \DB::table('user_privileges')
                                                        ->select('MakeDeposits')
                                                        ->where('UserId', $User->id) 
                                                        ->orderBy('Date', 'DESC') 
                                                        ->orderBy('TimeIn', 'DESC') 
                                                        ->first(); 
                    $CardManagement_PRIVILEGE = \DB::table('user_privileges')
                                                        ->select('CardManagement')
                                                        ->where('UserId', $User->id) 
                                                        ->orderBy('Date', 'DESC') 
                                                        ->orderBy('TimeIn', 'DESC') 
                                                        ->first(); 
                    $DocumentManagement_PRIVILEGE = \DB::table('user_privileges')
                                                        ->select('DocumentManagement')
                                                        ->where('UserId', $User->id) 
                                                        ->orderBy('Date', 'DESC') 
                                                        ->orderBy('TimeIn', 'DESC') 
                                                        ->first(); 
                    $UserEnabled = \DB::table('user_privileges')
                                        ->select('id')
                                        ->where('UserId', $User->id) 
                                        ->first();
            @endphp
            <tr> 
                <td>
                    {{ $loop->iteration  + (($Users->currentPage() -1) * $Users->perPage()) }} 
                </td>  
                <td class="{{ request()->session()->get('Role') === 'ADMIN' ? 'show-record-x-edit admin' : '' }}">
                    <div class="{{ (request()->session()->get('Role') === 'ADMIN') ? 'manage-user' : 'user-email' }}">
                        <img src="{{ asset('Images/' . (!empty($UserEnabled->id) ? 'enabled-user.png' : 'disabled-user.png')) }}"> <span>{{ $User->email }} </span> <strong class="{{ $User->status === 'ONLINE' ? 'online' : 'offline' }}"></strong>
                        @if (request()->session()->get('Role') === 'ADMIN')
                        <button class="action-x">MANAGE</button>
                        @endif   
                    </div>
                </td> 
                <td>{{ $User->name }}</td>
                <td>
                    <center>
                        <span class="{{ $User->role === 'ADMIN' ? 'admin' : '' }}{{ $User->role === 'USER' ? 'user' : '' }}">
                            {{ $User->role }}
                        </span>
                    </center>
                </td>
                @if (request()->session()->get('Role') === 'ADMIN')
                <td class="Hide">{{ $User->password }}</td>
                <td class="Hide">{{ $User->id }}</td> 
                <td class="Hide">{{ $CarRegistration_PRIVILEGE->CarRegistration ?? false }}</td>
                <td class="Hide">{{ $AddMaintenance_PRIVILEGE->AddMaintenance ?? false }}</td>
                <td class="Hide">{{ $FuelManagement_PRIVILEGE->FuelManagement ?? false }}</td>
                <td class="Hide">{{ $MakeDeposits_PRIVILEGE->MakeDeposits ?? false }}</td>
                <td class="Hide">{{ $CardManagement_PRIVILEGE->CardManagement ?? false }}</td>
                <td class="Hide">{{ (!empty($UserEnabled->id) ? 'Enabled' : 'Disabled') }}</td>
                <td class="Hide">{{ $DocumentManagement_PRIVILEGE->DocumentManagement ?? false }}</td>
                @endif
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>: {{ $HandleNumbers($NumberOfAllRecords_CURRENT_USER) }}</h1> 
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Maintenance</span>
                                    <span>{{ $HandleNumbers($NumberOfMaintenance_CURRENT_USER) }}</span> 
                                </div>
                                <div class="inner-x">
                                    <span>Repairs</span>
                                    <span>{{ $HandleNumbers($NumberOfRepairs_CURRENT_USER) }}</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Deposits</span>
                                    <span>{{ $HandleNumbers($NumberOfDeposits_CURRENT_USER) }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>Refueling</span>
                                    <span>{{ $HandleNumbers($NumberOfRefueling_CURRENT_USER) }}</span>
                                </div>
                            </div> 
                        </div>  
                    </div>
                    {{ $User->records }}
                </td> 
                <td>{{ $NumberOfCarsRegistered_CURRENT_USER }}</td>
                <td>{{ $User->last_login }}</td>
                <td>{{ $User->last_logout }}</td>
            </tr> 
            @endforeach 
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By #" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Email " onkeyup="FilterEmail()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Username" onkeyup="FilterUsername()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Role" onkeyup="FilterRole()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Records" onkeyup="FilterRecords()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Status" onkeyup="FilterStatus()"></span>  
                <span><input type="text" id="SearchInput6" placeholder="Filter By Cars Registered" onkeyup="FilterCarsRegistered()"></span>  
            </div>
        </table>
        {{ $Users->onEachSide(5)->links() }}
        @unless (count($Users) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection