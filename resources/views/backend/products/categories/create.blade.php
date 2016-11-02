@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.products.management') . ' | ' . trans('labels.backend.products.categories.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.products.management') }}
        <small>{{ trans('labels.backend.products.categories.create') }}</small>
    </h1>
@endsection

@section('content')

    @include('backend.products.categories.form')

@stop