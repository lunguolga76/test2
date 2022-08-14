<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('education');
            $table->text('work');
            $table->text('experience');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `cvs` ADD FULLTEXT INDEX cv_index (experience, work, education)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cvs', function($table) {
            $table->dropIndex('cv_index');
        });
        Schema::dropIfExists('cvs');
    }
}
