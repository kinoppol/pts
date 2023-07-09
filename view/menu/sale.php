<?php

$menu['โปรแกรมบันทึกเงินสด']=array(
    'sale'=>array(
        'label'=>'ขายหน้าร้าน',
        'bullet'=>'fa fa-desktop',
        'url'=>site_url('sale/pos'),
        'item'=>array(),
    ),
    'sale_report'=>array(
        'label'=>'รายงานการขาย',
        'url'=>site_url('sale/report'),
        'bullet'=>'fa fa-dollar',
        'item'=>array(
            'daily'=>array(
                'label'=>'รายวัน',
                'bullet'=>'fa fa-calendar',
                'url'=>site_url('sale_report/daily'),
            ),
            'monthly'=>array(
                'label'=>'รายเดือน',
                'bullet'=>'fa fa-calendar',
                'url'=>site_url('sale_report/monthly'),
            ),
            'annual'=>array(
                'label'=>'รายปี',
                'bullet'=>'fa fa-calendar',
                'url'=>site_url('sale_report/annual'),
            ),
            'custom'=>array(
                'label'=>'กำหนดเอง',
                'bullet'=>'fa fa-calendar',
                'url'=>site_url('sale_report/custom'),
            )
        ),
    )
);

print gen_menu($menu);