<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
            'main_category_name'=>'required|max:100|string|unique:main_categories,main_category',
        ];
    }
    public function messages(){
        return[
            'required'=>':attributeは必須です',
            'max'=>':attributeは:max文字以内で入力してください',
            'string'=>':attributeは文字列で入力してください',
            'unique'=>'入力した:attributeは既に存在します',
        ];
    }
    public function attributes(){
        return[
            'main_category_name'=>'メインカテゴリー名',
        ];
    }
}
