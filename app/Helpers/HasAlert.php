<?php

namespace App\Helpers;

trait HasAlert{
    public function success($mgs): void
    {
        session()->flash("success",$mgs);
    }

    public function error($mgs): void
    {
        session()->flash("error",$mgs);
    }
}
