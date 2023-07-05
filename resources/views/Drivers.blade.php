@extends('Layouts.Layout2')

@section('Title', 'DRIVERS') 
@section('Heading', 'DRIVERS') 

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Assigned Vehicle</th>
                <th onclick="sortTable(2)">Car Owner</th>  
            </tr>   
            @unless (count($Drivers) > 0)
            <tr>
                <td>No drivers available.</td>
            </tr>    
            @endunless
            @foreach ($Drivers as $Driver) 
            <tr class="tr-x">
                <td class="td-x">
                    <div class="x-inner x-inner-2">
                        <h1>{{ $Driver->Driver }}</h1>
                        <span class="Hide">{{ empty($Driver->VehicleNumber) ? 'POOL' : $Driver->VehicleNumber }}</span>
                        <img src="{{ asset('Images/open-document.png')}}" class="OpenDriverDocumentIcon Hide">
                    </div> 
                </td>
                <td>
                    <small><span class="make-x underline car-owners-vehicle">{{ $Driver->Model ?? 'POOL' }}</span> :: <span class="make-x underline car-owners-vehicle">{{ $Driver->VehicleNumber }}</span></small> <br>
                    <span class="{{ $Driver->Status  === 'ACTIVE' ? 'active-x' : 'inactive-x' }}">{{ $Driver->Status }}</span>  
                </td>
                <td class="car-owners-x underline car-owners-vehicle">
                    {{ $Driver->CarOwner }} 
                </td>  
            </tr>   
            @endforeach
        </table>
        {{ $Drivers->onEachSide(5)->links() }}
        @unless (count($Drivers) > 0)
        @include('Includes.EmptyProjectTemplate') 
        @endunless
    </div>
@endsection