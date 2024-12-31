<?php

namespace App\Http\Controllers\backend;



use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    //INDEX
    public function skillIndex() {
       return view('backend.skills.skill');
    }

    //STRORE SKILL'S
    public function storeSkills(Request $request) {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);
        
        $skillStore = new Skill();
        $skillStore->year = $request->year;
        $skillStore->institute = $request->institute; // Corrected from $request->year to $request->institute
        $skillStore->title = $request->title;
        $skillStore->description = $request->description;
        $skillStore->type = $request->type;
        $skillStore->skill_range = $request->skill_range;
        $skillStore->save();
    
        // Redirect back with a success message
        return back()->with('success', 'Skill stored successfully!');
    }
}
