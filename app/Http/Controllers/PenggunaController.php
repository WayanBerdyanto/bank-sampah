<?php

namespace App\Http\Controllers;

use App\Charts\LineChartPengguna;
use App\Charts\PieChartSampah;
use App\Models\Langganan;
use App\Models\master_pembuangan;
use App\Models\Detail_Pembuangan;
use App\Models\Detail_Langganan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use PDF;

class PenggunaController extends Controller
{
    public function index(PieChartSampah $chart, LineChartPengguna $linechart)
    {
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $id_pengguna = Auth::User()->id;

        // $hasil = db::select("SELECT mp.jenis_sampah, SUM(dp.berat) AS berat
        // FROM master_pengambilan mp, detail_pengambilan dp, users us
        // WHERE mp.id_nota = dp.id_nota AND mp.jenis_sampah = 'anorganik' AND mp.id_pengguna = us.id 
        // AND mp.id_pengguna = '$id_pengguna'");
        
        // dd($hasil);

        $result_master_langganan = db::select("SELECT mp.jenis_sampah, mp.jam, mp.hari, mp.tanggal, dp.status_pengambilan, (SELECT users.nama_lengkap FROM users WHERE users.id = dp.id_pengambil) AS nama_lengkap
        FROM users us, master_pengambilan mp, detail_pengambilan dp
        WHERE mp.id_nota = dp.id_nota AND us.id = '$id_pengguna' AND mp.id_pengguna = '$id_pengguna'");
        $result_master = master_pembuangan::select('master_pembuangan.id_master_pembuangan', 'users.id', 'users.nama_lengkap', 'master_pembuangan.jenis_sampah', 'master_pembuangan.tgl_pengajuan','master_pembuangan.jam_pengajuan', 'master_pembuangan.status_terima')
            ->join('users', 'users.id', '=', 'master_pembuangan.id_bank_sampah')
            ->where('master_pembuangan.id_pengguna', $id_pengguna)
            ->orderBy('master_pembuangan.id_master_pembuangan', 'desc')
            ->paginate(5);


        $lama_langganan = DB::select('SELECT langganan.lama_langganan, detail_langganan.tanggal
        FROM users, detail_langganan, langganan
        WHERE users.id = '. $id_pengguna .' AND langganan.kode_langganan = detail_langganan.kode_langganan');
        
        if(!empty($lama_langganan)){
            $mytime = $lama_langganan[0]->tanggal;
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $mytime);
            $daysToAdd = $lama_langganan[0]->lama_langganan;
            $date = $date->addDays($daysToAdd);
            return view('pengguna.index', ['username' => $username], ['chart' => $chart->build(), 'linechart' => $linechart->build(), 'key' => 'index', 'result' => $result, 'result_master' => $result_master, 'date'=>$date ,'result_master_langganan'=>$result_master_langganan]);
        }else{
            return view('pengguna.index', ['username' => $username], ['chart' => $chart->build(), 'linechart' => $linechart->build(), 'key' => 'index', 'result' => $result, 'result_master' => $result_master, 'result_master_langganan'=>$result_master_langganan]);
        }
    }

    public function langganan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $langganan = Langganan::All();
        return view('pengguna.langganan', ['user' => $user, 'key' => 'langganan', 'result' => $result, 'langganan' => $langganan]);
    }

    // Start Sistem Langganan
    public function order($id){
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $langganan = Langganan::where('kode_langganan', $id)->get();
        if(Auth::User()->provinsi == null && Auth::User()->kabupaten == null){
            return redirect('/pengguna/profilesetting')->with('toast_error', 'Lengkapi Data diri dulu');
        }else{
            return  view('pengguna.orderlangganan', [
                'key' => 'langganan', 
                'result' => $result,
                'user' => $user,
                'langganan'=>$langganan]);
        }
        
    }

    public function checkout(Request $request){
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $id = Auth::User()->id ?? '';
        $mytime = Carbon::now()->toDateTimeString();
        // dd($mytime);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $mytime);
        $daysToAdd = $request->lama_langganan;
        $date = $date->addDays($daysToAdd);
        
        $request->request->add(
            [
                'id_pengguna' => Auth::user()->id,
                'kode_langganan' => $request->kode_langganan,
                'harga' => $request->harga,
                'masa_langganan' => $date,
                'lama_langganan' => $request->lama_langganan,
                'status' => 'Belum Bayar',
                'tanggal' => $mytime,
            ]
        );

        $order = Detail_Langganan::create($request->all());
        $result_detail = Detail_Langganan::join('langganan as l', 'detail_langganan.kode_langganan', '=', 'l.kode_langganan')
        ->select('detail_langganan.*', 'l.nama_langganan', 'l.layanan', 'l.harga', 'l.lama_langganan')
        ->orderBy('detail_langganan.id_dtl_langganan', 'desc')
        ->first();

        return view('pengguna.checkout',
        [ 
            'key' => 'langganan', 
            'user' => $user,
            'id_pengguna'=>$user,
            'kode_langganan'=> $request->kode_langganan,
            'harga' => $request->harga,
            'masa_langganan'=>$mytime,
            'status' => 'Belum Bayar', //<- Manipulation
            'tanggal' => $mytime,
            'datenow'=>$date,
            'result_detail'=>$result_detail,
            'order'=>$order
            ]
        );
    }
    
    public function postCheckout(Request $request){

        $id = $request->id_dtl;
        Detail_Langganan::where('id_dtl_langganan',$id)->update(
            [
                'methode_pembayaran' => $request->methode,
                'status' => "Sudah Bayar"
            ]
        );
        $user = User::where('id',Auth::User()->id)->update([
            'status_langganan' => 'Sudah Langganan'
        ]);    
        return redirect('/pengguna')->with('success', 'Berhasil Langganan');  
    }

    public function checkouts(Request $request){
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $id = Auth::User()->id ?? '';
        $mytime = Carbon::now()->toDateTimeString();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $mytime);
        $daysToAdd = 7;
        $date = $date->addDays($daysToAdd);

        $users = Auth::User()->id ?? '';
        $request->request->add(
            [
                'id_pengguna'=>$users,
                'kode_langganan'=> $request->kode_langganan,
                'harga' => $request->harga,
                'masa_langganan'=>$date,
                'status' => 'Belum Bayar', //<- Manipulation
                'tanggal' => $mytime
            ]
        );

        // Send Status Langganan To User

        // $user = User::find($id);
        // $user->status_langganan = 'Sudah Langganan';
        // $user->save();


        $order = Detail_Langganan::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id_dtl_langganan.uniqid(), //<- Manipulation Callback
                'gross_amount' => $order->harga,
            ),
            'customer_details' => array(
                'name' => $request->nama_langganan,
                'tanggal' => $request->tanggal,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pengguna.checkout', [
            'snapToken'=>$snapToken, 
            'order'=>$order,
            'key' =>'langganan', 
            'result' => $result,
            'user' => $user,]);
    }

    public function callback(Request $request){
        $serverkey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverkey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = Detail_Langganan::find($request->id_dtl_langganan);
                $order->status = 'Sudah Bayar';
                $order->save();
            }
            return response('OK', 200);
        }else{
            return response('BAD', 401);
        }
    }
    
    // End Sistem Langganan
    public function invoiceprofile($type){
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();


        $pdf = PDF::loadView('pengguna.cetakprofile',['result' => $result]);
        return $pdf->stream('cetak-proile.pdf');
    }

    public function cetakprofile(){
        return view('pengguna.cetakprofile');
    }

    public function transaksi()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();

        $id_pengguna = Auth::User()->id;
        $result_master = master_pembuangan::select(
            'master_pembuangan.id_master_pembuangan',
            'users.id as user_id',
            'users.nama_lengkap',
            'master_pembuangan.jenis_sampah',
            'master_pembuangan.tgl_pengajuan',
            'master_pembuangan.jam_pengajuan',
            'master_pembuangan.status_terima',
            'detail_pembuangan.berat_sampah',
            'master_pembuangan.status_bayar',
            'detail_pembuangan.id_dtl_pembuangan'
        )
        ->join('users', 'users.id', '=', 'master_pembuangan.id_bank_sampah')
        ->join('detail_pembuangan', 'detail_pembuangan.id_master_pembuangan', '=', 'master_pembuangan.id_master_pembuangan')
        ->where('master_pembuangan.id_pengguna', $id_pengguna)
        ->where('status_bayar', '!=',null)
        ->orderBy('master_pembuangan.id_master_pembuangan', 'desc')
        ->take(5)
        ->get();
        // dd($result_master);

        return view('pengguna.transaksi', ['user' => $user, 'key' => 'transaksi', 'result' => $result, 'result_master'=>$result_master]);
    }

    public function invoice($type){
        $id_pengguna = Auth::User()->id;
        $data = master_pembuangan::select(
            'master_pembuangan.id_master_pembuangan',
            'users.id as user_id',
            'users.nama_lengkap',
            'users.status_langganan',
            'users.provinsi',
            'users.kabupaten',
            'users.kecamatan',
            'users.kelurahan',
            'users.no_telpon',
            'master_pembuangan.jenis_sampah',
            'master_pembuangan.tgl_pengajuan',
            'master_pembuangan.jam_pengajuan',
            'master_pembuangan.status_terima',
            'detail_pembuangan.berat_sampah',
            'master_pembuangan.status_bayar',
            DB::raw('detail_pembuangan.harga * detail_pembuangan.berat_sampah AS total')

        )
        ->join('users', 'users.id', '=', 'master_pembuangan.id_bank_sampah')
        ->join('detail_pembuangan', 'detail_pembuangan.id_master_pembuangan', '=', 'master_pembuangan.id_master_pembuangan')
        ->where('master_pembuangan.id_pengguna', $id_pengguna)
        ->where('status_bayar', '!=',null)
        ->orderBy('master_pembuangan.id_master_pembuangan', 'desc')
        ->take(5)
        ->get();
        // dd($data);
        
        $users = User::where('id', $id_pengguna )->get();
        // dd($users);

        $today = Carbon::now();

        $mytime = Carbon::now()->toDateTimeString();
        $pdf = PDF::loadView('pengguna.cetakpdf',['data'=>$data, 'time'=>$mytime, 'users'=>$users, 'today'=>$today]);
        return $pdf->stream('cetak-pdf.pdf');
    }
    public function invoiceTertentu($type, $id){
        $id_pengguna = Auth::User()->id;
        $data = master_pembuangan::select(
            'master_pembuangan.id_master_pembuangan',
            'users.id as user_id',
            'users.nama_lengkap',
            'users.status_langganan',
            'users.provinsi',
            'users.kabupaten',
            'users.kecamatan',
            'users.kelurahan',
            'users.no_telpon',
            'master_pembuangan.jenis_sampah',
            'master_pembuangan.tgl_pengajuan',
            'master_pembuangan.jam_pengajuan',
            'master_pembuangan.status_terima',
            'detail_pembuangan.berat_sampah',
            'master_pembuangan.status_bayar',
            DB::raw('detail_pembuangan.harga * detail_pembuangan.berat_sampah AS total')

        )
        ->join('users', 'users.id', '=', 'master_pembuangan.id_bank_sampah')
        ->join('detail_pembuangan', 'detail_pembuangan.id_master_pembuangan', '=', 'master_pembuangan.id_master_pembuangan')
        ->where('master_pembuangan.id_pengguna', $id_pengguna)
        ->where('status_bayar', '!=',null)
        ->where('detail_pembuangan.id_dtl_pembuangan', $id)
        ->orderBy('master_pembuangan.id_master_pembuangan', 'desc')
        ->take(5)
        ->get();
        // dd($data);

        $users = User::where('id', $id_pengguna )->get();
        // dd($users);

        $today = Carbon::now();

        $mytime = Carbon::now()->toDateTimeString();
        $pdf = PDF::loadView('pengguna.cetakpdf',['data'=>$data, 'time'=>$mytime, 'users'=>$users, 'today'=>$today]);
        return $pdf->stream('cetak-pdf.pdf');
    }
    public function profilesetting()
    {
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.profile', ['result' => $result, 'key' => 'profilesettings', 'user' => $user]);
    }

    public function postProfile($id, Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = User::find($id);
        if ($user) {
            if($request->hasFile('foto')){
                $foto = $request->file('foto');
                $fileName = $foto->getClientOriginalName();
                $user->username = $request->username;
                $user->email = $request->email;
                $user->foto = $fileName;
                $user->nama_lengkap = $request->namalengkap;
                $user->provinsi = $request->provinsi;
                $user->kabupaten = $request->kabupaten;
                $user->kecamatan = $request->kecamatan;
                $user->kelurahan = $request->kelurahan;
                $user->no_telpon = $request->no_telpon;
                $user->latitude = $request->latitudeInput;
                $user->longitude = $request->longitudeInput;
                $foto->move(public_path('img/pengguna'), $fileName);

            }
            if ($user->save()) {
                return redirect('/pengguna/')->with('success', 'Profile Berhasil Di Ubah');
            } else {
                return redirect('/pengguna/profilesetting')->with('errors', $validator->messages()->all()[0])->withInput();
            }
        } else {
            return redirect('/pengguna/profilesetting')->with('error', 'User Not Found')->with('errors', $validator->messages()->all()[0])->withInput();

        }

    }

    public function ubahpassword()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.ubahpassword', ['key' => 'ubahpassword', 'user' => $user, 'result' => $result]);
    }

    public function postubahpassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            // Update the password with the new one
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect('/pengguna/')->with('success', 'Password berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }
    }
    public function buangsampah()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $banksampah = User::where('role', 'banksampah')->get();
        return view('pengguna.buangsampah', ['key' => 'buangsampah', 'user' => $user, 'result' => $result, 'banksampah' => $banksampah]);
    }


    public function postbuangsampah(Request $request)
    {
        $validated = $request->validate([
            'jenis_sampah' => 'required|max:255',
            'idbanksampah' => 'required',
            'jam_pengajuan' => 'required',
        ]);
        $id_pengguna = Auth::User()->id;
        if ($validated) {
            master_pembuangan::create([
                'id_bank_sampah' => $request->idbanksampah,
                'id_pengguna' => $id_pengguna,
                'jenis_sampah' => $request->jenis_sampah,
                'tgl_pengajuan' => $request->tgl_pengajuan,
                'jam_pengajuan' => $request->jam_pengajuan,
            ]);
            $idMasterPembuangan = master_pembuangan::orderBy('id_master_pembuangan', 'desc')->first()->id_master_pembuangan;
            Detail_Pembuangan::create([
                'id_master_pembuangan'=>$idMasterPembuangan,
                'status' => $request->status
            ]);
            return redirect('/pengguna/')->with('success', 'Data Sampah Berhasil Diinputkan');
        } else {
            return redirect('/pengguna/buangsampah')->with('error', 'Data Sampah Gagal Diinputkan');
        }
    }

    public function hapusmasterbuang($id){
        master_pembuangan::where('id_master_pembuangan', $id)->delete();
        return redirect('/pengguna/')->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function detailbuangsampah($id){
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $id_user = Auth::User()->id;
        $result_master = User::join('master_pembuangan as mp', 'users.id', '=', 'mp.id_pengguna')
        ->join('detail_pembuangan as dp', 'dp.id_master_pembuangan', '=', 'mp.id_master_pembuangan')
        ->select(
            'mp.id_master_pembuangan',
            'mp.id_pengguna',
            'mp.status_bayar',
            DB::raw('(SELECT nama_lengkap FROM users bank WHERE bank.id = mp.id_bank_sampah) AS lokasi_pembuangan'),
            'dp.jam_penerimaan',
            'dp.berat_sampah',
            'mp.status_terima',
            'mp.jenis_sampah',
            'dp.tanggal',
            'dp.hari',
            DB::raw('dp.harga * dp.berat_sampah AS total')
        )
        ->where('users.id', '=', $id_user)
        ->where('mp.id_master_pembuangan', '=', $id)
        ->get();
        // dd($result_master);
        return view('pengguna.detailbuangsampah', [ 'key' => 'index', 'result' => $result, 'user' => $user, 'username' => $username, 'result_master'=>$result_master]);
    }
    
    public function carbon(){
        $mytime = Carbon::now()->toDateTimeString();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $mytime);
        $daysToAdd = 7;
        $date = $date->addDays($daysToAdd);
        return view('carbon', ['date'=>$date]);
    }

    public function buanglangganan()
    {
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.langganan.langgananbuang', ['key' => 'buanglangganan', 'user' => $user, 'result' => $result]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function bayar($id, Request $request) {
        master_pembuangan::where('id_master_pembuangan', $id)->update(['status_bayar' => 'Lunas']);
        return redirect('/pengguna/detailbuangsampah/'.$id)->with('toast_success','Pembayaran Berhasil');
    }
}
