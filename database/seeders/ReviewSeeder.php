<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                "user_id" => 1,
                "rating" => 5,
                "book_id" =>1,
                "comment" => "Amazing book! Highly recommend."
            ],
            [
                "user_id" => 2,
                "rating" => 4,
                "book_id" =>2,
                "comment" => "Great read, but a bit slow in the middle."
            ],
            [
                "user_id" => 3,
                "rating" => 3,
                "book_id" =>4,
                "comment" => "It was okay, not my favorite."
            ],
            [
                "user_id" => 4,
                "rating" => 2,
                "book_id" =>5,
                "comment" => "Didn't enjoy it much, too predictable."
            ],
            [
                "user_id" => 5,
                "rating" => 5,
                "book_id" =>1,
                "comment" => "Loved every chapter of it!"
            ],
            [
                "user_id" => 5,
                "rating" => 4,
                "book_id" =>2,
                "comment" => "Well-written and engaging."
            ],
            [
                "user_id" => 4,
                "rating" => 1,
                "book_id" =>4,
                "comment" => "Not worth the time, unfortunately."
            ],
            [
                "user_id" => 3,
                "rating" => 3,
                "book_id" =>5,
                "comment" => "Average book with a few good parts."
            ],
            [
                "user_id" => 2,
                "rating" => 4,
                "book_id" =>4,
                "comment" => "Enjoyable story and characters."
            ],
            [
                "user_id" => 1,
                "rating" => 5,
                "book_id" =>2,
                "comment" => "Masterpiece! Will read again."
            ]
        ];
          foreach($reviews as $review)
          {
            Review::create($review);
          }
    }
}
