<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('ads', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('description')->nullable();
      $table->float('price', 12, 2);
      $table->boolean('is_negotiable');
      $table->string('image_path')->nullable();
      $table->boolean('is_active')->default(0);
      $table->timestamp('expire_at')->nullable();
      $table->boolean('is_approved')->default(0);
      $table->boolean('is_premium')->default(0);
      $table->foreignId('city_id');
      $table->foreignId('sub_category_id')->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreignId('user_id')->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->softDeletes();
      $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('ads');
  }
};
