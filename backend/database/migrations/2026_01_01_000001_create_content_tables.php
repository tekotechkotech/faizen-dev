<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('builds', function (Blueprint $t) {
      $t->id(); $t->string('title'); $t->string('slug')->unique();
      $t->enum('status', ['DRAFT','COMING_SOON','BETA','AVAILABLE','ARCHIVED'])->default('DRAFT');
      $t->text('summary')->nullable(); $t->text('context')->nullable(); $t->json('features')->nullable();
      $t->text('result')->nullable(); $t->timestamps();
    });
    Schema::create('solutions', function (Blueprint $t) {
      $t->id(); $t->string('name'); $t->string('slug')->unique();
      $t->enum('status', ['DRAFT','COMING_SOON','BETA','AVAILABLE','ARCHIVED'])->default('DRAFT');
      $t->string('pricing',100)->nullable(); $t->string('url',500)->nullable(); $t->timestamps();
    });
    Schema::create('services', function (Blueprint $t) {
      $t->id(); $t->string('title'); $t->string('slug')->unique();
      $t->enum('status', ['ACTIVE','INACTIVE','ARCHIVED'])->default('ACTIVE'); $t->timestamps();
    });
    Schema::create('articles', function (Blueprint $t) {
      $t->id(); $t->string('title'); $t->string('slug')->unique();
      $t->enum('status', ['DRAFT','PUBLISHED','ARCHIVED'])->default('DRAFT');
      $t->string('category',100)->nullable(); $t->mediumText('content')->nullable(); $t->timestamps();
    });
    Schema::create('hero_slides', function (Blueprint $t) {
      $t->id(); $t->enum('type', ['BUILD','SOLUTION','CUSTOM']);
      $t->unsignedBigInteger('reference_id')->nullable();
      $t->boolean('is_active')->default(true); $t->dateTime('starts_at')->nullable(); $t->dateTime('ends_at')->nullable(); $t->timestamps();
    });
    Schema::create('media', function (Blueprint $t) {
      $t->id(); $t->string('filename'); $t->string('path',500); $t->string('mime_type',100)->nullable(); $t->unsignedBigInteger('size')->nullable(); $t->timestamps();
    });
    Schema::create('inquiries', function (Blueprint $t) {
      $t->id(); $t->enum('intent', ['existing','custom','partnership','other']);
      $t->string('name',100); $t->enum('contact_type', ['email','whatsapp']); $t->string('contact_value');
      $t->text('brief_description'); $t->string('status',50)->default('new'); $t->timestamps();
    });
    Schema::create('company_settings', function (Blueprint $t) {
      $t->unsignedBigInteger('id')->primary()->default(1); $t->string('company_name')->nullable();
      $t->string('tagline')->nullable(); $t->text('description')->nullable();
      $t->string('logo',500)->nullable(); $t->string('favicon',500)->nullable();
      $t->string('email')->nullable(); $t->string('phone',50)->nullable(); $t->text('address')->nullable(); $t->json('social_media')->nullable(); $t->timestamps();
    });
    Schema::create('article_build', function (Blueprint $t) { $t->foreignId('article_id')->constrained()->cascadeOnDelete(); $t->foreignId('build_id')->constrained()->cascadeOnDelete(); $t->primary(['article_id','build_id']); });
    Schema::create('article_solution', function (Blueprint $t) { $t->foreignId('article_id')->constrained()->cascadeOnDelete(); $t->foreignId('solution_id')->constrained()->cascadeOnDelete(); $t->primary(['article_id','solution_id']); });
  }
  public function down(): void {
    Schema::dropIfExists('article_solution'); Schema::dropIfExists('article_build');
    Schema::dropIfExists('company_settings'); Schema::dropIfExists('inquiries'); Schema::dropIfExists('media');
    Schema::dropIfExists('hero_slides'); Schema::dropIfExists('articles'); Schema::dropIfExists('services');
    Schema::dropIfExists('solutions'); Schema::dropIfExists('builds');
  }
};
