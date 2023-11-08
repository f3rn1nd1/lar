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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->text('abilities');
            $table->timestamp('last_used_at')->nullable();
            $table->string('token', 1000); // Limit the token column to 1000 characters
            $table->timestamps();
            
            // Create an index with a specified maximum key length
            $table->index(['tokenable_type', 'tokenable_id'], 'tokenable_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
