<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\GaleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleryController extends Controller
{
    public function index()
    {
        $data = GaleryModel::all();
        return view('CMS.Galery')->with('data', $data);
    }

    public function store(Request $request)
    {
        $random = Str::random(11);
        $storage = 'public/image';
        $img = $request->file('path');
        $img_name = time() . "_" . $random . "." . $img->extension();
        $img->storeAs($storage, $img_name);
        $data = array(
            'path' => $img_name,
            'name' => $request->name,
            'description' => $request->description
        );
        
        GaleryModel::create($data);
        return redirect()->back()->with('status', 'Data berhasil di tambahkan');
    }
}
