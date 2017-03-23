<?php
namespace App\Http\Controllers;

use App\State;
use App\Postcode;
use App\Suburbs;
use Illuminate\Http\Request;
use DB;
use Session;
use Input;
use URL;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StandardPostCodeController extends Controller{

	public function state(){

		$pageTitle = "State";

        $data = State::orderBy('id', 'DESC')->paginate(20);
        return view('standardpostcode.state',[
            'pageTitle' => $pageTitle,
            'data' => $data
        ]);

	}

	public function store(Requests\StateRequest $request)
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

        return redirect()->route('standardpostcode-state');
    }

    public function show($slug)
    {
       $data = State::where('slug',$slug)->first();
       $pageTitle ='State';
       return view('standardpostcode.show_state', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    public function edit($slug)
    {
       $data = State::where('slug',$slug)->first();
        return view('standardpostcode.update_state', ['data' => $data]);
    }

    public function update(Requests\StateRequest $request, $slug)
    {
        $model = State::where('slug',$slug)->first();
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', "Successfully Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('standardpostcode-state');
    }

    public function delete($slug)
    {
       
        DB::beginTransaction();
        try {
            $model = State::where('slug',$slug)->first();
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


    public function postcode(Request $request){

        $pageTitle = "Postcode";

        $state_id = ['all'=>'Please select state']+ State::lists('title','id')->all();

        //set null id(s)
        $id_state = null;

        if($_POST){ 

            //declare model
            $model = Postcode::with('relGetstate');

            // if state_id
            if($get_state_id = $request->get('state_id'))
            {
                
                if($get_state_id == 'all'){
                    //do nothing 
                }else{
                    $model = $model->where('state_id', $get_state_id);
                }
                $id_state = $get_state_id;
               
            }
            $data = $model->paginate(20);

        }else{
            $data = Postcode::orderBy('id', 'DESC')->paginate(20);
        }

        
        return view('standardpostcode.postcode',[
            'pageTitle' => $pageTitle,
            'data' => $data,
            'state_id' => $state_id,
            'id_state' => $id_state
        ]);

    }


    public function postcode_store(Requests\PostcodeRequest $request)
    {
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        DB::beginTransaction();
        try {
            
            Postcode::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('standardpostcode-postcode');
    }

    public function postcodeshow($id)
    {
       $data = Postcode::where('id',$id)->first();
       $pageTitle ='Postcode';
       return view('standardpostcode.show_postcode', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    public function postcodeedit($id)
    {
       $data = Postcode::where('id',$id)->first();

       $state_id = [''=>'Please select state']+ State::lists('title','id')->all();

       return view('standardpostcode.update_postcode', ['data' => $data,'state_id' => $state_id]);
    }

    public function postcodeupdate(Requests\StateRequest $request, $id)
    {
        $model = Postcode::where('id',$id)->first();
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', "Successfully Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('standardpostcode-postcode');
    }

     public function postcodedelete($id)
    {
       
        DB::beginTransaction();
        try {
            $model = Postcode::where('id',$id)->first();
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


 public function suburb(Request $request){

        $pageTitle = "Suburb";

        $state_id = ['all'=>'Please select state']+ State::lists('title','id')->all();

        // id null
        $id_state = null;
        $id_postcode = null;
        $postcode_data = null;

        if($_POST){  

            //declare model
            $model = $model = Suburbs::with('relGetstate');

            // if product_group_id
            if($id_state = $request->get('state_id'))
            {
                
                if($id_state == 'all'){
                    //do nothing 
                }else{
                    $model = $model->where('state_id', $id_state);
                }                

                
                
            }
            //if postcode id
            if($id_postcode = $request->get('postcode_id'))
            {
                $model = $model->where('postcode_id', $id_postcode);
                $id_postcode = $id_postcode;
                $postcode_data = Postcode::where('id',$id_postcode);
            }
            //get data 
            $data = $model->paginate(20);

        }else{
            $data = Suburbs::orderBy('id', 'DESC')->paginate(20);
        }

        
        
        return view('standardpostcode.suburb',[
            'pageTitle' => $pageTitle,
            'data' => $data,
            'state_id' => $state_id
        ]);

    }

    public function suburb_postcode_ajax(){

        $input_data = Input::all();
        $state_id = $input_data['state_id'];

        $postcode_data = Postcode::where('state_id',$state_id)->get();

         $select = '';
         $select.='<option value="">Select Postcode</option>';
         foreach($postcode_data as $postcode):
            $select.='<option value="'.$postcode->id.'">'.$postcode->title.'</option>';
         endforeach;

         $ajax_response_data = array(
            'status' => "1",
            'message' => "$select"
        );
        echo json_encode($ajax_response_data);
        exit;

    }


    public function suburb_store(Requests\SuburbRequest $request)
    {
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        DB::beginTransaction();
        try {
            
            Suburbs::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        }catch (\Exception $e) {

            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('standardpostcode-suburb');
    }

     public function suburbshow($id)
    {
       $data = Suburbs::where('id',$id)->first();
       $pageTitle ='Suburb';
       return view('standardpostcode.show_suburb', ['data' => $data,'pageTitle' => $pageTitle]);
    }

    public function suburbedit($id)
    {
       $data = Suburbs::where('id',$id)->first();

       $state_id = [''=>'Please select state']+ State::lists('title','id')->all();

       return view('standardpostcode.update_suburb', ['data' => $data,'state_id' => $state_id]);
    }

    public function suburbupdate(Requests\SuburbRequest $request, $id)
    {
        $model = Suburbs::where('id',$id)->first();
        $input = $request->all();

        $tittle = Input::get('title');
        $slug = str_slug($tittle);
        $input['slug'] = $slug;

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', "Successfully Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->route('standardpostcode-suburb');
    }


     public function suburbdelete($id)
    {
       
        DB::beginTransaction();
        try {
            $model = Suburbs::where('id',$id)->first();
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