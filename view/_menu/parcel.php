<?php

$menu['พัสดุ']=array(
    'material'=>array(
        'label'=>'วัสดุ',
        'bullet'=>'fa fa-truck',
        'url'=>site_url('inventory/supplier'),
        'item'=>array(),
    ),
    'durable_goods'=>array(
        'label'=>'ครุภัณฑ์',
        'bullet'=>'fa fa-truck',
        'url'=>site_url('inventory/supplier'),
        'item'=>array(),
    ),
    'project'=>array(
        'label'=>'โครงการ',
        'bullet'=>'fa fa-truck',
        'url'=>site_url('inventory/supplier'),
        'item'=>array(),
    ),
    'procurement'=>array(
        'label'=>'การจัดซื้อจัดจ้าง',
        'bullet'=>'fa fa-tasks',
        'url'=>site_url('inventory/shelf'),
        'item'=>array(),
    ),
);

print gen_menu($menu);