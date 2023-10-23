<div class="edit-car-properties-wrapper">
    <form class="EditCarPropertiesForm">
        <h1>
            <span class="EditCarPropertiseModal_Title">EDIT {TITLE}</span>
            <span class="CarProperties_EditModal_CloseIcon">✖</span>
        </h1>
        <hr>
        <br>
        <p>ID</p>
        <input readonly type="text" name="EditCarPropertiseModal_Id">
        <p class="Hide Organisation_">Company Code</p>
        <input class="Hide Organisation_" type="text" name="EditCarPropertiseModal_Code">
        <p>Name</p>
        <input type="text" name="EditCarPropertiseModal_Name">
        <hr>
        <div class="EditCarPropertiesButtons">
            <button class="CarProperties_EditModal_CloseIcon">Close</button>
            <button name="UpdateCarProperties">Update</button>
        </div>
        @csrf
    </form>
</div>