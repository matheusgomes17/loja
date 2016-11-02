@if(isset($model))
{{ Form::model($model, ['method' => 'PUT', 'route' => ['admin.product.category.update', $model->getKey()], 'class' => 'form-horizontal']) }}
@else
{{ Form::model($data, ['route' => 'admin.product.category.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
@endif
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.products.categories.create') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.products.includes.partials.header-buttons')
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="form-group">
            {{ Form::label('name', trans('validation.attributes.backend.products.categories.name'), ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.products.categories.name')]) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('type', trans('validation.attributes.backend.products.categories.type'), ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::select('parent_id', $categories, null, [ 'class' => 'form-control' ]) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('description', trans('validation.attributes.backend.products.categories.description'), ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.products.categories.description')]) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

    </div><!-- /.box-body -->
</div><!--box-->
<div class="box box-info">
    <div class="box-body">
        <div class="pull-left">
            {{ link_to_route('admin.product.category.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-sm']) }}
        </div><!--pull-left-->

        <div class="pull-right">
            {{ Form::submit(isset($model) ? trans('buttons.general.crud.update') : trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-sm']) }}
        </div><!--pull-right-->

        <div class="clearfix"></div>
    </div><!-- /.box-body -->
</div><!--box-->

{{ Form::close() }}