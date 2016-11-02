<div class="modal fade" id="{{ $key }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('buttons.general.close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{{ trans('buttons.general.crud.delete') }} "<b>{{ $model->getName() }}</b>"</h4>
            </div>
            <div class="modal-body">
                <p>{{ trans('labels.backend.'.$message.'.modal') }}</p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['method' => 'DELETE', 'route' => ["admin.{$route}.destroy", $model->id]]) !!}
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ trans('buttons.general.cancel') }}</button>
                {!! Form::submit(trans('buttons.general.crud.delete'), ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->