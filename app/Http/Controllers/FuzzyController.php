<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    /**
     * Menampilkan halaman utama kalkulator fuzzy.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengembalikan view 'fuzzy.index' yang berisi form input untuk kalkulator fuzzy
        return view('fuzzy.index');
    }

    /**
     * Menampilkan halaman beranda aplikasi.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Mengembalikan view 'fuzzy.home' yang mungkin berisi informasi umum atau pengantar tentang logika fuzzy
        return view('fuzzy.home');
    }

    public function process(Request $request)
    {
        // Validasi input dari form
        $inputs = $request->validate([
            'nama_kasus' => 'required', // Nama kasus harus diisi
            'nama_varibel' => 'required', // Nama variabel 1 harus diisi
            'nama_varibel2' => 'required', // Nama variabel 2 harus diisi
            'nama_varibel3' => 'required', // Nama variabel 3 harus diisi
            'semesta_pembicaraan' => 'required', // Semesta pembicaraan 1 harus diisi
            'semesta_pembicaraan2' => 'required', // Semesta pembicaraan 2 harus diisi
            'semesta_pembicaraan3' => 'required', // Semesta pembicaraan 3 harus diisi
            'nama_himpunan' => 'required', // Nama himpunan 1 harus diisi
            'nama_himpunan2' => 'required', // Nama himpunan 2 harus diisi
            'nama_himpunan3' => 'required', // Nama himpunan 3 harus diisi
            'fungsi_keanggotaan' => 'required', // Fungsi keanggotaan 1 harus diisi
            'fungsi_keanggotaan2' => 'required', // Fungsi keanggotaan 2 harus diisi
            'fungsi_keanggotaan3' => 'required', // Fungsi keanggotaan 3 harus diisi
            'domain' => 'required', // Domain 1 harus diisi
            'domain2' => 'required', // Domain 2 harus diisi
            'domain3' => 'required', // Domain 3 harus diisi
            'nilai_x' => 'required|numeric', // Nilai x harus diisi dan berupa angka
        ]);

        $results = [];

        // Melakukan perhitungan derajat keanggotaan untuk setiap variabel
        for ($i = 1; $i <= 3; $i++) {
            $suffix = $i > 1 ? $i : ''; // Menentukan suffix untuk variabel ke-2 dan ke-3
            $results["derajat_keanggotaan{$suffix}"] = $this->hitungDerajatKeanggotaan(
                $inputs["fungsi_keanggotaan{$suffix}"], // Mengambil fungsi keanggotaan yang sesuai
                $inputs["domain{$suffix}"], // Mengambil domain yang sesuai
                $inputs['nilai_x'] // Menggunakan nilai x yang sama untuk semua perhitungan
            );
        }

        // Mengembalikan view dengan data input dan hasil perhitungan
        return view('fuzzy.result', array_merge($inputs, $results));
    }

    private function hitungDerajatKeanggotaan($fungsi_keanggotaan, $domain, $nilai_x)
    {
        // Memecah string domain menjadi array nilai-nilai
        $domain_values = explode(',', $domain);

        // Mengambil nilai-nilai domain dan mengkonversinya ke float
        $a = floatval($domain_values[0]);
        $b = floatval($domain_values[1]);
        $c = isset($domain_values[2]) ? floatval($domain_values[2]) : null;
        $d = isset($domain_values[3]) ? floatval($domain_values[3]) : null;

        // Menentukan fungsi keanggotaan yang akan digunakan berdasarkan input
        switch ($fungsi_keanggotaan) {
            case 'linier_naik':
            case 'linier_naik2':
            case 'linier_naik3':
                // Menggunakan fungsi linier naik
                return $this->linierNaik($nilai_x, $a, $b);
            case 'linier_turun':
            case 'linier_turun2':
            case 'linier_turun3':
                // Menggunakan fungsi linier turun
                return $this->linierTurun($nilai_x, $a, $b);
            case 'segitiga':
            case 'segitiga2':
            case 'segitiga3':
                // Menggunakan fungsi segitiga
                return $this->segitiga($nilai_x, $a, $b, $c);
            case 'trapesium':
            case 'trapesium2':
            case 'trapesium3':
                // Menggunakan fungsi trapesium
                return $this->trapesium($nilai_x, $a, $b, $c, $d);
            default:
                // Jika fungsi keanggotaan tidak dikenali, mengembalikan 0
                return 0;
        }
    }

    private function linierNaik($x, $a, $b)
    {
        // Fungsi ini menghitung derajat keanggotaan untuk fungsi keanggotaan linier naik
        // $x: nilai input yang akan dihitung derajat keanggotaannya
        // $a: batas bawah domain
        // $b: batas atas domain

        if ($x <= $a) return 0; // Jika x kurang dari atau sama dengan a, derajat keanggotaan adalah 0
        if ($x >= $b) return 1; // Jika x lebih dari atau sama dengan b, derajat keanggotaan adalah 1
        return ($x - $a) / ($b - $a); // Jika x berada di antara a dan b, hitung derajat keanggotaan dengan rumus (x-a)/(b-a)
    }

    private function linierTurun($x, $a, $b)
    {
        // Fungsi ini menghitung derajat keanggotaan untuk fungsi keanggotaan linier turun
        // $x: nilai input yang akan dihitung derajat keanggotaannya
        // $a: batas atas domain
        // $b: batas bawah domain
        if ($x <= $a) return 1; // Jika x kurang dari atau sama dengan a, derajat keanggotaan adalah 1
        if ($x >= $b) return 0; // Jika x lebih dari atau sama dengan b, derajat keanggotaan adalah 0
        return ($b - $x) / ($b - $a); // Jika x berada di antara a dan b, hitung derajat keanggotaan dengan rumus (b-x)/(b-a)
    }

    private function segitiga($x, $a, $b, $c)
    {
        // Fungsi ini menghitung derajat keanggotaan untuk fungsi keanggotaan segitiga
        // $x: nilai input yang akan dihitung derajat keanggotaannya
        // $a: batas kiri segitiga
        // $b: puncak segitiga
        // $c: batas kanan segitiga
        if ($x <= $a || $x >= $c) return 0; // Jika x di luar rentang [a,c], derajat keanggotaan adalah 0
        if ($x <= $b) return ($x - $a) / ($b - $a); // Jika x di antara a dan b, hitung dengan rumus (x-a)/(b-a)
        return ($c - $x) / ($c - $b); // Jika x di antara b dan c, hitung dengan rumus (c-x)/(c-b)
    }

    private function trapesium($x, $a, $b, $c, $d)
    {
        // Fungsi ini menghitung derajat keanggotaan untuk fungsi keanggotaan trapesium
        // $x: nilai input yang akan dihitung derajat keanggotaannya
        // $a: batas kiri bawah trapesium
        // $b: batas kiri atas trapesium
        // $c: batas kanan atas trapesium
        // $d: batas kanan bawah trapesium
        if ($x <= $a || $x >= $d) return 0; // Jika x di luar rentang [a,d], derajat keanggotaan adalah 0
        if ($x >= $b && $x <= $c) return 1; // Jika x di antara b dan c, derajat keanggotaan adalah 1
        if ($x < $b) return ($x - $a) / ($b - $a); // Jika x di antara a dan b, hitung dengan rumus (x-a)/(b-a)
        return ($d - $x) / ($d - $c); // Jika x di antara c dan d, hitung dengan rumus (d-x)/(d-c)
    }
}
