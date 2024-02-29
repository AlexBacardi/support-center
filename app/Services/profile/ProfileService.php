<?php

namespace App\Services\Profile;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileService
{
    public function update($data, $user)
    {

        try {

            DB::beginTransaction();

            $data['user_id'] = auth()->user()->id;

            if(isset($data['avatar'])) {

                $data['avatar'] = Storage::disk('public')->put('avatars/userId-' . $user->id, $data['avatar']);

            }

            $user->profile()->update($data);

            DB::commit();

        } catch (\Exception $exeption) {

            DB::rollBack();

            return false;

        }

        return true;
    }
}
