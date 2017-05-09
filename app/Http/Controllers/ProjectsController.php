<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
Use Auth;

class ProjectsController extends Controller
{
	protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
	];
  public function index()
  {
      $projects = Project::orderBy('id','desc')->get();
	  	return view('projects.index', compact('projects'));
	   // return view('projects.index');
  }
  public function show(Project $project)
	{
		return view('projects.show', compact('project'));
	}
  public function create()
	{
		return view('projects.create');
	}
  public function edit(Project $project)
	{
		return view('projects.edit', compact('project'));
	}
 
 public function store(Project $project, Request $request)
{
	$this->validate($request, $this->rules);
	$input = $request->all();
	$input['user_id']= Auth::user()->id;
	Project::create( $input );
	return Redirect() ->route('projects.index')->with('message', 'Project created');
}
   public function update(Project $project,Request $request)
{
	$this->validate($request, $this->rules);
	$input = array_except($request->all(), '_method');
	$project->update($input);
 
	return Redirect() ->route('projects.show', $project->slug)->with('message', 'Project updated.');
}
 public function destroy(Project $project)
{
	$project->delete();
 
	return Redirect() ->route('projects.index')->with('message', 'Project deleted.');
}
}
