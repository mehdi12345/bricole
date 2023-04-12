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
        Schema::create('requirement_demandes', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->string('descreption', 755);
            $table->date('dateTo');
            $table->date('dateForm');
            $table->double('price');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('gig_id');
            $table->unsignedBigInteger('id_document');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('gig_id')->references('id')->on('gigs');
            $table->foreign('id_document')->references('id')->on('file_manager');

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
        Schema::dropIfExists('requirement_demandes');
    }
};
