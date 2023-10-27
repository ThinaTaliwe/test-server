<?php

use BabDev\Breadcrumbs\Contracts\BreadcrumbsGenerator;
use BabDev\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function (BreadcrumbsGenerator $trail) {
    $trail->push(__('breadcrumbs.Home'), route('home'));
});

Breadcrumbs::for('testingview', function ($trail) {
    $trail->push(__('breadcrumbs.Testing View'), route('testingview'));
});

Breadcrumbs::for('memberships', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Memberships'), route('memberships'));
});

Breadcrumbs::for('customize', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Customize'), route('customize'));
});

Breadcrumbs::for('add-member', function ($trail) {
    $trail->parent('memberships');
    $trail->push(__('breadcrumbs.Add Member'), route('add-member'));
});

Breadcrumbs::for('dependants', function ($trail) {
    $trail->parent('memberships');
    $trail->push(__('breadcrumbs.Dependants'), route('dependants'));
});

Breadcrumbs::for('user-settings', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Contacts'), route('user-settings'));
});

Breadcrumbs::for('admin.account.info', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Account Information'), route('admin.account.info'));
});

Breadcrumbs::for('view-member', function ($trail, $id) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.View Member'), route('view-member', $id));
});

Breadcrumbs::for('edit-member', function ($trail, $id) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Edit Member'), route('edit-member', $id));
});

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push(__('breadcrumbs.Home'), route('admin.home'));
});

Breadcrumbs::for('user.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.User'), route('user.index'));
});

Breadcrumbs::for('user.edit', function ($trail, $user) {
    $trail->parent('user.index');
    $trail->push(__('breadcrumbs.Edit User: :name', ['name' => $user->name]), route('user.edit', $user));
});

Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user.index');
    $trail->push(__('breadcrumbs.Create User'), route('user.create'));
});

Breadcrumbs::for('role.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Roles'), route('role.index'));
});

Breadcrumbs::for('role.edit', function ($trail, $role) {
    $trail->parent('role.index');
    $trail->push(__('breadcrumbs.Edit Role'), route('role.edit', $role->id));
});

Breadcrumbs::for('role.create', function ($trail) {
    $trail->parent('role.index');
    $trail->push(__('breadcrumbs.Create Role'), route('role.create'));
});

Breadcrumbs::for('permission.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Permissions'), route('permission.index'));
});

Breadcrumbs::for('permission.create', function ($trail) {
    $trail->parent('permission.index');
    $trail->push(__('breadcrumbs.Create'), route('permission.create'));
});

Breadcrumbs::for('permission.edit', function ($trail, $id) {
    $trail->parent('permission.index');
    $trail->push(__('breadcrumbs.Edit'), route('permission.edit', $id));
});

Breadcrumbs::for('settings', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Settings'), route('settings'));
});

Breadcrumbs::for('home2', function (BreadcrumbsGenerator $trail) {
    $trail->push(__('breadcrumbs.Home2'), route('home2'));
});

// Reports Index
Breadcrumbs::for('reports.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Reports'), route('reports.index'));
});

// Reports Show
Breadcrumbs::for('reports.show', function ($trail, $id) {
    $trail->parent('reports.index');
    $trail->push(__('breadcrumbs.Show Report'), route('reports.show', $id));
});

// Chart
Breadcrumbs::for('chart', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Show Chart'), route('chart'));
});

// Report Index
Breadcrumbs::for('report.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Reports'), route('report.index'));
});

// Report Person
Breadcrumbs::for('report.person', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Person'), route('report.person'));
});

// Fixer Index
Breadcrumbs::for('fixer.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Fixer'), route('fixer.index'));
});

// Mapper Index
Breadcrumbs::for('mapper.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Mapper'), route('mapper.index'));
});

// Reporting
Breadcrumbs::for('reporting', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Reporting'), route('reporting'));
});

// Landing
Breadcrumbs::for('landing', function ($trail) {
    $trail->push(__('breadcrumbs.Landing'), route('landing'));
});

// Commission Create
Breadcrumbs::for('commission.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Commissions'), route('commission.create'));
});

// Sales Index
Breadcrumbs::for('sales.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.Sales'), route('sales.index'));
});

// Sales Create
Breadcrumbs::for('sales.create', function ($trail) {
    $trail->parent('sales.index');
    $trail->push(__('breadcrumbs.Create'), route('sales.create'));
});

// Logs Show
Breadcrumbs::for('logs.show', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Logs'), route('logs.show'));
});

// Logs Show
Breadcrumbs::for('whatsapp', function ($trail) {
    $trail->parent('home');
    $trail->push(__('WhatsApp'), route('whatsapp'));
});