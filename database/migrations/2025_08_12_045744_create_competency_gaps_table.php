<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('competency_gaps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('competency_id');
            $table->integer('required_level');
            $table->integer('current_level');
            $table->integer('gap');
            $table->text('gap_description')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onDelete('cascade');

            $table->foreign('competency_id')
                ->references('id')
                ->on('competency_library')
                ->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('competency_gaps');
    }
};
