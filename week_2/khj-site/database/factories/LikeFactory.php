<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // [ 임시 ] 좋아요 대상 모델이 많아질 때 어떻게 할 것인지 생각하기
        return [
            'user_id' => rand(1, 30),
            'likeable_type' => 'App\Models\Article',
            'likeable_id' => rand(1, 30),
        ];
    }
}
