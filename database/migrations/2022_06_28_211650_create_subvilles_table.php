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
        Schema::create('subvilles', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->unsignedBigInteger('parent_id');
            $table->string('name', 60)->unique();
            $table->timestamps();
            $table->string('slug', 60)->unique();

            $table->foreign('parent_id')->references('id')->on('villes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subvilles');
    }
};
