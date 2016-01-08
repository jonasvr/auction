<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addArtRequest extends Request
{
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
        $rules = [
            'title'                  => 'required',
            'description'           => 'required',
            'condition'             => 'required',
            'artyear'               => 'numeric',
            
            'death'                 => 'numeric',
            'birth'                 => 'numeric',
            'price'                 => 'required|numeric',
        ];

        // foreach($this->request->get('img[]') as $key => $val)
        //   {
        //     $rules['img.'.$key] = 'Image';
        //     if($key==0)
        //     {
        //         $rules['img.'.$key] .= '|required';
        //     }
        //   }

        return $rules;
    }
}
