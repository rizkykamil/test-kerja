<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('product.index', compact('products'));
    }   

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Product::create($request->all());
        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id) {

        // validate data erorr
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Product berhasil diupdate');
    }

    public function delete($id) {
        $product = Product::find($id);
        //check product jika product_id ada di table transactions maka tidak bisa dihapus
        $check_product = Transaksi::where('product_id', $id)->first();
        if ($check_product == true) {
            return redirect()->back()->with('error', 'Product tidak bisa dihapus karena sudah ada di table transaksi');
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}
