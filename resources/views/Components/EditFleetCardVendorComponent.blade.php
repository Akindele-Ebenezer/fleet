<div class="edit-fleet-card-vendor-wrapper">
    <form class="EditFleetCardVendorForm">
        <h1>
            <span class="EditFleetCardVendorModal_Title">EDIT {TITLE}</span>
            <span class="FleetCardVendor_EditModal_CloseIcon">✖</span>
        </h1>
        <hr>
        <br>
        <p>ID</p>
        <input readonly type="text" name="EditFleetCardVendorModal_Id"> 
        <p>Name</p>
        <input type="text" name="EditFleetCardVendorModal_Name">
        <hr>
        <div class="EditFleetCardVendorButtons">
            <button class="FleetCardVendor_EditModal_CloseIcon">Close</button>
            <button name="UpdateFleetCardVendor">Update</button>
        </div>
        @csrf
    </form>
</div>