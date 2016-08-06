<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Youtube;

use App\Http\Controllers\Controller;
use App\Helpers\ImageResize;
use Illuminate\Support\Facades\Validator;

use DB;
use Session;
use Input;

class YoutubeController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pageTitle = "Youtube Link";
		$data = Youtube::orderBy('id', 'DESC')->paginate(20);
       
        return view('youtube.index',[
                'pageTitle' => $pageTitle,
				'data' => $data
            ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    


    public function store(Requests\YoutubeRequest $request)
    {
       $input = $request->all();
       $link = Input::get('link');
       

       DB::beginTransaction();
        try {
            
            Youtube::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('youtube/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
		
       $data = Youtube::where('id',$id)->first();
       $pageTitle ='Youtube link';
       return view('youtube.show', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Youtube::where('id',$id)->first();
        $pageTitle ='Youtube link';
		
        return view('youtube.update', [
                'data' => $data,
				'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\YoutubeRequest $request, $id)
    {
       $model = Youtube::where('id',$id)->first();
       $input = $request->all();
       $link = Input::get('link');
       

       DB::beginTransaction();
        try {
            
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('youtube/index');
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

    public function delete($id)
    {
       
        DB::beginTransaction();
        try {
            $model = Youtube::where('id',$id)->first();
            if ($model->delete()) {
                DB::commit();               
                Session::flash('flash_message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('flash_message_error',$e->getMessage() );
            return redirect()->back();
        }
    }

   

}
