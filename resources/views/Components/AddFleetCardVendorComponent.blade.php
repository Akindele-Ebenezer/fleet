<div class="add-fleet-card-vendor form">
    <div class="cancel-modal">✖</div>
    <div class="inner">
        <div class="error"></div> 
        <div class="heading">
            <h1>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m80 619 85-253q5-14 17-22t26-8h125v-73h153q-9 32-8 66.5t9 66.5H218l-54 166h478q23 8 42.5 12t44.5 4q18 0 36-2.5t35-7.5v378q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21v-54H161v54q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21V619Zm60 3v210-210Zm106 160q23 0 39.5-15.5T302 728q0-23-16.5-39.5T246 672q-23 0-38.5 16.5T192 728q0 23 15.5 38.5T246 782Zm388 0q23 0 39.5-15.5T690 728q0-23-16.5-39.5T634 672q-23 0-38.5 16.5T580 728q0 23 15.5 38.5T634 782Zm95-264q-79 0-135-56t-56-135q0-80 56-135.5T729 136q80 0 135.5 55.5T920 327q0 79-55.5 135T729 518Zm-15-161h35V214h-35v143Zm18 85q9 0 15.5-6t6.5-16q0-10-6.5-16t-15.5-6q-10 0-16 6t-6 16q0 10 6 16t16 6ZM140 832h600V622H140v210Z"></path></svg>
                Add Vendor
            </h1>
        </div>
        <form class="AddFleetCardVendorForm"> 
            <div class="new-car-inputs">
                <div class="new-car-inputs-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M483 936q-75 0-141-28.5T226.5 830q-49.5-49-78-115T120 574q0-75 28.5-140t78-113.5Q276 272 342 244t141-28q80 0 151.5 35T758 347V241h60v208H609v-60h105q-44-51-103.5-82T483 276q-125 0-214 85.5T180 571q0 127 88 216t215 89q125 0 211-88t86-213h60q0 150-104 255.5T483 936Zm122-197L451 587V373h60v189l137 134-43 43Z"></path></svg>
                    Fuel Station
                </div>
                <input type="text" name="FleetCardVendor_Name">
            </div>          
            @csrf
        </form>
        <button class="manage-fleet-card-vendor-button">+ Manage Vendor</button>
        <div class="heading">
            <h1>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m80 619 85-253q5-14 17-22t26-8h125v-73h153q-9 32-8 66.5t9 66.5H218l-54 166h478q23 8 42.5 12t44.5 4q18 0 36-2.5t35-7.5v378q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21v-54H161v54q0 12-9 21t-21 9h-21q-12 0-21-9t-9-21V619Zm60 3v210-210Zm106 160q23 0 39.5-15.5T302 728q0-23-16.5-39.5T246 672q-23 0-38.5 16.5T192 728q0 23 15.5 38.5T246 782Zm388 0q23 0 39.5-15.5T690 728q0-23-16.5-39.5T634 672q-23 0-38.5 16.5T580 728q0 23 15.5 38.5T634 782Zm95-264q-79 0-135-56t-56-135q0-80 56-135.5T729 136q80 0 135.5 55.5T920 327q0 79-55.5 135T729 518Zm-15-161h35V214h-35v143Zm18 85q9 0 15.5-6t6.5-16q0-10-6.5-16t-15.5-6q-10 0-16 6t-6 16q0 10 6 16t16 6ZM140 832h600V622H140v210Z"></path></svg>
                Vendor List
            </h1>
        </div>
        <div class="fleet-card-vendor-table-wrapper">
            <table class="fleet-card-vendor-table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach (\DB::table('card_vendors')->get() as $Vendor)
                <tr>
                    <td>{{ $Vendor->id }}</td>
                    <td>{{ $Vendor->CardVendors }}</td> 
                    <td>
                        <button class="edit">Edit</button>
                        <span class="Hide">{{ $Vendor->id }}</span>
                        <span class="Hide">{{ $Vendor->CardVendors }}</span>
                        <span class="Hide">Vendor Name</span>
                        <span class="Hide">vendors</span>
                    </td> 
                    <td>
                        <button class="delete">Delete</button>
                        <span class="Hide">{{ $Vendor->id }}</span>
                        <span class="Hide">vendors</span>
                    </td> 
                </tr> 
                @endforeach
            </table>
        </div> 
    </div>
</div>
