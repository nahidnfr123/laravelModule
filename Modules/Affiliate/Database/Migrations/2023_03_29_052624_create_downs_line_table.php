<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('down_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referring_id')->constrained('affiliates')->onDelete('cascade');
            $table->foreignId('referred_id')->constrained('affiliates')->onDelete('cascade');
            $table->string('commission');
            $table->string('level');
            $table->timestamps();
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
        Schema::dropIfExists('down_line');
    }
};
