@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.products.management') . ' | ' . trans('labels.backend.products.sizes.create'))

@section('page-header')
<h1>
    {{ trans('labels.backend.products.management') }}
    <small>{{ trans('labels.backend.products.sizes.create') }}</small>
</h1>
@endsection

@section('content')

@include('backend.products.sizes.form')

@stop