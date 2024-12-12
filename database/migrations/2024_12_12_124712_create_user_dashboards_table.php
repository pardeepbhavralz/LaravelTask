<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_dashboards', function (Blueprint $table) {
            $table->id();
                    $table->string(column: 'name');    
                    $table->string(column: 'email');
                    $table->string(column: 'address');
                    $table->string(column: 'phone');
                    $table->boolean(column: 'gender')->default(1)->comment('1=male,0=female');
                    $table->string(column: 'country');
                    $table->string(column: 'city');
                    $table->string(column: 'skills');
                    $table->timestamp('image')->nullable();
                    $table->string(column: 'note');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dashboards');
    }
};
