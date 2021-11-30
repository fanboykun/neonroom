<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_user', function (Blueprint $table) {
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade')->onUpdate('cascade')->required();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->required();
            $table->primary(['assignment_id', 'user_id']);
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
        Schema::dropIfExists('assignment_user');
        Schema::enableForeignKeyConstraints();
    }
}
