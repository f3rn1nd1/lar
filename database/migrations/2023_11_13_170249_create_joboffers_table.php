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
        //fields are the following
        //protected $fillable = ['user_rut', 'puesto', 'requirements_json', 'empresa', 'descripcion'];

        Schema::create('job_offers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('user_rut');
            $table->unsignedInteger('choosen_one')->nullable();
            $table->string('puesto', 255);
            $table->json('requirements_json');
            $table->string('empresa', 255);
            $table->string('descripcion', 255);
            $table->foreign('choosen_one')->references('rut')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_rut')
                ->references('rut')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_offers');
    }
};
