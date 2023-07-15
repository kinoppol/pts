<?php
class logout{
    function index(){
        unset($_SESSION['user']);
        print "โปรดรอสักครู่..";
        return redirect(site_url(''),2);
    }
}