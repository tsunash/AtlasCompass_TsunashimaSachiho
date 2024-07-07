<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'under_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'mail_address' => 'required|email|unique:users,mail_address|max:100',
            'sex' => 'required|in:1,2,3',
            'old_year' => 'required',
            'old_month' => 'required',
            'old_day' => 'required',
            // 'birth_day' => 'required|date|after:2000-01-01|before:now',
            'role' => 'required|in:1,2,3,4',
            'password' => 'required|min:8|max:30|confirmed',
        ];
    }

    public function withValidator($validator)
    {
            $old_year = $this->input('old_year');
            $old_month = $this->input('old_month');
            $old_day = $this->input('old_day');
            $data = $old_year . '-' . $old_month . '-' . $old_day;
            $birth_day = date('Y-m-d', strtotime($data));
            $today = date('Y-m-d');
            $target = date('2000-01-01');

        $validator->after(function ($validator) use($old_year,$old_month,$old_day,$birth_day,$today,$target){
            if(!isset($old_month,$old_day,$old_year)){
                $validator->errors()->add('birth_day','日付を入力してください');
            }
            if(!checkdate($old_month,$old_day,$old_year)){
                $validator->errors()->add('birth_day','日付を正しく入力してください。');
            }
            if(!($birth_day >= $target and $birth_day <= $today)){
                $validator->errors()->add('birth_day','2000年1月1日から今日までの日付で指定してください。');
            }
        });
    }

    public function messages()
    {
        return  [
            'required' => ':attributeは必須です。',
            'string' => ':attributeは文字列で入力してください。',
            'max' => ':attributeは:max文字以内で入力してください。',
            'min' => ':attributeは:min文字以上で入力してください。',
            'regex' => ':attributeはカタカナで入力してください。',
            'email' => 'メール形式で入力してください。',
            'unique' => 'この:attributeは利用できません。',
            'in' => ':attributeを正しく入力してください。',
            'confirmed' => ':attributeが一致しません。',
        ];
    }

    public function attributes()
    {
        return[
            'over_name' => '姓',
            'under_name' => '名',
            'over_name_kana' => 'セイ',
            'under_name_kana' => 'メイ',
            'mail_address' => 'メールアドレス',
            'sex' => '性別',
            'old_year' => '年',
            'old_month' => '月',
            'old_day' => '日',
            'role' => '役職',
            'password' => 'パスワード',
        ];
    }
}
