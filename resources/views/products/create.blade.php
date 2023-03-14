@extends('layouts')

@section('content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="flex">
            <div class="col-6">
                <p>Name</p>
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="flex">
            <div class="col-6">
                <p>Merchant</p>
                <select class="form-control" name="merchant_id">
                    <option>Pilih Merchant</option>
                    @foreach ($merchants as $merchant)
                        <option value="{{ $merchant->id }}">{{ $merchant->merchant_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex">
            <div class="col-6">
                <p>price</p>
                <input type="text" class="form-control" name="price">
            </div>
        </div>
        <div class="flex">
            <div class="col-6">
                <p>status</p>
                <input type="text" class="form-control" name="status">
            </div>
        </div>
        <button class="btn btn-primary mt-2 mx-3" type="submit">Save</button>
    </form>
@endsection
