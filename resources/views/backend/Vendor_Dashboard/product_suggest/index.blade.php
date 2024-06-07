@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('products_trans.Product_Suggest') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('products_trans.Product_Suggest') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('products_trans.All_Product_Suggest') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('products_trans.Product_Suggest') }}</li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('products_trans.Id') }}</th>
                            <th>{{ trans('products_trans.Product_Suggest_Name') }}</th>

                            <th>{{ trans('products_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productSuggests as $productSuggest)
                            <tr>


                                <td>{{ $productSuggest->id }}</td>

                                <td>
                                        {{ $productSuggest->name }}
                                </td>
                                <td>

                                        <a href="{{ route('vendor.productSuggest.edit', $productSuggest->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>



                                    <form action="{{ route('vendor.productSuggest.destroy', $productSuggest->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>


                                </td>

                            </tr>
                        @endforeach
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
        $('#table_id').DataTable();
    });
</script>
@endpush
