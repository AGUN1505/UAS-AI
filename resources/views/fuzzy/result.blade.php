<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Hasil Perhitungan Fuzzy</h1>
                    </div>

                    <div class="card-body">
                        <h2>Hasil</h2>
                        <h6>nama kasus: {{$nama_kasus}}</h6>
                        <h6>nama varibel: {{$nama_varibel}}</h6>
                        <h6>semesta pembicaraan: {{$emesta_pembicaraan}}</h6>
                        <!-- <p>nama himpunan: {{$nama_himpunan}}</p>
                        <p>nama himpunan2: {{$nama_himpunan2}}</p>
                        <p>nama himpunan3: {{$nama_himpunan3}}</p> -->
                        <!-- <p>domain: {{$domain}}</p>
                        <p>domain2: {{$domain2}}</p>
                        <p>domain3: {{$domain3}}</p> -->
                        <h6>fungsi keanggotaan: {{$fungsi_keanggotaan}}</h6>
                        <h6>nilai x: {{$nilai_x}}</h6>
                        <!-- <p>Hasil: {{ $derajat_keanggotaan}}</p>
                        <p>hasil2: {{$derajat_keanggotaan2}}</p>
                        <p>hasil3: {{$derajat_keanggotaan3}}</p> -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Himpunan</th>
                                    <th scope="col">Domain</th>
                                    <th scope="col">Hasil(M)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$nama_himpunan}}</td>
                                    <td>{{$domain}}</td>
                                    <td>{{$derajat_keanggotaan}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>{{$nama_himpunan2}}</td>
                                    <td>{{$domain2}}</td>
                                    <td>{{$derajat_keanggotaan2}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>{{$nama_himpunan3}}</td>
                                    <td>{{$domain3}}</td>
                                    <td>{{$derajat_keanggotaan3}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>