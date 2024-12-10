<?php

namespace App\Http\Controllers\frontend;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
   public function viewIndex() {

    $educations = Skill::where('type','education')->get();
    $experiences = Skill::where('type','experience')->get();
    $skills = Skill::where('type','skill')->get();

    return view('index', compact('educations', 'experiences', 'skills'));
    
   }
}
