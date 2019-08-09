<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = Product::create([
            'name' => $row['0'],
            'description' => $row['1'],
            'price' => $row['2'],
            'img' => $row['3'],
            'status' => 1,
        ]);
        foreach (explode(',', $row['4']) as $category)
        {
            $product->categories()->attach($category);
        }

        return $product;
    }
}
