<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        return View('welcome');
    }

    public function add(ProductRequest $request)
    {
        try{
            $pname = $request->input('productname');
            $price = $request->input('price');
            $qty  = $request->input('qty');
            $date = date('Y-m-d h:i:s A');
            $data = [
                "product_name" => $pname,
                "price" => $price,
                "qty" => $qty,
                "date" => $date,
            ];
            Storage::append('file.json', json_encode($data));
            return response()->json($data);
        }catch(Exception $e)
        {
            return "error";
        }
    }
}
