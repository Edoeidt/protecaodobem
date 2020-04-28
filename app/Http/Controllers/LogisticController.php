<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogisticController extends BaseController
{
    public function __construct()
    {
        $this->class = Person::class;
        $this->type_person_id = 3;
        $this->page_return = "logistic.index";
        $this->page = "logistic";
    }

//    public function index()
//    {
//        $persons = $this->class::with('cities')->join('person_type_person','person_type_person.person_id','=','persons.id')
//            ->where('person_type_person.type_person_id',$this->type_person_id)
//            ->get();//;
//        return view("{$this->page_return}", compact('persons'));
//    }
}
