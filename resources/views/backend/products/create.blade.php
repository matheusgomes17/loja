@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.products.management') . ' | ' . trans('labels.backend.products.create'))

@section('before-styles-end')
<!-- Select2 -->
{{ Html::style('plugins/select2/select2.min.css') }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.products.management') }}
        <small>{{ trans('labels.backend.products.create') }}</small>
    </h1>
@endsection

@section('content')

    @include('backend.products.form')

@stop

@section('after-scripts-end')
<!-- Select2 -->
{{ Html::script('plugins/select2/select2.full.min.js') }}
<script type="text/javascript">$(function() { $(".select2").select2(); });</script>
@stop