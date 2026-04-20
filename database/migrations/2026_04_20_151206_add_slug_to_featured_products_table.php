<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('featured_products', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Populate slugs for existing records
        $products = DB::table('featured_products')->get();
        foreach ($products as $product) {
            $slug = Str::slug($product->title);
            
            // Ensure uniqueness if multiple products have the same title
            $originalSlug = $slug;
            $count = 1;
            while (DB::table('featured_products')->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            
            DB::table('featured_products')->where('id', $product->id)->update(['slug' => $slug]);
        }

        // Now make it unique and not nullable
        Schema::table('featured_products', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('featured_products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
