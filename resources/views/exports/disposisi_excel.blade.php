<table>
    <thead>
        <tr>
            <th colspan="9" style="font-size: 14px; font-weight: bold; text-align: center;">LAPORAN DATA DISPOSISI SURAT</th>
        </tr>
        <tr>
            <th colspan="9" style="font-size: 11px; font-weight: bold; text-align: center;">E-AGENDA PERSURATAN</th>
        </tr>
        <tr>
            <th colspan="9"></th>
        </tr>
        <tr>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">No</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">No. Agenda Surat</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">No. Surat Masuk</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Asal Surat</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Tujuan Disposisi</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Instruksi Disposisi</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Tanggal Disposisi</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Tanggal Surat</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($disposisi as $index => $disp)
            <tr>
                <td style="border: 1px solid #000000; text-align: center;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000000;">{{ $disp->suratMasuk->no_agenda ?? '-' }}</td>
                <td style="border: 1px solid #000000;">{{ $disp->suratMasuk->no_surat ?? '-' }}</td>
                <td style="border: 1px solid #000000;">{{ $disp->suratMasuk->asal_surat ?? '-' }}</td>
                <td style="border: 1px solid #000000;">{{ $disp->tujuan_disposisi }}</td>
                <td style="border: 1px solid #000000;">{{ $disp->isi_disposisi }}</td>
                <td style="border: 1px solid #000000;">{{ \Carbon\Carbon::parse($disp->tgl_disposisi)->format('d-m-Y') }}</td>
                <td style="border: 1px solid #000000;">{{ $disp->suratMasuk ? \Carbon\Carbon::parse($disp->suratMasuk->tgl_surat)->format('d-m-Y') : '-' }}</td>
                <td style="border: 1px solid #000000;">{{ $disp->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
