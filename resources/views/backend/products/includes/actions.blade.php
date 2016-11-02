<a href="{{ route('admin.'.$route.'.edit', $model->id) }}"
   title="{{ trans('buttons.backend.general.crud.edit') }}"
   class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
</a>
<a href="#" title="{{ trans('buttons.backend.general.deactivate') }}"
   class="btn btn-warning btn-xs"><i class="fa fa-pause"></i>
</a>
<button type="button" data-toggle="modal" data-target="#{{ $key }}" class="btn btn-danger btn-xs">
    <i class="fa fa-trash"></i>
</button>