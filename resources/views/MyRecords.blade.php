@extends('Layouts.Layout2')

@section('Content')
    <div class="table-wrapper"> 
        <table class="table list" id="Table">
            <tr class="table-head">
                <th onclick="sortTable(0)">ORG</th>
                <th onclick="sortTable(1)">Car Number</th>
                <th onclick="sortTable(2)">Refueling</th>
                <th onclick="sortTable(3)">Balance</th>
                <th onclick="sortTable(4)">To Deposit</th>
                <th onclick="sortTable(5)">Comments</th> 
            </tr> 
            <tr> 
                <td class="id">1</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>HS5 678 263</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="inactive">INACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Card Number</span>
                                    <span>4727482</span>
                                </div>
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Driver</span>
                                    <span>DRAKE</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>X-MODEL</span>
                                </div>
                                <div class="inner-x">
                                    <span>Depoits</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Maker</span>
                                    <span>TOYOTA</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2></h2>
                            <button class="action-x">action</button>
                        </div> 
                    </div>
                </td>
                <td class="refueling">₦ 1, 344, 896</td>
                <td class="balance">₦ 1, 042, 896</td>
                <td class="to-deposit">₦ 30, 584</td>
                <td class="comments">Comments1</td>
            </tr>  
            <tr> 
                <td class="id">2</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>HS5 678 263</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="active">ACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Card Number</span>
                                    <span>4727482</span>
                                </div>
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Driver</span>
                                    <span>DRAKE</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>X-MODEL</span>
                                </div>
                                <div class="inner-x">
                                    <span>Depoits</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Maker</span>
                                    <span>TOYOTA</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2></h2>
                            <button class="action-x">action</button>
                        </div> 
                    </div>
                </td>
                <td class="refueling">₦ 1, 344, 896</td>
                <td class="balance">₦ 1, 042, 896</td>
                <td class="to-deposit">₦ 30, 584</td>
                <td class="comments">Comments1</td>
            </tr>  
            <tr> 
                <td class="id">3</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>HS5 678 263</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="inactive">INACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Card Number</span>
                                    <span>4727482</span>
                                </div>
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Driver</span>
                                    <span>DRAKE</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>X-MODEL</span>
                                </div>
                                <div class="inner-x">
                                    <span>Depoits</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Maker</span>
                                    <span>TOYOTA</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2></h2>
                            <button class="action-x">action</button>
                        </div> 
                    </div>
                </td>
                <td class="refueling">₦ 1, 344, 896</td>
                <td class="balance">₦ 1, 042, 896</td>
                <td class="to-deposit">₦ 30, 584</td>
                <td class="comments">Comments1</td>
            </tr>  
            <tr> 
                <td class="id">4</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>HS5 678 263</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="active">ACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Card Number</span>
                                    <span>4727482</span>
                                </div>
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Driver</span>
                                    <span>DRAKE</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>X-MODEL</span>
                                </div>
                                <div class="inner-x">
                                    <span>Depoits</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Maker</span>
                                    <span>TOYOTA</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2></h2>
                            <button class="action-x">action</button>
                        </div> 
                    </div>
                </td>
                <td class="refueling">₦ 1, 344, 896</td>
                <td class="balance">₦ 1, 042, 896</td>
                <td class="to-deposit">₦ 30, 584</td>
                <td class="comments">Comments1</td>
            </tr>  
            <tr> 
                <td class="id">5</td>
                <td>
                    <div class="car-info">
                        <div class="info-inner">
                            <div class="inner">
                                <h1>HS5 678 263</h1>
                                <span class="used-by">KEN CARSON</span>
                                <span class="active">ACTIVE</span>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Card Number</span>
                                    <span>4727482</span>
                                </div>
                                <div class="inner-x">
                                    <span>Monthly Budget</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>Chassis Number</span>
                                    <span>5826554</span>
                                </div>
                                <div class="inner-x">
                                    <span>Driver</span>
                                    <span>DRAKE</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="inner-x">
                                    <span>Model</span>
                                    <span>X-MODEL</span>
                                </div>
                                <div class="inner-x">
                                    <span>Depoits</span>
                                    <span>₦ 120, 000</span>
                                </div>
                                <div class="inner-x">
                                    <span>PIN Code</span>
                                    <span>2023</span>
                                </div>
                                <div class="inner-x">
                                    <span>Maker</span>
                                    <span>TOYOTA</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-heading">
                            <h2></h2>
                            <button class="action-x">action</button>
                        </div> 
                    </div>
                </td>
                <td class="refueling">₦ 1, 344, 896</td>
                <td class="balance">₦ 1, 042, 896</td>
                <td class="to-deposit">₦ 30, 584</td>
                <td class="comments">Comments1</td>
            </tr>  
            <div class="table-head filter"> 
                <span><input type="text" id="SearchInput0" placeholder="Filter By ORG" onkeyup="FilterORG()"></span> 
                <span><input type="text" id="SearchInput1" placeholder="Filter By Car Number" onkeyup="FilterCarNumber()"></span>  
                <span><input type="text" id="SearchInput2" placeholder="Filter By Refueling" onkeyup="FilterRefueling()"></span> 
                <span><input type="text" id="SearchInput3" placeholder="Filter By Balance" onkeyup="FilterBalance()"></span> 
                <span><input type="text" id="SearchInput4" placeholder="Filter By To Deposit" onkeyup="FilterToDeposit()"></span> 
                <span><input type="text" id="SearchInput5" placeholder="Filter By Comments.." onkeyup="FilterComments()"></span> 
            </div>
        </table>
    </div> 
@endsection