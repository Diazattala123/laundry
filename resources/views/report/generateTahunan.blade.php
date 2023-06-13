<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LAPORAN DATA SISWA</title>
    <style>
       
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
    </style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
    <h1>Laporan Pembayaran Laundry per  tahun {{ $tahun }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Outlet</th>
                <th>Kode Invoice</th>
                <th>Pelanggan</th>
                <th>tanggal bayar</th>
                <th>Biaya Tambahan</th>
                <th>Status Pemrosesan</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $index => $bayar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $bayar->nama_outlet }}</td>
                    <td>{{ $bayar->kode_invoice }}</td>
                    <td>{{ $bayar->nama_user }}</td>
                    <td>{{ $bayar->created_at }}</td>
                    <td>{{ $bayar->biaya_tambahan }}</td>
                    <td>{{ $bayar->status }}</td>
                    <td>{{ $bayar->dibayar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
</body>
<script>
    window.onload = function() {
            window.print();
        };
</script>
</html>