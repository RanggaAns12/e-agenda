<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SuratMasukExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $suratMasuk;

    public function __construct($suratMasuk)
    {
        $this->suratMasuk = $suratMasuk;
    }

    public function view(): View
    {
        return view('exports.surat_masuk_excel', [
            'suratMasuk' => $this->suratMasuk
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
