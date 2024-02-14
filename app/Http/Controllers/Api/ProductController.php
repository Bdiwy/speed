<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductController\CreateOneRequest;
use App\Http\Requests\Api\ProductController\UpdateOneRequest;
use App\Http\Resources\Api\ProductController\ProductCollectionResource;
use App\Http\Resources\Api\ProductController\ProductResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{   
    public function getAll(Request $request){
        $totalCount = Product::getCountById();
        $page = $request->get('page',0);
        $perPage= 15 ;
        $skip = $page + $perPage ;
        $take = $skip + $perPage ;
        $prevUrl = route('product.getALL', ['page' => $page >0 ? $page -1  : $page ]);
        $nextUrl = route('product.getALL', ['page' => $page + 1 ]);
        $products = Product::skip($skip)->take($take)->get();
        
        return Response::json([
            'data'=> ProductCollectionResource::make($products) ,
            'prevUrl'=>$prevUrl , 
            'nextUrl'=>$nextUrl ,
            'totalCount'=>$totalCount
        ]);

    }
    public function getOne(Product $product){

        return ProductResource::make($product);


    }
    
    public function createOne(CreateOneRequest $request){

        $product = new Product($request->all());
        $product->save();
        return ProductResource::make($product);

    }
    public function updateOne(UpdateOneRequest $request,Product $product){

        $product->updateOne($request->all());
        return ProductResource::make($product);

    }
    

    
    public function deleteOne(Product $product){

        $product->delete();
        return Response::json();

    }


}
