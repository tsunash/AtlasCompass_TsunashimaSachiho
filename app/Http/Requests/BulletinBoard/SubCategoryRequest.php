<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'main_category_id'=>'required|exists:main_categories,id', //テーブル名,カラム名
            'sub_category_name'=>'required|max:100|string|unique:sub_categories,sub_category'
        ];
    }
   public function messages(){
        return[
            'required'=>':attributeは必須です',
            'max'=>':attributeは:max文字以内で入力してください',
            'string'=>':attributeは文字列で入力してください',
            'unique'=>'入力した:attributeは既に存在します',
            'exists'=>'入力した:attributeは存在しません'
        ];
    }
    public function attributes(){
        return[
            'main_category_id'=>'メインカテゴリ―選択',
            'sub_category_name'=>'サブカテゴリ―名'
        ];
    }
}
