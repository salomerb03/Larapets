<?php

namespace App\Exports;

use App\Models\Adoption;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AdoptionsExport implements FromView, WithColumnWidths, WithStyles
{
    public function view(): View
    {
        return view('adoptions.excel', [
            'adopts' => Adoption::with(['user', 'pet'])->get()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,  // id
            'B' => 20, // user name
            'C' => 20, // pet name
            'D' => 15, // created_at
            'E' => 15, // updated_at
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
