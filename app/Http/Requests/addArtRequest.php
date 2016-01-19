<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

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
            'title'                 => 'required',
            'description'           => 'required',
            'condition'             => 'required',
            'dimensions'            => 'required',
            'artist'                => 'required',
            'artyear'               => 'numeric|size:4',

            'death'                 => 'numeric|size:4',
            'birth'                 => 'numeric|size:4',
            'min'                   => 'required|numeric',
            'max'                   => 'required|numeric',
            'price'                 => 'required|numeric',
            'duration'              => 'required|numeric',
            'pic.0'                 => 'required|image',
            'pic.1'                 => 'required|image',
            'pic.2'                 => 'required|image',
            'pic.3'                 => 'required|image',
        ];
// $validator = parent::getValidatorInstance();


//     $validator->each('files', ['pic']);
//         foreach('pic' as $key => $val)
//           {
//             $rules['img.'.$key] = 'Image';
//             if($key==0)
//             {
//                 $rules['img.'.$key] .= '|required';
//             }
//           }

        return $rules;
    }
}
