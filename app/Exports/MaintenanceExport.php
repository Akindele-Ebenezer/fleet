<?php

namespace App\Exports;

use App\Models\Maintenance;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class MaintenanceExport implements 
    ShouldAutoSize, 
    WithHeadings, 
    WithColumnFormatting, 
    WithColumnWidths, 
    WithStyles, 
    FromQuery, 
    WithMapping,
    WithEvents
{
    protected $VehicleNumber;

    public function __construct($VehicleNumber)
    {
        $this->VehicleNumber = $VehicleNumber;
    }

    /**
    * Query the data and join with the cars table for full details
    */
    public function query()
    {   
        $query = DB::table('maintenances_export')
            ->join('cars', "maintenances_export.VehicleNumber", '=', 'cars.VehicleNumber')
            ->select(
                'maintenances_export.*',
                'cars.Maker',
                'cars.Model',
                'cars.SubModel',
                'cars.GearType',
                'cars.EngineType',
                'cars.EngineNumber',
                'cars.ChassisNumber',
                'cars.ModelYear',
                'cars.Supplier',
                'cars.CarOwner',
                'cars.Driver',
                'cars.CardNumber as CardNumber',
                'cars.Odometer as Odometer'
            );
        return $query->orderBy('maintenances_export.Date', 'DESC');
    }

    /**
    * Mapping the data to match headers exactly
    */
    public function map($data): array
    {
        static $i = 1;
        
        return [
            $i++,
            $data->VehicleNumber,
            $data->Maker,
            $data->Model,
            $data->SubModel,
            $data->GearType,
            $data->EngineType,
            $data->EngineNumber,
            $data->ChassisNumber,
            $data->ModelYear,
            $data->Supplier,
            $data->CarOwner,    // Used By
            $data->Driver,
            $data->CardNumber,
            $data->Odometer,
            $data->RFLNO,
            $data->IncidentType,
            $data->IncidentAction,
            $data->Details,
            $data->Date,
            $data->Time,
            $data->ReleaseDate,
            $data->ReleaseTime,
            $data->Cost,         // Mapped to 'Amount' in your headings
            $data->InvoiceNumber,
            $data->Week,
            $data->IncidentAttachment,
            $data->UserId,
            $data->DateIn,
            $data->TimeIn,
        ];
    }

    public function headings(): array
    {
        return [
            'S/N',
            'REG NO.',
            'Maker',
            'Model',
            'Sub Model',
            'Gear Type',
            'Engine Type',
            'Engine Number',
            'Chassis Number',
            'Model Year',
            'Supplier',
            'Used By',
            'Driver',
            'Card Number',
            'Odometer',
            'RFL NO',
            'Incident Type',
            'Incident Action',
            'Details',
            'Date',
            'Time',
            'Release Date',
            'Release Time',
            'Amount',
            'Invoice Number',
            'Week',
            'Attachment',
            'User Id',
            'Date In',
            'Time In',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [ 
           1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FF000000']], 
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'DAE9F8'],
                ],
            ], 
           'G' => ['alignment' => ['wrapText' => true]], // Wrap Details column
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
                $cellRange = 'A1:' . $highestColumn . '1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Calibri'); 
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(30);
                $event->sheet->getDelegate()->freezePane('A2');
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'L' => NumberFormat::FORMAT_CURRENCY_NGN_INTEGER, // Cost Column
        ];
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 8,   // S/N
            'B' => 15,  // Reg No
            'C' => 15,  // Used By
            'D' => 12,  // RFL No
            'E' => 15,  // Incident Type
            'F' => 20,  // Incident Action
            'G' => 40,  // Details
            'H' => 12,  // Date
            'L' => 15,  // Amount
        ];
    }
}