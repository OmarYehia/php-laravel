<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->bigInteger('commentable_id');
            $table->bigInteger('commenter_id');
            $table->string('commentable_type')->nullable();
            $table->string('commenter_type')->nullable();
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
        Schema::dropIfExists('third_comments');
    }
}
