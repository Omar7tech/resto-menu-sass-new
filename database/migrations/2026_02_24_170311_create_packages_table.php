<?php use App\Enums\PackageType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedTinyInteger('type')->default(PackageType::CUSTOM->value)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('max_categories')->default(0);
            $table->integer('max_products')->default(0);
            $table->boolean('can_add_images')->default(false);
            $table->boolean('can_add_tags')->default(false);
            $table->boolean('has_multi_branches')->default(false);
            $table->integer('max_branches')->default(0);
            $table->boolean('can_add_to_cart')->default(false);
            $table->boolean('can_have_social_media')->default(false);
            $table->boolean('can_edit_theme')->default(false);
            $table->boolean('remove_branding')->default(false);
            $table->boolean('featured')->default(false);
            $table->decimal('yearly_price', 10, 2);
            $table->decimal('discount_yearly_price', 10, 2)->nullable();
            $table->integer('sort')->default(0)->index();
            $table->decimal('setup_fees', 10, 2);
            $table->decimal('discount_setup_fees', 10, 2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};