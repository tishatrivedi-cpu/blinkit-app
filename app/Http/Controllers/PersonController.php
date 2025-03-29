<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function index()
    {
        $data = Person::latest()->paginate(3);
        return view('users.index', compact('data'));
    }

  public function block_unblock($id)  {
        $p=Person::find($id);
        if($p->status){
            $p->status=false;
        }else{
            $p->status=true;
        }
        $p->save();
        return redirect('/allusers');
    }
}
