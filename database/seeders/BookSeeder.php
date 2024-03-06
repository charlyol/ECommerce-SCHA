<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Image;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()->count(150)->create();
        $books=Book::all();
        $users=User::all()->pluck('id');
        $images=Image::all()->pluck('id');
        $categories=Category::all()->pluck('id');
        foreach ($books as $book) {
            $book->user()->attach($users[rand(0,$users->count()-1)]);
            // $book->user()->attach($images[rand(0,$images->count()-1)]);
            // $book->user()->attach($categories[rand(0,$categories->count()-1)]);
        }


    }
}
