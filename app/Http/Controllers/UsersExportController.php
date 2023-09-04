<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersExportController extends Controller
{
    public function ExportUsers() 
    {
        return Excel::download(new UsersExport(), 'Users - DEPASA MARINE.xlsx');
    }
}
