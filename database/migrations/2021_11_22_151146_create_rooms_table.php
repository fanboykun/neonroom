<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('lecturer_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->required();
            $table->foreignId('lecturer_id')->nullable();
            $table->string('name')->required();
            $table->string('study')->required();
            $table->time('hour')->required();
            $table->foreignId('year_id')->nullable();
            $table->string('semester')->required();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('rooms');
        Schema::enableForeignKeyConstraints();
    }
}
