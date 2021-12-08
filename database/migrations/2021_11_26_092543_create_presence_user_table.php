<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresenceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presence_user', function (Blueprint $table) {
            $table->foreignId('presence_id')->constrained('presences')->onDelete('cascade')->onUpdate('cascade')->required();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->required();
            $table->dateTime('checked_at')->required();
            $table->primary(['presence_id', 'user_id']);
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
        Schema::dropIfExists('presence_user');
        Schema::enableForeignKeyConstraints();
    }
}
