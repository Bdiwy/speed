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
    public function getAll(){

        $product = Product::paginate(15);
        return ProductCollectionResource::make($product);

    }
    public function getOne(Product $product){

        return Response::json(ProductResource::make($product));


    }
    
    public function createOne(CreateOneRequest $request){

        $product = new Product($request->all());
        $product->save();
        return Response::json(ProductResource::make($product));

    }
    public function updateOne(UpdateOneRequest $request,Product $product){

        $product->updateOne($request->all());
        return Response::json($product);

    }
    

    
    public function deleteOne(Product $product){

        $product->delete();
        return Response::json();

    }


}
