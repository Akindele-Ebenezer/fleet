<?php

namespace App\Exports;

use App\Models\Car;
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

class CarsExport implements 
                            FromCollection, ShouldAutoSize, 
                            WithColumnWidths, WithHeadings, 
                            WithStyles, WithEvents, 
                            WithColumnFormatting    
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Car::all();
    }

    public function styles(Worksheet $sheet)
    {
        return [ 
           1    => [
                    'font' => [
                        'bold' => true, 'color' => ['argb' => 'FFFFFFFF'], 
                    ], 
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FF000000',
                    ],
                    'endColor' => [
                        'argb' => 'FF000000',
                    ],
                ],
            ], 
           'B'  => ['font' => ['size' => 16]], 
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1';  
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Calibri Light'); 
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'O' => NumberFormat::FORMAT_CURRENCY_NGN_INTEGER,
            'W' => NumberFormat::FORMAT_CURRENCY_NGN_INTEGER,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'REG NO.',
            'MAKER',
            'Model',
            'Sub Model',
            'Gear Type',
            'Engine Type',
            'Engine Number',
            'Chassis Number',
            'Model Year',
            'Engine Volume',
            'Comments',
            '',
            'Purchase Date',
            'Price',
            'User Id',
            'Date In',
            'Time In',
            'Supplier',
            'Car Owner',
            'Driver',
            'Card Number',
            'Monthly Budget',
            'Company Code',
            'Total Deposits',
            'Total Refueling',
            'Total Refueling Car',
            'Balance',
            'Pin Code',
            'Total Master',
            'Status',
            'Stop Date',
            'Licence Expiry Date',
            'Insurance Expiry Date',
            'FIN',
            'Fuel Tank Capacity', 
        ];
    }
    public function columnWidths(): array
    {
        return [
            'L' => 25.71,
            'M' => 0,
            'Y' => 0,
            'Z' => 0,
            'AA' => 0, 
            'AD' => 0, 
            'AI' => 0,            
            'AJ' => 0,            
            'AK' => 0,            
            'AL' => 0,            
            'AM' => 0,            
            'AN' => 0,            
        ];
    }
}
