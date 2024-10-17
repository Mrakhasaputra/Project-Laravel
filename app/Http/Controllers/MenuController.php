<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    
        $menus = Menu::where('name', 'LIKE', '%' . $request->search_menu . '%')->orderBy('name', 'ASC')->simplePaginate(5);
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'img' => 'required', // validasi gambar
        ],[
            'name.required' => 'Nama harus diisi!',
            'price.required' => 'Harga harus diisi!',
            'img.required' => 'Gambar harus diisi!',
            'type.required' => 'Kategori harus diisi!',
        ]);
    
        // Proses upload gambar
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName(); // nama file unik
            $image->storeAs('public/images', $imageName); // simpan gambar di folder storage/app/public/images

    
        // Simpan data menu
        Menu::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'img' => 'images/' . $imageName, // simpan path gambar ke database
        ]);
    
        return redirect()->back()->with('success', 'Menu berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi gambar tidak wajib
        ]);
    
        // Ambil data menu yang akan diupdate
        $menu = Menu::find($id);
    
        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName); // simpan gambar baru
    
            // Update path gambar
            $menu->img = 'images/' . $imageName;
        }
    
        // Update data lainnya
        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->price = $request->price;
    
        // Simpan perubahan
        if ($menu->save()) {
            return redirect()->route('menu.index')->with('success', 'Menu Berhasil Diubah!');
        } else {
            return redirect()->back()->with('failed', 'Menu Gagal Diubah!');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proses = Menu::where('id', $id)->delete();
        if($proses){
            return redirect()->back()->with('success', 'Menu Berhasil Dihapus!');
        }else{
            return redirect()->back()->with('failed', 'Menu Gagal Dihapus!');
        }
    }
}
