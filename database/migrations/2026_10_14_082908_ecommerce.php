<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->text('address');
            $table->string('postal_code');
            $table->string('phone_number');
            $table->string('email');
            $table->string('name');
            $table->boolean('is_default')->default(false);
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('size_id')->nullable()->constrained()->onDelete('set null');
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->enum('status', ['draft', 'active', 'inactive'])->default('active');
            $table->integer('views')->default(0);
            $table->integer('sold_count')->default(0);
        });

        Schema::create("orders", function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("address_id")->constrained("address")->cascadeOnDelete();
            $table->enum("status", ["pending", "processing", "shipped", "delivered", "cancelled"])->default("pending");
            $table->decimal("total_price", 10, 2);
            $table->decimal("delivery_charge", 10, 2);
            $table->decimal("sub_total", 10, 2);
            $table->decimal("discount", 10, 2);
            $table->decimal("vat", 10, 2);
            $table->decimal("grand_total", 10, 2);
        });

        Schema::create("order_items", function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->foreignId("order_id")->constrained()->cascadeOnDelete();
            $table->foreignId("product_id")->constrained()->cascadeOnDelete();
            $table->integer("quantity");
            $table->decimal("price", 10, 2);
            $table->decimal("discount_price", 10, 2)->nullable();
            $table->decimal("total_price", 10, 2);
            $table->string("image")->nullable();
            $table->json("images")->nullable();
            $table->enum("status", ["pending", "processing", "shipped", "delivered", "cancelled"])->default("pending");
            $table->integer("views")->default(0);
            $table->integer("sold_count")->default(0);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
};
