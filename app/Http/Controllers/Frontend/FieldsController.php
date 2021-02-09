<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;

class FieldsController extends Controller
{
    
    public function index()
    {

        return view('frontend/cover', ['seo' => 'xxx']);
        
    }

    public function fields_x_players($players = 1)
    {
        if($players == 1 or $players == 2){
            $fields = Field::where([['tag_id', $players], ['status', 1]])->orderBy('number', 'ASC')->get();
        }else{
            $fields = Field::where('status', 1)->orderBy('number', 'ASC')->get();
        }
        
        if(count($fields) > 0){
            $options = '<option value="0" selected="">Pick a Field --</option>';
            foreach($fields as $field){
                $options .= '<option value="'.$field->id.'">'.$field->number.'. '.$field->name.'</option>';
            }
        }else{
            $options = '<option value="0"> -- No fields available </option>';
        }

        return $options;
        
    }



}
