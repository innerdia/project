<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
   
    public function index() {
    	//$items = DB::table('items')->get(); // select * from items
    	//dd($items); hasilnya collection bukan eloquent: hasilnya properti saja data dari tabel gak ada primary key dll
		$items = items::all();
		//dd($items); hasilnya ada arrayberisi data items pakai eloquent datanya jadi banyak
		return view('items.index', compact('items'));
	}

    public function create() {
    	return view('items.create');
    }

    public function store(Request $request) {
    	//dd($request->all());
    	$request->validate([
    		'judul' => 'required|unique:items',
    		'isi' => 'required'
    	]);
    	//DB::table('items')->insert([
    	//	'judul' => $request->judul,
    	//	'isi' => $request->isi
		//]);

		//menyimpan data ke db menggunakan eloquent orm
		//items adalah object baru dari model. model adl sebuah class harus dibuat objectnya lalu dibuat nilai2nya/properti yg ada didalam db
		//$items= new items;
		//$items->judul = $request["judul"];
		//$items->isi = $request["isi"];
		//$items->save();
		
		//menyimpan data ke db mgg mass assignment
		$items = items::create([
            "judul" => $request["judul"],
			"isi" => $request["isi"],
			"user_id" => Auth::id()
        ]);

    	return redirect('/items');
    }
}