@extends('Layouts.Layout2')

@section('Title', 'INSPECTION REPORT') 
@section('Heading', 'INSPECTION REPORT') 
@section('Button_1', 'Explore Cars') 

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">S/N</th>
                <th onclick="sortTable(1)">Inspection Number</th>
                <th onclick="sortTable(2)">Vehicle Plate #</th>
                <th onclick="sortTable(3)">Date Inspected</th>
                <th onclick="sortTable(4)">Driver</th>
                <th onclick="sortTable(5)">Status</th> 
                <th onclick="sortTable(6)">Weeks</th>
            </tr> 
            {{-- @unless (count($Maintenance) > 0)
            <tr>
                <td>No car maintenace.</td>
            </tr>    
            @endunless  --}}
            @foreach (\DB::table('inspection_report')->get() as $Report)
            <tr>
                <td>{{ $Report->id }}</td>
                <td>{{ $Report->InspectionNumber }}</td>
                <td>{{ $Report->VehicleNumber }}</td>
                <td>{{ $Report->DateInspected }}</td>
                <td>{{ $Report->Driver }}</td>
                <td>{{ $Report->InspectionNumber }}</td>
                <td>{{ $Report->InspectionNumber }}</td>
            </tr>
            @endforeach 
        </table>
        {{-- {{ $Maintenance->onEachSide(5)->links() }}   --}}
@endsection