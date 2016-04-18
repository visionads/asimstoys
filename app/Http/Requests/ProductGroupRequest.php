<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class ProductGroupRequest extends Request{
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
            'title' => 'required|unique:groups,title,'.$id,
            'slug' => 'required|unique:groups,slug,'.$id,
            'status' => 'required',
        ];
    }
}