<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomebannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homebanners', function (Blueprint $table) {
            $table->id();
            $table->string('position', 1);
            $table->string('color', 1);
            $table->string('title_eng', 80);
            $table->text('text_eng');
            $table->string('title_nl', 80);
            $table->text('text_nl');
            $table->mediumText('image')->nullable();
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
        Schema::dropIfExists('homebanners');
    }
}
