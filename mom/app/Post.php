<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function first() {
        return Post::find(DB::table('posts')->max('id'));
        //return Post::Where('id', Post::Raw("(select max(`id`))"));
    }
    public static function last() {
        return Post::find(DB::table('posts')->min('id'));
        //return Post::Where('id', Post::Raw("(select min(`id`))"));
    }
}
