<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauHoiRq extends FormRequest
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
            "noi_dung" => "required|min:3|unique:cau_hoi,noi_dung",
            "phuong_an_A" =>"required|min:4|max:25",
            "phuong_an_B" =>"required|min:4|max:25",
            "phuong_an_C" =>"required|min:4|max:25",
            "phuong_an_D" =>"required|min:4|max:24",
            "dap_an" =>"required"
        ];
    }
        public function messages()
    {
        return[
        "noi_dung.required" =>"Điền đầy đủ nội dung",
        "phuong_an_A.required" =>"Điền phương án a",
        "phuong_an_B.required" =>"Điền phương án b",
        "phuong_an_C.required" =>"Điền phương án c",
        "phuong_an_D.required" =>"Điền phương án d",
        "dap_an.required" =>"Chọn đáp án",
        "noi_dung.min" =>"Nội dung phải từ 4 ký tự trở lên",
        "phuong_an_A.min" =>"Phương án a từ 4 ký tự trở lên",
        "phuong_an_B.min" =>"Phương án b từ 4 ký tự trở lên",
        "phuong_an_C.min" =>"Phương án c từ 4 ký tự trở lên",
        "phuong_an_D.min" =>"Phương án d từ 4 ký tự trở lên",
         "phuong_an_A.max" =>"Phương án a từ 25 ký tự trở xuống",
        "phuong_an_B.max" =>"Phương án b từ 25 ký tự trở xuống",
        "phuong_an_C.max" =>"Phương án c từ 25 ký tự trở xuống",
        "phuong_an_D.max" =>"Phương án d từ 25 ký tự trở xuống"
        ];
    }
}
