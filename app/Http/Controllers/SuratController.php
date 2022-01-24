<?php

namespace App\Http\Controllers;
use App\Models\Surat;
use DB;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(){
        return view('index');
    }

    public function cari(Request $request){
        $search = Surat::WHERE('NomorSurat', $request->nomorsurat)
                        ->WHERE('LayananId', $request->jenis)
                        ->join('users', 'surat.DistribusiPetugasTerimaId', '=', 'users.ID')
                        ->join('pegawai', 'users.Pegawai_Id', '=', 'pegawai.ID')
                        ->first();

        $pemeriksa = Surat::select('PetugasTerimaId',  \DB::raw('count(NomorSurat) as total'))
                        ->where('PetugasAcceptId', NULL)
                        ->where('TanggalReject', NULL)
                        ->WHERE('LayananId', $request->jenis)
                        ->WHERE('PetugasTerimaId', $search->PetugasTerimaId)
                        ->groupBy('PetugasTerimaId')
                        ->first();

        $providers = DB::table(DB::raw('surat, (SELECT @rownum := 0) r'))
                        ->select('surat.*', DB::raw('@rownum := @rownum + 1 AS urut'))
                        ->WHERE('LayananId', $request->jenis)
                        ->WHERE('PetugasTerimaId', $search->PetugasTerimaId)
                        ->where('PetugasAcceptId', NULL)
                        ->where('TanggalReject', NULL)
                        ->orderBy('TanggalTerima', 'ASC')
                        ->get();


        // DB::statement(DB::raw('set @row:=0'));
        // $nomor = Surat::select('*, @row := @row +1 as row')->orderBy('TanggalKirim', 'asc')->WHERE('LayananId', $request->jenis)
        // ->WHERE('DistribusiPetugasTerimaId', $search->DistribusiPetugasTerimaId)->first();

        return view('hasil', compact('search', 'pemeriksa', 'providers'));
    }
}
