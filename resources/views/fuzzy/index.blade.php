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
                        <!-- Form untuk mengirimkan data ke route 'fuzzy.process' menggunakan metode POST -->
                        <form method="POST" action="{{ route('fuzzy.process') }}">
                            <!-- Token CSRF untuk keamanan form -->
                            @csrf

                            @php
                            // Mendefinisikan array asosiatif untuk field teks dan labelnya
                            $textFields = [
                                'nama_kasus' => 'Nama Kasus',
                                'nama_varibel' => 'Nama Variabel',
                                'nama_varibel2' => 'Nama Variabel2',
                                'nama_varibel3' => 'Nama Variabel3',
                                'semesta_pembicaraan' => 'Semesta Pembicaraan',
                                'semesta_pembicaraan2' => 'Semesta Pembicaraan2',
                                'semesta_pembicaraan3' => 'Semesta Pembicaraan3',
                                'nama_himpunan' => 'Nama Himpunan 1',
                                'nama_himpunan2' => 'Nama Himpunan 2',
                                'nama_himpunan3' => 'Nama Himpunan 3',
                            ];
                            @endphp

                            <!-- Loop untuk membuat input field berdasarkan array $textFields -->
                            @foreach ($textFields as $field => $label)
                            <div class="form-group row mb-3">
                                <label for="{{ $field }}" class="col-md-4 col-form-label text-md-right">{{ $label }}</label>
                                <div class="col-md-6">
                                    <!-- Input field dengan validasi error -->
                                    <input id="{{ $field }}" type="text" class="form-control @error($field) is-invalid @enderror" name="{{ $field }}" value="{{ old($field) }}" required autocomplete="{{ $field }}" autofocus>
                                    <!-- Menampilkan pesan error jika ada -->
                                    @error($field)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endforeach

                            @php
                            // Mendefinisikan array asosiatif untuk pilihan fungsi keanggotaan
                            $fungsiKeanggotaan = ['linier_naik' => 'Linier Naik', 'linier_turun' => 'Linier Turun', 'trapesium' => 'Trapesium', 'egitiga' => 'Segitiga'];
                            @endphp

                            <!-- Loop untuk membuat 3 set input fungsi keanggotaan dan domain -->
                            @for ($i = 1; $i <= 3; $i++)
                            <div class="form-group row mb-3">
                                <label for="fungsi_keanggotaan{{ $i > 1 ? $i : '' }}" class="col-md-4 col-form-label text-md-right">Fungsi Keanggotaan {{ $i }}</label>
                                <div class="col-md-6">
                                    <!-- Dropdown untuk memilih fungsi keanggotaan -->
                                    <select id="fungsi_keanggotaan{{ $i > 1 ? $i : '' }}" class="form-control @error('fungsi_keanggotaan' . ($i > 1 ? $i : '')) is-invalid @enderror" name="fungsi_keanggotaan{{ $i > 1 ? $i : '' }}" required>
                                        <option value="">Pilih Fungsi Keanggotaan</option>
                                        @foreach ($fungsiKeanggotaan as $value => $label)
                                        <option value="{{ $value . ($i > 1 ? $i : '') }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Menampilkan pesan error jika ada -->
                                    @error('fungsi_keanggotaan' . ($i > 1 ? $i : ''))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="domain{{ $i > 1 ? $i : '' }}" class="col-md-4 col-form-label text-md-right">Domain {{ $i }}</label>
                                <div class="col-md-6">
                                    <!-- Input field untuk domain dengan placeholder -->
                                    <input id="domain{{ $i > 1 ? $i : '' }}" type="text" class="form-control @error('domain' . ($i > 1 ? $i : '')) is-invalid @enderror" name="domain{{ $i > 1 ? $i : '' }}" value="{{ old('domain' . ($i > 1 ? $i : '')) }}" placeholder="Masukkan 4 nilai domain" required autocomplete="domain{{ $i > 1 ? $i : '' }}">
                                    <!-- Menampilkan pesan error jika ada -->
                                    @error('domain' . ($i > 1 ? $i : ''))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endfor

                            <div class="form-group row mb-3">
                                <label for="nilai_x" class="col-md-4 col-form-label text-md-right">Nilai X</label>
                                <div class="col-md-6">
                                    <!-- Input field untuk nilai X -->
                                    <input id="nilai_x" type="text" class="form-control @error('nilai_x') is-invalid @enderror" name="nilai_x" value="{{ old('nilai_x') }}" required autocomplete="nilai_x">
                                    <!-- Menampilkan pesan error jika ada -->
                                    @error('nilai_x')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <!-- Tombol submit untuk mengirim form -->
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
</body>
</html>
