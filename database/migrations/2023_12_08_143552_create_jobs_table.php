<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('position')->nullable();
            $table->string('location')->nullable();
            $table->string('industry')->nullable();
            $table->string('job_type')->nullable();
            $table->string('experience_level')->nullable();

            $table->bigInteger("company_id")->unsigned();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
