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
        // Remove all existing categories
        DB::table('categories')->delete();
        // Add new categories
        $categories = [
            'Fruits',
            'Vegetables',
            'Dairy Products',
            'Meat & Poultry (Raw)',
            'Fish & Seafood (Fresh)',
            'Grains & Cereals',
            'Nuts & Seeds',
            'Herbs & Spices (Fresh)',
            'Legumes',
            'Eggs',
            'Oils (Edible)',
            'Flours & Baking Ingredients',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
