<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request; 

class RepairController extends Controller
{
    public function config() {
        $Repairs = Repair::orderBy('Date', 'DESC')->paginate(14); 
        $Repairs__MyRecords = Repair::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(14);
 
        return [
            'Repairs' => $Repairs,
            'Repairs__MyRecords' => $Repairs__MyRecords,
        ];
    }
 
    public function index()
    {
        $Config = self::config();

        if (isset($_GET['Filter_All_Repairs'])) { 
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

            $Repairs = Repair::whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Repairs->withPath($_SERVER['REQUEST_URI']);

            return view('Repairs', $Config)->with('Repairs', $Repairs);
        }

        if (isset($_GET['Filter_Repairs_Yearly'])) {
            if(empty($_GET['VehicleNo']) || empty($_GET['Year'])) {
                return back();
            }

            $Repairs = Repair::where('VehicleNumber', $_GET['VehicleNo']) 
                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31']) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Repairs->withPath($_SERVER['REQUEST_URI']);

            return view('Repairs', $Config)->with('Repairs', $Repairs);
        }

        if (isset($_GET['Filter_Repairs_Range'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

            $Repairs = Repair::where('VehicleNumber', $_GET['VehicleNo'])
                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) //ANY DATE
                                        // ->orWhereBetween('Date', ['2021-01-01', '2021-12-31']) //YEARLY
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Repairs->withPath($_SERVER['REQUEST_URI']);

            return view('Repairs', $Config)->with('Repairs', $Repairs);
        }
        ///////
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Repairs = Repair::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('RepairAction', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ReleaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ReleaseTime', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Cost', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InvoiceNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);
 
                        $Repairs->withPath($_SERVER['REQUEST_URI']);

            return view('Repairs', $Config)->with('Repairs', $Repairs);
        } 

        return view('Repairs', $Config);
    }

    public function my_records_repairs()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Repairs__MyRecords = Repair::where('UserId', self::USER_ID())
                                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                                        ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                                        ->orWhere('RepairAction', 'LIKE', '%' . $FilterValue . '%')
                                        ->orWhere('ReleaseDate', 'LIKE', '%' . $FilterValue . '%')
                                        ->orWhere('ReleaseTime', 'LIKE', '%' . $FilterValue . '%')
                                        ->orWhere('Cost', 'LIKE', '%' . $FilterValue . '%')
                                        ->orWhere('InvoiceNumber', 'LIKE', '%' . $FilterValue . '%')
                                        ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                                        ->paginate(7);
 
            $Repairs__MyRecords->withPath($_SERVER['REQUEST_URI']);

            return view('Edit.EditRepairs', $Config)->with('Repairs__MyRecords', $Repairs__MyRecords);
        } 

        return view('Edit.EditRepairs', $Config);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($Repair, Request $request)
    {     
        Repair::insert([ 
            'VehicleNumber' => $Repair, 
            'RepairAction' => $request->RepairAction, 
            'Date' => $request->Date, 
            'Time' => $request->Time, 
            'ReleaseDate' => $request->ReleaseDate, 
            'ReleaseTime' => $request->ReleaseTime, 
            'Cost' => $request->Cost, 
            'InvoiceNumber' => $request->InvoiceNumber, 
            'Week' => $request->Week, 
            'DateIn' => date('F j, Y'), 
            'TimeIn' => date("g:i a"), 
            'UserId' => request()->session()->get('Id'), 
        ]);

        return back();  
    }

    /**
     * Display the specified resource.
     */
    public function show(Repair $repair)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repair $repair)
    {  
        Repair::where('id', $request->RepairId)
            ->update([
                'VehicleNumber' => $request->VehicleNumber,
                'Date' => $request->Date,
                'Time' => $request->Time,
                'RepairAction' => $request->RepairAction,
                'ReleaseDate' => $request->ReleaseDate,
                'ReleaseTime' => $request->ReleaseTime,
                'Cost' => $request->Cost,
                'InvoiceNumber' => $request->InvoiceNumber,
                'Week' => $request->Week, 
            ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($RepairId, Repair $repair)
    { 
        $DeleteRepair = Repair::where('id', $RepairId)->delete();

        return back();
    }
}
