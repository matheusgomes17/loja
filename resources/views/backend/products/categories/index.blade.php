@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.products.management'))

@section('after-styles-end')
{{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
<h1>
    {{ trans('labels.backend.products.management') }}
    <small>{{ trans('labels.backend.products.categories.list') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.products.categories.list') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.products.includes.partials.header-buttons')
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="table-responsive">
            <table id="products-categories-table" class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.products.categories.table.name') }}</th>
                        <th>{{ trans('labels.backend.products.categories.table.category') }}</th>
                        <th>{{ trans('labels.general.created') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $model)
                    <?php $key = str_random(9) ?>
                    <tr>
                        <td>{{ $model->getName() }}</td>
                        <td>{{ $model->getTypeCategoryName() }}</td>
                        <td>{{ $model->getCreated() }}</td>
                        <td>
                            @include('backend.products.includes.actions', ['route' => 'product.category', 'key' => $key])
                        </td>
                    </tr>
                    @include('backend.includes.modal', ['modal' => $model, 'route' => 'product.category', 'message' => 'products.categories', 'key' => $key])
                    @endforeach
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        {!! history()->renderType('ProductCategory') !!}
    </div><!-- /.box-body -->
</div><!--box box-success-->
@stop

@section('after-scripts-end')
{{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
{{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

<script>
    $(function () {
        $('#products-categories-table').DataTable({
            @include('includes.plugins.datatable')
            order: [[0, "asc"]],
            searchDelay: 500
        });
    });
</script>
@stop