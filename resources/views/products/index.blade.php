@extends('layouts')

@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>
<table class="table table-bordered data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Merchant</th>
            <th>Price</th>
            <th>Status</th>
            <th>Date Created</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('js')
    <script>
        $(function () {
           var table = $('.data-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('products.index') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'name', name: 'name'},
                   {data: 'merchant_name', name: 'merchant'},
                   {data: 'price', name: 'price'},
                   {data: 'status', name: 'status'},
                   {data: 'created_at', name: 'created_at'},
                   {data: 'option', name: 'option'}
               ]
           });
         });
    </script>
@endpush
@endsection
