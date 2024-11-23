<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
            'comment'=>'required|string|max:250',
            'post_id'=>'exists:posts,id'
        ];
    }

    public function messages(){
        return[
            'comment.required'=>':attributeは必ず入力してください。',
            'comment.string'=>':attributeは文字列で入力してください。',
            'comment.max'=>':attributeは:max文字以内で入力してください。',
            'post_id'=>'対象の投稿は存在しません。'
        ];
    }

    public function attributes(){
        return[
            'comment'=>'コメント'
        ];
    }
}
