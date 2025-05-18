<?php

namespace App\Http\Controllers;
use App\Models\Papaya;

use Illuminate\Http\Request;

class PapayaController extends Controller
{
    //

    public function addpage(Request $r){

        $model = Papaya::first() ?? new Papaya;

        $model->sec1title = $r->sec1title;
        $model->sec1text = $r->sec1text;
        $model->sec1image = $r->sec1image;
    
        $model->sec2title = $r->sec2title;
        $model->sec2addtext = $r->sec2addtext;
    
        $model->sec3title = $r->sec3title;
        $model->sec3text = $r->sec3text;
        $model->sec3addtext = $r->sec3addtext;
        $model->sec3points = $r->sec3points;
    
        $model->sec4title = $r->sec4title;
    
        $model->sec5title = $r->sec5title;
    
        $model->sec6title = $r->sec6title;
        $model->sec6image = $r->sec6image;
    
        $model->sec7title = $r->sec7title;
    
        $model->sec8title = $r->sec8title;
        $model->sec8image = $r->sec8image;
    
        $model->sec9title = $r->sec9title;
    
        $model->sec10title = $r->sec10title;
        $model->sec10content = $r->sec10content;
        $model->sec10addtext = $r->sec10addtext;
        $model->sec10imagez = $r->sec10imagez;
    
        $model->sec11title = $r->sec11title;
        $model->sec11image = $r->sec11image;
        $model->sec11text = $r->sec11text;
    
        $model->sec12title = $r->sec12title;
        $model->sec12image = $r->sec12image;
        $model->sec12text = $r->sec12text;
    
        $model->save();
    
        return back()->with('success', 'Papaya section updated successfully!');



    }
}
