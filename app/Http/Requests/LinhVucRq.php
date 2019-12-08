<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinhVucRq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        "ten_linh_vuc" => "required|min:4|max:25|unique:linh_vuc,ten_linh_vuc"
        ];
    }
       public function messages()
    {
        return[
            "ten_linh_vuc.required" => "Điền tên lĩnh vực",
            "ten_linh_vuc.min" =>"Nhập từ 4 ký tự trở lên",
            "ten_linh_vuc.max" =>"Nhập từ 25 ký tự trở xuống",
            "ten_linh_vuc.unique" =>"Lĩnh vực đã tồn tại"
        ];
    }
}
