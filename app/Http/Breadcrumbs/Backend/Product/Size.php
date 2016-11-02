<?php

Breadcrumbs::register('admin.product.size.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.products.sizes.management'), route('admin.product.size.index'));
});

Breadcrumbs::register('admin.product.size.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.size.index');
    $breadcrumbs->push(trans('menus.backend.products.sizes.deactivated'), route('admin.product.size.deactivated'));
});

Breadcrumbs::register('admin.product.size.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.size.index');
    $breadcrumbs->push(trans('menus.backend.products.sizes.deleted'), route('admin.product.size.deleted'));
});

Breadcrumbs::register('admin.product.size.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.size.index');
    $breadcrumbs->push(trans('menus.backend.products.sizes.create'), route('admin.product.size.create'));
});

Breadcrumbs::register('admin.product.size.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.product.size.index');
    $breadcrumbs->push(trans('menus.backend.products.sizes.edit'), route('admin.product.size.edit', $id));
});