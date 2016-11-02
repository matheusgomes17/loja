@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'route' => ['admin.product.size.update', $model->id], 'class' => 'form-horizontal']) !!}
@else
{{ Form::open(['route' => 'admin.product.size.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
@endif
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.products.sizes.create') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.products.includes.partials.header-buttons')
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="form-group">
            {{ Form::label('type', trans('validation.attributes.backend.products.sizes.type'), ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::select('type', $sizes, (isset($model)) ? $model->type : null, ['class' => 'form-control']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('rgt', trans('validation.attributes.backend.products.sizes.rgt'), ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('rgt', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.products.sizes.rgt')]) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('lft', trans('validation.attributes.backend.products.sizes.lft'), ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('lft', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.products.sizes.lft')]) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

    </div><!-- /.box-body -->
</div><!--box-->
<div class="box box-info">
    <div class="box-body">
        <div class="pull-left">
            {{ link_to_route('admin.product.size.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-sm']) }}
        </div><!--pull-left-->

        <div class="pull-right">
            {{ Form::submit(isset($model) ? trans('buttons.general.crud.update') : trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-sm']) }}
        </div><!--pull-right-->

        <div class="clearfix"></div>
    </div><!-- /.box-body -->
</div><!--box-->
{{ Form::close() }}