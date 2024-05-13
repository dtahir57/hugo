<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prospect_name' => fake()->name(),
            'prospect_email' => fake()->unique()->safeEmail(),
            'prospect_phone' => fake()->phoneNumber(),
            'estimated_budget' => fake()->buildingNumber(),
            'opportunity_info' => fake()->text(),
            'location' => fake()->streetAddress(),
            'title' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'closing_date' => fake()->dateTime(),
            'opportunity_type' => 'prospect-intelligence',
            'status' => 'active'
        ];
    }
}
