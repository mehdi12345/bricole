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
        Schema::table('settings_appearance', function (Blueprint $table) {
            $table->text('custom_fonts')->nullable();
            $table->string('font_name', 120)->default("Heebo, Noto Kufi Arabic");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings_appearance', function (Blueprint $table) {
            $table->dropColumn('custom_fonts');
            $table->dropColumn('font_name');
        });
    }
};
