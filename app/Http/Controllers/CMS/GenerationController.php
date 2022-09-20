<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Models\GenerationModel;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class GenerationController extends Controller
{
    public function readData()
    {
        $data = GenerationModel::all();
        return view('CMS.Generation')->with('data', $data);
    }

    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'years' => 'required',
                'graduated' => 'required',
            ],
            [
                'required' => 'Data Tidak Boleh Kosong',

            ]
        );

        if ($validation->fails()) {
            $msg = $validation->errors()->first();
            Alert::error('Gagal', $msg);
            return redirect()
                ->back();
        }
        $data = GenerationModel::create([
            'name' => $request->name,
            'years' => $request->years,
            'graduated' => $request->graduated,
            
        ]);

        if ($data) {
            Alert::success('Behasil', 'Data Berhasil Di Tambahkan');
            return back();
        } else {
            Alert::error('Gagal', 'Mohon periksa kembali inputan anda');
            return redirect()->back();
        }
    }

}
