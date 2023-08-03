<?php

$menu['โครงการ']=array(
    'project'=>array(
        'label'=>'จัดการโครงการ',
        'bullet'=>'tf-icons bx bx-customize',
        'url'=>site_url(),
        'item'=>array(
            'list'=>array(
                'label'=>'จัดการโครงการ',
                'url'=>site_url('project/list'),
            ),
            'tracking'=>array(
                'label'=>'ติดตามโครงการ',
                'bullet'=>'tf-icons bx bx-line-chart',
                'url'=>site_url('project/tracking'),
            )
        ),
    ),
    'summary'=>array(
        'label'=>'สรุปรายงาน',
        'url'=>site_url('summary/index'),
        'bullet'=>'tf-icons bx bx-notepad',
        'item'=>array(
            
        ),
    )
);

print gen_menu($menu);