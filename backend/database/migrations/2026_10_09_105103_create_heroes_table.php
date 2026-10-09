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
        Schema::create("heroes", function (Blueprint $table) {
            $table->id();
            $table->enum("type", ["BUILD", "SOLUTION", "CUSTOM"]);
            $table->unsignedInteger("reference_id")->nullable();
            $table->string("title_override")->nullable();
            $table->string("description_override")->nullable();
            $table->string("image_override")->nullable();
            $table->integer("sort_order")->default(0);
            $table->boolean("is_active")->default(true);
            $table->timestamp("starts_at")->nullable();
            $table->timestamp("ends_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("heroes");
    }
};
