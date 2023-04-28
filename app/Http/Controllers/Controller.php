<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{ 
    public function USER_ID() {
        if (isset($_GET['ClearFilter']))  {
            return redirect(strtok($_SERVER['REQUEST_URI'], '?'));
        }

        return $Id = request()->session()->get('Id');
    }

    use AuthorizesRequests, ValidatesRequests;
}
