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
        Schema::create('mass_messages', function (Blueprint $table) {
            $table->id();
            
            
              $table->string('customer_tags');
                      $table->string('message');
           $table->string('status');
                      $table->string('scheduled_at');
                $table->string('user_id');
                      
                      
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
        Schema::dropIfExists('mass_messages');
    }
};
