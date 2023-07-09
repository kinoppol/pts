<?php

$menu['คลังสินค้า']=array(
    'supplier'=>array(
        'label'=>'ตัวแทนจำหน่าย',
        'bullet'=>'fa fa-truck',
        'url'=>site_url('inventory/supplier'),
        'item'=>array(),
    ),
    'shelf'=>array(
        'label'=>'ชั้นวางสินค้า',
        'bullet'=>'fa fa-tasks',
        'url'=>site_url('inventory/shelf'),
        'item'=>array(),
    ),
    'product'=>array(
        'label'=>'สินค้า',
        'bullet'=>'fa fa-dropbox',
        'url'=>site_url('inventory/product'),
        'item'=>array(),
    ),/*
    'add_product'=>array(
        'label'=>'เพิ่มสินค้า',
        'bullet'=>'fa fa-plus',
        'url'=>site_url('inventory/form_product'),
        'item'=>array(),
    ),*/
);

print gen_menu($menu);