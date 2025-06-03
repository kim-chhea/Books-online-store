<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Bookseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $books = [
            [
                "author" => "George Orwell",
                "title" => "1984",
                "price" => 15,
                "rating" => 5,
                "cover_image" => "default.jpg"
            ],
            [
                "author" => "Harper Lee",
                "title" => "To Kill a Mockingbird",
                "price" => 12,
                "rating" => 5,

                "cover_image" => "default.jpg"
            ],
            [
                "author" => "J.K. Rowling",
                "title" => "Harry Potter and the Sorcerer's Stone",
                "price" => 20,
                "rating" => 5,

                "cover_image" => "default.jpg"
            ],
            [
                "author" => "J.R.R. Tolkien",
                "title" => "The Hobbit",
                "price" => 18,
                "rating" => 5,

                "cover_image" => "default.jpg"
            ],
            [
                "author" => "F. Scott Fitzgerald",
                "title" => "The Great Gatsby",
                "price" => 14,
                "rating" => 5,

                "cover_image" => "default.jpg"
            ]
        ];
        foreach ($books as $book)
        {
            Book::create($book);
        }
        
    }
}
