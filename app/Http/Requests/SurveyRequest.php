<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:20|string|min:4',
            'second_name' => 'required|max:20|string|min:4',
            'surname' => 'max:20',
            'date_brith' => 'required|date',
            'email' => 'email',
            'phone_code0' => 'string',
            'phone_code1' => 'string',
            'phone_code2' => 'string',
            'phone_code3' => 'string',
            'phone_code4' => 'string',
            'phones0' => 'integer|min:9',
            'phones1' => 'integer|min:9',
            'phones2' => 'integer|min:9',
            'phones3' => 'integer|min:9',
            'phones4' => 'integer|min:9',
            'family' => '',
            'about_me' => 'max:1000',
            'image' => 'max:5|image:jpg,png,pdf|size:512',
            'checkrul' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Имя должно быть больше 4 символов',
            'name.required' => 'Поле имя должно быть заполнено',
            'name.string' => 'Поле имя должно состоять только из букв',
            'name.max' => 'Имя должно быть не больше 20 символов',
            'second_name.min' => 'Фамилия должно быть больше 4 символов',
            'second_name.required' => 'Поле Фамилия должно быть заполнено',
            'second_name.string' => 'Поле Фамилия должно состоять только из букв',
            'second_name.max' => 'Фамилия должно быть не больше 20 символов',
            'surname.min' => 'Отчество должно быть больше 4 символов',
            'surname.max' => 'Поле Отчество должно быть не больше 20 символов',
            'surname.string' => 'Поле Отчество должно состоять только из букв',
            'date_brith.required' => 'Поле дата рождения должно быть заполнено',
            'email.email' => 'Поле email должно содержать символ @',
            'phones.*.integer' => 'Поле телефон должно стостоять только из цифр',
            'about_me.max' => 'Поле обо мне должно быть не больше 1000 символов',
            'about_me.min' => 'Поле обо мне должно быть больше 4 символов',
            'image.types' => 'фалы могут быть форматов jpg,png,pdf',
            'checkrul.required' => 'должно быть обязательно заполнено',
        ];
    }
}
