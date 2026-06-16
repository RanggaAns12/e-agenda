<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung total data untuk kartu statistik
        $totalSuratMasuk = SuratMasuk::count();
        $totalSuratKeluar = SuratKeluar::count();
        $totalDisposisi = Disposisi::count();
        $totalUser = User::count();

        // 2. Ambil 5 data surat masuk terbaru
        $suratMasukTerbaru = SuratMasuk::orderBy('tgl_surat', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // 3. Cari daftar tahun dari tgl_surat untuk membangun filter tahun
        $yearsSuratMasuk = SuratMasuk::selectRaw('YEAR(tgl_surat) as year')
            ->distinct()
            ->pluck('year')
            ->toArray();
            
        $yearsSuratKeluar = SuratKeluar::selectRaw('YEAR(tgl_surat) as year')
            ->distinct()
            ->pluck('year')
            ->toArray();

        $availableYears = array_unique(array_merge($yearsSuratMasuk, $yearsSuratKeluar));
        $availableYears = array_filter($availableYears);

        if (empty($availableYears)) {
            $availableYears = [(int)date('Y')];
        } else {
            sort($availableYears);
        }

        $selectedYear = (int)date('Y');
        if (!in_array($selectedYear, $availableYears)) {
            $selectedYear = max($availableYears);
        }

        // 4. Siapkan data bulanan per tahun untuk di-render di ApexCharts (April s/d Desember)
        $monthlyDataByYear = [];

        foreach ($availableYears as $year) {
            // Inisialisasi 9 elemen array dengan nilai 0 (April s/d Desember)
            $monthlyDataByYear[$year] = [0, 0, 0, 0, 0, 0, 0, 0, 0];
        }

        // Ambil data surat masuk per bulan
        $masukData = SuratMasuk::selectRaw('YEAR(tgl_surat) as year, MONTH(tgl_surat) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        foreach ($masukData as $data) {
            $y = $data->year;
            $m = $data->month;
            if (isset($monthlyDataByYear[$y]) && $m >= 4 && $m <= 12) {
                // Konversi bulan 4-12 ke indeks 0-8
                $monthlyDataByYear[$y][$m - 4] += $data->count;
            }
        }

        // Ambil data surat keluar per bulan
        $keluarData = SuratKeluar::selectRaw('YEAR(tgl_surat) as year, MONTH(tgl_surat) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->get();

        foreach ($keluarData as $data) {
            $y = $data->year;
            $m = $data->month;
            if (isset($monthlyDataByYear[$y]) && $m >= 4 && $m <= 12) {
                $monthlyDataByYear[$y][$m - 4] += $data->count;
            }
        }

        return view('dashboard', compact(
            'totalSuratMasuk',
            'totalSuratKeluar',
            'totalDisposisi',
            'totalUser',
            'availableYears',
            'selectedYear',
            'monthlyDataByYear',
            'suratMasukTerbaru'
        ));
    }
}
