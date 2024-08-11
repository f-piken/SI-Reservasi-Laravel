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
    <center>Laporan Data Room</center>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Room</th>
                <th>Tipe Room</th>
                <th>Harga Room</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($room as $no => $cus)
            <tr>
                <td>{{ $no +1 }}</td>
                <td>{{ $cus->No_Room }}</td>
                <td>{{ $cus->Tipe_Room }}</td>
                <td>{{ $cus->Harga_Room }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>