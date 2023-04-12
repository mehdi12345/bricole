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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gig_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('created_at');
            $table->integer('seller_id');
            $table->integer('id_requirment');
            $table->enum('status', ['pending', 'active'])->default('pending');

            $table->foreign('gig_id')->references('id')->on('gigs');
            // $table->foreign('id_requirment')->references('id')->on('requirement_demandes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
};
