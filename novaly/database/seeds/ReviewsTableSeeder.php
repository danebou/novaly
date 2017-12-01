<?php

use App\Entities\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = factory(Review::class, 1000)->make();

        foreach ($reviews as $review) {
            repeat: {
                try {
                    $review->save();
                } catch (\Illuminate\Database\QueryException $e) {
                    // Try again if unique constrait failure
                    $review = factory(Review::class)->make();
                    goto repeat;
                }
            }
        }
    }
}
