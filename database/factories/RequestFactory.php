<?php

namespace Database\Factories;

use App\Models\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Request::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $minusDays = $this->faker->numberBetween(0, 365);
        $betweenDays = $this->faker->numberBetween(1, 24);

        return [
            'user_id' => User::where('type', User::TYPE_EMPLOYEE)->get()->random()->id,
            'date_from' => Carbon::now()->subDays($minusDays),
            'date_to' => Carbon::now()->subDays($minusDays - $betweenDays),
            'reason' => $this->faker->text(250),
            'status' => $this->faker->randomElement(['rejected', 'approved']),
            'created_at' => Carbon::now()->subDays($minusDays + $betweenDays),
            'updated_at' => Carbon::now()->subDays($minusDays + $betweenDays),
        ];
    }
}
