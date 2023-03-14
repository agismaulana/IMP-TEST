@extends('layouts')

@section('content')
    <form action="{{ route('merchants.update', ['merchant' => $merchant->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex">
            <div class="col-6">
                <p>Name</p>
                <input type="text" class="form-control" name="merchant_name" value="{{ $merchant->merchant_name }}">
            </div>
        </div>
        <div class="flex">
            <div class="col-6">
                <p>Code Country</p>
                <input type="text" class="form-control" name="country_code" value="{{ $merchant->country_code }}">
            </div>
        </div>
        <button class="btn btn-primary mt-2 mx-3" type="submit">Save</button>
    </form>
@endsection
