<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('sections', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("slug")->unique();
            $table->string("title");
            $table->text("content");
            $table->foreignId('page_ID',)
                ->constrained("pages")
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
          Schema::dropIfExists('section');
    }
}
