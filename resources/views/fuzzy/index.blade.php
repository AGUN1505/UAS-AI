<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kalkulator Logika Fuzzy</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('fuzzy.process') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nama_kasus" class="col-md-4 col-form-label text-md-right">Nama Kasus</label>

                                <div class="col-md-6">
                                    <input id="nama_kasus" type="text" class="form-control @error('nama_kasus') is-invalid @enderror" name="nama_kasus" value="{{ old('nama_kasus') }}" required autocomplete="nama_kasus" autofocus>

                                    @error('nama_kasus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="nama_varibel" class="col-md-4 col-form-label text-md-right">Nama Variabel</label>

                                <div class="col-md-6">
                                    <input id="nama_varibel" type="text" class="form-control @error('nama_varibel') is-invalid @enderror" name="nama_varibel" value="{{ old('nama_varibel') }}" required autocomplete="nama_varibel" autofocus>

                                    @error('nama_varibel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="semesta_pembicaraan" class="col-md-4 col-form-label text-md-right">Semesta Pembicaraan</label>

                                <div class="col-md-6">
                                    <input id="semesta_pembicaraan" type="text" class="form-control @error('semesta_pembicaraan') is-invalid @enderror" name="semesta_pembicaraan" value="{{ old('semesta_pembicaraan') }}" required autocomplete="semesta_pembicaraan" autofocus>

                                    @error('semesta_pembicaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="nama_himpunan" class="col-md-4 col-form-label text-md-right">Nama Himpunan 1</label>

                                <div class="col-md-6">
                                    <input id="nama_himpunan" type="text" class="form-control @error('nama_himpunan') is-invalid @enderror" name="nama_himpunan" value="{{ old('nama_himpunan') }}" required autocomplete="nama_himpunan" autofocus>

                                    @error('nama_himpunan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="nama_himpunan" class="col-md-4 col-form-label text-md-right">Nama Himpunan 2</label>

                                <div class="col-md-6">
                                    <input id="nama_himpunan2" type="text" class="form-control @error('nama_himpunan') is-invalid @enderror" name="nama_himpunan2" value="{{ old('nama_himpunan2') }}" required autocomplete="nama_himpunan2" autofocus>

                                    @error('nama_himpunan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="nama_himpunan" class="col-md-4 col-form-label text-md-right">Nama Himpunan 3</label>

                                <div class="col-md-6">
                                    <input id="nama_himpunan3" type="text" class="form-control @error('nama_himpunan') is-invalid @enderror" name="nama_himpunan3" value="{{ old('nama_himpunan3') }}" required autocomplete="nama_himpunan3" autofocus>

                                    @error('nama_himpunan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="domain" class="col-md-4 col-form-label text-md-right">Domain 1</label>

                                <div class="col-md-6">
                                    <input id="domain" type="text" class="form-control @error('domain') is-invalid @enderror" name="domain" value="{{ old('domain') }}" placeholder="harus diisi dengan 4 domain" autocomplete="domain" autofocus>

                                    @error('domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="domain2" class="col-md-4 col-form-label text-md-right">Domain 2</label>

                                <div class="col-md-6">
                                    <input id="domain2" type="text" class="form-control @error('domain') is-invalid @enderror" name="domain2" value="{{ old('domain2') }}" placeholder="harus diisi dengan 4 domain" autocomplete="domain2" autofocus>

                                    @error('domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="domain3" class="col-md-4 col-form-label text-md-right">Domain 3</label>

                                <div class="col-md-6">
                                    <input id="domain3" type="text" class="form-control @error('domain') is-invalid @enderror" name="domain3" value="{{ old('domain3') }}" placeholder="harus diisi dengan 4 domain" autocomplete="domain3" autofocus>

                                    @error('domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="fungsi_keanggotaan" class="col-md-4 col-form-label text-md-right">Fungsi Keanggotaan</label>

                                <div class="col-md-6">
                                    <select id="fungsi_keanggotaan" class="form-control @error('fungsi_keanggotaan') is-invalid @enderror" name="fungsi_keanggotaan" required onchange="updateOtherSelects(this.value)">
                                        <option value="">Pilih Fungsi Keanggotaan</option>
                                        <option value="linier_naik">Linier Naik</option>
                                        <option value="linier_turun">Linier Turun</option>
                                        <option value="trapesium">Trapesium</option>
                                        <option value="egitiga">segitiga</option>
                                    </select>

                                    @error('fungsi_keanggotaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <select id="fungsi_keanggotaan2" class="form-control @error('fungsi_keanggotaan2') is-invalid @enderror" name="fungsi_keanggotaan2" aria-label="Disabled select example" disabled required>
                                        <option value="">Pilih Fungsi Keanggotaan</option>
                                        <option value="linier_naik2">Linier Naik</option>
                                        <option value="linier_turun2">Linier Turun</option>
                                        <option value="trapesium2">Trapesium</option>
                                        <option value="egitiga2">segitiga</option>
                                    </select>

                                    @error('fungsi_keanggotaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <select id="fungsi_keanggotaan3" class="form-control @error('fungsi_keanggotaan3') is-invalid @enderror" name="fungsi_keanggotaan3" aria-label="Disabled select example" disabled required>
                                        <option value="">Pilih Fungsi Keanggotaan</option>
                                        <option value="linier_naik3">Linier Naik</option>
                                        <option value="linier_turun3">Linier Turun</option>
                                        <option value="trapesium3">Trapesium</option>
                                        <option value="egitiga3">segitiga</option>
                                    </select>

                                    @error('fungsi_keanggotaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="nilai_x" class="col-md-4 col-form-label text-md-right">Nilai X</label>

                                <div class="col-md-6">
                                    <input id="nilai_x" type="number" class="form-control @error('nilai_x') is-invalid @enderror" name="nilai_x" value="{{ old('nilai_x') }}" required autocomplete="nilai_x" autofocus>

                                    @error('nilai_x')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br />
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Hitung
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateOtherSelects(value) {
            document.getElementById('fungsi_keanggotaan2').value = value + '2';
            document.getElementById('fungsi_keanggotaan3').value = value + '3';
        }

        // function updateOtherSelects(value) {
        //     document.getElementById('fungsi_keanggotaan1').value = value + '1';
        //     document.getElementById('fungsi_keanggotaan3').value = value + '3';
        // }

        // function updateOtherSelects(value) {
        //     document.getElementById('fungsi_keanggotaan2').value = value + '2';
        //     document.getElementById('fungsi_keanggotaan1').value = value + '1';
        // }
    </script>

</body>

</html>