@extends('layouts')

@section('content')
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex">
            <div class="col-6">
                <p>Nama</p>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            </div>
        </div>
        <div class="flex">
            <div class="col-6">
                <p>Merchant</p>
                <select class="form-control" name="merchant_id">
                    <option>Pilih Merchant</option>
                    @foreach ($merchants as $merchant)
                        <option value="{{ $merchant->id }}" {{ $merchant->id == $product->merchant_id ? 'selected' : '' }}>{{ $merchant->merchant_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex">
            <div class="col-6">
                <p>price</p>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}">
            </div>
        </div>
        <div class="flex">
            <div class="col-6">
                <p>status</p>
                <input type="text" class="form-control" name="status" value="{{ $product->status }}">
            </div>
        </div>
        <button class="btn btn-primary mt-2 mx-3" type="submit">Save</button>
    </form>
@endsection
