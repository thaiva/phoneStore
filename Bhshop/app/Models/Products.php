<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'category_id'];

    public function scopeNewProducts($query, $limit)
    {
        return $query->orderBy('id', 'desc')->limit($limit)->with(['category','brand']);
    }

    public function  scopeBestSellerProducts($query)
    {
        return $query->where('sold', '>=', 50)->orderBy('sold', 'desc')->limit(6)->get();
    }
    public function  scopeAllProduct($query)
  {
            return $query->orderBy('sold', 'desc')->get();
  }

    public function scopeInStockProducts($query, $limit)
    {
        return $query->where('quantity', '>', 0)->orderBy('id', 'desc')->limit($limit)->with(['category']);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public static function createProduct($data)
     {
         return self::create($data);
     }
 
     public static function getProductById($id)
     {
         return self::find($id);
     }
 
     public static function updateProduct($id, $data)
     {
         $product = self::find($id);
         if ($product) {
             $product->update($data);
             return $product;
         }
         return null;
     }
 
     public static function deleteProduct($id)
     {
         $product = self::find($id);
         if ($product) {
             $product->delete();
             return true;
         }
         return false;
     }

     public static function getProductsByCategory($category_id)
    {
        return self::where('category_id', $category_id)->get();
    }

    public static function searchProductByName($keyword)
    {
        return self::where('name', 'like', '%' . $keyword . '%')->get();
    }

    public static function searchProductByPriceRange($minPrice, $maxPrice)
    {
        return self::whereBetween('price', [$minPrice, $maxPrice])->get();
    }
 

}