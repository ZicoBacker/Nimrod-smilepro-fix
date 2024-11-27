<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('communication', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('employee_id');
            $table->text('message');
            $table->date('sent_date');
            $table->boolean('is_active');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('employee_id')->references('id')->on('employee');
        });
        DB::statement('ALTER TABLE communication MODIFY is_active BIT(1)default 1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication');
    }
};
