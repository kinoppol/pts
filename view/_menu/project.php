<?php

$menu['โครงการ']=array(
    'project'=>array(
        'label'=>'จัดการโครงการ',
        'bullet'=>'tf-icons bx bx-lock-open-alt',
        'url'=>site_url(),
        'item'=>array(
            'list'=>array(
                'label'=>'จัดการโครงการ',
                'url'=>site_url('project/list'),
            ),
            'tracking'=>array(
                'label'=>'ติดตามโครงการ',
                'url'=>site_url('project/tracking'),
            )
        ),
    ),
    'summary'=>array(
        'label'=>'สรุปรายงาน',
        'url'=>site_url('summary/index'),
        'bullet'=>'tf-icons bx bx-lock-open-alt',
        'item'=>array(
            
        ),
    )
);

print gen_menu($menu);