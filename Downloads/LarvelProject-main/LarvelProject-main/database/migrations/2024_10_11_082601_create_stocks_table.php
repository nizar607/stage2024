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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('quantity', 10, 2);
            $table->enum('unit', ['kg', 'liter', 'item', 'piece']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_stocks');
    }
};
