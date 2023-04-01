@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)">CARS</th> 
                <th onclick="sortTable(5)">Consumption</th>
                <th onclick="sortTable(6)">Refueling</th>
                <th onclick="sortTable(7)">Balance</th>
            </tr>  
            <tr> 
                <td class="id">1</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>Nissan</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="active">ACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>CARD Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>SIENNA</span>
                                </div>
                                <div class="inner-x">
                                    <span>To Deposit</span>
                                    <span>₦ 120, 000</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Registration No</span>
                                    <span>GFIR582585</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Purchase Date</span>
                                    <span>10/09/2015</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2>STATS</h2>
                            <button>action</button>
                        </div>
                        <div class="stats">
                            <div class="inner">
                                <h3>Vehicle No</h3>
                                <span>274 58J FKJ</span>
                            </div> 
                            <div class="inner">
                                <h3>Refueling</h3>
                                <span>₦ 455, 415</span>
                            </div> 
                            <div class="inner">
                                <h3>Price</h3>
                                <span>₦ 27,458</span>
                            </div>
                            <div class="inner">
                                <h3>Driver</h3>
                                <span>WIZKID</span>
                            </div>
                            <div class="inner">
                                <h3>Supplier</h3>
                                <span>PLAYBOI CARTI</span>
                            </div>
                            <div class="inner">
                                <h3>Organisation</h3>
                                <span>300 (LCM)</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Type</h3>
                                <span>Petrol</span>
                            </div>
                            <div class="inner">
                                <h3>Stop Date</h3>
                                <span>NULL</span>
                            </div>
                            <div class="inner">
                                <h3>Sub Model</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Model Year</h3>
                                <span>2015</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Volume</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Licence Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Insurance Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Fuel Tank Capacity</h3>
                                <span>114</span>
                            </div>
                        </div> 
                    </div>
                </td>
                <td class="consumption">4.9</td>
                <td class="refueling">₦ 1, 042, 896</td>
                <td class="balance">₦ 30, 584</td>
            </tr>
            <tr> 
                <td class="id">2</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>Toyota</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="inactive">INACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>CARD Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>SIENNA</span>
                                </div>
                                <div class="inner-x">
                                    <span>To Deposit</span>
                                    <span>₦ 120, 000</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Registration No</span>
                                    <span>GFIR582585</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Purchase Date</span>
                                    <span>10/09/2015</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2>STATS</h2>
                            <button>action</button>
                        </div>
                        <div class="stats">
                            <div class="inner">
                                <h3>Vehicle No</h3>
                                <span>274 58J FKJ</span>
                            </div> 
                            <div class="inner">
                                <h3>Refueling</h3>
                                <span>₦ 455, 415</span>
                            </div> 
                            <div class="inner">
                                <h3>Price</h3>
                                <span>₦ 27,458</span>
                            </div>
                            <div class="inner">
                                <h3>Driver</h3>
                                <span>WIZKID</span>
                            </div>
                            <div class="inner">
                                <h3>Supplier</h3>
                                <span>PLAYBOI CARTI</span>
                            </div>
                            <div class="inner">
                                <h3>Organisation</h3>
                                <span>300 (LCM)</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Type</h3>
                                <span>Petrol</span>
                            </div>
                            <div class="inner">
                                <h3>Stop Date</h3>
                                <span>NULL</span>
                            </div>
                            <div class="inner">
                                <h3>Sub Model</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Model Year</h3>
                                <span>2015</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Volume</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Licence Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Insurance Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Fuel Tank Capacity</h3>
                                <span>114</span>
                            </div>
                        </div> 
                    </div>
                </td>
                <td class="consumption">4.9</td>
                <td class="refueling">₦ 1, 042, 896</td>
                <td class="balance">₦ 30, 584</td>
            </tr>
            <tr> 
                <td class="id">3</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>Toyota</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="active">ACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>CARD Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>SIENNA</span>
                                </div>
                                <div class="inner-x">
                                    <span>To Deposit</span>
                                    <span>₦ 120, 000</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Registration No</span>
                                    <span>GFIR582585</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Purchase Date</span>
                                    <span>10/09/2015</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2>STATS</h2>
                            <button>action</button>
                        </div>
                        <div class="stats">
                            <div class="inner">
                                <h3>Vehicle No</h3>
                                <span>274 58J FKJ</span>
                            </div> 
                            <div class="inner">
                                <h3>Refueling</h3>
                                <span>₦ 455, 415</span>
                            </div> 
                            <div class="inner">
                                <h3>Price</h3>
                                <span>₦ 27,458</span>
                            </div>
                            <div class="inner">
                                <h3>Driver</h3>
                                <span>WIZKID</span>
                            </div>
                            <div class="inner">
                                <h3>Supplier</h3>
                                <span>PLAYBOI CARTI</span>
                            </div>
                            <div class="inner">
                                <h3>Organisation</h3>
                                <span>300 (LCM)</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Type</h3>
                                <span>Petrol</span>
                            </div>
                            <div class="inner">
                                <h3>Stop Date</h3>
                                <span>NULL</span>
                            </div>
                            <div class="inner">
                                <h3>Sub Model</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Model Year</h3>
                                <span>2015</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Volume</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Licence Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Insurance Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Fuel Tank Capacity</h3>
                                <span>114</span>
                            </div>
                        </div> 
                    </div>
                </td>
                <td class="consumption">4.9</td>
                <td class="refueling">₦ 1, 042, 896</td>
                <td class="balance">₦ 30, 584</td>
            </tr>
            <tr> 
                <td class="id">4</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>Toyota</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="inactive">INACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>CARD Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>SIENNA</span>
                                </div>
                                <div class="inner-x">
                                    <span>To Deposit</span>
                                    <span>₦ 120, 000</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Registration No</span>
                                    <span>GFIR582585</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Purchase Date</span>
                                    <span>10/09/2015</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2>STATS</h2>
                            <button>action</button>
                        </div>
                        <div class="stats">
                            <div class="inner">
                                <h3>Vehicle No</h3>
                                <span>274 58J FKJ</span>
                            </div> 
                            <div class="inner">
                                <h3>Refueling</h3>
                                <span>₦ 455, 415</span>
                            </div> 
                            <div class="inner">
                                <h3>Price</h3>
                                <span>₦ 27,458</span>
                            </div>
                            <div class="inner">
                                <h3>Driver</h3>
                                <span>WIZKID</span>
                            </div>
                            <div class="inner">
                                <h3>Supplier</h3>
                                <span>PLAYBOI CARTI</span>
                            </div>
                            <div class="inner">
                                <h3>Organisation</h3>
                                <span>300 (LCM)</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Type</h3>
                                <span>Petrol</span>
                            </div>
                            <div class="inner">
                                <h3>Stop Date</h3>
                                <span>NULL</span>
                            </div>
                            <div class="inner">
                                <h3>Sub Model</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Model Year</h3>
                                <span>2015</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Volume</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Licence Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Insurance Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Fuel Tank Capacity</h3>
                                <span>114</span>
                            </div>
                        </div> 
                    </div>
                </td>
                <td class="consumption">4.9</td>
                <td class="refueling">₦ 1, 042, 896</td>
                <td class="balance">₦ 30, 584</td>
            </tr>
            <tr> 
                <td class="id">5</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>Toyota</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="active">ACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>CARD Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>SIENNA</span>
                                </div>
                                <div class="inner-x">
                                    <span>To Deposit</span>
                                    <span>₦ 120, 000</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Registration No</span>
                                    <span>GFIR582585</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Purchase Date</span>
                                    <span>10/09/2015</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2>STATS</h2>
                            <button>action</button>
                        </div>
                        <div class="stats">
                            <div class="inner">
                                <h3>Vehicle No</h3>
                                <span>274 58J FKJ</span>
                            </div> 
                            <div class="inner">
                                <h3>Refueling</h3>
                                <span>₦ 455, 415</span>
                            </div> 
                            <div class="inner">
                                <h3>Price</h3>
                                <span>₦ 27,458</span>
                            </div>
                            <div class="inner">
                                <h3>Driver</h3>
                                <span>WIZKID</span>
                            </div>
                            <div class="inner">
                                <h3>Supplier</h3>
                                <span>PLAYBOI CARTI</span>
                            </div>
                            <div class="inner">
                                <h3>Organisation</h3>
                                <span>300 (LCM)</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Type</h3>
                                <span>Petrol</span>
                            </div>
                            <div class="inner">
                                <h3>Stop Date</h3>
                                <span>NULL</span>
                            </div>
                            <div class="inner">
                                <h3>Sub Model</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Model Year</h3>
                                <span>2015</span>
                            </div>
                            <div class="inner">
                                <h3>Engine Volume</h3>
                                <span>2.1</span>
                            </div>
                            <div class="inner">
                                <h3>Licence Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Insurance Expiry Date</h3>
                                <span>14/10/2021</span>
                            </div>
                            <div class="inner">
                                <h3>Fuel Tank Capacity</h3>
                                <span>114</span>
                            </div>
                        </div> 
                    </div>
                </td>
                <td class="consumption">4.9</td>
                <td class="refueling">₦ 1, 042, 896</td>
                <td class="balance">₦ 30, 584</td>
            </tr>
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By #" onkeyup="FilterID()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Cars Column.. " onkeyup="FilterCars()"></span> 
                <span><input type="text" id="SearchInput2" placeholder="Filter By Consumption" onkeyup="FilterConsumption()"></span>  
                <span><input type="text" id="SearchInput3" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span>  
                <span><input type="text" id="SearchInput4" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span>   
            </div>
        </table>
    </div>
@endsection