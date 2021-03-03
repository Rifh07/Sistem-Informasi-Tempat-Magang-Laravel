<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Internship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->unsignedInteger('kuota');
            $table->unsignedInteger('apply');
            $table->string('kategori', 100);
            $table->text('deskripsi', 1000);
            $table->string('companies', 2);
            $table->string('create_by', 30);
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
        Schema::dropIfExists('internship');
    }
}
