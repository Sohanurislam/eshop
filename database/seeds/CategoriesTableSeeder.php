<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Category:: create(['title'=>'Child Clothing','description'=>'Summer Collection']);
//        factory(App\Category::class,500)->create();
        $data = [
            ['title'=>'Men Clothing','description'=>'Summer Collection', 'is_active'=>true],
            ['title'=>'Child Clothing','description'=>'Summer Collection', 'is_active'=>false],
            ['title'=>'Women Clothing','description'=>'Summer Collection', 'is_active'=>true],
        ];
        foreach ($data as $value){
            \App\Category::create($value);
        }

    }
}
