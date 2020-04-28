<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Person;
use App\Models\PersonCity;
use App\Models\PersonTypePerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function foo\func;

class BaseController extends Controller
{
    protected $class;
    protected $type_person_id;
    protected $page_return;
    protected $page;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $persons = $this->class::with('cities')
            ->join('person_type_person','person_type_person.person_id','=','persons.id')
            ->join('person_city',function($q){
                $q->on('person_city.person_id','=','persons.id')
                    ->where('person_city.city_id',Session::get('city_id'));
            })
            ->select('persons.*')
            ->where('person_type_person.type_person_id',$this->type_person_id)
            ->get();//;

        return view("{$this->page_return}", compact('persons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::id()){
            $cities = City::where('id',Session::get('city_id'))->get();
        }else{
            $cities = City::all();
        }
        return view("{$this->page}.create",compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $person = Person::create([
                'name' => $request->get('name'),
                'contact_name' => $request->get('contact_name'),
                'national_registry' => $request->get('national_registry'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
            ]);
            if ($this->type_person_id){
                PersonTypePerson::create([
                    'person_id'=>$person->id,
                    'type_person_id'=>$this->type_person_id
                ]);
            }
            PersonCity::create([
                'person_id'=>$person->id,
                'city_id' =>$request->city_id
            ]);
            DB::commit();
            if (Auth::id()){
                return redirect("/{$this->page}")->with('success', 'Salvo com Sucesso!');
            }else{
                return back()->with('success', 'Salvo com Sucesso!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage(), 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = $this->class::with('cities')
            ->join('person_type_person','person_type_person.person_id','=','persons.id')
            ->join('person_city',function($q){
                $q->on('person_city.person_id','=','persons.id')
                    ->where('person_city.city_id',Session::get('city_id'));
            })
            ->select('persons.*')
            ->where('persons.id',$id)
            ->first();
        return view("{$this->page}.edit", compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $contact = Person::find($id);
        $contact->fill($request->all());
        $contact->save();

        return redirect('/logistic')->with('success', 'Person updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Person::find($id);
        $contact->delete();

        return redirect('/logistic')->with('success', 'Person deleted!');
    }
}
