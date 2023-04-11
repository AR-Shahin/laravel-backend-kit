<?php

namespace App\Helpers;

trait HasAlert{
    public function success($mgs)
    {
        session()->flash("success",$mgs);
    }

    public function error($mgs)
    {
        session()->flash("error",$mgs);
    }
}
