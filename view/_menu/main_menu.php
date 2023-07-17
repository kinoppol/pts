<?php
helper('sneat/menu');
$menu='';
$menu.=view('_menu/admin');
$menu.=view('_menu/budget');
$menu.=view('_menu/project');
print $menu;