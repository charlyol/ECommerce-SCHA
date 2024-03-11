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
        $banners=Image::where('type','banner')->first()->pluck('id');
        $covers=Image::where('type','cover')->first()->pluck('id');
        $widgets=Image::where('type','widget')->first()->pluck('id');
        $categories=Category::all()->pluck('id');
        foreach ($books as $book) {
            $book->user()->attach($users[rand(0,$users->count()-1)]);
            $book->image()->attach($banners[rand(0,$banners->count()-1)]);
            $book->image()->attach($covers[rand(0,$covers->count()-1)]);
            $book->image()->attach($widgets[rand(0,$widgets->count()-1)]);
            $book->category()->attach($categories[rand(0,$categories->count()-1)]);
        }


    }
}
