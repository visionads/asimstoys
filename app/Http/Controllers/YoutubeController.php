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
       
	   $image=Input::file('image');
	   
	   
	   if(count($image)>0) {
			
			$file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/youtube/';
			
			$uploadfolder = 'uploads/';

			if ( !file_exists($uploadfolder) ) {
				$oldmask = umask(0);  // helpful when used in linux server
				mkdir ($uploadfolder, 0777);
			}
			if ( !file_exists($destinationPath) ) {
				$oldmask = umask(0);  // helpful when used in linux server
				mkdir ($destinationPath, 0777);
			}
			
			if($image){
				$file_name = YoutubeController::image_upload($image, $file_type_required, $destinationPath);
			}
			
			if (isset($file_name) != '') {
				
				@unlink(public_path()."/".$model->image);
                @unlink(public_path()."/".$model->thumbnail);

				$input['image'] = $file_name[0];
				$input['thumbnail'] = $file_name[1];
			}
	   }
		
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
       $image=Input::file('image');
	   
	   
	   if(count($image)>0) {
			
			$file_type_required = 'png,jpeg,jpg';
            $destinationPath = 'uploads/youtube/';
			
			$uploadfolder = 'uploads/';

			if ( !file_exists($uploadfolder) ) {
				$oldmask = umask(0);  // helpful when used in linux server
				mkdir ($uploadfolder, 0777);
			}
			if ( !file_exists($destinationPath) ) {
				$oldmask = umask(0);  // helpful when used in linux server
				mkdir ($destinationPath, 0777);
			}
			
			if($image){
				$file_name = YoutubeController::image_upload($image, $file_type_required, $destinationPath);
			}
			
			if (isset($file_name) != '') {
				
				@unlink(public_path()."/".$model->image);
                @unlink(public_path()."/".$model->thumbnail);

				$input['image'] = $file_name[0];
				$input['thumbnail'] = $file_name[1];
			}
	   }

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
				
				if($model->image != null){
                    unlink($model->image);
                    unlink($model->thumbnail);
                }
				
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
	
	
	 public function image_upload($image,$file_type_required,$destinationPath){
        if ($image != '') {

            $img_name = ($_FILES['image']['name']);
            $random_number = rand(111, 999);

            $thumb_name = 'thumb_200x200_'.$random_number.'_'.$img_name;

            $newWidth=120;
            $targetFile=$destinationPath.$thumb_name;
            $originalFile=$image;

            $resizedImages 	= ImageResize::resize($newWidth, $targetFile,$originalFile);

            $thumb_image_destination=$destinationPath;
            $thumb_image_name=$thumb_name;

            //$rules = array('image' => 'required|mimes:png,jpeg,jpg');
            $rules = array('image' => 'required|mimes:'.$file_type_required);
            $validator = Validator::make(array('image' => $image), $rules);
            if ($validator->passes()) {
                // Files destination
                //$destinationPath = 'uploads/slider_image/';
                // Create folders if they don't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $image_original_name = $image->getClientOriginalName();
                $image_name = rand(11111, 99999) . $image_original_name;
                $upload_success = $image->move($destinationPath, $image_name);

                $file=array($destinationPath . $image_name, $thumb_image_destination.$thumb_image_name);

                if ($upload_success) {
                    return $file_name = $file;
                }
                else{
                    return $file_name = '';
                }
            }
            else{
                return $file_name = '';
            }
        }
    }

   

}
