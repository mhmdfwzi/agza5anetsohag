@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('products_trans.Product_Name') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('products_trans.Product_Name') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('products_trans.All_Product_Name') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('products_trans.Product_Name') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div>
                <a href="{{ route('admin.productName.create') }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-plus"></i>
                                            {{ trans('products_trans.Add_Product_Name') }}
                                        </a>
                </div>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('products_trans.Id') }}</th>
                            <th>{{ trans('products_trans.Product_Name_Name') }}</th>

                            <th>{{ trans('products_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("admin.productName.getData") }}',
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: {
                processing: "<div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div>"
            }
        });
    });
</script>
@endpush
