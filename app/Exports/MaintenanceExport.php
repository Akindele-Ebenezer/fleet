<?php

namespace App\Exports;

use App\Models\Maintenance;
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

class MaintenanceExport implements 
                                ShouldAutoSize, 
                                WithHeadings, WithColumnFormatting,
                                WithColumnWidths, WithStyles, FromQuery  
{
    public function __construct($VehicleNumber)
    {
        $this->VehicleNumber = $VehicleNumber;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {  
        if($this->VehicleNumber === 'all') { 
            return \DB::query()->from('maintenances')->whereNotNull('VehicleNumber')->orderBy('Date', 'DESC')->orderBy('Time', 'DESC');
        } else if($this->VehicleNumber === 'one') {
            return \DB::query()->from('maintenances_export')->orderBy('Date', 'DESC')->orderBy('Time', 'DESC');
        } else {
            return \DB::query()->from('maintenances_export')->orderBy('Date', 'DESC')->orderBy('Time', 'DESC');
        }   
    }
    
    public function styles(Worksheet $sheet)
    {
        return [ 
           1    => [
                    'font' => [
                        'bold' => true, 'color' => ['argb' => 'FF000000'], 
                    ], 
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'dae9f8',
                    ],
                    'endColor' => [
                        'argb' => 'dae9f8',
                    ],
                ],
            ], 
        //    'B'  => ['font' => ['size' => 16]], 
           'E' => [
               'alignment' => [
                   'wrapText' => true,
               ],
           ],
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
            'L' => NumberFormat::FORMAT_CURRENCY_NGN_INTEGER, 
        ];
    }
    
    public function headings(): array
    {
        return [
            '#',
            'REG NO.',
            'Used By',
            '', 
            'Incident Action', 
            'Details',
            '', 
            'Date',
            'Time',
            'Release Date',
            'Release Time',
            'Cost', 
            'Invoice Number', 
            'Week', 
            'Attachment', 
            'User Id', 
            'Date In', 
            'Time In', 
            'created_at', 
            'updated_at', 
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 0,              
            'D' => 0,              
            'E' => 25,        
            'F' => 0,    
            'G' => 0,            
            'H' => 0,             
            'K' => 0,              
            'I' => 0,        
            'J' => 0,        
            'M' => 0,        
            'N' => 0,        
            'R' => 0,          
            'O' => 0,                  
            'P' => 0,                  
            'Q' => 0,                  
            'R' => 0,            
            'S' => 0,            
        ];
    }
}
