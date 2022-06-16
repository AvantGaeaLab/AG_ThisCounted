<?php

if(!function_exists("isAdmin")) {
    function isAdmin()
    {
        if (Auth::id() > 4) {
            return abort(401);
        }
    }

    function isDev(){
        if (!Auth::id() == 4) {
            return abort(401);
        }
    }
}
