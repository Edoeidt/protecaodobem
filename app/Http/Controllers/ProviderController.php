<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Person;
use Illuminate\Http\Request;

class ProviderController extends BaseController
{
    public function __construct(){
        $this->class = Person::class;
        $this->type_person_id = 2;
        $this->page_return = "providers.index";
        $this->page = "providers";
    }
}
