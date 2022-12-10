<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateAddressRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use mysql_xdevapi\Exception;

class ProfileController extends Controller
{
    public function show()
    {
        return ProfileResource::make(auth()->user());
    }

    public function update(UpdateRequest $request){
        try{
            $data = $request->validated();
            $user = auth()->user();
            $user->update($data);

            return json_encode(['result'=>'success']);
        }
        catch (Exception $e){
            return json_encode(['result'=>'error', 'message'=>$e]);
        }
    }

    public function updateAddress(UpdateAddressRequest $request){
        try{
            $data = $request->validated();
            $user = auth()->user();
            $user->update($data);

            return json_encode(['result'=>'success']);
        }
        catch (Exception $e){
            return json_encode(['result'=>'error', 'message'=>$e]);
        }
    }
}
