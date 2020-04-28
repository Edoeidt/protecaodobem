<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Person;
use Illuminate\Http\Request;

class DonatorController extends BaseController
{
    public function __construct()
    {
        $this->class = Person::class;
        $this->type_person_id = 1;
        $this->page_return = "donators.index";
        $this->page = "donators";
    }


}
