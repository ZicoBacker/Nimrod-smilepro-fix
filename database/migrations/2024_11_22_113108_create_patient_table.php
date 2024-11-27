<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->string('number');
            $table->text('medical_file')->nullable();
            $table->boolean('is_active');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('person');
        });
        DB::statement('ALTER TABLE patient MODIFY is_active BIT(1)default 1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient');
    }
};
