<?php

Breadcrumbs::register('admin.product.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.products.categories.management'), route('admin.product.category.index'));
});

Breadcrumbs::register('admin.product.category.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.category.index');
    $breadcrumbs->push(trans('menus.backend.products.categories.deactivated'), route('admin.product.category.deactivated'));
});

Breadcrumbs::register('admin.product.category.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.category.index');
    $breadcrumbs->push(trans('menus.backend.products.categories.deleted'), route('admin.product.category.deleted'));
});

Breadcrumbs::register('admin.product.category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.product.category.index');
    $breadcrumbs->push(trans('menus.backend.products.categories.create'), route('admin.product.category.create'));
});

Breadcrumbs::register('admin.product.category.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.product.category.index');
    $breadcrumbs->push(trans('menus.backend.products.categories.edit'), route('admin.product.category.edit', $id));
});