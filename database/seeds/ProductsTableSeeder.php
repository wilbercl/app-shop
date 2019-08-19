<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*factory(App\Category::class,5)->create();
        factory(App\Product::class,100)->create();
        factory(App\ProductImage::class,200)->create();*/

        //otra forma de completar los datos de la base de datos
        $categories = factory(App\Category::class,5)->create();
        $categories->each(function ($category){
            $products = factory(App\Product::class,20)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p) {
                $productImage = factory(App\ProductImage::class,5)->make();
                $p->images()->saveMany($productImage);
            });
        });

        /*//documentacion laravel
        $u=factory(App\User::class, 3)->create()->each(function ($user) {
        $user->posts()->save(factory(App\Post::class)->make()); });*/
    }
}
