<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 80)->index()->nullable();
            $table->text('description')->nullable();
            $table->unsignedMediumInteger('sort')->nullable();
            $table->string('url', 255)->nullable();
            $table->string('image', 80)->nullable();
            $table->boolean('feature_status')->index()->default(0)->nullable(false);
            $table->boolean('status')->index()->default(1)->nullable(false);
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
        Schema::dropIfExists('brands');
    }
}
