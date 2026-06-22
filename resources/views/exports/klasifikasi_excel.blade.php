<table>
    <thead>
        <tr>
            <th colspan="4" style="font-size: 14px; font-weight: bold; text-align: center;">LAPORAN DAFTAR KLASIFIKASI SURAT</th>
        </tr>
        <tr>
            <th colspan="4" style="font-size: 11px; font-weight: bold; text-align: center;">E-AGENDA PERSURATAN</th>
        </tr>
        <tr>
            <th colspan="4"></th>
        </tr>
        <tr>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">No</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Kode Klasifikasi</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Nama Klasifikasi</th>
            <th style="font-weight: bold; background-color: #dcdcdc; border: 1px solid #000000;">Uraian / Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($klasifikasi as $index => $klas)
            <tr>
                <td style="border: 1px solid #000000; text-align: center;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000000;">{{ $klas->kode_klasifikasi }}</td>
                <td style="border: 1px solid #000000;">{{ $klas->nama_klasifikasi }}</td>
                <td style="border: 1px solid #000000;">{{ $klas->uraian }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
