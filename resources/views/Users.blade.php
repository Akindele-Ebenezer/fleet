@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head">
                <th>#</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Records</th>
                <th>Status</th>
            </tr>
            @foreach ($Users as $User)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $User->email }}</td>
                <td>{{ $User->name }}</td>
                <td>{{ $User->role }}</td>
                <td>{{ $User->records }}</td>
                <td>{{ $User->status }}</td>
            </tr> 
            @endforeach 
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By #" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Email " onkeyup="FilterEmail()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Username" onkeyup="FilterUsername()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Role" onkeyup="FilterRole()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By Records" onkeyup="FilterRecords()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Status" onkeyup="FilterStatus()"></span>  
            </div>
        </table>
        {{ $Users->onEachSide(5)->links() }}
    </div>
@endsection