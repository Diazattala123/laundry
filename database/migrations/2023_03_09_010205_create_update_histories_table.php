<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('update_histories', function (Blueprint $table) {
            $table->id();
            $table->text("context")->nullable(false);
            $table->string("reference_id",100);
            $table->string("reference_type",100);
            $table->enum("contextType",["JSON"]);
            $table->enum("actionType",["INSERT","UPDATE","DELETE"]);
            $table->unsignedBigInteger("user_id")->nullable(true);
            $table->string("fullname",100)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_histories');
    }
};
