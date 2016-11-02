@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('before-styles-end')
<!-- Select2 -->
{{ Html::style('plugins/select2/select2.min.css') }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1>
@endsection

@section('content')

    @include('backend.products.form', ['model' => $product])

@stop

@section('after-scripts-end')
<!-- Select2 -->
{{ Html::script('plugins/select2/select2.full.min.js') }}
<script type="text/javascript">$(function() { $(".select2").select2(); });</script>
@stop