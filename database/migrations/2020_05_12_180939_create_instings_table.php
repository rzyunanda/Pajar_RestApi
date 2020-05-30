<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstingsTable extends Migration
{

    public function __construct()
    {
        \Illuminate\Support\Facades\DB::getDoctrineSchemaManager()
        ->getDatabasePlatform()->registerDoctrineTypeMapping('point', 'string');
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->nullable();
            $table->string('materi')->nullable();
            $table->string('status')->nullable();
            $table->string('url_video')->nullable();
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
        Schema::dropIfExists('instings');
    }
}
