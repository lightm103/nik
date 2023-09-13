<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Data extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nik' => 'required',
            'nama_ktp' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'nomor_tps' => 'required',
        ];
    }
}
