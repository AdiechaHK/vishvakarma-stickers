<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\City;
use Auth;

class CityRequest extends FormRequest
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
        return [
            'name' => ["required", "min:3", "max:250"]
        ];
    }

    public function saveCity(City $city)
    {
        $fields = ['name'];
        foreach ($fields as $field) {
            $city->$field = $this->$field;
        }
        $city->save();
        return redirect(route('cities.index'));
    }

}
