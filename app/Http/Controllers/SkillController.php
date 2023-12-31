<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Events\CandidateProfileUpdated;
/**
 * Class SkillController
 * @package App\Http\Controllers
 */
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $skills = Skill::where('user_rut', $user->rut)->paginate();

        return view('skill.index', compact('skills'))
            ->with('i', (request()->input('page', 1) - 1) * $skills->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill = new Skill();
        $user = auth()->user();
        return view('skill.create', compact('skill','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Skill::$rules);

        $skill = Skill::create($request->all());
        event(new CandidateProfileUpdated(auth()->user()));

        return redirect()->route('skills.index')
            ->with('success', 'Skill created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $skill = Skill::where('id', $id)->where('user_rut', $user->rut)->firstOrFail();

        return view('skill.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);

        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        request()->validate(Skill::$rules);

        $skill->update($request->all());
        event(new CandidateProfileUpdated(auth()->user()));

        return redirect()->route('skills.index')
            ->with('success', 'Skill updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $skill = Skill::find($id)->delete();
        event(new CandidateProfileUpdated(auth()->user()));

        return redirect()->route('skills.index')
            ->with('success', 'Skill deleted successfully');
    }
}
