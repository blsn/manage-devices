<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('role_id'); // same type of id
            // $table->unsignedBigInteger('user_id'); // same type of id

            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('role_id')->constrained()->onDelete('cascade'); // plural beforeLast is roles
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // plural beforeLast is users

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');

        // Schema::table('role_user', function(Blueprint $table) {
        //     $table->dropForeign('role_user_role_id_foreign');
        //     $table->dropForeign('role_user_user_id_foreign');
        // });
    }
}
