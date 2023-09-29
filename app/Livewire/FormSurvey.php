<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormSurvey extends Component
{

    use WithFileUploads;

    public string $name;
    public string $second_name;
    public string $surname;
    public string $date_brith;
    public string $email;
    public $phone_code = [];
    public $phones = [null];
    public string $family;
    public string $about_me;
    public $image;
    public $checkrul;

    protected $rules = [
        'name' => 'required|max:20|string|min:4',
        'second_name' => 'required|max:20|string|min:4',
        'surname' => 'max:20',
        'date_brith' => 'required|date',
        'email' => 'email',
        'phone_code' => '',
        'phones' => ['array', 'min:1', 'max:5'],
        'phones.*' => ['integer'],
        'family' => '',
        'about_me' => 'max:1000',
        'image' => 'max:5|max:5mb|types:jpg,png,pdf|multiple',
        'checkrul' => 'required',
    ];

    protected $messages = [
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

    public function updated($propertyName)
    { 

        $this->validateOnly($propertyName);
        
    }

    public function addPhone()
    {
        $this->phones[] = null;
    }

    public function render()
    {
        return view('livewire.form-survey')->extends('layouts.main');
    }
}
