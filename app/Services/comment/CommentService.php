<?php

namespace App\Services\Comment;

use App\Models\Comment;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommentService
{
    public function create($data, $request)
    {
        if(isset($data['files'])) {

            $paths = $data['files'];

            unset($data['files']);
        }

        if ($request->type_id == 1) {

            $folderPath = 'request/tt-';

        } else {

            $folderPath = 'other/tt-';

        }


        try{

            DB::beginTransaction();

            $data['user_id'] = auth()->user()->id;

            $data['request_id'] = $request->id;

            $comment = Comment::firstOrCreate($data);

            if (isset($paths)) {

                $files['comment_id'] = $comment->id;

                foreach ($paths as $path) {

                    $files['name'] = $path->getClientOriginalName();

                    $files['extension'] = $path->extension();

                    $files['path'] = Storage::disk('public')->put($folderPath . $data['request_id'], $path);

                    File::create($files);

                }

            }

            DB::commit();

        } catch(\Exception $exception){

            DB::rollBack();

            return false;
        }

        return true;
    }
}
