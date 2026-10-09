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
        Schema::create("article_build", function (Blueprint $table) {
            $table->unsignedBigInteger("article_id");
            $table->unsignedBigInteger("build_id");
            $table->primary(["article_id", "build_id"]);
            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");
            $table->foreign("build_id")->references("id")->on("builds")->onDelete("cascade");
        });

        Schema::create("article_solution", function (Blueprint $table) {
            $table->unsignedBigInteger("article_id");
            $table->unsignedBigInteger("solution_id");
            $table->primary(["article_id", "solution_id"]);
            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");
            $table->foreign("solution_id")->references("id")->on("solutions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("article_solution");
        Schema::dropIfExists("article_build");
    }
};
