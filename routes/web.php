<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CarController; 
use App\Http\Controllers\MaintenanceController; 
use App\Http\Controllers\DepositsController; 
use App\Http\Controllers\RefuelingController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\FleetReportController; 
use App\Http\Controllers\AnalyticsController; 
use App\Http\Controllers\CarsExportController; 
use App\Http\Controllers\MaintenanceExportController; 
use App\Http\Controllers\DepositsExportController; 
use App\Http\Controllers\RefuelingExportController; 
use App\Http\Controllers\UsersExportController; 
use App\Http\Controllers\CardController; 
use App\Http\Controllers\InspectionReportPdfController; 
use App\Http\Controllers\FleetPeriodicRefuelingReportPdfController; 
use App\Http\Controllers\FleetPeriodicMaintenanceReportPdfController; 
 
Route::view('/', 'Login');
// Route::get('/Awadhesh/Suprise', [CarController::class, 'bd']);

Route::post('/Login', [AuthController::class, 'Auth'])->name('Auth');
Route::get('/Logout', [AuthController::class, 'Logout'])->name('Logout');

Route::get('/Analytics', [AnalyticsController::class, 'index'])->name('Analytics'); 

Route::get('/Cars', [CarController::class, 'index'])->name('Cars');
Route::get('/Cars/Registration', [CarController::class, 'my_records_activity'])->name('Cars_Registration'); 
Route::get('/Cars/Owners', [CarController::class, 'car_owners'])->name('CarOwners');
Route::get('/Cars/Drivers', [CarController::class, 'drivers'])->name('Drivers');
Route::get('/Cars/Report', [CarController::class, 'vehicle_report'])->name('VehicleReport'); 

Route::get('/Cars/Documents', [CarController::class, 'car_documents'])->name('Documents');
Route::post('/Update/Documents/Car/{Car}', [CarController::class, 'car_documents_update'])->name('UpdateCarDocuments');
Route::post('/Delete/Documents/Car/{Car}/{Document}', [CarController::class, 'car_documents_delete'])->name('DeleteCarDocuments');

Route::post('/Add/Car/{Car}', [CarController::class, 'store'])->name('store_MyRecords'); 
Route::get('/Update/Car/{Car}', [CarController::class, 'update'])->name('UpdateCar');
Route::get('/Delete/Car/{Car}', [CarController::class, 'destroy'])->name('DeleteCar');

Route::post('/Cars/Add/Properties', [CarController::class, 'store_car_properties'])->name('store_CarProperties'); 
Route::get('/Update/Car/Properties/{Id}/{Name}/{DBTable}', [CarController::class, 'update_car_properties'])->name('UpdateCarProperties');
Route::get('/Delete/Car/Properties/{Id}/{DBTable}', [CarController::class, 'destroy_car_properties'])->name('DeleteCarProperties');
  
Route::get('/Edit/Maintenance', [MaintenanceController::class, 'my_records_maintenance'])->name('EditMaintenance'); 
Route::post('/Add/Maintenance/{Maintenance}', [MaintenanceController::class, 'store'])->name('store_Maintenance'); 
Route::post('/Update/Maintenance/{Maintenance}', [MaintenanceController::class, 'update'])->name('UpdateMaintenance');
Route::get('/Delete/Maintenance/{Maintenance}', [MaintenanceController::class, 'destroy'])->name('DeleteMaintenance');

Route::get('/Cars/Inspections/Daily/Checklist', [CarController::class, 'cars_daily_checklist'])->name('DailyCheckList'); 
Route::get('/Cars/Inspections/Report', [CarController::class, 'cars_inspection_report'])->name('Inspection_Report'); 
Route::get('/Cars/Inspections/General/Report', [CarController::class, 'cars_general_inspection_report'])->name('General_Inspection_Report'); 
Route::get('/Cars/Inspections/Report/Document', [InspectionReportPdfController::class, 'index'])->name('Inspection_Pdf');
Route::get('/Cars/Inspections/Report/Form', [InspectionReportPdfController::class, 'daily_vehicle_inspection_form'])->name('Inspection_Form');
Route::post('/Add/Cars/Inspections/Report', [CarController::class, 'cars_inspection_store'])->name('Add_Inspection_Report'); 
Route::post('/Update/Cars/Inspections/Report/{Report}', [CarController::class, 'cars_inspection_update'])->name('Update_Inspection_Report'); 
Route::post('/Delete/Cars/Inspections/Report/{Report}', [CarController::class, 'cars_inspection_delete'])->name('Delete_Inspection_Report'); 

Route::get('/Management/Fleet/Deposits/Entries', [DepositsController::class, 'my_records_deposits'])->name('EditDeposits'); 
Route::get('/Add/Deposits/{Deposits}', [DepositsController::class, 'store'])->name('store_Deposits'); 
Route::get('/Update/Deposits/{Deposits}', [DepositsController::class, 'update'])->name('UpdateDeposits');
Route::get('/Reverse/Deposits/{Deposits}/{CardNumber}/{Amount}', [DepositsController::class, 'reverse'])->name('ReverseDeposits');
Route::get('/Add/Deposits/Master/Cards/{MasterCard}', [CardController::class, 'store_deposits_master_card'])->name('store_Deposits_MasterCard'); 
Route::get('/Update/Deposits/Master/Cards/{MasterCard}', [CardController::class, 'update_deposits_master_card'])->name('UpdateDeposits_MasterCard');
Route::get('/Reverse/Deposits/Master/Cards/{MasterCard}/{CardNumber}/{Amount}', [CardController::class, 'reverse_deposits_master_card'])->name('DeleteDeposits_MasterCard');
Route::get('/Add/Deposits/Voucher/Cards/{VoucherCard}', [CardController::class, 'store_deposits_voucher_card'])->name('store_Deposits_VoucherCard'); 
Route::get('/Update/Deposits/Voucher/Cards/{VoucherCard}', [CardController::class, 'update_deposits_voucher_card'])->name('UpdateDeposits_VoucherCard');
Route::get('/Reverse/Deposits/Voucher/Cards/{VoucherCard}/{CardNumber}/{Amount}', [CardController::class, 'reverse_deposits_voucher_card'])->name('DeleteDeposits_VoucherCard');

Route::get('/Edit/Refueling', [RefuelingController::class, 'my_records_refueling'])->name('EditRefueling'); 
Route::get('/Add/Refueling/{Refueling}', [RefuelingController::class, 'store'])->name('store_Refueling'); 
Route::get('/Update/Refueling/{Refueling}', [RefuelingController::class, 'update'])->name('UpdateRefueling');
Route::get('/Reverse/Refueling/{CardNumber}/{Amount}/{Refueling}', [RefuelingController::class, 'reverse'])->name('ReverseRefueling');

Route::get('/Maintenance', [MaintenanceController::class, 'index'])->name('Maintenance');
Route::get('/Deposits', [DepositsController::class, 'index'])->name('Deposits');
Route::get('/Refueling', [RefuelingController::class, 'index'])->name('Refueling');
  
Route::get('/Users', [UserController::class, 'index'])->name('Users');
Route::get('/Add/User/{User}', [UserController::class, 'store'])->name('store_User'); 
Route::get('/Update/User/{User}', [UserController::class, 'update'])->name('UpdateUser');
Route::get('/Delete/User/{User}', [UserController::class, 'destroy'])->name('DeleteUser');
Route::get('/Privileges/Enable/{User}', [UserController::class, 'enable_user'])->name('EnableUser');
Route::get('/Privileges/Disable/{User}', [UserController::class, 'disable_user'])->name('DisableUser');
Route::get('/Privileges/Add/{User}', [UserController::class, 'store_privileges'])->name('StorePrivileges');
Route::get('/Privileges/Update/{User}', [UserController::class, 'update_privileges'])->name('UpdatePrivileges');

Route::get('/Cars/Report/{CarReportId}', [FleetReportController::class, 'car_report'])->name('CarReport'); 
Route::get('/Cars/Maintenance/Report/{MaintenanceReportId}', [FleetReportController::class, 'maintenance_report'])->name('MaintenanceReport');
Route::get('/Cars/Deposits/Report/{DepositReportId}', [FleetReportController::class, 'deposit_report'])->name('DepositsReport');
Route::get('/Cars/Refueling/Report/{RefuelingReportId}', [FleetReportController::class, 'refueling_report'])->name('RefuelingReport');

Route::get('Cars/Export/', [CarsExportController::class, 'Export'])->name('Cars_ExportToExcel'); 
Route::get('Maintenance/Export/{Car}', [MaintenanceExportController::class, 'ExportCarMaintenance'])->name('Maintenance_ExportToExcel'); 
Route::get('Deposits/Export/{Car}', [DepositsExportController::class, 'ExportCarDeposits'])->name('CarDeposits_ExportToExcel'); 
Route::get('Refueling/Export/{Car}', [RefuelingExportController::class, 'ExportCarFuelHistory'])->name('Refueling_ExportToExcel');
Route::get('Users/Export/', [UsersExportController::class, 'ExportUsers'])->name('Users_ExportToExcel'); 

Route::get('/Management/Fleet/Cards', [CardController::class, 'fleet_card_index'])->name('FleetCard');
Route::post('/Management/Fleet/Add/Fuel/Vendors', [CardController::class, 'add_vendor'])->name('AddVendor'); 
Route::get('/Update/Fuel/Vendors/{Id}', [CardController::class, 'update_vendor'])->name('UpdateVendor');
Route::get('/Delete/Fuel/Vendors/{Id}', [CardController::class, 'destroy_vendor'])->name('DeleteVendor');
 
Route::get('/Add/Master/Cards/{MasterCard}', [CardController::class, 'store_master_card'])->name('store_MasterCard'); 
Route::get('/Management/Update/Master/Cards/{MasterCard}', [CardController::class, 'update_master_card'])->name('update_MasterCard'); 
Route::get('/Management/Delete/Master/Cards/{MasterCard}', [CardController::class, 'destroy_master_card'])->name('destroy_MasterCard'); 

Route::get('/Add/Voucher/Cards/{VoucherCard}', [CardController::class, 'store_voucher_card'])->name('store_VoucherCard'); 
Route::get('/Management/Update/Voucher/Cards/{VoucherCard}', [CardController::class, 'update_voucher_card'])->name('update_VoucherCard'); 
Route::get('/Management/Delete/Voucher/Cards/{VoucherCard}', [CardController::class, 'destroy_voucher_card'])->name('destroy_VoucherCard'); 

Route::get('/Vehicle/Report', [FleetPeriodicRefuelingReportPdfController::class, 'fleet_periodic_report']);
Route::get('/Vehicle/Maintenance/Report', [FleetPeriodicMaintenanceReportPdfController::class, 'fleet_periodic_report']);

