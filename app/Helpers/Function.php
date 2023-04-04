<?php

if (!function_exists('hello')) {



    function hello($name = "ars") :string
    {
        return "Hello {$name}";
    }
}
