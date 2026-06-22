<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Klasifikasi Surat</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        /* Kop Surat Styles */
        .clear {
            clear: both;
        }
        /* Table Styles */
        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table-data th {
            background-color: #15803d;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 9px;
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table-data td {
            padding: 8px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        .table-data tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            float: right;
            width: 200px;
            text-align: center;
        }
        .footer-date {
            margin-bottom: 50px;
        }
        .footer-name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    @php
        $logoPath = public_path('images/logo.webp');
        $logoData = '';
        if (file_exists($logoPath)) {
            $logoData = base64_encode(file_get_contents($logoPath));
        }
    @endphp
    <table style="width: 100%; border-collapse: collapse; border: none; margin-bottom: 5px;">
        <tr>
            <td style="width: 15%; text-align: left; vertical-align: middle; border: none; padding: 0;">
                @if($logoData)
                    <img src="data:image/webp;base64,{{ $logoData }}" style="width: 70px; height: auto;">
                @endif
            </td>
            <td style="width: 70%; text-align: center; vertical-align: middle; border: none; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
                <div style="font-size: 13px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 0.5px; color: #1f2937;">PEMERINTAH REPUBLIK INDONESIA</div>
                <div style="font-size: 16px; font-weight: bold; text-transform: uppercase; margin: 3px 0 0 0; letter-spacing: 1px; color: #111827;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</div>
                <div style="font-size: 18px; font-weight: bold; color: #15803d; text-transform: uppercase; margin: 3px 0 0 0; letter-spacing: 1px;">SISTEM E-AGENDA PERSURATAN</div>
                <div style="font-size: 9px; color: #4b5563; margin: 5px 0 0 0; line-height: 1.3; font-style: italic;">
                    Jalan Raya Protokol No. 123, Kompleks Perkantoran Pemerintah Kota<br>
                    Telp: (021) 88887777 | Fax: (021) 88887778 | Email: info@e-agenda.go.id
                </div>
            </td>
            <td style="width: 15%; border: none; padding: 0;"></td>
        </tr>
    </table>
    <div style="border-top: 1px solid #000; border-bottom: 3px double #000; height: 4px; margin: 5px 0 15px 0;"></div>

    <!-- Title -->
    <div class="title">Laporan Daftar Klasifikasi Surat</div>

    <!-- Table -->
    <table class="table-data">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="20%">Kode Klasifikasi</th>
                <th width="35%">Nama Klasifikasi</th>
                <th width="40%">Uraian / Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($klasifikasi as $index => $klas)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $klas->kode_klasifikasi }}</strong></td>
                    <td>{{ $klas->nama_klasifikasi }}</td>
                    <td>{{ $klas->uraian }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center" style="color: #999;">Tidak ada data klasifikasi surat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Footer Signature -->
    <div class="footer">
        <div class="footer-date">Jakarta, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
        <div>Petugas Arsip,</div>
        <div style="height: 50px;"></div>
        <div class="footer-name">{{ Auth::user()->name }}</div>
        <div>NIP. .........................</div>
    </div>
    <div class="clear"></div>
</body>
</html>
