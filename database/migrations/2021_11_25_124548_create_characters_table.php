<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreign('player_id')->references('id')->on('players');
            $table->unsignedBigInteger('player_id');
            $table->string('name');
            $table->string('race');
            $table->string('metier_name');
            $table->integer('level')->default(1);
            $table->integer('strength')->default(8);
            $table->integer('dexterity')->default(8);
            $table->integer('constitution')->default(8);
            $table->integer('intellect')->default(8);
            $table->integer('wisdom')->default(8);
            $table->integer('charisma')->default(8);
            $table->text('avatar');
            $table->integer('health');
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
        Schema::dropIfExists('characters');
    }
}
