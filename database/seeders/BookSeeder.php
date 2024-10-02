<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 100; $i++) {
            DB::table("books")->insert([
                'title'=> fake() -> text(30),
                'thumbnail'=> fake() -> imageUrl(),
                'author'=> fake() -> text(15),
                'publisher'=> fake() -> text(15),
                'author'=> fake() -> text(15),
                'Publication'=> fake() -> dateTime(),
                'Price'=> fake() -> randomFloat(2,10,500),
                'Quantity'=> fake() -> numberBetween(1,200),
                'Category_id'=> rand(1,5),  
            ]);
        }
    }
}
