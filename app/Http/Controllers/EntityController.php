<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntityController extends BaseController
{
    public function __construct()
    {
        $this->class = Person::class;
        $this->type_person_id = 4;
        $this->page_return = "entities.index";
        $this->page = "entities";
    }
//
//    public function index(){
//        $persons = $this->class::with('cities')->join('person_type_person','person_type_person.person_id','=','persons.id')
//            ->where('person_type_person.type_person_id',$this->type_person_id)
//            ->get();//;
//        return view("{$this->page_return}", compact('persons'));
//    }
}
