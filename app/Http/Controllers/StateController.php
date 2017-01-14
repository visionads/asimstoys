<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\State;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Session;
use Input;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pageTitle = "State";
       return view('state.index', ['pageTitle'=> $pageTitle]);
    }

     public function add_index()
    {
        $pageTitle = "State";
        return view('state.add', ['pageTitle'=> $pageTitle]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        DB::beginTransaction();
        try {
            State::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();

            Session::flash('flash_message_error', $e->getMessage());
        }
        return redirect()->route('state-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
