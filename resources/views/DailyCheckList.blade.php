@extends('Layouts.Layout2')

@section('Title', 'VEHICLE DAILY CHECKLIST') 
@section('Heading', 'VEHICLE DAILY CHECKLIST') 
@section('Button_1_Link', 'cars-route') 
@section('Button_1', 'Explore Cars') 

@section('Content')
    <div class="daily-checklist">
        <div class="daily-checklist-inner">
            <div class="inner-wrapper-1">
                <div class="checklist">
                    <label>Division:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Vehicle Plate #:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Fleet (Inspection Number) #:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Mileage:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Date Inspected:</label> <br>
                    <input type="date">
                </div>
            </div>
            <div class="inner-wrapper-1">
                <div class="checklist">
                    <label>Division:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Vehicle Plate #:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Fleet #:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Mileage:</label> <br>
                    <input type="text">
                </div>
                <div class="checklist">
                    <label>Date Inspected:</label> <br>
                    <input type="date">
                </div>
            </div>
        </div>
    </div>
@endsection