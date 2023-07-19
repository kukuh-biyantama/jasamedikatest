<!DOCTYPE html>
<html>

<head>
    <title>Cetak Member</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Cetak Member</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->nama_pasien}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$datakelurahan->kelurahan->nama_kelurahan}}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>