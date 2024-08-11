<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Customer</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #3b3f4d;
            color: #fff:
        }
        center{
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <center>Laporan Data Reservasi</center>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Customer</th>
                <th>Nomor Room</th>
                <th>Tanggal Reservasi</th>
                <th>Waktu Reservasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($res as $no => $cus)
            <tr>
                <td>{{ $no +1 }}</td>
                <td>{{ $cus->Nama_Customer }}</td>
                <td>{{ $cus->No_Room }}</td>
                <td>{{ $cus->Tanggal_Reservasi }}</td>
                <td>{{ $cus->Waktu_Reservasi }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>