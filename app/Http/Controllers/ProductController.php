<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax())
        {
            $data = Product::with('merchant')->get()
            ->each(function($product) {
                $product->merchant_name = $product->merchant->merchant_name ?? '';
            })->toArray();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('option', function($dt) {
                        return '<a href="'.route('products.show', ['product' => $dt['id'] ]).'" class="btn btn-success">Edit</a>
                        <a href="'. route('products.delete', ['product' => $dt['id'] ]) .'" class="btn btn-danger" onclick="confirm("Are you sure?")">Delete</a>';
                    })
                    ->rawColumns(['option'])
                    ->make(true);
        }

        return view('products.index');
    }

    public function create(Request $request) {
        $merchants = Merchant::all();

        return view('products.create')->with(['merchants' => $merchants]);
    }

    public function store(Request $request) {
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return redirect(route('products.index'))->with(['message' => 'Created Successfully']);
    }

    public function show(Request $request) {
        $product = Product::find($request->route('product'));
        $merchants = Merchant::all();

        return view('products.edit')->with(['product' => $product, 'merchants' => $merchants]);
    }

    public function update(Request $request) {
        $product = Product::find($request->route('product'));
        $product->fill($request->all());
        $product->save();

        return redirect(route('products.index'))->with(['message' => 'Updated Successfully']);
    }

    public function delete(Request $request) {
        $product = Product::find($request->route('product'))->delete();

        return redirect(route('products.index'))->with(['message' => 'Deleted Successfully']);
    }
}
