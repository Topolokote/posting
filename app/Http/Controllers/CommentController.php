<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
    //Post user comment without a Comment Model
    public function postComment(Request $request){
        $commentId=DB::table('comments')->insertGetId([
            'username' => $request->username,
            'text' => $request->text,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if($request->commentId)
            DB::table('comments')
            ->where('id',$commentId)
            ->update(['comment_id'=> $request->commentId]);
        
        return DB::table('comments')->where('id',$commentId)->get()[0];
    }

    //Get comment list
    public function getComments(Request $request){
        return DB::table('comments')
                ->when($request->commentId,function($query,$commentId){
                    $query->where('comment_id',$commentId);
                })
                ->when(!$request->commentId,function($query,$commentId){
                    $query->whereNull('comment_id');
                })
                ->orderBy('created_at','desc')->get();
    }
}
