<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    public function index()
    {
        return view('fuzzy.index');
    }

    public function home()
    {
        return view('fuzzy.home');
    }

    public function fuzzy(Request $request)
    {
        // Input dari user
        $nama_kasus = $request->input('nama_kasus');
        $nama_varibel = $request->input('nama_varibel');
        $semesta_pembicaraan = $request->input('semesta_pembicaraan');
        $nama_himpunan = $request->input('nama_himpunan');
        $nama_himpunan2 = $request->input('nama_himpunan2');
        $nama_himpunan3 = $request->input('nama_himpunan3');
        $domain = $request->input('domain');
        $domain2 = $request->input('domain2');
        $domain3 = $request->input('domain3');
        $fungsi_keanggotaan = $request->input('fungsi_keanggotaan');
        $fungsi_keanggotaan2 = $request->input('fungsi_keanggotaan2');
        $fungsi_keanggotaan3 = $request->input('fungsi_keanggotaan3');
        $nilai_x = $request->input('nilai_x');

        // Fungsi keanggotaan
        $derajat_keanggotaan = $this->hitungDerajatKeanggotaan($fungsi_keanggotaan, $domain, $nilai_x);
        $derajat_keanggotaan2 = $this->hitungDerajatKeanggotaan2($fungsi_keanggotaan2, $domain2, $nilai_x);
        $derajat_keanggotaan3 = $this->hitungDerajatKeanggotaan3($fungsi_keanggotaan3, $domain3, $nilai_x);

        // Output
        return view('fuzzy.result', [
            'nama_kasus' => $nama_kasus,
            'nama_varibel' => $nama_varibel,
            'emesta_pembicaraan' => $semesta_pembicaraan,
            'nama_himpunan' => $nama_himpunan,
            'nama_himpunan2' => $nama_himpunan2,
            'nama_himpunan3' => $nama_himpunan3,
            'domain' => $domain,
            'domain2' => $domain2,
            'domain3' => $domain3,
            'fungsi_keanggotaan' => $fungsi_keanggotaan,
            'fungsi_keanggotaan2' => $fungsi_keanggotaan2,
            'fungsi_keanggotaan3' => $fungsi_keanggotaan3,
            'nilai_x' => $nilai_x,
            'derajat_keanggotaan' => $derajat_keanggotaan,
            'derajat_keanggotaan2' => $derajat_keanggotaan2,
            'derajat_keanggotaan3' => $derajat_keanggotaan3
        ]);
    }


    private function hitungDerajatKeanggotaan($fungsi_keanggotaan, $domain, $nilai_x)
    {
        // Parsing domain
        $domainValues = explode(',', $domain);
        $a = floatval($domainValues[0]);
        $b = floatval($domainValues[1]);
        $c = floatval($domainValues[2]);
        $d = floatval($domainValues[3]);

        // Hitung derajat keanggotaan berdasarkan fungsi
        switch ($fungsi_keanggotaan) {
                //untuk mwnggunakan linier naik
            case 'linier_naik':
                return $this->linierNaik($nilai_x, $a, $b);
                //untuk mwnggunakan linier turun
            case 'linier_turun':
                return $this->linierTurun($nilai_x, $c, $d);
                //untuk mwnggunakan segitiga
            case 'egitiga':
                return $this->segitiga($nilai_x, $a, $b, $c);
                //untuk mwnggunakan trapesium
            case 'trapesium':
                return $this->trapesium($nilai_x, $a, $b, $c, $d);
                //bawaan
            default:
                return null;
        }
    }

    private function hitungDerajatKeanggotaan2($fungsi_keanggotaan2, $domain2, $nilai_x)
    {
        $domain2Values = explode(',', $domain2);
        $a2 = floatval($domain2Values[0]);
        $b2 = floatval($domain2Values[1]);
        $c2 = floatval($domain2Values[2]);
        $d2 = floatval($domain2Values[3]);

        switch ($fungsi_keanggotaan2) {
            case 'linier_naik2':
                return $this->linierNaik2($nilai_x, $a2, $b2);
            case 'linier_turun2':
                return $this->linierTurun2($nilai_x, $c2, $d2);
            case 'segitiga2':
                return $this->segitiga2($nilai_x, $a2, $b2, $c2);
            case 'trapesium2':
                return $this->trapesium2($nilai_x, $a2, $b2, $c2, $d2);
            default:
                return 0;
        }
    }

    private function hitungDerajatKeanggotaan3($fungsi_keanggotaan3, $domain3, $nilai_x)
    {
        $domain3Values = explode(',', $domain3);
        $a3 = floatval($domain3Values[0]);
        $b3 = floatval($domain3Values[1]);
        $c3 = floatval($domain3Values[2]);
        $d3 = floatval($domain3Values[3]);

        switch ($fungsi_keanggotaan3) {
            case 'linier_naik3':
                return $this->linierNaik3($nilai_x, $a3, $b3);
            case 'linier_turun3':
                return $this->linierTurun3($nilai_x, $c3, $d3);
            case 'egitiga3':
                return $this->segitiga3($nilai_x, $a3, $b3, $c3);
            case 'trapesium3':
                return $this->trapesium3($nilai_x, $a3, $b3, $c3, $d3);
            default:
                return 0;
        }
    }

    // Fungsi linier naik
    private function linierNaik($nilai_x, $a, $b)
    {
        if ($nilai_x < $a) {
            return 0;
        } elseif ($nilai_x >= $a && $nilai_x <= $b) {
            return ($nilai_x - $a) / ($b - $a);
        } else {
            return 1;
        }
    }

    private function linierNaik2($nilai_x, $a2, $b2)
    {
        if ($nilai_x < $a2) {
            return 0;
        } elseif ($nilai_x >= $a2 && $nilai_x <= $b2) {
            return ($nilai_x - $a2) / ($b2 - $a2);
        } else {
            return 1;
        }
    }

    private function linierNaik3($nilai_x, $a3, $b3)
    {
        if ($nilai_x < $a3) {
            return 0;
        } elseif ($nilai_x >= $a3 && $nilai_x <= $b3) {
            return ($nilai_x - $a3) / ($b3 - $a3);
        } else {
            return 1;
        }
    }

    // Fungsi linier turun
    private function linierTurun($nilai_x, $c, $d)
    {
        if ($nilai_x < $c) {
            return 1;
        } elseif ($nilai_x >= $c && $nilai_x <= $d) {
            return ($d - $nilai_x) / ($d - $c);
        } else {
            return 0;
        }
    }

    private function linierTurun2($nilai_x, $c2, $d2)
    {
        if ($nilai_x < $c2) {
            return 1;
        } elseif ($nilai_x >= $c2 && $nilai_x <= $d2) {
            return ($d2 - $nilai_x) / ($d2 - $c2);
        } else {
            return 0;
        }
    }

    private function linierTurun3($nilai_x, $c3, $d3)
    {
        if ($nilai_x < $c3) {
            return 1;
        } elseif ($nilai_x >= $c3 && $nilai_x <= $d3) {
            return ($d3 - $nilai_x) / ($d3 - $c3);
        } else {
            return 0;
        }
    }

    // Fungsi segitiga
    private function segitiga($nilai_x, $a2, $b2, $c2)
    {
        if ($nilai_x < $a2 || $nilai_x > $c2) {
            return 0;
        } elseif ($nilai_x >= $a2 && $nilai_x <= $b2) {
            return ($nilai_x - $a2) / ($b2 - $a2);
        } elseif ($nilai_x >= $b2 && $nilai_x <= $c2) {
            return ($c2 - $nilai_x) / ($c2 - $b2);
        }
    }

    private function segitiga2($nilai_x, $a2, $b2, $c2)
    {
        if ($nilai_x < $a2 || $nilai_x > $c2) {
            return 0;
        } elseif ($nilai_x >= $a2 && $nilai_x <= $b2) {
            return ($nilai_x - $a2) / ($b2 - $a2);
        } elseif ($nilai_x >= $b2 && $nilai_x <= $c2) {
            return ($c2 - $nilai_x) / ($c2 - $b2);
        }
    }


    private function segitiga3($nilai_x, $a3, $b3, $c3)
    {
        if ($nilai_x < $a3 || $nilai_x > $c3) {
            return 0;
        } elseif ($nilai_x >= $a3 && $nilai_x <= $b3) {
            return ($nilai_x - $a3) / ($b3 - $a3);
        } elseif ($nilai_x >= $b3 && $nilai_x <= $c3) {
            return ($c3 - $nilai_x) / ($c3 - $b3);
        }
    }

    // Fungsi trapesium
    private function trapesium($nilai_x, $a, $b, $c, $d)
    {
        if ($nilai_x < $a || $nilai_x > $d) {
            return 0;
        } elseif ($nilai_x >= $a && $nilai_x <= $b) {
            return ($nilai_x - $a) / ($b - $a);
        } elseif ($nilai_x >= $b && $nilai_x <= $c) {
            return 1;
        } elseif ($nilai_x >= $c && $nilai_x <= $d) {
            return ($d - $nilai_x) / ($d - $c);
        }
    }

    private function trapesium2($nilai_x, $a2, $b2, $c2, $d2)
    {
        if ($nilai_x < $a2 || $nilai_x > $d2) {
            return 0;
        } elseif ($nilai_x >= $a2 && $nilai_x <= $b2) {
            return ($nilai_x - $a2) / ($b2 - $a2);
        } elseif ($nilai_x >= $b2 && $nilai_x <= $c2) {
            return 1;
        } elseif ($nilai_x >= $c2 && $nilai_x <= $d2) {
            return ($d2 - $nilai_x) / ($d2 - $c2);
        }
    }

    private function trapesium3($nilai_x, $a3, $b3, $c3, $d3)
    {
        if ($nilai_x < $a3 || $nilai_x > $d3) {
            return 0;
        } elseif ($nilai_x >= $a3 && $nilai_x <= $b3) {
            return ($nilai_x - $a3) / ($b3 - $a3);
        } elseif ($nilai_x >= $b3 && $nilai_x <= $c3) {
            return 1;
        } elseif ($nilai_x >= $c3 && $nilai_x <= $d3) {
            return ($d3 - $nilai_x) / ($d3 - $c3);
        }
    }
}
