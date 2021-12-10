<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Support\Responsable;

class InviteHttpException extends Exception implements Responsable
{
    public function toResponse($request)
    {
        return redirect()->back()->withErrors(['message'=>$this->getMessage()]);
    }
}
