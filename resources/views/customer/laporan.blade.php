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
    <center>Laporan Data Customer</center>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Customer</th>
                <th>Jenis Kelamin</th>
                <th>Alamat Rumah</th>
                <th>No Telepon</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cus as $no => $cus)
            <tr>
                <td>{{ $no +1 }}</td>
                <td>{{ $cus->Nama_Customer }}</td>
                <td>{{ $cus->Jenis_Kelamin }}</td>
                <td>{{ $cus->Alamat_Rumah }}</td>
                <td>{{ $cus->No_Telp }}</td>
                <td>{{ $cus->user->Email }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>