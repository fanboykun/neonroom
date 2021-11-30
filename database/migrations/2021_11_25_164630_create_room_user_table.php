<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_user', function (Blueprint $table) {
            $table->foreignId('room_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->required();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->required();
            $table->primary(['room_id', 'user_id']);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('room_user');
        Schema::enableForeignKeyConstraints();
    }
}
