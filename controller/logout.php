<?php
class logout{
    function index(){
        if(isset($_SESSION['user'])){unset($_SESSION['user']);}
        print "โปรดรอสักครู่..";
        return redirect(site_url('/'),2);
    }
}