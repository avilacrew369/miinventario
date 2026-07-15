<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Tests\TestCase;

class ProductImageRelationTest extends TestCase
{
    public function test_product_has_images_relation(): void
    {
        $product = new Product();

        $this->assertInstanceOf(MorphMany::class, $product->images());
    }
}
