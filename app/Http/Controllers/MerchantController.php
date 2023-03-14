<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MerchantController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax())
        {
            $data = Merchant::get()->toArray();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('option', function($dt) {
                        return '<a href="'.route('merchants.show', ['merchant' => $dt['id'] ]).'" class="btn btn-success">Edit</a>
                        <a href="'. route('merchants.delete', ['merchant' => $dt['id'] ]) .'" class="btn btn-danger" onclick="confirm("Are you sure?")">Delete</a>';
                    })
                    ->rawColumns(['option'])
                    ->make(true);
        }

        return view('merchants.index');
    }

    public function create(Request $request) {
        return view('merchants.create');
    }

    public function store(Request $request) {
        $merchant = new Merchant();
        $merchant->fill($request->all());
        $merchant->save();

        return redirect(route('merchants.index'))->with(['message' => 'Created Successfully']);
    }

    public function show(Request $request) {
        $merchant = Merchant::find($request->route('merchant'));

        return view('merchants.edit')->with(['merchant' => $merchant]);
    }

    public function update(Request $request) {
        $merchant = Merchant::find($request->route('merchant'));
        $merchant->fill($request->all());
        $merchant->save();

        return redirect(route('merchants.index'))->with(['message' => 'Updated Successfully']);
    }

    public function delete(Request $request) {
        $merchant = Merchant::find($request->route('merchant'))->delete();

        return redirect(route('merchants.index'))->with(['message' => 'Deleted Successfully']);
    }
}
