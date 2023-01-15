<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('active')->default(0);
            $table->string('url')->nullable()->unique();
            $table->string('title')->nullable();
            $table->string('H1')->nullable();
            $table->dateTime('date_start', $precision = 0)->nullable();
            $table->dateTime('date_end', $precision = 0)->nullable();
            $table->string('preview')->nullable();
            $table->string('preview_alt')->nullable();
            $table->text('preview_text')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
