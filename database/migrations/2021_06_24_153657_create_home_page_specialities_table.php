<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_specialities', function (Blueprint $table) {
            $table->id();
            $table->text('title_1');
            $table->text('subtitle_1');
            $table->text('title_2');
            $table->text('subtitle_2');
            $table->text('title_3');
            $table->text('subtitle_3');
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
        Schema::dropIfExists('home_page_specialities');
    }
}
