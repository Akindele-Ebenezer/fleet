<center class="empty-records-wrapper">
    <div class="inner">
        <div class="empty-records" style="background: url('/Images/empty-records.png')"></div> 
        <div class="empty-records-2">
            <p>
            <?php if (!(isset($_GET['Filter']) || isset($_GET['FilterValue']))) : ?>   
            <strong>YOU DON'T HAVE SAVED JOBS YET</strong>
            <br>
                Make it easier to track daily reports by 
                <br>
                creating your first saved project.
                <br><br>
                <button class="action-x <?= Route::is('MyRecords') ? 'add-car' : '' ?> <?= Route::is('EditRepairs') ? 'add-repair' : '' ?> <?= Route::is('EditMaintenance') ? 'add-maintenance' : '' ?> <?= Route::is('EditDeposits') ? 'add-monthly-deposits' : '' ?> <?= Route::is('EditRefueling') ? 'add-refueling' : '' ?>">Create new</button>
            </p>  
            <?php endif; ?>  
            <?php if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) : ?>   
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