<?php

namespace Database\Seeders;

use App\Models\KlasifikasiSurat;
use Illuminate\Database\Seeder;

class KlasifikasiSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_klasifikasi' => '000',
                'nama_klasifikasi' => 'Umum',
                'uraian' => 'Klasifikasi untuk urusan umum, rumah tangga, perlengkapan, tata usaha, dan kearsipan.',
            ],
            [
                'kode_klasifikasi' => '050',
                'nama_klasifikasi' => 'Perencanaan',
                'uraian' => 'Klasifikasi untuk urusan perencanaan pembangunan nasional, daerah, evaluasi, dan pelaporan.',
            ],
            [
                'kode_klasifikasi' => '090',
                'nama_klasifikasi' => 'Hubungan Masyarakat',
                'uraian' => 'Klasifikasi untuk urusan kehumasan, keprotokolan, konferensi pers, publikasi, dan dokumentasi.',
            ],
            [
                'kode_klasifikasi' => '100',
                'nama_klasifikasi' => 'Pemerintahan',
                'uraian' => 'Klasifikasi untuk urusan urusan tata pemerintahan, otonomi daerah, pemilu, agraria, kependudukan, dan hukum.',
            ],
            [
                'kode_klasifikasi' => '800',
                'nama_klasifikasi' => 'Kepegawaian',
                'uraian' => 'Klasifikasi untuk urusan kepegawaian, pengangkatan, mutasi, promosi, cuti, kedisiplinan, pensiun, dan pelatihan.',
            ],
            [
                'kode_klasifikasi' => '900',
                'nama_klasifikasi' => 'Keuangan',
                'uraian' => 'Klasifikasi untuk urusan anggaran, perbendaharaan, kas, verifikasi, pembukuan, pertanggungjawaban, dan pajak.',
            ]
        ];

        foreach ($data as $item) {
            KlasifikasiSurat::updateOrCreate(
                ['kode_klasifikasi' => $item['kode_klasifikasi']],
                $item
            );
        }
    }
}
