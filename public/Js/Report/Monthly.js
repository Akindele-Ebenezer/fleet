let Filter_All_Refueling_Report_Button = document.querySelector('button[name=Filter_All_Refueling_Report]');
let Month_ = document.querySelector('select[name=Month_REPORT]');
let Year_ = document.querySelector('select[name=Year_REPORT]');

Filter_All_Refueling_Report_Button.addEventListener('click', () => {
    window.open('/Vehicle/Report?Year=' + Year_.value + '&Month=' + Month_.value);
})

let Filter_All_Refueling_Report_Each_Vehicle_Button = document.querySelector('button[name=Filter_All_Refueling_Report_Each_Vehicle]');
let Month__Each_Vehicle = document.querySelector('select[name=Month_REPORT_Each_Vehicle]');
let Year__Each_Vehicle = document.querySelector('select[name=Year_REPORT_Each_Vehicle]');
let Each_Vehicle_List = document.querySelector('select[name=Each_Vehicle_List]');

Filter_All_Refueling_Report_Each_Vehicle_Button.addEventListener('click', () => {
    window.open('/Vehicle/Report?Year=' + Year__Each_Vehicle.value + '&Month=' + Month__Each_Vehicle.value + '&VehicleNumber=' + Each_Vehicle_List.value);
})