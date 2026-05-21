<?php

namespace App\Exports;

use App\Models\Refueling;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class RefuelingExport implements ShouldAutoSize, WithHeadings, WithColumnFormatting, WithColumnWidths, WithStyles, FromQuery, WithMapping
{
    protected $VehicleNumber;
    protected $dateFrom;
    protected $dateTo;
    
 public function __construct($Car, $DateFrom, $DateTo)
    {
        $this->Car = $Car;
        $this->DateFrom = $DateFrom;
        $this->DateTo = $DateTo;
    }

    public function query()
    {
        $query = \DB::table('refuelings_export') 
                ->join('cars', 'refuelings_export.VehicleNumber', '=', 'cars.VehicleNumber')
                ->select(
                    'refuelings_export.*',
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
        return $query->orderBy('refuelings_export.Date', 'DESC');
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FF000000'],
                    'size' => 11,
                ],
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'DAE9F8'],
                ],
            ],
        ];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
                $cellRange = 'A1:' . $highestColumn . '1';
                
                $event->sheet->getDelegate()
                    ->getStyle($cellRange)
                    ->getFont()
                    ->setName('Calibri');
                
                $event->sheet->getDelegate()
                    ->getRowDimension(1)
                    ->setRowHeight(30);
                
                // Freeze the header row
                $event->sheet->getDelegate()->freezePane('A2');
            },
        ];
    }
    
    public function columnFormats(): array
    {
        return [
            'V' => NumberFormat::FORMAT_CURRENCY_NGN_INTEGER, // Amount column (index W)
            'V' => NumberFormat::FORMAT_NUMBER_00,     // Quantity column (index V)
        ]; 
    }
    
    public function headings(): array
    {
        return [
            'S/N',
            'Vehicle Number',
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
            'Date',
            'Time',
            'Mileage',
            'KM/LITER',
            'Receipt Number',
            'Quantity',
            'Amount',
            'User ID',
            'Date In',
            'Time In',
            'Distance (KM)',
            'Consumption',
        ];
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 8,   // S/N
            'B' => 15,  // Vehicle Number
            'C' => 12,  // Maker
            'D' => 12,  // Model
            'E' => 12,  // Sub Model
            'F' => 10,  // Gear Type
            'G' => 12,  // Engine Type
            'H' => 15,  // Engine Number
            'I' => 15,  // Chassis Number
            'J' => 10,  // Model Year
            'K' => 12,  // Supplier
            'L' => 12,  // Used By
            'M' => 12,  // Driver
            'N' => 15,  // Card Number
            'O' => 12,  // Odometer
            'P' => 12,  // Date
            'Q' => 10,  // Time
            'R' => 12,  // Mileage
            'S' => 10,  // KM/LITER
            'T' => 15,  // Receipt Number
            'U' => 12,  // Quantity
            'V' => 15,  // Amount
            'W' => 12,  // User ID
            'X' => 12,  // Date In
            'Y' => 10,  // Time In
            'Z' => 15,  // Distance
            'AA' => 12, // Consumption
        ];
    }
    
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
            $data->CarOwner,
            $data->Driver,
            $data->CardNumber ?? $data->CardNumber,
            $data->Odometer,
            $data->Date,
            $data->Time,
            $data->Mileage,
            $data->KMLITER,
            $data->ReceiptNumber,
            $data->Quantity,
            $data->Amount,
            $data->UserId,
            $data->DateIn,
            $data->TimeIn,
            $data->KM,
            $data->Consumption,
        ];
    }
}