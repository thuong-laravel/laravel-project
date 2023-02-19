<?php

namespace Modules\User\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|required_with:confirm_password|same:confirm_password",
            "confirm_password" => "required|min:6|",
            "group_id" => ['required', 'integer', function ($atrribute, $value, $fail) {
                if ($value == 0) {
                    $fail("Vui lòng chọn nhóm");
                }
            }]
        ];
    }

    public function attributes()
    {
        return [
            "name" => __("User::validation.attribute.name"),
            "email" => __("User::validation.attribute.email"),
            "password" => __("User::validation.attribute.password"),
            "group_id" => __("User::validation.attribute.group_id"),
            "confirm_password" => __("User::validation.attribute.confirm_password"),
        ];
    }

    public function messages()
    {
        return [
            "required" => __("User::validation.required"),
            "email" => __("User::validation.email"),
            "unique" => __("User::validation.unique"),
            "min" => __("User::validation.min"),
            "integer" => __("User::validation.integer"),
            "same" => __("User::validation.same"),

        ];
    }
}
