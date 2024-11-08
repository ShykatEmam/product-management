<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::simplePaginate(5);

        return view('index', compact('products'));
    }
    public function createProduct(){
        return view('create');
    }
    public function storeProduct(Request $request){

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('images','public') : null;

        $product = Product::create([
            'product_id'=>$request['product_id'],
            'name'=>$request['name'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'stock'=>$request['stock'],
            'image'=>$imagePath,
        ]);
        return redirect()->route('products.index')->with('success','Product created successfully!!!');
    }




    public function showProduct($id){

        $product = Product::findOrFail($id);
        return view('show', compact('product'));

    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));

    }
    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        $product->product_id = $request->input('product_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect('/products')->with('success', 'Product updated successfully');



    }
    public function deleteProduct($id){
        $product = Product::find($id);
        if (!$product) {
            return redirect('/products')->with('error', 'Product not found');
        }
        if ($product->image) {
            $imagePath = public_path('storage/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted successfully');

    }
}
