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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('location');
            $table->string('type');
            $table->string('purpose');
            $table->string('price', 8, 2);
            $table->longtext('description');
            $table->string('website')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('outdoor_image')->nullable();
            $table->string('bathroom_image')->nullable();
            $table->string('kitchen_image')->nullable();
            $table->string('bedroom_image')->nullable();
            $table->string('living_image')->nullable();
            $table->string('other_image')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('properties');
    }
};
