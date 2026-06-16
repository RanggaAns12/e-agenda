<?php

namespace Database\Seeders;

use App\Models\KlasifikasiSurat;
use App\Models\SuratKeluar;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SuratKeluarSeeder extends Seeder
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

        $instansiTujuan = [
            'Walikota Binjai u.p Sekretaris Daerah',
            'Kepala Dinas Pendidikan Kota Binjai',
            'Kepala Dinas Kesehatan Kota Binjai',
            'Kepala Dinas Sosial Kota Binjai',
            'Kepala Badan Kepegawaian Daerah (BKD) Kota Binjai',
            'Lurah Binjai Timur',
            'Lurah Timbang Langkat',
            'Lurah Mencirim',
            'Lurah Dataran Tinggi',
            'Lurah Tunggurono',
            'Kepala Kepolisian Sektor Binjai Timur',
            'Danramil Binjai Timur',
            'Ketua TP PKK Kecamatan Binjai Timur',
            'Ketua Karang Taruna Binjai Timur'
        ];

        $perihalSuratKeluar = [
            'Undangan Musyawarah Rencana Pembangunan (Musrenbang) Kecamatan',
            'Laporan Mingguan Ketentraman dan Ketertiban Umum',
            'Pengajuan Usulan Kebutuhan Formasi Pegawai ASN',
            'Surat Rekomendasi Pendaftaran Izin Usaha Mikro',
            'Undangan Rapat Evaluasi Kinerja Lurah se-Kecamatan',
            'Pengantar Berkas Pengajuan Dana Stimulan Kelurahan',
            'Pemberitahuan Pelaksanaan Penertiban Pedagang Kaki Lima',
            'Undangan Sosialisasi Pencegahan Penyalahgunaan Narkoba',
            'Permohonan Fasilitasi Kegiatan Penyaluran Bantuan Sosial',
            'Penyampaian Surat Keputusan Pembentukan Panitia HUT RI',
            'Surat Keterangan Kematian/Kelakuan Baik Warga Khusus',
            'Laporan Keuangan Semesteran Kecamatan Binjai Timur',
            'Pemberitahuan Pendataan Ulang Aset Inventaris Kantor',
            'Rekomendasi Izin Keramaian Kegiatan Pentas Seni Warga'
        ];

        for ($i = 1; $i <= 50; $i++) {
            $tujuan = $faker->randomElement($instansiTujuan);
            $perihal = $faker->randomElement($perihalSuratKeluar);

            $tahun = date('Y');
            $noSurat = "{$faker->numberBetween(100, 999)}/SK-" . $faker->randomElement(['Tapem', 'Umum', 'Keu', 'Trantib']) . "/{$tahun}";
            $noAgenda = sprintf('%03d/AGENDA-SK/%s', $i, $tahun);

            SuratKeluar::create([
                'user_id' => $faker->randomElement($userIds),
                'kode_klasifikasi' => $faker->randomElement($klasifikasiKodes),
                'no_agenda' => $noAgenda,
                'tujuan_surat' => $tujuan,
                'no_surat' => $noSurat,
                'tgl_surat' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'isi_ringkas' => "Surat dinas mengenai {$perihal} yang ditujukan untuk {$tujuan} sebagai tindak lanjut program kerja resmi Kecamatan Binjai Timur.",
                'file_surat' => null,
            ]);
        }
    }
}
