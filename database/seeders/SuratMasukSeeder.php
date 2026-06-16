<?php

namespace Database\Seeders;

use App\Models\KlasifikasiSurat;
use App\Models\SuratMasuk;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Mengambil semua user id dan kode klasifikasi yang tersedia
        $userIds = User::pluck('id')->toArray();
        $klasifikasiKodes = KlasifikasiSurat::pluck('kode_klasifikasi')->toArray();

        // Jika data kosong, sediakan fallback
        if (empty($userIds)) {
            $userIds = [1];
        }
        if (empty($klasifikasiKodes)) {
            $klasifikasiKodes = ['100'];
        }

        $instansiAsal = [
            'Kantor Walikota Binjai',
            'Dinas Pendidikan Kota Binjai',
            'Dinas Kesehatan Kota Binjai',
            'Badan Kepegawaian Daerah (BKD)',
            'Dinas Sosial Kota Binjai',
            'Camat Binjai Barat',
            'Camat Binjai Utara',
            'Lurah Kartini',
            'Lurah Rambung',
            'Kepolisian Resor Binjai',
            'Komando Distrik Militer (Kodim) 0203',
            'Badan Keuangan dan Aset Daerah (BKAD)',
            'Dinas Penanaman Modal dan Pelayanan Perizinan Terpadu Satu Pintu',
            'Satuan Polisi Pamong Praja (Satpol PP)'
        ];

        $perihalSurat = [
            'Undangan Rapat Koordinasi Wilayah',
            'Permohonan Bantuan Personil Pengamanan Kegiatan',
            'Laporan Capaian Kinerja Triwulan I',
            'Pemberitahuan Pelaksanaan Imunisasi Nasional',
            'Instruksi Pelaksanaan Gotong Royong Massal',
            'Surat Pengantar Pengajuan Anggaran Kecamatan',
            'Permohonan Izin Pemanfaatan Fasilitas Umum',
            'Undangan Pelatihan Manajemen Kearsipan Digital',
            'Pemberitahuan Pendataan Warga Penerima Bansos',
            'Surat Edaran Libur Hari Besar Nasional',
            'Pengajuan Mutasi Kepegawaian Staf Kelurahan',
            'Penyampaian DPA Kecamatan Tahun Anggaran Ini',
            'Pemberitahuan Pemeriksaan Dokumen Laporan Keuangan',
            'Laporan Pengaduan Ketertiban Lingkungan Warga'
        ];

        for ($i = 1; $i <= 50; $i++) {
            $asal = $faker->randomElement($instansiAsal);
            $perihal = $faker->randomElement($perihalSurat);
            
            // Format no surat dan agenda yang variatif
            $tahun = date('Y');
            $noSurat = "{$faker->numberBetween(100, 999)}/SM-" . $faker->randomElement(['Tapem', 'Umum', 'Keu', 'Trantib']) . "/{$tahun}";
            $noAgenda = sprintf('%03d/AGENDA-SM/%s', $i, $tahun);

            SuratMasuk::create([
                'user_id' => $faker->randomElement($userIds),
                'kode_klasifikasi' => $faker->randomElement($klasifikasiKodes),
                'no_agenda' => $noAgenda,
                'asal_surat' => $asal,
                'no_surat' => $noSurat,
                'tgl_surat' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'isi_ringkas' => "Surat mengenai {$perihal} dari {$asal} dengan instruksi perihal tindak lanjut pelaksanaan teknis di lingkungan Kecamatan Binjai Timur.",
                'file_surat' => null, // Biarkan null secara default untuk seeder
            ]);
        }
    }
}
