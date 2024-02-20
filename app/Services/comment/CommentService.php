<?php

namespace App\Services\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentService
{
    public function create($data, $request)
    {
        try{
            DB::beginTransaction();
            $data['user_id'] = auth()->user()->id;
            $data['request_id'] = $request->id;
            Comment::firstOrCreate($data);
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return false;
        }
        return true;
    }
}
