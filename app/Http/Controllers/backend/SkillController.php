<?php

namespace App\Http\Controllers\backend;



use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    //INDEX
    public function skillIndex() {
       return view('backend.index');
    }

    //STRORE SKILL'S
    public function storeSkills(Request $request) {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);
        $skillStore = new Skill();
        $skillStore->year = $request->year;
        $skillStore->institute = $request->year;
        $skillStore->title = $request->title;
        $skillStore->description = $request->description;
        $skillStore->type = $request->type;
        $skillStore->skill_range = $request->skill_range;
        $skillStore->save();
        return back();
        alert()->success('Title','Lorem Lorem Lorem');
        
    }
}
