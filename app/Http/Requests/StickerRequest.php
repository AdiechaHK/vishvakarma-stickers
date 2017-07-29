<?php

namespace App\Http\Requests;

use App\Sticker;
use Illuminate\Foundation\Http\FormRequest;

class StickerRequest extends FormRequest
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
            'name' => ["required", "min:3", "max:250"],
            'surname' => ["required", "min:3", "max:250"],
            
            'vehicle_number' => ["required"],
            'mobile_number' => ["required", "min:10"],

            'city_id' => ["required", "integer", "exists:cities,id"],
            'vehicle_type_id' => ["required", "integer", "exists:vehicle_types,id"],

        ];
    }

    public function saveSticker(Sticker $sticker)
    {

        // dd($this->all());
        $fields = ['name', 'father_name', 'surname',
            'vehicle_number', 'mobile_number', 'city_id', 'vehicle_type_id'];

        foreach($fields as $field) {
            if($this->has($field)) {
                $sticker->$field = $this->$field;
            }
        }
        $sticker->save(); 
        return redirect(route('stickers.index'));
    }
}
