<?php
namespace App\Service;

use App\Models\Image;
use App\Models\Phone;
use App\Models\User;

class Service
{

    public function createUser($data) : User
    {
        return $user = User::create([
            'name' => $data['name'],
            'second_name' => $data['second_name'],
            'surname' => isset($data['surname']) ? $data['surname'] : '',
            'date_brith' => isset($data['date_brith']) ? $data['date_brith'] : '',
            'email' => isset($data['email']) ? $data['email'] : '',
            'family' => isset($data['family']) ? $data['family'] : '',
            'about_me' => isset($data['about_me']) ? $data['about_me'] : '',
            'checkrul' => $data['checkrul'] == 'on' ? 1 : 0,

        ]);
    }

    public function saveImage($request, User $user) : void
    {
        if ($request->file('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('uploads', 'public');
                $file = Image::create([
                    'path' => $path,
                    'user_id' => $user->id,
                ]);
            }
        }
    }

    public function savePhone($validated, User $user): void
    {
        $indexC = 0;
        $indexP = 0;
        $phones = [];
        foreach ($validated as $key => $value) {

            if (substr_count($key, $indexC)) {
                $phones[$indexC] = $value;
                $indexC++;
                continue;
            }
            if (substr_count($key, $indexP)) {
                $phones[$indexP] = $phones[$indexP] . $value;
                $indexP++;
                continue;
            }
        }

        if (count($phones) > 0) {
            foreach ($phones as $phone) {

                $createPhone = Phone::create([
                    'phone' => $phone,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
    
}
