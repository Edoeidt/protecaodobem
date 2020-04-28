<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Person;
use Illuminate\Http\Request;

class WorkController extends BaseController
{
    public function __construct()
    {
        $this->class = Person::class;
        $this->type_person_id = 5;
        $this->page_return = "work.index";
        $this->page = "work";
    }
}
