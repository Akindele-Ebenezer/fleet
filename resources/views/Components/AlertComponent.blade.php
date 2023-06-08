<div class="alert">
    <div class="inner"> 
        {{ Route::is('Cars_Registration') ? 'PERMISSION DENIED: Contact an Admin to grant you privilege for registering vehicles.' : '' }}
        {{ Route::is('EditMaintenance') ? 'PERMISSION DENIED: Contact an Admin to grant you privilege to work on vehicle maintenance.' : '' }}
        {{ Route::is('EditRefueling') ? 'PERMISSION DENIED: Contact an Admin to grant you privilege to manage fuel.' : '' }}
        {{ Route::is('EditDeposits') ? 'PERMISSION DENIED: Contact an Admin to grant you privilege to make deposits.' : '' }}
    </div>
</div>