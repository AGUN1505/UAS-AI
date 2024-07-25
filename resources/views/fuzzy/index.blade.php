<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Logika Fuzzy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            background-color: #000000;
            position: relative;
            overflow-x: hidden;
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
            background-image: url('poto/stars.png');
            background-size: cover;
            background-position: center;
            z-index: -3;
        }

        body::after {
            background-image:
                url('poto/meteoroid.png'),
                url('poto/rocket.png');
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
            padding-top: 50px;
            padding-bottom: 50px;
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
        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }
        .form-control:focus, .form-select:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: #4a90e2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
            color: #ffffff;
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
        .form-group {
            margin-bottom: 1.5rem;
        }
        .col-form-label {
            font-weight: 600;
            color: #ffffff;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
        }
        ::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-control::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-control::-moz-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-control::-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-select {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-select option {
            background-color: #2c3e50;
            color: #ffffff;
        }

        .form-select:focus {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: #4a90e2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }

        .form-select option:checked,
        .form-select option:hover {
            background-color: #4a90e2;
            color: #ffffff;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Kalkulator Logika Fuzzy</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('fuzzy.process') }}">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
