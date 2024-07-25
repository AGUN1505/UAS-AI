<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Fuzzy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            background-color: #000000;
            position: relative;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        body::before {
            background-image: url('{{ asset("poto/stars.png") }}');
            background-size: cover;
            background-position: center;
            z-index: -3;
        }

        body::after {
            background-image:
                url('{{ asset("poto/meteoroid.png") }}'),
                url('{{ asset("poto/rocket.png") }}');
            background-size:
                20% auto,
                15% auto;
            background-repeat: no-repeat;
            background-position:
                top right,
                bottom left;
            z-index: -2;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.7);
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .card-header {
            background-color: rgba(74, 144, 226, 0.8);
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            border-top-left-radius: 15px !important;
            border-top-right-radius: 15px !important;
            padding: 15px 20px;
        }

        .table {
            color: #ffffff;
            background-color: transparent;
        }

        .table thead th {
            background-color: rgba(74, 144, 226, 0.6);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .table-bordered td, .table-bordered th {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .table tbody tr {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #3a7bc8;
            border-color: #3a7bc8;
        }

        .card-body h2,
        .card-body h6 {
            color: #ffffff;
        }

        .card-body h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .card-body h6 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="mb-0">Hasil Perhitungan Fuzzy</h1>
                    </div>
                    <div class="card-body">
                        <h2>Hasil</h2>
                        <h6>Nama Kasus: {{ $nama_kasus }}</h6>
                        <h6>Nilai X: {{ $nilai_x }}</h6>

                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Variabel</th>
                                    <th>Semesta Pembicaraan</th>
                                    <th>Nama Himpunan</th>
                                    <th>Fungsi Keanggotaan</th>
                                    <th>Domain</th>
                                    <th>Hasil(M)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 3; $i++)
                                    @php
                                        $suffix = $i > 1 ? $i : '';
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ ${'nama_varibel' . $suffix} }}</td>
                                        <td>{{ ${'semesta_pembicaraan' . $suffix} }}</td>
                                        <td>{{ ${'nama_himpunan' . $suffix} }}</td>
                                        <td>{{ ${'fungsi_keanggotaan' . $suffix} }}</td>
                                        <td>{{ ${'domain' . $suffix} }}</td>
                                        <td>{{ ${'derajat_keanggotaan' . $suffix} }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <a href="{{ route('fuzzy.index') }}" class="btn btn-primary">Kembali ke Kalkulator</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
