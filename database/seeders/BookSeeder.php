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
        Book::factory()->count(100)->create();
        $books=Book::all();
        $users=User::where('role_id', Role::where('name','author')->first()->pluck('id')->all())
        ->pluck('id');
        $images=Image::all()->pluck('id');
        $categories=Category::all()->pluck('id');
        foreach ($books as $book) {
            $book->user()->attach($users[rand(0,$users->count()-1)]);
            for ($i=0 ; $i<count($images) ; $i++) {
                $book->image()->attach($images[$i]);
            }
            $book->category()->attach($categories[rand(0,$categories->count()-1)]);
        }


    }
}
