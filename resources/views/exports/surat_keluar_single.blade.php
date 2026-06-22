<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lembar Arsip Surat Keluar - {{ $suratKeluar->no_agenda }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.4;
        }
        /* Kop Surat Styles */
        .clear {
            clear: both;
        }
        /* Card & Table Styles */
        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table-details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        .table-details td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        .table-details td.label {
            font-weight: bold;
            background-color: #f7f9fa;
            width: 25%;
            color: #444;
        }
        .isi-ringkas {
            background-color: #fcfcfc;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 4px;
            font-size: 11px;
            margin-bottom: 25px;
            white-space: pre-line;
        }
        .section-title {
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #15803d;
            border-left: 3px solid #15803d;
            padding-left: 8px;
        }
        /* Footer Signatures */
        .signatures {
            margin-top: 50px;
            width: 100%;
        }
        .signature-col {
            float: right;
            width: 220px;
            text-align: center;
        }
        .sig-date {
            margin-bottom: 60px;
        }
        .sig-name {
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
    <div class="title">LEMBAR ARSIP SURAT KELUAR</div>

    <!-- Details Table -->
    <table class="table-details">
        <tr>
            <td class="label">Nomor Agenda</td>
            <td><strong>{{ $suratKeluar->no_agenda }}</strong></td>
            <td class="label">Kode Klasifikasi</td>
            <td><strong style="color: #15803d;">{{ $suratKeluar->kode_klasifikasi }}</strong></td>
        </tr>
        <tr>
            <td class="label">Nomor Surat</td>
            <td>{{ $suratKeluar->no_surat }}</td>
            <td class="label">Tanggal Surat</td>
            <td>{{ \Carbon\Carbon::parse($suratKeluar->tgl_surat)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Tujuan Surat</td>
            <td>{{ $suratKeluar->tujuan_surat }}</td>
            <td class="label">Tanggal Pengarsipan</td>
            <td>{{ $suratKeluar->created_at->translatedFormat('d F Y (H:i)') }}</td>
        </tr>
        <tr>
            <td class="label">Petugas Pengarsip</td>
            <td colspan="3">{{ $suratKeluar->user->name ?? 'System' }}</td>
        </tr>
    </table>

    <!-- Isi Ringkas -->
    <div class="section-title">Isi Ringkas / Perihal Surat</div>
    <div class="isi-ringkas">{!! nl2br(e($suratKeluar->isi_ringkas)) !!}</div>

    <!-- Signatures -->
    <div class="signatures">
        <div class="signature-col">
            <div class="sig-date">Jakarta, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
            <div>Petugas Arsip,</div>
            <div style="height: 50px;"></div>
            <div class="sig-name">{{ Auth::user()->name }}</div>
            <div>NIP. .........................</div>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>
