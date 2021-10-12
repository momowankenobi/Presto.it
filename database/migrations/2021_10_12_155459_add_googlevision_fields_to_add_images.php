<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGooglevisionFieldsToAddImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('labels')->nullable();            
            $table->string('adult')->nullable();
            $table->string('spoof')->nullable();
            $table->string('medical')->nullable();
            $table->string('violence')->nullable();
            $table->string('racy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn(['labels', 'adult', 'spoof', 'medical', 'violence', 'racy']);
        });
    }
}
