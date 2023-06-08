<?php 
    $CarRegistration_USER = \DB::table('user_privileges')
                                ->select('CarRegistration')
                                ->where('UserId', session()->get('Id'))
                                ->first(); 

    $AddMaintenance_USER = \DB::table('user_privileges')
                                ->select('AddMaintenance')
                                ->where('UserId', session()->get('Id'))
                                ->first(); 

    $FuelManagement_USER = \DB::table('user_privileges')
                                ->select('FuelManagement')
                                ->where('UserId', session()->get('Id'))
                                ->first(); 

    $MakeDeposits_USER = \DB::table('user_privileges')
                                ->select('MakeDeposits')
                                ->where('UserId', session()->get('Id'))
                                ->first(); 
?>
<center class="empty-records-wrapper">
    <div class="inner">
        <div class="empty-records" style="background: url('/Images/empty-records.png')"></div> 
        <div class="empty-records-2">
            <p>
            <?php if (!(isset($_GET['Filter']) || isset($_GET['FilterValue']) || isset($_GET['Filter_All_Maintenance']) || isset($_GET['Filter_All_Deposits']) || isset($_GET['Filter_All_Refueling']) || isset($_GET['Filter_Maintenance_Yearly']) || isset($_GET['Filter_Deposits_Yearly']) || isset($_GET['Filter_Refueling_Yearly']) || isset($_GET['Filter_Maintenance_Range']) || isset($_GET['Filter_Deposits_Range']) || isset($_GET['Filter_Refueling_Range']))) : ?>   
            <strong>YOU DON'T HAVE SAVED JOBS YET</strong>
            <br>
                Make it easier to track daily reports by 
                <br>
                creating your first saved project.
                <br><br>
                <button class="action-x <?= (Route::is('Cars_Registration') AND $CarRegistration_USER->CarRegistration ?? 'off' === 'on') ? 'add-car' : 'permission-denied' ?> <?= (Route::is('EditMaintenance') AND $AddMaintenance_USER->AddMaintenance ?? 'off' === 'on') ? 'add-maintenance' : 'permission-denied' ?> <?= (Route::is('EditDeposits') AND $MakeDeposits_USER->MakeDeposits ?? 'off' === 'on') ? 'add-monthly-deposits' : 'permission-denied' ?> <?= Route::is('EditDeposits_MasterCard') ? 'add-master-card-deposits' : '' ?> <?= (Route::is('EditRefueling') AND $FuelManagement_USER->FuelManagement ?? 'off' === 'on') ? 'add-refueling' : 'permission-denied' ?>">Create new</button>
            </p>  
            <?php endif; ?>  
            <?php if (isset($_GET['Filter']) || isset($_GET['FilterValue']) || isset($_GET['Filter_All_Maintenance']) || isset($_GET['Filter_All_Deposits']) || isset($_GET['Filter_All_Refueling']) || isset($_GET['Filter_Maintenance_Yearly']) || isset($_GET['Filter_Deposits_Yearly']) || isset($_GET['Filter_Refueling_Yearly']) || isset($_GET['Filter_Maintenance_Range']) || isset($_GET['Filter_Deposits_Range']) || isset($_GET['Filter_Refueling_Range'])) : ?>   
            <strong>YOU DON'T HAVE ANY RELATED RESULTS</strong>
            <br>
                Search according to the columns and get 
                <br>
                more efficient results.
                <br><br>
                <button onclick="history.back()">Try again</button>
            </p>  
            <?php endif; ?>  
        </div>
    </div>
</center>