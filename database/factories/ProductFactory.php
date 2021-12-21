<?php
use App\Models\Product;
use Faker\Generator as Faker;



$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->text(200)
    ];
});

?>
