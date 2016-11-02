@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.products.management') . ' | ' . trans('labels.backend.products.sizes.edit'))

@section('page-header')
<h1>
    {{ trans('labels.backend.products.management') }}
    <small>{{ trans('labels.backend.products.sizes.edit') }}</small>
</h1>
@endsection

@section('content')

@include('backend.products.sizes.form', ['model' => $size])

@stop