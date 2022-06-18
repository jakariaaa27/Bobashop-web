<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Mail;
use App\Helpers\Notif;
use App\User;
use App\Destination;
use App\Jadwal;
use App\Informasi;
use App\Jadwal_Bayi;
use App\Profile;
use App\PesertaImunisasi;
use App\TransaksiImunisasi;


class APIController extends Controller
{
    public function userLogin(Request $request)
    {
        $username     = $request->username;
        $password     = $request->password;
        $token        = $request->token;

        $password_md5 = md5($password);

        $cekUser      = User::where('username', $username)
            ->where('password_md5', $password_md5)
            ->get();

         if(count($cekUser)>0){
            User::where('username', $username)->update([
                    'token_firebase' => $token
                ]);
                $responseData = array('success'=>'1', 'data'=>$cekUser, 'message'=>'Selamat Datang');
                $userResponse = json_encode($responseData);
        }else{
            $responseData = array('success'=>'0', 'data'=>'Tidak ada data', 'message'=>'Username atau Password salah');
            $userResponse = json_encode($responseData);
        }          
        print $userResponse;    
    }

    public function userRegister(Request $request){
        try{
            $count    = User::where('email',$request->email)
                            ->count();

            if($count>0){
                return response([
                    'status' => true,
                    'message' => 'Email Already Exists',
                    // 'data' => $insert_barang
                ], 200);
                }

                $this->validate($request, [
                    'name'      => 'required',
                    'email'     => 'required',
                    // 'password'  => 'required',
                ],[
                    
                    'name.required'      => 'Please enter Name',
                    'email.required'     => 'Please enter Email',
                    // 'password.required'  => 'Please enter Password',
                ]);

            $count2  = User::where('username',$request->name)
                ->count();

            $name  = $request->name;;
            $name2 = str_replace(' ', '', $name);
            $rand  = str_random(3);

            if($count2>0){
                User::create([
                    'name'            => $request->get('name'),
                    'username'        => $name2.$rand,
                    'password'        => bcrypt($name2),
                    'password_md5'    => md5($name2),
                    'email'           => $request->email,
                    'status'          => 'staff',
                ]);
            }else{
                    User::create([
                        'name'            => $request->get('name'),
                        'username'        => str_replace(' ', '', $request->name),
                        'password'        => bcrypt($name2),
                        'password_md5'    => md5($name2),
                        'email'           => $request->email,
                        'status'          => 'staff',
                    ]);
            }

            Mail::send('Backend.Email.email', ['email' => $request->email, 'password' => $name2, 'nama_pesantren' => $request->name], function ($message) use ($request)
            {
                $message->subject('Users Account');
                $message->from('bobashop27@gmail.com',);
                $message->to($request->email);
            });
            // return redirect()->to('/admin/login')->with('success','Pesantren Berhasil Ditambahkan!');
            return response([
                'status' => true,
                'message' => 'Register Success',
                // 'data' => $insert_barang
            ], 200);

        } catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
        // $acc = new User;
        // $acc->name = $request->name;
        // $acc->email = $request->email;
        // $acc->save();
        // return response([
        //     'status' => true,
        //     'message' => 'Barang Disimpan',
        //     // 'data' => $insert_barang
        // ], 200);
    }

    public function getJadwal(Request $request, $username)
    {
        $pelaksanaan = $request->pelaksanaan;

        $getData = Pengguna::leftJoin('dinas','dinas.id_dinas','=','pengguna.id_dinas')
                    ->leftJoin('jadwal-imunisasi','jadwal-imunisasi.id_dinas','=','dinas.id_dinas')
                    ->where('pengguna.username',$username)
                    ->where('jadwal-imunisasi.pelaksanaan',$pelaksanaan)
                    ->get();

        if (count($getData)>0){
            foreach ($getData as $a) {
                $ab[] = array('pelaksanaan'=>$a->pelaksanaan,'nama_dinas'=>$a->nama_dinas,'ket_tambahan'=>$a->ket_tambahan);
                    $respon = $this->responses('200',$ab,'Sukses!');
            } 
        }else{
            $respon = $this->responses('400',null,'Anda Tidak Event!');
        }

        return json_encode($respon);

    }

    public function showJadwal($username)
    {
        $getData = Pengguna::leftJoin('dinas','dinas.id_dinas','=','pengguna.id_dinas')
                    ->leftJoin('jadwal-imunisasi','jadwal-imunisasi.id_dinas','=','dinas.id_dinas')
                    ->Where('pengguna.username',$username)
                    ->get();

        if (count($getData)>0){
            foreach ($getData as $a) {
                $ab[] = array('pelaksanaan'=>$a->pelaksanaan,'nama_dinas'=>$a->nama_dinas,'ket_tambahan'=>$a->ket_tambahan);
                    $respon = $this->responses('200',$ab,'Sukses!');
            } 
        }else{
            $respon = $this->responses('400',null,'Anda Tidak Event!');
        }

        return json_encode($respon);

    }

    public function getBayi($id)
    {
        $getData = Profile::leftJoin('pengguna','pengguna.id_profile','=','profile.id_profile')
                    ->leftJoin('peserta-imunisasi','peserta-imunisasi.id_profile','=','profile.id_profile')
                    ->where('pengguna.id_pengguna', $id)
                    ->get();

        print json_encode($getData);
    }

    public function getPerkembangan($id)
    {
        
        $getData = Pengguna::leftJoin('profile','profile.id_profile','=','pengguna.id_profile')
            ->leftJoin('peserta-imunisasi','peserta-imunisasi.id_profile','=','profile.id_profile')
            ->leftJoin('transaksi-imunisasi','peserta-imunisasi.id_pesertaimunisasi','=','transaksi-imunisasi.id_pesertaimunisasi')
            ->leftJoin('jenis-imunisasi','jenis-imunisasi.id_jenisimunisasi','=','transaksi-imunisasi.id_jenisimunisasi')
            ->where('peserta-imunisasi.id_pesertaimunisasi', $id)
            ->get();

          if (count($getData)>0){
            foreach ($getData as $a) {
                $ab[] = array('pelaksanaan'=>$a->pelaksanaan,'jenis'=>$a->ket_jenisimunisasi);
                    if ($a->pelaksanaan == null && $a->ket_jenisimunisasi == null) {
                     $respon = array(
                        'status'  => '405',
                        'data'    => null,
                        'message' => 'tidak ada data!'
                    );
                }else{
                    $respon = $this->responses('200',$ab,'Sukses!');
                }
            } 
        }else{
            $respon = $this->responses('400',null,'Anda Tidak Data!');
        }

        return json_encode($respon);
    }

    public function daftarbayi($id)
    {
        
        $getData = Pengguna::leftJoin('profile','profile.id_profile','=','pengguna.id_profile')
            ->leftJoin('peserta-imunisasi','peserta-imunisasi.id_profile','=','profile.id_profile')
            ->where('pengguna.id_pengguna', $id)
            ->get();


        if (count($getData)>0){
            foreach ($getData as $a) {
                $ab[] = array('id'=>$a->id_pesertaimunisasi,'nama'=>$a->nama);
                    $respon = $this->responses('200',$ab,'Sukses!');
            } 
        }else{
            $respon = $this->responses('400',null,'Anda Tidak Data!');
        }

        return json_encode($respon);
    }

    public function coba(){
        // Notif puskesmas
        $tanggal = date('Y-m-d');
        $data    = Jadwal::where('pelaksanaan','=', $tanggal)->get();
        $dinas = array();
        $token = array();
        $message = array(
            'title'   => 'Ayo Lakukan Imunisasi',
            'message' => 'Lakukan Imunisasi Sesuai Perkembangan Bayi'
        ); 
        $pesertaSudahImun = TransaksiImunisasi::select('id_pengguna')->leftJoin('peserta-imunisasi','peserta-imunisasi.id_pesertaimunisasi','=','transaksi-imunisasi.id_pesertaimunisasi')
                ->leftJoin('profile','profile.id_profile','=','peserta-imunisasi.id_profile')
                ->leftJoin('pengguna','pengguna.id_profile','=','profile.id_profile')
                ->where('transaksi-imunisasi.pelaksanaan','=',$tanggal)
                ->get()->toArray();
        foreach($data as $datas){
            $dinas[] = $datas['id_dinas'];
        }
  
        $n = 0;
        foreach ($dinas as $key => $d) {
           $pengguna = Pengguna::where('id_dinas', '=', $d)->where('level','=','ibu')->get();
           foreach($pengguna as $user){

                if(@$pesertaSudahImun[$n]['id_pengguna'] != $user['id_pengguna'])
                {
                    $token[] = $user['token_firebase'];                                  
                }

           }

        $n++;         
        } 
    // return json_encode($token);  
        Notif::notif($token, $message);
    }

    public function coba2(){
        // Notif Sesuai Usia
        $tanggal = date('Y-m-d');
        $data    = Jadwal_Bayi::leftJoin('jenis-imunisasi','jenis-imunisasi.id_jenisimunisasi','=','jadwal_bayi.id_jenisimunisasi')
                    ->select('jadwal_bayi.id_jenisimunisasi as idJenis', 'jadwal_bayi.*', 'peserta-imunisasi.*', 'jenis-imunisasi.*')
                    ->leftJoin('peserta-imunisasi','peserta-imunisasi.id_pesertaimunisasi','=','jadwal_bayi.id_pesertaimunisasi')
                    ->where('jadwal_bayi.awal_imunisasi','=', $tanggal)->get();



            foreach($data as $d )
            {
                echo $idJenis = $d->id_jenisimunisasi-1;

                @$getJadwalSebelum = Jadwal_Bayi::where('id_jenisimunisasi', $idJenis)
                                                ->where('id_pesertaimunisasi', $d->id_pesertaimunisasi)
                                                ->get();
                 echo "<pre>";
                    print_r($getJadwalSebelum->toArray());
                    echo "</pre>"; 

                foreach($getJadwalSebelum as $gj)
                {
                    if($gj->status_imunisasi == 'belum')
                    {
                        // notifdisini 
                        $this->coba3($getJadwalSebelum);
                        break;
                    }
                }                                  

            }

        $this->coba3($data); 

                    // echo "<pre>";
                    // print_r($data->toArray());
                    // echo "</pre>"; 

        $peserta = array();
        $profil  = array();

        // $pesertaSudahImun = TransaksiImunisasi::select('id_pengguna')->leftJoin('peserta-imunisasi','peserta-imunisasi.id_pesertaimunisasi','=','transaksi-imunisasi.id_pesertaimunisasi')
        //         ->leftJoin('profile','profile.id_profile','=','peserta-imunisasi.id_profile')
        //         ->leftJoin('pengguna','pengguna.id_profile','=','profile.id_profile')
        //         ->where('transaksi-imunisasi.pelaksanaan','=',$tanggal)
        //         ->get()->toArray();

        // foreach($data as $datas){
        //     $peserta[] = $datas['id_pesertaimunisasi'];
        //     $profil[]  = $datas['id_profile'];
        // }
  
        // $n = 0;
        // foreach ($peserta as $pst) {
        //    $pengguna = Pengguna::leftJoin('profile','profile.id_profile','=','pengguna.id_profile')
        //                     ->leftJoin('peserta-imunisasi','peserta-imunisasi.id_profile','=','profile.id_profile')
        //                     ->leftJoin('jenis-imunisasi','jenis-imunisasi.id_jenisimunisasi','=','peserta-imunisasi.id_jenisimunisasi')
        //                     ->where('peserta-imunisasi.id_pesertaimunisasi', '=', $pst)
        //                     ->where('pengguna.level','=','ibu')
        //                     ->where('pengguna.id_profile','=', $profil[$n])                        
        //                     ->get();   

        //                         echo "<pre>";
        //             print_r($pengguna);
        //             echo "</pre>"; 


        //    foreach($pengguna as $user){
        //         if(@$pesertaSudahImun[$n]['id_pengguna'] != $user['id_pengguna'])
        //         { 
        //             $token = array();
                    
        //             $message[] = array(
        //                 'title'   => 'Ayo Lakukan Imunisasi',
        //                 'message' => $user->ket_jenisimunisasi.' untuk '.$user->nama,
        //             );  

        //             $token[] = $user['token_firebase'];                              
        //         }
        //    }
        // Notif::notif($token, $message[$n]); 

        // $n++;        
        // } 

    // // return json_encode($token);  
        
    }

    public function coba3($data){
        $tanggal = date('Y-m-d');

        $peserta = array();
        $profil  = array();

        $pesertaSudahImun = TransaksiImunisasi::select('id_pengguna')->leftJoin('peserta-imunisasi','peserta-imunisasi.id_pesertaimunisasi','=','transaksi-imunisasi.id_pesertaimunisasi')
                ->leftJoin('profile','profile.id_profile','=','peserta-imunisasi.id_profile')
                ->leftJoin('pengguna','pengguna.id_profile','=','profile.id_profile')
                ->where('transaksi-imunisasi.pelaksanaan','=',$tanggal)
                ->get()->toArray();

        foreach($data as $datas){
            $peserta[] = $datas['id_pesertaimunisasi'];
            $profil[]  = $datas['id_profile'];
        }
  
        $n = 0;
        foreach ($peserta as $pst) {
           $pengguna = Pengguna::leftJoin('profile','profile.id_profile','=','pengguna.id_profile')
                            ->leftJoin('peserta-imunisasi','peserta-imunisasi.id_profile','=','profile.id_profile')
                            ->leftJoin('jenis-imunisasi','jenis-imunisasi.id_jenisimunisasi','=','peserta-imunisasi.id_jenisimunisasi')
                            ->where('peserta-imunisasi.id_pesertaimunisasi', '=', $pst)
                            ->where('pengguna.level','=','ibu')
                            ->where('pengguna.id_profile','=', $profil[$n])                        
                            ->get();   

                                echo "<pre>";
                    print_r($pengguna);
                    echo "</pre>"; 

           foreach($pengguna as $user){
                if(@$pesertaSudahImun[$n]['id_pengguna'] != $user['id_pengguna'])
                { 
                    
                    $message[] = array(
                        'title'   => 'Ayo Lakukan Imunisasi',
                        'message' => $user->ket_jenisimunisasi.' untuk '.$user->nama,
                    );  

                    $token[] = $user['token_firebase'];                              
                }
           }
        Notif::notif($token, $message[$n]); 

        $n++;        
        } 
    }



    public function cobabackup(){
        $tanggal = date('Y-m-d');
        $data    = Jadwal::where('pelaksanaan','=', $tanggal)->get();

        foreach($data as $datas){
            $dinas[] = $datas['id_dinas'];
        }

        $message = array(
            'title'   => 'Ayo Lakukan Imunisasi',
            'message' => 'Lakukan Imunisasi Sesuai Perkembangan Bayi'
        ); 

        foreach ($dinas as $key => $d) {
           $pengguna = Pengguna::where('id_dinas', '=', $d)->where('level','=','ibu')->get();
           foreach($pengguna as $user){
                $token[] = $user['token_firebase'];                              
           }        
        } 

        Notif::notif($token, $message);
    }

    public function getPassword(Request $request, $id){

        $user = Pengguna::where('id_pengguna','=',$id)->first();

        $password_lama = $request->password_lama;
        $password      = $request->password;


        if (Hash::check($password_lama, $user->password)) {
            $user_id = $user->id_pengguna;
            $obj_user = Pengguna::find($user_id);
            $obj_user->password = bcrypt($request->password);
            $obj_user->password_md5 = md5($request->password);
            $obj_user->update();

            $respon = $this->responses('200','sukses','Sukses!');
        }
        else{
            $respon = $this->responses('400',null,'Anda Tidak Event!');
        }
        return json_encode($respon);

        // return json_encode($user);

    }

    public function getProfile($id){
        $getData = Pengguna::leftJoin('profile','profile.id_profile','=','pengguna.id_profile')
            ->where('pengguna.id_pengguna', $id)
            ->first();

             return json_encode($getData);
    }

    public function updateProfile(Request $request, $id){
        $no_kk      = $request->no_kk;
        $nik_ayah   = $request->nik_ayah;
        $nik_ibu    = $request->nik_ibu;
        $nama_ayah  = $request->nama_ayah;
        $nama_ibu   = $request->nama_ibu;
        $alamat     = $request->alamat;

        $getData = Pengguna::leftJoin('profile','profile.id_profile','=','pengguna.id_profile')
            ->where('pengguna.id_pengguna', $id)
            ->get();

        $id_profile = $getData[0]->id_profile;

        $update = Profile::where('id_profile',$id_profile)->update([
            'no_kk' => $no_kk,
            'nik_ayah' => $nik_ayah,
            'nik_ibu' => $nik_ibu,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'alamat' => $alamat,
        ]);

        if ($update) {
            $respon = $this->responses('200',$update,'Sukses!');
        }else{
            $respon = $this->responses('400',null,'Anda Tidak Event!');
        }

        return json_encode($respon);
        
    }

    public function getDestination()
    {
        $getData = Destination::get();

        if (count($getData) > 0) {
            foreach ($getData as $data) {
            $response['semuainformasi'][] = array(
                    'dest_id'   => $data['dest_id'],
                    'dest_name' => $data['dest_name'],
                    'desc' => $data['desc'],
                    'pict' => $data['pict'],
                    'created_at' => $data['created_at']
                );
            }
        } else {
            $response['semuainformasi'] = null;
        }

        return response()->json($response);
    }

    public function getMaps()
    {
        $getData = Destination::get();

        if (count($getData) > 0) {
            foreach ($getData as $data) {
            $response['AllMaps'][] = array(
                    'dest_id'   => $data['dest_id'],
                    'dest_name' => $data['dest_name'],
                    'longitude' => $data['longitude'],
                    'latitude' => $data['latitude'],
                    'type_id' => $data['type_id']
                );
            }
        } else {
            $response['AllMaps'] = null;
        }

        return response()->json($response);
    }

    public function detailDestination(Request $request){

            $idDes = $request->id;

            $getData = Destination::where('dest_id', $idDes)->get();
    
            if (count($getData) == 0) {
                $response['semuainformasi'] = null;
            } else {
                foreach ($getData as $data) {
                    $response['semuainformasi'][] = array(
                        'dest_id'   => $data['dest_id'],
                        'dest_name' => $data['dest_name'],
                        'desc' => $data['desc'],
                        'pict' => $data['pict'],
                        'created_at' => $data['created_at']
                        );
                    }
            }
    
            return response()->json($response);

        
    }

    public function Search(Request $request)
    {
        $search = $request->search;

        $getData = Destination::where(function ($query) use ($search) {
                $query->where('dest_name','like','%'.$search.'%');})->get();

        if (count($getData) > 0) {
            foreach ($getData as $data) {
            $response['semuainformasi'][] = array(
                'dest_id'   => $data['dest_id'],
                'dest_name' => $data['dest_name'],
                'desc' => $data['desc'],
                'pict' => $data['pict'],
                'created_at' => $data['created_at']
                );
            }
        } else {
            $response['semuainformasi'] = null;
        }

        return response()->json($response);
    }

    public function responses($status,$data,$message){
        return array('status'=>$status,'data'=>$data,'message'=>$message);
    }

}
