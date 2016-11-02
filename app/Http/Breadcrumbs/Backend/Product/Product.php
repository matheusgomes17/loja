<?php

Breadcrumbs::register('admin.product.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.products.management'), route('admin.product.index'));
});

Breadcrumbs::register('admin.product.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push(trans('menus.backend.products.deactivated'), route('admin.product.deactivated'));
});

Breadcrumbs::register('admin.product.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push(trans('menus.backend.products.deleted'), route('admin.product.deleted'));
});

Breadcrumbs::register('admin.product.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push(trans('menus.backend.products.create'), route('admin.product.create'));
});

Breadcrumbs::register('admin.product.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push(trans('menus.backend.products.edit'), route('admin.product.edit', $id));
});