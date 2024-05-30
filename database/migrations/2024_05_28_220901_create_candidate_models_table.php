<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('mission');
            $table->string('vision');
            $table->string('name');
            $table->unsignedBigInteger('voteCount');
            $table->string('profilePicture');
            $table->unsignedBigInteger('electionId');
            $table->foreign('electionId')->references('id')->on('election_models')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_models');
    }
};
