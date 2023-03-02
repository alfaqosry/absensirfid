<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Dataabsen;
use Illuminate\Http\Request;

class RfidController extends Controller
{
    public function Rfid() {
        $id = "12345678";
        $tglsaatini = date('d');
        $blnsaatini = date('m');
        $thnsaatini = date('Y');
        $jamsaatini = date('H:i', time());
     
        $jammasuk = '7:30';
        $jamkeluar = '12:30';

        $jadwasaatini = Jadwal::where(['tanggal', $tglsaatini, 'bulan', $blnsaatini, 'tahun', $thnsaatini, ])->first();
        $user = User::where('rfid', $id)->first();

        if( $user != null) {

            if( $jadwasaatini != null ) {
    if( $jadwasaatini->hari != "Sunday"){
    

                if ($jamsaatini < $jammasuk ){


                    $data = [
                        'jadwal_id' => $jadwasaatini->id,
                        'user_id' => $user->id,
                        'status' => "Hadir",
                        'in' => $jamsaatini,
                        'out' => null

                    ];

                    Dataabsen::create($data);
                    $response = [
                        'message' => 'Absen Berhasil',
                        'status' =>"berhasil",
                        'nama' => $user->name
                        
                    ];
            
                    return response()->json($response, Response::HTTP_OK);


                }
            }else{
                $response = [
                    'message' => 'Hari ini libur',
                    'status' =>"gagal",
                    'nama' => $user->name
                    
                ];
        
                return response()->json($response, Response::HTTP_OK);
            }
            }else {
                $response = [
                    'message' => 'Jadwal tidak di temukan',
                    'status' =>"gagal",
                    
                ];
        
                return response()->json($response, Response::HTTP_OK);
            }
            
        }else{

            $response = [
                'message' => 'Pegawai tidak terdaftar',
                'status' =>"gagal",
                
            ];
    
            return response()->json($response, Response::HTTP_OK);

        }

    }
}
