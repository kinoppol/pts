<?php

$menu['งบประมาณและเงินรายได้']=array(
    'budget'=>array(
        'label'=>'งบ',
        'bullet'=>'fa fa-truck',
        'url'=>site_url('inventory/supplier'),
        'item'=>array(
            'bud_persernal'=>array(
                'label'=>'งบบุคลากร',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
            'bud_invesment'=>array(
                'label'=>'งบลงทุน',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
            'bud_support'=>array(
                'label'=>'งบสนับสนุน',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
            'bud_other'=>array(
                'label'=>'งบรายจ่ายอื่น',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
        ),
    ),
    'income'=>array(
        'label'=>'เงินรายได้สถานศึกษา',
        'bullet'=>'fa fa-tasks',
        'url'=>site_url('inventory/shelf'),
        'item'=>array(
            'inc_support'=>array(
                'label'=>'เงินบำรุงการศึกษา',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
            'inc_promote'=>array(
                'label'=>'การจัดซื้อจัดจ้าง',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
            'inc_technology'=>array(
                'label'=>'เงินสนับสนุนเทคโนโยี',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
            'bud_bdegree'=>array(
                'label'=>'เงินบำรุงการศึกษา ปริญญาตรี',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/store'),
            ),
        ),
    ),
);

print gen_menu($menu);