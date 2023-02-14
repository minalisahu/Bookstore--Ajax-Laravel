<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Seeder;

class BookSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booksQuery = Http::get("https://fakerapi.it/api/v1/books?_quantity=100");
        $books = $booksQuery->getBody();
        $books = json_decode($books, true);
        foreach ($books['data'] as $book) {
            \App\Models\Book::create([
                'title' => $book['title'],
                'author' => $book['author'],
                'genre' => $book['genre'],
                'description' => $book['description'],
                'isbn' => $book['isbn'],
                'published' => $book['published'],
                'publisher' => $book['publisher'],

            ]);
        }
    }
}
