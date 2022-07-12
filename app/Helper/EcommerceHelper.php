<?php

namespace App\Helper;

use App\Models\e_commerce\package_detail;
use Illuminate\Support\Str;

class EcommerceHelper
{
    public function generateUniqueTokenForPackage()
    {
        $_token =  Str::random(32);
        
        if (package_detail::query()->where('token',$_token)->first() != null) {
            (new EcommerceHelper())->generateUniqueTokenForPackage();
        }

        return $_token;
    }
}
