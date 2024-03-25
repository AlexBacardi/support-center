<?php

namespace App\Services\Admin\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function update($data, $user)
    {

        try {

            DB::beginTransaction();

            $data['user_id'] = $user->id;

            if(isset($data['avatar'])) {

                $data['avatar'] = Storage::disk('public')->put('avatars/userId-' . $user->id, $data['avatar']);

            }

            if(isset($data['name']) and isset($data['role_id'])) {

                $dataUser['name'] = $data['name'];

                $dataUser['role_id'] = $data['role_id'];

                unset($data['name']);

                unset($data['role_id']);

            }


            if(isset($data['banned_until']) or is_null($data['banned_until'])) {

                $dataUser['banned_until'] = $data['banned_until'];

                unset($data['banned_until']);

            }

            $user->update($dataUser);

            $user->profile()->update($data);

            DB::commit();

        } catch (\Exception $exeption) {

            DB::rollBack();

            return false;

        }

        return true;
    }
}
