@extends('backend.layouts.master')
@push('script')

@endpush

@section('title')
    {{ trans('products_trans.Create_Product_Suggest') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('products_trans.Create_Product_Suggest') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('products_trans.Create_Product_Suggest') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('products_trans.Product_Suggests') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('vendor.productSuggest.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('products_trans.Product_Suggest_Name') }}" name="name"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-backend.form.textarea label="{{ trans('products_trans.Notes') }}"
                                    name="notes" />
                            </div>
                        </div>

                    </div>


                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('products_trans.Add') }}</button>


                </form>




            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@push('scripts')
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endpush
