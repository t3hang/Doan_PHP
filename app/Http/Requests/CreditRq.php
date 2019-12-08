<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditRq extends FormRequest
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
            "Ten_goi"=>"required|min:3|unique:goi_credit,Ten_goi",
            "Credit"=>"required|unique:goi_credit,credit",
            "So_tien"=>"required"
        ];
    }
        public function messages()
    {
        return[
           "Ten_goi.required" =>"Điền đầy đủ tên Credit",
           "Credit.required" =>"Nhập số gói Credit",
           "So_tien.required" =>"Nhấp số tiền Credit",
           "Ten_goi.min"=>"Tên gói Credit từ 3 ký tự trở lên",
           "Credit.unique"=>"Số Credit đã tồn tại",
           "So_tien.unique"=>"Tên gói đã tồn tại"
        ];
    }
}
