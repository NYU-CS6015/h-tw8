<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('taskId');
            $table->integer('residenceId');
            $table->integer('userId');
            $table->integer('isTakenById');
            $table->string('title');
            $table->text('description');
            $table->integer('bounty');
            $table->dateTime('releaseDate');
            $table->date('deadline');
            $table->string('comments');
            $table->boolean('isActive')->default(TRUE);
            $table->boolean('isTaken')->default(FALSE);
            $table->boolean('isCompleted')->default(FALSE);
            $table->boolean('isBounty')->default(FALSE);
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
        Schema::drop('tasks');
    }
}
