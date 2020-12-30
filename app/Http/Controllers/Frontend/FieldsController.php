<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;

class FieldsController extends Controller
{
    
    public function index()
    {

        //$last_record = Local::latest('id')->first();

        //SEO =======================================
        /*
        $seo = $this->seo->get_seo('COVID-19 seguimiento mundial',
        "https://sarstracker.com/storage/covid-19-wolrd-v2.jpg",
        'Evolución diaria de casos de COVID19 a nivel mundial',
        ""
        );
        */

        return view('frontend/cover', ['seo' => 'xxx']);
        
    }

    public function fields_x_players($players = 1)
    {
        $fields = Field::where('tag_id', $players)->orderBy('name', 'ASC')->get();
        $options = '<option value="0" selected="">Pick a Field --</option>';
        foreach($fields as $field){
            $options .= '<option value="'.$field->id.'">'.$field->name.'</option>';
        }
        return $options;
        
    }



}
