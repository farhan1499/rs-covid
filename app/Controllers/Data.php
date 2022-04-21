<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\PerawatModel;
use App\Models\PasienModel;
use App\Models\ObatModel;
use App\Models\RawatModel;
use App\Models\ResepModel;
use App\Models\PeriksaModel;
use App\Models\RekamModel;

class Data extends BaseController
{

    protected $dokterModel;
    protected $perawatModel;
    protected $pasienModel;
    protected $obatModel;
    protected $rawatModel;
    protected $resepModel;
    protected $periksaModel;
    protected $rekamModel;

    public function __construct()
    {
        $this->dokterModel = new DokterModel();
        $this->perawatModel = new PerawatModel();
        $this->pasienModel = new PasienModel();
        $this->obatModel = new ObatModel();
        $this->rawatModel = new RawatModel();
        $this->resepModel = new ResepModel();
        $this->periksaModel = new PeriksaModel();
        $this->rekamModel = new RekamModel();
    }
// ============================================================================================================
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('patient');
        $builder->select('date(created_at) as date, COUNT(*) as jml');
        $builder->groupBy('date(created_at)');
        $query = $builder->get();
        
        
        $builder2 = $db->table('inpatient');
        $builder2->select('date(created_at) as date, COUNT(*) as jml');
        $builder2->groupBy('date(created_at)');
        $query2 = $builder2->get();

            $dataAllDokter = $this->dokterModel->get()->resultID->num_rows;
            $dataAllPerawat = $this->perawatModel->get()->resultID->num_rows;
            $dataAllPasien = $this->pasienModel->get()->resultID->num_rows;
            $dataAllRawat = $this->rawatModel->get()->resultID->num_rows;

            $data = [
                'dataAllDokter' => $dataAllDokter,
                'dataAllPerawat' => $dataAllPerawat,
                'dataAllPasien' => $dataAllPasien,
                'dataAllRawat' => $dataAllRawat,
                'grafik2' => $query2->getResultArray(),
                'grafik1' => $query->getResultArray()
            ];

            // $record = $query->getResultObject();
            // foreach ($record as $row) {
            //     $data['label1'][] = $row->date;
            //     $data['data1'][] = $row->jml;
            // }
            // $data['grafik1'] = json_encode($data);
            
            
            // $record2 = $query2->getResultObject();
            // foreach ($record2 as $row) {
            //     $data['label2'][] = $row->date;
            //     $data['data2'][] = $row->jml;
            // }
            // $data['grafik2'] = json_encode($data);

        return view('/dashboard', $data);
    }
// ============================================================================================================
    public function dokter()
    {
        $data = [
            // 'title' => 'Daftar Komik | WPU Tutor',
            'dokter' => $this->dokterModel->getDokter()
        ];

        return view('/data/dokter', $data);
    }

    public function dokterSave()
    {
        $this->dokterModel->insert([
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender')
        ]);
        return redirect()->to('/data/dokter'); 
    }

    public function dokterDelete($code)
    {
        $dokter = $this->dokterModel->find($code);
        $this->dokterModel->delete($code);
        // session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/data/dokter');
    }

    public function dokterEdit($code)
    {
        $this->dokterModel->save([
            'code' => $code,
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender')
        ]);
        return redirect()->to('/data/dokter'); 
    }
// ============================================================================================================
    public function perawat()
    {
        $data = [
            // 'title' => 'Daftar Komik | WPU Tutor',
            'perawat' => $this->perawatModel->getPerawat()
        ];
        return view('/data/perawat', $data);
    }

    public function perawatSave()
    {
        $this->perawatModel->insert([
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name')
        ]);
        return redirect()->to('/data/perawat'); 
    }

    public function perawatDelete($code)
    {
        $perawat = $this->perawatModel->find($code);
        $this->perawatModel->delete($code);
        // session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/data/perawat');
    }

    public function perawatEdit($code)
    {
        $this->perawatModel->save([
            'code' => $code,
            'name' => $this->request->getVar('name')
        ]);
        return redirect()->to('/data/perawat'); 
    }
// ============================================================================================================
    public function pasien()
    {
        $data = [
            // 'title' => 'Daftar Komik | WPU Tutor',
            'pasien' => $this->pasienModel->getPasien()
        ];
        return view('/data/pasien', $data);
    }

    public function pasienSave()
    {
        $this->pasienModel->insert([
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender'),
            'born' => $this->request->getVar('born')
        ]);
        return redirect()->to('/forms/pendaftaran'); 
    }

    public function pasienDelete($code)
    {
        $pasien = $this->pasienModel->find($code);
        $this->pasienModel->delete($code);
        // session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/data/pasien');
    }

    public function pasienEdit($code)
    {
        $this->pasienModel->save([
            'code' => $code,
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender'),
            'born' => $this->request->getVar('born')
        ]);
        return redirect()->to('/data/pasien'); 
    }
// ============================================================================================================
    public function obat()
    {
        $data = [
            'obat' => $this->obatModel->getObat()
        ];
        return view('/data/obat', $data);
    }

    public function obatSave()
    {
        $this->obatModel->insert([
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'unit' => $this->request->getVar('unit')
        ]);
        return redirect()->to('/data/obat'); 
    }

    public function obatDelete($code)
    {
        $obat = $this->obatModel->find($code);
        $this->obatModel->delete($code);
        // session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/data/obat');
    }

    public function obatEdit($code)
    {
        $this->obatModel->save([
            'code' => $code,
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'unit' => $this->request->getVar('unit')
        ]);
        return redirect()->to('/data/obat'); 
    }
    // ============================================================================================================
    public function rawat()
    {  
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM inpatient WHERE post=0");

        $data = [
            'rawat' => $query->getResult()
        ];
        return view('/data/rawatInap', $data);
    }

    public function riwayatRawatInap()
    {
        $query = $this->db->query("SELECT * FROM inpatient WHERE post=1");

        $data = [
            'riwayat' => $query->getResult()
        ];
        return view('/data/riwayatRawatInap', $data);
    }

    public function rawatSave()
    {
        $this->rawatModel->insert([
            'code' => $this->request->getVar('code'),
            'code_patient' => $this->request->getVar('code_patient'),
            'patient' => $this->request->getVar('patient'),
            'in' => $this->request->getVar('in'),
            'nurse' => $this->request->getVar('nurse'),
            'status' => $this->request->getVar('status')
        ]);
        return redirect()->to('/forms/rawat'); 
    }

    public function rawatDelete($code)
    {
        $rawat = $this->rawatModel->find($code);
        $this->rawatModel->delete($code);
        // session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/data/rawat');
    }

    public function rawatEdit($code)
    {
        $this->rawatModel->save([
            'code' => $code,
            'post' => $this->request->getVar('post')
        ]);
        return redirect()->to('/data/rawat'); 
    }

// ============================================================================================================
    public function resep()
    {

        $db = \Config\Database::connect();
        $builder = $db->table('recipe');
        $builder->select('*');
        $builder->groupBy('id_recipe');
        $query = $builder->get();

        $data = [
            'obat' => $this->obatModel->getObat(),
            'resep' => $query->getResultArray(),
            'get_pasien' => $this->pasienModel->findAll(),
            'model_pasien' => $this->pasienModel,
            'model_obat' => $this->obatModel
        ];
        return view('/data/resep', $data);
    }

    public function resepDelete($code)
    {
        $rawat = $this->resepModel->find($code);
        $this->resepModel->delete($code);
        // session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('/data/resep');
    }
    
    public function recipe1Save()
    {
        $obat = $this->request->getVar('obat');
        $qty = $this->request->getVar('qty');
        $code = $this->request->getVar('code');
        $name = $this->request->getVar('nama');

        for ($i=0; $i <count($obat) ; $i++) { 
            $this->resepModel->insert([
                'id_recipe' => $code,
                'code_drug' => $obat[$i],
                'qty' => $qty[$i],
                'name_recipe' => $name
            ]);
        }

        // dd($data);
        
        // dd($this->request->getVar());
        // $this->resepModel->insert([
        //     'id_recipe' => $this->request->getVar('code'),
        //     'code_patient' => $this->request->getVar('pasien')
        // ]);
        return redirect()->to('/data/resep'); 
    }

    public function mresep($id = null)
    {
        if ($id==null) 
        {
            return redirect()->to(base_url('/data/resep'));
        } else
        {
            $db = \Config\Database::connect();
            $builder = $db->table('recipe');
            $builder->select('*');
            $builder->where('id_recipe', $id);
            $query = $builder->get();

            $data = [            
                'id' => $id,
                'title' => 'Data Resep',
                'resep' => $query->getResultArray(),
                'model_pasien' => $this->pasienModel,
                'model_obat' => $this->obatModel
            ];
            return view('data/mresep', $data);         
        }
    }
// ============================================================================================================
    public function getPasien() {
            $code = $this->request->getVar('code');

            $db = \Config\Database::connect();
            $builder = $db->table('inpatient');
            $builder->select('*');
            $builder->where('code', $code);
            $query = $builder->get();

            return json_encode($query->getResult());


    }
    
    public function getRawat() {
            $code = $this->request->getVar('code');

            $db = \Config\Database::connect();
            $builder = $db->table('patient');
            $builder->select('*');
            $builder->where('code', $code);
            $query = $builder->get();

            return json_encode($query->getResult());


    }
// ============================================================================================================
    public function periksa()
    {
        $data = [
            'periksa' => $this->periksaModel->getPeriksa()
        ];
        return view('/data/periksa', $data);
    }
    

    public function periksaSave()
    {
        $this->periksaModel->insert([
            'code' => $this->request->getVar('code'),
            'code_patient' => $this->request->getVar('code_patient'),
            'name' => $this->request->getVar('name'),
            'doctor' => $this->request->getVar('doctor'),
            'complaint' => $this->request->getVar('complaint'),
            'tension' => $this->request->getVar('tension'),
            'pulse' => $this->request->getVar('pulse'),
            'temperature' => $this->request->getVar('temperature'),
            'breathing' => $this->request->getVar('breathing'),
            'diagnosis' => $this->request->getVar('diagnosis'),
            'radio' => $this->request->getVar('radio'),
            'lab' => $this->request->getVar('lab'),
        ]);
        return redirect()->to('/forms/periksa'); 
    }

// ============================================================================================================
    public function rekam()
    {
        $data = [
            'rekam' => $this->rekamModel->getRekam()
        ];
        return view('/data/rekam', $data);
    }


    public function rekamSave()
    {
        $this->rekamModel->insert([
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
            'doctor' => $this->request->getVar('doctor'),
            'complaint' => $this->request->getVar('complaint'),
            'diagnosis' => $this->request->getVar('diagnosis')
        ]);
        return redirect()->to('/forms/rekam'); 
    }

}
