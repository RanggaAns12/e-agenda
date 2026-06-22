<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SuratKeluarExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $suratKeluar;

    public function __construct($suratKeluar)
    {
        $this->suratKeluar = $suratKeluar;
    }

    public function view(): View
    {
        return view('exports.surat_keluar_excel', [
            'suratKeluar' => $this->suratKeluar
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
