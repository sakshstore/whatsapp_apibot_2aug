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
        Schema::create('meta_apps', function (Blueprint $table) {
            $table->id();
            
            
                $table->string('name');
                      $table->string('from_phone_number');
                      $table->string('from_phone_number_id');
                      $table->string('access_token');
                      
                      
               $table->string('status');  
               $table->string('delete_protected')->default("Free");   
                      
                      
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
        Schema::dropIfExists('meta_apps');
    }
};
