<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDogsTables extends Migration
{
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            // feel free to modify the name of this column, but title is supported by default (you would need to specify the name of the column Twill should consider as your "title" column in your module controller if you change it)
            //$table->string('title', 200)->nullable();

            $table->string('name', 200)->nullable();

            $table->integer('sire_id')->nullable();
            $table->integer('dam_id')->nullable();

            $table->string('callname', 32)->nullable();
            $table->char('sex')->default('m');
            $table->date('dob')->nullable();
            $table->string('pretitle', 32)->nullable();
            $table->string('posttitle', 32)->nullable();
            $table->string('reg', 64)->nullable();
            $table->string('color', 64)->nullable();
            $table->string('markings', 64)->nullable();
            $table->string('image_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('website')->nullable();
            $table->string('breeder')->nullable();
            $table->string('owner')->nullable();


            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('dog_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'dog');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dog_revisions');
        Schema::dropIfExists('dogs');
    }
}
