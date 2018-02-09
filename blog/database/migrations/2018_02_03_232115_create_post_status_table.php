<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_status', function (Blueprint $table) {
            $table->increments('id');
            $table->text('type');
        });
        DB::table('post_status')->insert(['type'=>'current']);
        DB::table('post_status')->insert(['type'=>'drafted']);
        DB::table('post_status')->insert(['type'=>'updated']);
        DB::table('post_status')->insert(['type'=>'removed']);
        DB::table('post_status')->insert(['type'=>'archived']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_status');
    }
}
