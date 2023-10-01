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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_name');
            $table->integer('vacancy')->unsigned()->default(1);
            $table->longText('description');
            $table->longText('company_details');
            $table->text('short_experience_requirements');
            $table->longText('experience_requirements');
            $table->longText('educational_requirements');
            $table->longText('additional_requirements');
            $table->text('job_location');
            $table->string('salary');
            $table->longText('benefits');
            $table->string('age');
            $table->json('gender');
            $table->longText('apply_instruction');
            $table->longText('apply_procedure');
            $table->string('deadline');
            $table->boolean('is_active')->default(false);
            $table->boolean('has_online_apply')->default(true);
            
            $table->timestamps();

            // Foreign Key
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
          
            // Relationship
            //------------------------------------
            // job type
            // job category
            // experience level
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
