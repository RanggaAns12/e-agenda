<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DisposisiExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $disposisi;

    public function __construct($disposisi)
    {
        $this->disposisi = $disposisi;
    }

    public function view(): View
    {
        return view('exports.disposisi_excel', [
            'disposisi' => $this->disposisi
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            2 => ['font' => ['bold' => true, 'size' => 11]],
            4 => ['font' => ['bold' => true]],
        ];
    }
}
