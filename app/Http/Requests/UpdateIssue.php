<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIssue extends FormRequest
{
    //自定义错误信息
    public function messages()
    {
        return [
            'title.required' => '你的标题被狗吃了。',
        ];
    }

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
        $issue = $this->route('issue');
        return [
            'title' => 'required|unique:issues,title,' . $issue->id . '|max:255',
            'content' => 'required',
        ];
    }
}
