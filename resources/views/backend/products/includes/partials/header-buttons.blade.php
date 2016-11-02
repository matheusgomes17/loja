<div class="pull-right mb-10">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.products.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.product.index', trans('menus.backend.products.all')) }}</li>

            @permission('manage-users')
                <li>{{ link_to_route('admin.product.create', trans('menus.backend.products.create')) }}</li>
            @endauth

            <li class="divider"></li>
            <li>{{ link_to_route('admin.product.deactivated', trans('menus.backend.products.deactivated')) }}</li>
            <li>{{ link_to_route('admin.product.deleted', trans('menus.backend.products.deleted')) }}</li>
        </ul>
    </div><!--product-->

    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.products.size.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.product.size.index', trans('menus.backend.products.size.all')) }}</li>

            @permission('manage-roles')
                <li>{{ link_to_route('admin.product.size.create', trans('menus.backend.products.size.create')) }}</li>
            @endauth
        </ul>
    </div><!--size-->

    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.products.category.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.product.category.index', trans('menus.backend.products.category.all')) }}</li>

            @permission('manage-roles')
                <li>{{ link_to_route('admin.product.category.create', trans('menus.backend.products.category.create')) }}</li>
            @endauth
        </ul>
    </div><!--category-->
</div>
<div class="clearfix"></div>
