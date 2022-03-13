<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("email")->unique();
            $table->string("phone_number")->nullable();
            $table->string("username");
            $table->unsignedInteger("added_by")->nullable();
            $table->enum("user_type",["admin","user"])->default("user");
            $table->enum("status",["active","banned"])->default("active");
            $table->unsignedBigInteger("admin_role_id")->nullable();
            $table->timestamps();
            $table->foreign('admin_role_id')->references('id')->on('admin_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}