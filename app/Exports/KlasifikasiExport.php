<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KlasifikasiExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $klasifikasi;

    public function __construct($klasifikasi)
    {
        $this->klasifikasi = $klasifikasi;
    }

    public function view(): View
    {
        return view('exports.klasifikasi_excel', [
            'klasifikasi' => $this->klasifikasi
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
