<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('content');
            $table->string('creater', 50);
            $table->date('created')->default(DB::raw('(CURRENT_DATE)'));
            $table->boolean('memberonly');
            $table->enum('categories', 
              ['Tech news', 'Software reviews', 'Hardware reviews', 'Opinion pieces']);
	    $table->index('categories');
	    $table->index('created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
