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
        Schema::table('restaurants', function (Blueprint $table) {
            $table->enum('status', ['approved', 'pending'])->default('pending'); // Adding the status column
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Adding user_id as a foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
