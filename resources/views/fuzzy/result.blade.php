<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Fuzzy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="mb-0">Hasil Perhitungan Fuzzy</h1>
                    </div>

                    <div class="card-body">
                        <!-- Judul hasil perhitungan -->
                        <h2>Hasil</h2>

                        <!-- Menampilkan nama kasus dan nilai X yang diinputkan -->
                        <h6>Nama Kasus: {{ $nama_kasus }}</h6>
                        <h6>Nilai X: {{ $nilai_x }}</h6>

                        <!-- Tabel untuk menampilkan hasil perhitungan -->
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <!-- Header tabel -->
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
                                <!-- Loop untuk menampilkan hasil perhitungan untuk 3 variabel -->
                                @for ($i = 1; $i <= 3; $i++)
                                    @php
                                        // Menentukan suffix untuk variabel ke-2 dan ke-3
                                        $suffix = $i > 1 ? $i : '';
                                    @endphp
                                    <tr>
                                        <!-- Menampilkan data untuk setiap variabel -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
