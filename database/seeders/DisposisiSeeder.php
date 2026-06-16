<?php

namespace Database\Seeders;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DisposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Mengambil seluruh id surat masuk
        $suratMasukIds = SuratMasuk::pluck('id')->toArray();

        // Jika data surat masuk kosong, kita tidak bisa men-seed disposisi
        if (empty($suratMasukIds)) {
            return;
        }

        $jabatanTujuan = [
            'Sekretaris Camat (Sekcam)',
            'Kepala Seksi Tata Pemerintahan (Kasi Tapem)',
            'Kepala Seksi Ketentraman dan Ketertiban (Kasi Trantib)',
            'Kepala Seksi Kesejahteraan Rakyat (Kasi Kesra)',
            'Kepala Seksi Pembangunan Masyarakat (Kasi Pembangunan)',
            'Kasubbag Umum dan Kepegawaian',
            'Kasubbag Keuangan',
            'Lurah Binjai Timur',
            'Staf Administrasi Kecamatan'
        ];

        $instruksiDisposisi = [
            'Mohon dipelajari dan persiapkan draf balasan secepatnya.',
            'Harap hadir mewakili Camat dalam kegiatan rapat koordinasi tersebut.',
            'Koordinasikan dengan para Lurah setempat untuk pelaksanaan teknis lapangan.',
            'Segera arsipkan dokumen ini dan berikan salinan ke Kasi terkait.',
            'Siapkan rincian anggaran yang dibutuhkan sesuai perihal surat ini.',
            'Lakukan evaluasi kelayakan usulan dan buat laporan tertulis kepada saya.',
            'Tindak lanjuti segera aduan ketertiban lingkungan ini bersama Babinsa.',
            'Pantau pelaksanaan gotong royong dan pastikan partisipasi warga optimal.',
            'Persiapkan surat undangan turunan untuk rapat internal besok lusa.'
        ];

        $statusList = ['Diteruskan', 'Proses', 'Selesai', 'Ditolak'];

        for ($i = 1; $i <= 50; $i++) {
            $suratId = $faker->randomElement($suratMasukIds);
            // Mengambil tanggal dari surat masuk terkait agar tanggal disposisi logis (sesudah tanggal surat)
            $surat = SuratMasuk::find($suratId);
            $tglSurat = $surat ? $surat->tgl_surat : '-6 months';

            Disposisi::create([
                'surat_masuk_id' => $suratId,
                'tujuan_disposisi' => $faker->randomElement($jabatanTujuan),
                'isi_disposisi' => $faker->randomElement($instruksiDisposisi),
                'tgl_disposisi' => $faker->dateTimeBetween($tglSurat, 'now')->format('Y-m-d'),
                'status' => $faker->randomElement($statusList),
            ]);
        }
    }
}
