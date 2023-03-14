@extends('layouts')

@section('content')
<a href="{{ route('merchants.create') }}" class="btn btn-primary mb-3">Create Merchants</a>
<table class="table table-bordered data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code Country</th>
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
               ajax: "{{ route('merchants.index') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'merchant_name', name: 'name'},
                   {data: 'country_code', name: 'country_code'},
                   {data: 'option', name: 'option'}
               ]
           });
         });
    </script>
@endpush
@endsection
