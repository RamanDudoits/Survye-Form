<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Image;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class SurveyController extends BaseController
{
    public function index(SurveyRequest $request)
    {
        
        $validated = $request->validated();
        //dd($validated);
        $user = $this->service->createUser($validated);

        /* Если бы я разобрался почему не грузятся файлы через ajax я бы сохранял их таким образом*/
        if (false/*$user->id*/) {
            $this->service->saveImage($request, $user);
        }
        

        if ($user->id) {
            $this->service->savePhone($validated, $user);
        }

        return view('success');
        
    }
}
