<?php
if(!function_exists('active_sidebar'))
{
    function active_sidebar($route)
    {
        if(request()->segment(2)== $route)
        {
            return ['menu'=>'menu-item-active','open'=>'menu-item-open'];       
        }
        else
        {
            return ['menu'=>'','open'=>''];       

        }
    }
}

