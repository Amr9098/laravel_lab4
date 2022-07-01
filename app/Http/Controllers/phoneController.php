<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class phoneController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $data=User::find(Auth::id());
        $phones = $data->phones;
     return view('phones.index',compact("phones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
     'phone' => 'required|numeric|unique:phones|digits:11|regex:/^01[012][0-9]{8}$/',

    ]);


    User::find(Auth::id())->phones()->create([
                "phone" =>$request->phone,
                 "users_id"=> Auth::id()
             ]);


            return redirect()->route("phones.index")->withSuccess('success message');;

        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($phone)
    {
        $phone=phone::where('phone',$phone)->first();

        return view('phones.edit', compact("phone"));
            return $phone ;

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
            'phone' => 'required|numeric|regex:/^01[012][0-9]{8}$/',
            Rule::unique('phones')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })->ignore($id)
          
    ]
);
           User::find(Auth::id())->phones()->where('id',$id)->update([
               "phone" =>$request->phone,
            ]);



     return redirect()->route("phones.index");




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($phone)
    {
        phone::where('phone',$phone)->delete();
        return redirect()->route("phones.index");

    }
}
