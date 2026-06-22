<table>
    <thead>
        <tr>
            <th colspan="8" style="font-size: 14px; font-weight: bold; text-align: center;">LAPORAN DATA SURAT MASUK</th>
        </tr>
        <tr>
            <th colspan="8" style="font-size: 11px; font-weight: bold; text-align: center;">E-AGENDA PERSURATAN</th>
        </tr>
        <tr>
            <th colspan="8"></th>
        </tr>
        <tr>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">No</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">No. Agenda</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">No. Surat</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Asal Surat</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Klasifikasi</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Tanggal Surat</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Isi Ringkas / Perihal</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Petugas Penerima</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suratMasuk as $index => $surat)
            <tr>
                <td style="border: 1px solid #000000; text-align: center;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000000;">{{ $surat->no_agenda }}</td>
                <td style="border: 1px solid #000000;">{{ $surat->no_surat }}</td>
                <td style="border: 1px solid #000000;">{{ $surat->asal_surat }}</td>
                <td style="border: 1px solid #000000;">{{ $surat->klasifikasi->nama_klasifikasi ?? $surat->kode_klasifikasi }}</td>
                <td style="border: 1px solid #000000;">{{ \Carbon\Carbon::parse($surat->tgl_surat)->format('d-m-Y') }}</td>
                <td style="border: 1px solid #000000;">{{ $surat->isi_ringkas }}</td>
                <td style="border: 1px solid #000000;">{{ $surat->user->name ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
