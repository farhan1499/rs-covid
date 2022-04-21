<?php

namespace App\Controllers;
use App\Models\PerawatModel;

class Forms extends BaseController
{

    public function __construct() {
        $this->perawat = new PerawatModel();
    }

    public function pendaftaran()
    {
        return view('/forms/pendaftaran');
    }

    public function rawat()
    {
        $data = [
            'perawat' => $this->perawat->findAll()
        ];
        return view('/forms/rawat', $data);
    }

    public function periksa()
    {
        return view('/forms/periksa');
    }

    public function rekam()
    {
        return view('/forms/rekam');
    }
}