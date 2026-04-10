<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::dropIfExists('ruangan_images');
}

public function down()
{
    Schema::create('ruangan_images', function (Blueprint $table) {
        $table->id();
        $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete('cascade');
        $table->string('image');
        $table->timestamps();
    });
}
};
