<?php

namespace Modules\MenuItem\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:menu_items,title,' . $this->menu_item,
            'alias' => 'required|unique:menu_items,alias,' . $this->menu_item . '|max:255',
            'path' => 'required|unique:menu_items,path,' . $this->menu_item . '|max:255',
            'association' => 'required|json',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
