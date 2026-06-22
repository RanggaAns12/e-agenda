<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lembar Disposisi - No. Agenda: {{ $disposisi->suratMasuk->no_agenda ?? '' }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 11px;
            color: #000;
            margin: 0;
            padding: 0;
            line-height: 1.4;
        }
        /* Kop Surat Styles */
        .clear {
            clear: both;
        }
        /* Title */
        .title {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        /* Grid Table for Disposition Sheet */
        .table-layout {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .table-layout td {
            border: 1px solid #000;
            padding: 6px 10px;
            vertical-align: top;
        }
        .table-layout td.half {
            width: 50%;
        }
        .bold {
            font-weight: bold;
        }
        .gray-bg {
            background-color: #f2f2f2;
            text-transform: uppercase;
            font-size: 10px;
            font-weight: bold;
        }
        /* Instruction Section */
        .instruction-box {
            border: 1px solid #000;
            padding: 12px;
            min-height: 100px;
            margin-bottom: 15px;
            white-space: pre-line;
        }
        /* Footer Signatures */
        .signatures {
            margin-top: 30px;
            width: 100%;
        }
        .signature-col {
            float: right;
            width: 200px;
            text-align: center;
        }
        .sig-date {
            margin-bottom: 50px;
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
    <div class="title">LEMBAR DISPOSISI SURAT</div>

    <!-- Layout Table -->
    <table class="table-layout">
        <tr>
            <td class="half">
                <span class="bold">Surat Dari:</span><br>
                {{ $disposisi->suratMasuk->asal_surat ?? 'N/A' }}
            </td>
            <td class="half">
                <span class="bold">Diterima Tanggal:</span><br>
                {{ $disposisi->suratMasuk ? $disposisi->suratMasuk->created_at->translatedFormat('d F Y') : 'N/A' }}
            </td>
        </tr>
        <tr>
            <td class="half">
                <span class="bold">Nomor Surat:</span><br>
                {{ $disposisi->suratMasuk->no_surat ?? 'N/A' }}
            </td>
            <td class="half">
                <span class="bold">Nomor Agenda:</span><br>
                <span class="bold" style="color: #15803d; font-size: 12px;">{{ $disposisi->suratMasuk->no_agenda ?? 'N/A' }}</span>
            </td>
        </tr>
        <tr>
            <td class="half">
                <span class="bold">Tanggal Surat:</span><br>
                {{ $disposisi->suratMasuk ? \Carbon\Carbon::parse($disposisi->suratMasuk->tgl_surat)->translatedFormat('d F Y') : 'N/A' }}
            </td>
            <td class="half">
                <span class="bold">Kode Klasifikasi:</span><br>
                {{ $disposisi->suratMasuk->kode_klasifikasi ?? 'N/A' }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span class="bold">Perihal / Isi Ringkas Surat:</span><br>
                {{ $disposisi->suratMasuk->isi_ringkas ?? 'N/A' }}
            </td>
        </tr>
        <tr>
            <td class="gray-bg" colspan="2">DISPOSISI PIMPINAN</td>
        </tr>
        <tr>
            <td class="half">
                <span class="bold">Diteruskan Kepada:</span><br>
                <strong style="font-size: 12px;">{{ $disposisi->tujuan_disposisi }}</strong>
            </td>
            <td class="half">
                <span class="bold">Status Penyelesaian:</span><br>
                <strong style="text-transform: uppercase;">{{ $disposisi->status }}</strong>
            </td>
        </tr>
        <tr>
            <td class="half">
                <span class="bold">Tanggal Disposisi:</span><br>
                {{ \Carbon\Carbon::parse($disposisi->tgl_disposisi)->translatedFormat('d F Y') }}
            </td>
            <td class="half">
                <span class="bold">Sifat Disposisi:</span><br>
                Segera / Penting
            </td>
        </tr>
    </table>

    <div style="font-weight: bold; margin-bottom: 5px; text-transform: uppercase; font-size: 10px; color: #444;">Instruksi / Catatan Pimpinan:</div>
    <div class="instruction-box">
        {!! nl2br(e($disposisi->isi_disposisi)) !!}
    </div>

    <!-- Signatures -->
    <div class="signatures">
        <div class="signature-col">
            <div class="sig-date">Jakarta, {{ \Carbon\Carbon::parse($disposisi->tgl_disposisi)->translatedFormat('d F Y') }}</div>
            <div>Pimpinan Instansi,</div>
            <div style="height: 50px;"></div>
            <div class="sig-name">...............................................</div>
            <div>NIP. .........................................</div>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>
