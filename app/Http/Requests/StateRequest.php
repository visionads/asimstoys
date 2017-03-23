<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class StateRequest extends Request{
	/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = Request::Input('id') ? Request::Input('id') : '';

        return [
            'title' => 'required|unique:states,title,'.$id,
            'slug' => 'required|unique:states,slug,'.$id,
            'status' => 'required',
        ];
    }
}