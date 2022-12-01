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
        Schema::table('posts', function (Blueprint $table) {
            $table -> string('image', 100) -> nullable();
            //nullable()はNULL値を許容
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
