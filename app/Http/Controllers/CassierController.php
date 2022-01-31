<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing;
use Illuminate\Support\Facades\DB;
use PDF;
use Image;
use Carbon\Carbon;


class CassierController extends Controller
{
    public function index(){
        return view('cashier');
    }

    public function read(){
        $data = DB::table('billing')
        ->orderByDesc('created_at')->get()->toArray();
    

        return $data;
    }

    public function show(){
        $data = $this->read();
        return view('transaksi', ['trans' => $data]);
    }

    public function tambah(Request $req){
        $checking = DB::table('config')->where('event', 'jumlah_transaksi')->pluck('val')->first();
        $no = str_pad($checking+1, 6, '0', STR_PAD_LEFT);

        $trans = DB::table('billing')->insertGetId([
            'no_nota' => $no,
            'pelanggan' => $req->input('data'),
        ]);

      

        $data = array("nama" => $req->input('data'), "id_trans" => $trans, "no_nota" => $no, "nama" => $req->input('data'));
        
        $req->session()->put('data', $data);
        $updater = DB::table('config')->where('event','jumlah_transaksi')->update(['val' => $checking+1]);
        return json_encode($data);
    }

    public function tambahdata(Request $req){
        $req->validate([

            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        

        $imageName = time()." ".$req->input('billing_id')." ".$req->input('jb').".".$req->file->extension();
        $trans = DB::table('billing_detail')->insertGetId([
            'billing_id' => $req->input('billing_id'),
            'no_barang' => $req->input('nb'),
            'jns_barang' => $req->input('jb'),
            'berat' => $req->input('bb'),
            'harga' => str_replace(["Rp. ", ".",""],"", $req->input('hb')),
            'jumlah' => $req->input('j'),
            'keterangan' => $imageName
        ]);
        $img = Image::make($req->file->path());
        $img->fit(200, 200, function ($constraint) {
            $constraint->upsize();
        })->save(public_path('img').'/'. $imageName);

        $subtotal = DB::table('billing_detail')->where('billing_id', $req->input('billing_id'))->get();
        $total = 0;



        foreach($subtotal as $st){
            $total += $st->harga * $st->jumlah;
        }

        $updater = DB::table('billing')->where("id", $req->input('billing_id'))->update(["subtotal" => $total]);


        $data = DB::table('billing_detail')
        ->join('billing', 'billing_detail.billing_id', '=', 'billing.id')->where('billing_detail.billing_id', $req->input('billing_id'))
        ->select("billing.id as b_id", "billing_detail.*")->get()->toArray();
        
        
        $req->session()->put('detail', $data);

        return json_encode($data);   

    }

    public function hapustrans(Request $req){
        $req->session ()->forget ('data');
        $req->session ()->forget ('detail');
        $data = DB::table('billing_detail')
        ->join('billing', 'billing_detail.billing_id', '=', 'billing.id')->where('billing_detail.billing_id', $req->input('billing_id'))
        ->select("billing.id as b_id", "billing_detail.*")->get()->toArray();
        $getter = DB::table('config')->where('event', 'jumlah_transaksi')->pluck('val')->first();
        $updater = DB::table('config')->where('event', 'jumlah_transaksi')->update(['val' => $getter-1]);

        $deleter = DB::table('billing_detail')->where('billing_id',$req->input('id'))->delete();
        $delete = DB::table('billing')->where('id',$req->input('id'))->delete();
       
        
    }

    public function hapus(Request $req,$id){
        $getbill = DB::table('billing_detail')->where('id',$id)->pluck("billing_id")->first();
        $getimg = DB::table('billing_detail')->where('id',$id)->pluck("keterangan")->first();
        $deleter = DB::table('billing_detail')->where('id',$id)->delete();
        $bil = $getbill;

        $count =  DB::table('billing_detail')
        ->join('billing', 'billing_detail.billing_id', '=', 'billing.id')->where('billing_detail.billing_id', $bil)
        ->select("billing.id as b_id", "billing_detail.*")->count();
        $data = DB::table('billing_detail')
        ->join('billing', 'billing_detail.billing_id', '=', 'billing.id')->where('billing_detail.billing_id', $bil)
        ->select("billing.id as b_id", "billing_detail.*")->get()->toArray();

        
        
        //dd($data);
        if($count > 0){
            $req->session()->put('detail', $data);
        }else{
            $req->session()->forget('detail');
        }
      

        $subtotal = DB::table('billing_detail')->where('billing_id', $bil)->get();
        $total = 0;



        foreach($subtotal as $st){
            $total += $st->harga * $st->jumlah;
        }

        $updater = DB::table('billing')->where("id", $bil)->update(["subtotal" => $total]);    
        unlink(public_path('img').'/'.$getimg);
        return redirect()->route('trans');

    }

    public function hapustransaksi(Request $req, $idtrans){
        $deleter = DB::table('billing')->where('id',$idtrans)->delete();
        $deleter2 = DB::table('billing_detail')->where('billing_id',$idtrans)->delete();
        $req->session()->forget('data');
        $req->session()->forget('detail');

        return redirect()->route('transaksi');
    }
    public function print(Request $req){
        $id = $req->session()->get('data')['id_trans'];
        //dd($id);
        DB::table('billing')->where('id', $id)->update(["bayar" => str_replace(["Rp. ", ".",""],"", $req->input('bayar')), "status" => "print"]);
        DB::table('billing')->where('id', $id)->update(["bayar" => str_replace(["Rp. ", ".",""],"", $req->input('bayar')), "status" => "print"]);

        $data = DB::table('billing_detail')
        ->join('billing', 'billing_detail.billing_id', '=', 'billing.id')->where('billing_detail.billing_id', $id)
        ->select("billing.id as b_id", "billing_detail.*", "billing.pelanggan", "billing.subtotal", "billing.no_nota" )->get()->toArray();
        
        $pdf = PDF::loadview('nota.nota', ["trans" => $data, 'maks' => (int)$req->input('maks')]);
        $path = public_path('pdf/');
            $fileName =  date('mdy').'-'.$data[0]->b_id. '.' . 'pdf' ;
            $pdf->save(storage_path("pdf/$fileName"));
        $storagepath = storage_path("pdf/$fileName");
        $base64 = chunk_split(base64_encode(file_get_contents($storagepath)));
        if($req->input('save') == "saved"){
            
        }else{
            unlink($storagepath);
        }
    	return response()->json(["filename" => $base64]);
    }

    public function reload(Request $req){
        $req->session()->forget('data');
        $req->session()->forget('detail');

        return redirect()->route('trans');
    }
}
