@extends('Layouts.Layout2')

@section('Content')
    <style>
        .report-inner {
            height: unset; 
            overflow: unset; 
        }
    </style>

    <div class="analytics">  
        <div class="inner-1">
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/inactive.png') }}">
                </div>
                <div class="inner">
                    <span>124</span>
                    <br>
                    <span>Vehicle with errors</span>
                </div>
            </div>
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/inactive.png') }}">
                </div>
                <div class="inner">
                    <span>124</span>
                    <br>
                    <span>Vehicle with errors</span>
                </div>
            </div>
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/inactive.png') }}">
                </div>
                <div class="inner">
                    <span>124</span>
                    <br>
                    <span>Vehicle with errors</span>
                </div>
            </div>
            <div class="x">
                <div class="inner">
                    <img src="{{ asset('Images/inactive.png') }}">
                </div>
                <div class="inner">
                    <span>124</span>
                    <br>
                    <span>Vehicle with errors</span>
                </div>
            </div>
        </div>
        <div class="inner-2">
           <div class="x">
                <div class="x-inner">
                    <h2>Total Vehicles</h2>
                    <div class="chart">  
                        <div class="chart-inner">   
                            <h3>Active</h3>                   
                            <div class="block">
                                <span id="val"></span>
                                <canvas id="canvas" width="260" height="260">
                                Your browser does not support the HTML5 canvas tag.
                                </canvas>
                            </div>
                            <p class="Hide">First Value <span id="val-1"></span></p>
                            <p class="Hide">Second Value <span id="val-2"></span></p>
                            <p class="Hide">Percentage of First Value and Second Value <span id="val-result"></span></p>
                            <div class="info-inner">
                                263 <br>
                                <span>Vehicles</span>
                            </div>
                        </div>
                        <div class="chart-inner">    
                            <h3>Inactive</h3>                     
                            <div class="block">
                                <span id="val2"></span>
                                <canvas id="canvas2" width="260" height="260">
                                Your browser does not support the HTML5 canvas tag.
                                </canvas>
                            </div>
                            <p class="Hide">First Value <span id="val2-1"></span></p>
                            <p class="Hide">Second Value <span id="val2-2"></span></p>
                            <p class="Hide">Percentage of First Value and Second Value <span id="val2-result"></span></p>
                            <div class="info-inner">
                                34 <br>
                                <span>Vehicles</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function circle(s,f){

                        document.getElementById('val-1').innerHTML = s;
                        document.getElementById('val-2').innerHTML = f;

                        var v = f/s*100;
                        var s = 0/100 * 6.29;
                        var f = v/100 * 6.29;
                        var val = document.getElementById("val");
                        var canvas = document.getElementById("canvas"); 
                        var ctx = canvas.getContext("2d"); 

                        //value alignment 
                        if ( v < 10 ) {
                        val.style.left = "40%";
                        }
                        if ( v == 100 ) {
                        val.style.left = "26%";
                        }
                        val.innerHTML = Math.floor(v) + "%";

                        document.getElementById('val-result').innerHTML = v + '%';

                        //Outer gray circle 
                        ctx.beginPath();
                        ctx.arc(130, 130, 130, 0.0, 6.30);
                        ctx.fillStyle = "#dddddd";
                        // ctx.fill();
                        ctx.closePath();


                        //Main green progress bar
                        ctx.beginPath();
                        ctx.arc(130, 130, 110, s, f);
                        ctx.lineWidth = 10;
                        ctx.strokeStyle = "green";
                        ctx.stroke();
                        ctx.closePath();

                        //Inner white circle 
                        ctx.beginPath();
                        ctx.arc(130, 130, 100, 0.0, 6.30);
                        ctx.fillStyle = "#222";
                        ctx.fill();
                        ctx.closePath();

                        }
                        
                    function circle2(s,f){

                        document.getElementById('val-1').innerHTML = s;
                        document.getElementById('val-2').innerHTML = f;

                        var v = f/s*100;
                        var s = 0/100 * 6.29;
                        var f = v/100 * 6.29;
                        var val2 = document.getElementById("val2");
                        var canvas2 = document.getElementById("canvas2"); 
                        var ctx2 = canvas2.getContext("2d"); 

                        //value alignment 
                        if ( v < 10 ) {
                        val2.style.left = "40%";
                        }
                        if ( v == 100 ) {
                        val2.style.left = "26%";
                        }
                        val2.innerHTML = Math.floor(v) + "%";

                        document.getElementById('val2-result').innerHTML = v + '%';

                        //Outer gray circle 
                        ctx2.beginPath();
                        ctx2.arc(130, 130, 130, 0.0, 6.30);
                        ctx2.fillStyle = "#dddddd";
                        // ctx2.fill();
                        ctx2.closePath();


                        //Main green progress bar
                        ctx2.beginPath();
                        ctx2.arc(130, 130, 110, s, f);
                        ctx2.lineWidth = 10;
                        ctx2.strokeStyle = "#DF2E38";
                        ctx2.stroke();
                        ctx2.closePath();

                        //Inner white circle 
                        ctx2.beginPath();
                        ctx2.arc(130, 130, 100, 0.0, 6.30);
                        ctx2.fillStyle = "#222";
                        ctx2.fill();
                        ctx2.closePath();

                        }

                        //Calling Circle function
                        circle(100,90);
                        circle2(100,25); 
                    </script>
           </div>
           <div class="x">
                <div class="x-inner">
                    <h2>Vehicles Condition</h2> 
                    <div class="chart">  
                        <div class="chart-inner">   
                            <h3>Active</h3>                   
                            <div class="block">
                                <span id="val3"></span>
                                <canvas id="canvas3" width="260" height="260">
                                Your browser does not support the HTML5 canvas tag.
                                </canvas>
                            </div>
                            <p class="Hide">First Value <span id="val3-1"></span></p>
                            <p class="Hide">Second Value <span id="val3-2"></span></p>
                            <p class="Hide">Percentage of First Value and Second Value <span id="val3-result"></span></p>
                            <div class="info-inner">
                                263 <br>
                                <span>Vehicles</span>
                            </div>
                        </div> 
                        <div class="chart-xx">
                            <div class="xx-inner active">
                                ACTIVE <br>
                                83 <em>+ 100%</em>
                            </div>
                            <div class="xx-inner inactive">
                                INACTIVE <br>
                                13 <em>+ 48%</em>
                            </div>
                            <div class="xx-inner aggregate">
                                AGGREGATE <br>
                                283 <em>+ 92%</em>
                            </div>
                        </div>
                    </div>
                    <script>
                        function circle3(s,f){
    
                            document.getElementById('val-1').innerHTML = s;
                            document.getElementById('val-2').innerHTML = f;
    
                            var v = f/s*100;
                            var s = 0/100 * 6.29;
                            var f = v/100 * 6.29;
                            var val3 = document.getElementById("val3");
                            var canvas3 = document.getElementById("canvas3"); 
                            var ctx3 = canvas3.getContext("2d"); 
    
                            //value alignment 
                            if ( v < 10 ) {
                            val3.style.left = "40%";
                            }
                            if ( v == 100 ) {
                            val3.style.left = "26%";
                            }
                            val3.innerHTML = Math.floor(v) + "%";
    
                            document.getElementById('val3-result').innerHTML = v + '%';
    
                            //Outer gray circle 
                            ctx3.beginPath();
                            ctx3.arc(130, 130, 130, 0.0, 6.30);
                            ctx3.fillStyle = "#dddddd";
                            // ctx3.fill();
                            ctx3.closePath();
    
    
                            //Main green progress bar
                            ctx3.beginPath();
                            ctx3.arc(130, 130, 110, s, f);
                            ctx3.lineWidth = 10;
                            ctx3.strokeStyle = "#3034b5";
                            ctx3.stroke();
                            ctx3.closePath();
    
                            //Inner white circle 
                            ctx3.beginPath();
                            ctx3.arc(130, 130, 100, 0.0, 6.30);
                            ctx3.fillStyle = "#222";
                            ctx3.fill();
                            ctx3.closePath();
    
                            }
    
                            //Calling Circle function 
                            circle3(100,100); 
                        </script>
                </div>
           </div>
           <div class="x">
                <div class="x-inner">
                    <h2>
                        Traffic Jam 
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m753 452-44-94-94-44 94-44 44-94 44 94 94 44-94 44-44 94Zm84 289-29.76-63.24L744 648l63.24-29.76L837 555l29.76 63.24L930 648l-63.24 29.76L837 741ZM314 976l-10-92q-14-2-29-9t-26-17l-78 33-88-144 76-50q-5-17-5-30t5-30l-76-50 88-144 78 33q11-10 26-17t29-9l10.075-92H482l10 92q14 2 29 9t26 17l78-33 88 144-76 50q5 17 5 30t-5 30l76 50-88 144-78-33q-11 10-26 17t-29 9l-10.075 92H314Zm84-194q50 0 82.5-32.5T513 667q0-50-32.5-82.5T398 552q-50 0-82.5 32.5T283 667q0 50 32.5 82.5T398 782Zm0-60q-24 0-39.5-15.5T343 667q0-24 15.5-39.5T398 612q24 0 39.5 15.5T453 667q0 24-15.5 39.5T398 722Zm-34 194h68l8-76q29-7 53-20t43.767-34L602 815l33-52-62-44q11-25 11-52t-11-52l62-44-33-52-65.233 29Q517 527 493 514q-24-13-53-20l-8-76h-68l-8 76q-29 7-53 20t-43.767 34L194 519l-33 52 62 44q-11 25-11 52t11 52l-62 44 33 52 65.233-29Q279 807 303 820q24 13 53 20l8 76Zm34-249Z"></path></svg>
                    </h2>
                    <div class="inner-x">
                        <div class="-x">
                            <big>16</big>
                            <br>
                            Vehicles
                        </div>
                        <div class="-x">
                            <ul>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        8
                                    </div>
                                    <div class="-xx">> 10h</div>
                                </li>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        8
                                    </div>
                                    <div class="-xx">> 10h</div>
                                </li>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        8
                                    </div>
                                    <div class="-xx">> 10min</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="x-inner">
                    <h2>
                        Accidents 
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                    </h2>
                    <div class="inner-x">
                        <div class="-x">
                            <big>2</big>
                            <br>
                            Vehicles
                        </div>
                        <div class="-x">
                            <ul>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        8
                                    </div>
                                    <div class="-xx">EVACUATION NEEDED</div>
                                </li>
                                <li>
                                    <div class="-xx">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M200 852v54q0 12.75-8.625 21.375T170 936h-20q-12.75 0-21.375-8.625T120 906V582l85-256q5-14 16.5-22t26.5-8h464q15 0 26.5 8t16.5 22l85 256v324q0 12.75-8.625 21.375T810 936h-21q-13 0-21-8.625T760 906v-54H200Zm3-330h554l-55-166H258l-55 166Zm-23 60v210-210Zm105.765 160Q309 742 324.5 726.25T340 688q0-23.333-15.75-39.667Q308.5 632 286 632q-23.333 0-39.667 16.265Q230 664.529 230 687.765 230 711 246.265 726.5q16.264 15.5 39.5 15.5ZM675 742q23.333 0 39.667-15.75Q731 710.5 731 688q0-23.333-16.265-39.667Q698.471 632 675.235 632 652 632 636.5 648.265q-15.5 16.264-15.5 39.5Q621 711 636.75 726.5T675 742Zm-495 50h600V582H180v210Z"></path></svg>
                                        8
                                    </div>
                                    <div class="-xx">EVACUATED</div>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="inner-3">
            <div class="x">
                <div class="x-inner">
                    <h2>
                        Warnings
                        <br>
                         <small>Driving Policy Violations</small>
                    </h2> 
                </div>
                <div class="inner-x">
                    <div class="x1">
                        <ul>
                            <li class="first">
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Driving
                                </div>
                                <div class="x1-inner">
                                    <span>1</span> >
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Driving
                                </div>
                                <div class="x1-inner">
                                    <span>0</span> >
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Driving
                                </div>
                                <div class="x1-inner">
                                    <span>1</span> >
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Driving
                                </div>
                                <div class="x1-inner">
                                    <span>20</span> >
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="x1">
                        <div class="x1-last">
                            <div class="last-inner">
                                <strong>Driving Time Exceeded</strong>
                                <br>
                                WO-12345
                            </div>
                            <div class="last-inner">
                               > 2 hours
                            </div>
                        </div>
                        <div class="x1-last">
                            <div class="last-inner">
                                <strong>Driving Time Exceeded</strong>
                                <br>
                                WO-12345
                            </div>
                            <div class="last-inner">
                                > 2 hours
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            <div class="x">
                <div class="x-inner">
                    <h2>
                        Trips
                        <br>
                         <small>24 hours Trips Data</small>
                    </h2>
                </div>
                <div class="inner-x">
                    <div class="x1 x2">
                        <ul>
                            <li class="first">
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Live Trips
                                </div>
                                <div class="x1-inner">
                                    <span>1</span> >
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Scheduled
                                </div>
                                <div class="x1-inner">
                                    <span>0</span> >
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Completed
                                </div>
                                <div class="x1-inner">
                                    <span>1</span> >
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Being Late
                                </div>
                                <div class="x1-inner">
                                    <span>20</span> >
                                </div>
                            </li>
                            <li>
                                <div class="x1-inner">
                                    <img src="{{ asset('Images/active.png') }}" alt=""> Failed
                                </div>
                                <div class="x1-inner">
                                    <span>20</span> >
                                </div>
                            </li>
                        </ul>
                    </div> 
                </div>
           </div>
            <div class="x">
                <div class="x-inner">
                    <h2>Trips Performance</h2>
                    <div class="x-top">
                        <span>
                            <strong>345</strong>
                            Planned for today
                        </span>
                        <span>
                            23 Left
                        </span>
                    </div>
                    <div class="progress">
                        <div class="data" style="width: 30%;"></div>
                        <div class="data" style="width: 40%;"></div>
                        <div class="data" style="width: 70%;"></div>
                        <div class="data" style="width: 75%;"></div>
                    </div>
                    <div class="x-middle">
                        <div class="middle-x">
                            <div class="middle-x-inner">
                                40% / 567 <br>
                                <span class="x-1">Live Trips</span>
                            </div>
                            <div class="middle-x-inner">
                                40% / 567 <br>
                                <span class="x-2">Completed</span>
                            </div>
                        </div>
                        <div class="middle-x">
                            <div class="middle-x-inner">
                                40% / 567 <br>
                                <span class="x-3">Live Trips</span>
                            </div>
                            <div class="middle-x-inner">
                                40% / 567 <br>
                                <span class="x-4">Completed</span>
                            </div>
                        </div> 
                    </div>
                    <div class="x-top">
                        <span>
                            <strong>134</strong>
                            Planned for tommorrow
                        </span> 
                    </div>
                </div>
           </div>
        </div>
    </div>
@endsection