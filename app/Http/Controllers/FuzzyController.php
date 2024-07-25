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

    public function process(Request $request)
    {
        $inputs = $request->validate([
            'nama_kasus' => 'required',
            'nama_varibel' => 'required',
            'nama_varibel2' => 'required',
            'nama_varibel3' => 'required',
            'semesta_pembicaraan' => 'required',
            'semesta_pembicaraan2' => 'required',
            'semesta_pembicaraan3' => 'required',
            'nama_himpunan' => 'required',
            'nama_himpunan2' => 'required',
            'nama_himpunan3' => 'required',
            'fungsi_keanggotaan' => 'required',
            'fungsi_keanggotaan2' => 'required',
            'fungsi_keanggotaan3' => 'required',
            'domain' => 'required',
            'domain2' => 'required',
            'domain3' => 'required',
            'nilai_x' => 'required|numeric',
        ]);

        $results = [];

        for ($i = 1; $i <= 3; $i++) {
            $suffix = $i > 1 ? $i : '';
            $results["derajat_keanggotaan{$suffix}"] = $this->hitungDerajatKeanggotaan(
                $inputs["fungsi_keanggotaan{$suffix}"],
                $inputs["domain{$suffix}"],
                $inputs['nilai_x']
            );
        }

        return view('fuzzy.result', array_merge($inputs, $results));
    }

    private function hitungDerajatKeanggotaan($fungsi_keanggotaan, $domain, $nilai_x)
    {
        $domain_values = explode(',', $domain);
        $a = floatval($domain_values[0]);
        $b = floatval($domain_values[1]);
        $c = isset($domain_values[2]) ? floatval($domain_values[2]) : null;
        $d = isset($domain_values[3]) ? floatval($domain_values[3]) : null;

        switch ($fungsi_keanggotaan) {
            case 'linier_naik':
            case 'linier_naik2':
            case 'linier_naik3':
                return $this->linierNaik($nilai_x, $a, $b);
            case 'linier_turun':
            case 'linier_turun2':
            case 'linier_turun3':
                return $this->linierTurun($nilai_x, $a, $b);
            case 'segitiga':
            case 'segitiga2':
            case 'segitiga3':
                return $this->segitiga($nilai_x, $a, $b, $c);
            case 'trapesium':
            case 'trapesium2':
            case 'trapesium3':
                return $this->trapesium($nilai_x, $a, $b, $c, $d);
            default:
                return 0;
        }
    }

    private function linierNaik($x, $a, $b)
    {
        if ($x <= $a) return 0;
        if ($x >= $b) return 1;
        return ($x - $a) / ($b - $a);
    }

    private function linierTurun($x, $a, $b)
    {
        if ($x <= $a) return 1;
        if ($x >= $b) return 0;
        return ($b - $x) / ($b - $a);
    }

    private function segitiga($x, $a, $b, $c)
    {
        if ($x <= $a || $x >= $c) return 0;
        if ($x <= $b) return ($x - $a) / ($b - $a);
        return ($c - $x) / ($c - $b);
    }

    private function trapesium($x, $a, $b, $c, $d)
    {
        if ($x <= $a || $x >= $d) return 0;
        if ($x >= $b && $x <= $c) return 1;
        if ($x < $b) return ($x - $a) / ($b - $a);
        return ($d - $x) / ($d - $c);
    }
}
