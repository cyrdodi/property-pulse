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
    Schema::create('organizations', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('acronym');
      $table->timestamps();
      $table->softDeletes();
    });



    Schema::create('platforms', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('type');
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::create('categories', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::create('applications', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name');
      $table->text('description');
      $table->json('person_in_charge');
      $table->json('developer');
      $table->string('url')->nullable();
      $table->unsignedBigInteger('organization_id');
      $table->unsignedBigInteger('platform_id');
      $table->unsignedBigInteger('user_id');
      $table->timestamps();

      $table->foreign('organization_id')->references('id')->on('organizations');
      $table->foreign('platform_id')->references('id')->on('platforms');
      $table->foreign('user_id')->references('id')->on('users');
      $table->softDeletes();
    });

    Schema::create('application_category', function (Blueprint $table) {
      $table->uuid('application_id');
      $table->unsignedBigInteger('category_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    //
    Schema::dropIfExists('organizations');
    Schema::dropIfExists('platforms');
    Schema::dropIfExists('categories');
    Schema::dropIfExists('applications');
  }
};
