<?php

namespace App\Http\Requests;

use App\Enum\FamilyRelation;
use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'  => 'string|required',
            'last_name'   => 'string|required',
            'middle_name' => 'string',
            'birth_date'  => 'date',
            'death_date'  => 'date',
            'biography'   => 'string',
            'photo'       => 'image|size:2048',
            'relation'    => 'string|required|in:' . implode(',', array_map(fn($i)=>$i->value,FamilyRelation::cases()))
        ];
    }
}
