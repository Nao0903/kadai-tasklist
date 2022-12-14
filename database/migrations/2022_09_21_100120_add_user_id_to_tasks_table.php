<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            
            $table->unsignedBigInteger('user_id');
            
            //外部キー制約をつける
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //外部キー制約の解除
            //$table->foreign(外部キー制約を設定するカラム名)->references(参照されるカラム名)->on(参照されるテーブル名);
            $table->dropforeign('tasks_user_id_foreign');
            
            $table->dropColumn('user_id');//
        });
    }
}
