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
        Schema::table('post_detail', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('posts');
            $table->index('post_id', 'post_post_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_detail', function (Blueprint $table) {
            $table->dropIndex('post_id');
            $table->dropForeign('post_id');
            $table->dropColumn('post_id');
        });
    }
};
