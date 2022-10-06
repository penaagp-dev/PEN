<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalonAnggotaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nama" => 'required|min:2|max:125',
            "panggilan" => 'required|min:2|max:50',
            "umur" => 'required|max:2',
            "alamat" => 'required|min:5',
            "no_telepon" => 'required|min:10|max:13',
            "agama" => 'required|min:2|max:20',
            "email" => 'required|email|unique:calon_anggota,email',
            "sex" => 'required|min:2|max:15',
            "foto" => 'required|image',
            "semester" => 'required|max:2',
            "prodi" => 'required|min:2|max:50',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'response' => array(
                'icon' => 'error',
                'title' => 'Validasi Gagal',
                'message' => 'Data yang di input tidak tervalidasi',
            ),
            'errors' => array(
                'length' => count($validator->errors()),
                'data' => $validator->errors()
            ),
        ], 422));
    }
}
