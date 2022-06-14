<?php

if(!function_exists("isAdmin")) {
    function isAdmin()
    {
        if (Auth::id() > 3) {
            return abort(401);
        }
    }
}
