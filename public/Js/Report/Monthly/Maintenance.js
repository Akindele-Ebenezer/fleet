let Filter_All_Maintenance_Report_Button = document.querySelector('button[name=Filter_All_Maintenance_Report]');
let Month__ = document.querySelector('select[name=Month_REPORT]');
let Year__ = document.querySelector('select[name=Year_REPORT]');

Filter_All_Maintenance_Report_Button.addEventListener('click', () => {
    window.open('/Vehicle/Maintenance/Report?Year=' + Year__.value + '&Month=' + Month__.value);
})

let Filter_All_Maintenance_Report_Each_Vehicle_Button = document.querySelector('button[name=Filter_All_Maintenance_Report_Each_Vehicle]');
let Month__Each_Vehicle_ = document.querySelector('select[name=Month_REPORT_Each_Vehicle]');
let Year__Each_Vehicle_ = document.querySelector('select[name=Year_REPORT_Each_Vehicle]');
let Each_Vehicle_List_ = document.querySelector('select[name=Each_Vehicle_List]');

Filter_All_Maintenance_Report_Each_Vehicle_Button.addEventListener('click', () => {
    window.open('/Vehicle/Maintenance/Report?Year=' + Year__Each_Vehicle_.value + '&Month=' + Month__Each_Vehicle_.value + '&VehicleNumber=' + Each_Vehicle_List_.value);
})