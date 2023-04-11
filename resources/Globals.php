<?php
    
    $Cars_Absolute = \App\Models\Car::all();
    $Cars_Maker_GROUPED = \App\Models\Car::select('Maker')->distinct()->get();
    $Cars_EngineType_GROUPED = \App\Models\Car::select('EngineType')->distinct()->get();
    $Cars_GearType_GROUPED = \App\Models\Car::select('GearType')->distinct()->get();

?>