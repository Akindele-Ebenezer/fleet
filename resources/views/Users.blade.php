@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table table-2 list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">Username</th>
                <th onclick="sortTable(3)">Role</th>
                <th onclick="sortTable(4)">Records</th>
                <th onclick="sortTable(5)">Status</th>
                <th onclick="sortTable(6)">Cars Registered</th>
            </tr>
            @foreach ($Users as $User)
            @php
                $Id_CURRENT_USER = $User->id;
                $NumberOfMaintenance_CURRENT_USER = \App\Models\Maintenance::where('UserId', $Id_CURRENT_USER)->count();
                $NumberOfRepairs_CURRENT_USER = \App\Models\Repair::where('UserId', $Id_CURRENT_USER)->count();
                $NumberOfRefueling_CURRENT_USER = \App\Models\Refueling::where('UserId', $Id_CURRENT_USER)->count();
                $NumberOfDeposits_CURRENT_USER = \App\Models\Deposits::where('UserId', $Id_CURRENT_USER)->count();
                $NumberOfCarsRegistered_CURRENT_USER = \App\Models\Car::where('UserId', $Id_CURRENT_USER)->count();
 
                $NumberOfAllRecords_CURRENT_USER = $NumberOfMaintenance_CURRENT_USER + $NumberOfRepairs_CURRENT_USER + $NumberOfRefueling_CURRENT_USER + $NumberOfDeposits_CURRENT_USER;
            @endphp
            <tr> 
                <td>{{ $loop->iteration  + (($Users->currentPage() -1) * $Users->perPage()) }}</td>  
                <td class="{{ request()->session()->get('Role') === 'ADMIN' ? 'show-record-x-edit' : '' }}">{{ $User->email }}</td> 
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
                @endif
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>: {{ $NumberOfAllRecords_CURRENT_USER }}</h1> 
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Maintenance</span>
                                    <span>{{ $NumberOfMaintenance_CURRENT_USER }}</span> 
                                </div>
                                <div class="inner-x">
                                    <span>Repairs</span>
                                    <span>{{ $NumberOfRepairs_CURRENT_USER }}</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Deposits</span>
                                    <span>{{ $NumberOfDeposits_CURRENT_USER }}</span>
                                </div>
                                <div class="inner-x">
                                    <span>Refueling</span>
                                    <span>{{ $NumberOfRefueling_CURRENT_USER }}</span>
                                </div>
                            </div> 
                        </div>  
                    </div>
                    {{ $User->records }}</td>
                <td>{{ $User->status }}</td>
                <td>{{ $NumberOfCarsRegistered_CURRENT_USER }}</td>
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