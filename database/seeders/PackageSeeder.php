<?php

namespace Database\Seeders;

use App\Enums\PackageType;
use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'type' => PackageType::PUBLIC->value,
                'is_active' => true,
                'featured' => false,
                'description' => 'Perfect for small businesses and startups getting started with digital menus.',
                'yearly_price' => 99.99,
                'setup_fees' => 49.99,
                'max_categories' => 5,
                'max_products' => 50,
                'max_branches' => 1,
                'can_add_images' => true,
                'can_add_tags' => true,
                'has_multi_branches' => false,
                'can_add_to_cart' => false,
                'can_have_social_media' => false,
                'can_edit_theme' => false,
                'remove_branding' => false,
                'sort' => 1,
                'meta' => [
                    'target_audience' => 'Small businesses',
                    'support_level' => 'Email support',
                    'trial_days' => 14
                ],
            ],
            [
                'name' => 'Silver',
                'slug' => 'silver',
                'type' => PackageType::PUBLIC->value,
                'is_active' => true,
                'featured' => true,
                'description' => 'Ideal for growing restaurants and chains with multiple locations.',
                'yearly_price' => 299.99,
                'discount_yearly_price' => 249.99,
                'setup_fees' => 99.99,
                'discount_setup_fees' => 49.99,
                'max_categories' => 20,
                'max_products' => 500,
                'max_branches' => 5,
                'can_add_images' => true,
                'can_add_tags' => true,
                'has_multi_branches' => true,
                'can_add_to_cart' => true,
                'can_have_social_media' => true,
                'can_edit_theme' => false,
                'remove_branding' => false,
                'sort' => 2,
                'meta' => [
                    'target_audience' => 'Growing businesses',
                    'support_level' => 'Priority email & phone support',
                    'trial_days' => 30,
                    'features' => ['Advanced analytics', 'Mobile app', 'QR code generation']
                ],
            ],
            [
                'name' => 'Gold',
                'slug' => 'gold',
                'type' => PackageType::PUBLIC->value,
                'is_active' => true,
                'featured' => false,
                'description' => 'Complete solution for large enterprises and restaurant chains with unlimited possibilities.',
                'yearly_price' => 999.99,
                'discount_yearly_price' => 799.99,
                'setup_fees' => 199.99,
                'discount_setup_fees' => 99.99,
                'max_categories' => 0, // Unlimited
                'max_products' => 0, // Unlimited
                'max_branches' => 0, // Unlimited
                'can_add_images' => true,
                'can_add_tags' => true,
                'has_multi_branches' => true,
                'can_add_to_cart' => true,
                'can_have_social_media' => true,
                'can_edit_theme' => true,
                'remove_branding' => true,
                'sort' => 3,
                'meta' => [
                    'target_audience' => 'Large enterprises',
                    'support_level' => '24/7 dedicated support',
                    'trial_days' => 60,
                    'features' => [
                        'White-label solution',
                        'API access',
                        'Custom integrations',
                        'Advanced analytics dashboard',
                        'Priority updates',
                        'Custom training sessions'
                    ]
                ],
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
