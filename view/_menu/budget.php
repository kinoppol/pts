<?php

$menu['งบประมาณและเงินรายได้']=array(
    'money'=>array(
        'label'=>'งบ',
        'bullet'=>'tf-icons bx bx-lock-open-alt',
        'url'=>site_url('money'),
        'item'=>array(
            'bud_persernal'=>array(
                'label'=>'งบบุคลากร',
                'bullet'=>'tf-icons bx bx-lock-open-alt',
                'url'=>site_url('money/personal'),
            ),
            'bud_invesment'=>array(
                'label'=>'งบลงทุน',
                'bullet'=>'tf-icons bx bx-lock-open-alt',
                'url'=>site_url('money/budget'),
            ),
            'bud_support'=>array(
                'label'=>'งบสนับสนุน',
                'bullet'=>'tf-icons bx bx-lock-open-alt',
                'url'=>site_url('money/support'),
            ),
            'bud_other'=>array(
                'label'=>'งบรายจ่ายอื่น',
                'bullet'=>'tf-icons bx bx-lock-open-alt',
                'url'=>site_url('money/other'),
            ),
        ),
    ),
    'budget'=>array(
        'label'=>'เงินรายได้สถานศึกษา',
        'bullet'=>'tf-icons bx bx-lock-open-alt',
        'url'=>site_url('budget/shelf'),
        'item'=>array(
            'inc_support'=>array(
                'label'=>'เงินบำรุงการศึกษา',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('budget/edu'),
            ),
            'inc_promote'=>array(
                'label'=>'การจัดซื้อจัดจ้าง',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('budget/buy'),
            ),
            'inc_technology'=>array(
                'label'=>'เงินสนับสนุนเทคโนโยี',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('budget/tech'),
            ),
            'bud_bdegree'=>array(
                'label'=>'เงินบำรุงการศึกษา ปริญญาตรี',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('budget/store'),
            ),
        ),
    ),
);

print gen_menu($menu);