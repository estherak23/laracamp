<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_benefits', function (Blueprint $table) {
            $table->id();
            //first method foregn key
            //untuk foregn key ditambah champ_id nya disesuai ama yg didatabase
            //bigint dan unsign
            //versi sederhana
            //$table->unsignedBigInteger('camp_id');

            //second method tapi syaratnya nama harus sama dengan nama table nya 
            //$table->foreignId('camp_id')->constrained();
            $table->bigInteger('camp_id')->unsigned();
            $table->string('name');
            $table->timestamps();


             //first method foregn key
            $table->foreign('camp_id')->references('id')->on('camps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camp_benefits');
    }
}
