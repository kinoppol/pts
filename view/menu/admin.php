<?php

$menu['จัดการระบบ']=array(
    'user'=>array(
        'label'=>'จัดการผู้ใช้',
        'bullet'=>'tf-icons bx bx-lock-open-alt',
        'url'=>site_url('user/view'),
        'item'=>array(),
    ),
    'config'=>array(
        'label'=>'คั้งค่าการทำงาน',
        'url'=>site_url('config'),
        'bullet'=>'tf-icons bx bx-lock-open-alt',
        'item'=>array(/*
            'store'=>array(
                'label'=>'ข้อมูลร้าน',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
            'time'=>array(
                'label'=>'เวลาทำการ',
                'bullet'=>'fa fa-clock-o',
                'url'=>site_url('config/time'),
            ),*/
        ),
    )
);

print gen_menu($menu);