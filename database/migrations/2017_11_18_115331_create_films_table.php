<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->integer('author')->default(1)->unsigned();
            $table->string('title');
            $table->text('exceprt');
            $table->string('image')->default('http://localhost:8000/background.jpg');
            $table->string('video')->default('http://localhost:8000/background.jpg');
            $table->enum('country', ['США', 'Россия', 'Индия', 'Франция', 'Англия'])->default('США');
            $table->enum('bloor', ['HDRip', 'TS'])->default('HDRip');
            $table->enum('translate', ['Профессиональный (многоголосый)', 'Дублированный'])->default('Профессиональный (многоголосый)');
            $table->time('long');
            $table->integer('year_date');
            $table->date('premier_date');
            $table->string('director')->nullable();
            $table->text('roles')->nullable();
            $table->integer('views')->default(0);

            $table->timestamps();

            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
