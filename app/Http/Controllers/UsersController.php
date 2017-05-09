<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Task;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller 
{
	
	
	public function __construct(){
	}
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
	    return view('users.index', compact('users'));
	   // return view('projects.index');
    }
    public function edit(User $user)
	{
		return view('users.edit', compact('user'));
	}
		public function show(User $user,Request $request)
		{
			return view('users.show', compact('user'));		
     	}
	
	public function update(User $user,Request $request)
	{
	If(Auth::user()->can('change-password',$user))
		{
		$this->validate($request, [
			'password'=> 'required|min:6|confirmed'
			]);
		$user->update(['password' => bcrypt($request->password)]);
		return Redirect()->route('users.index',$user->id)->with('message', 'Password updated.');
	} else {
		return Redirect()->back()->withErrors('You are not authorized to do this action');
	}

	}
	public function destroy(user $user,Request $request)
	{
		$user->delete();
		return Redirect() ->route('users.index')->with('message', 'user deleted.');
	}
//     public function register(Request $request)
//    {
//         $data=$request->only('name','email','password');
//         $data['password']=bcrypt($data['password']);

//         User::create($data);
//         return redirect()-> route('projects.index')->with('message', 'Account created');
//     }

//     public function login(Request $request)
//        {
//         $data=$request->only('email','password');
//         // return $data;
//         // $data['password']=bcrypt($data['password']);
//         if (Auth::attempt($data)) {
//             return redirect()->route('projects.index')->with('message', 'Logged in');
//         }
//         return back()->withErrors('Authorization Failed');
   // }
   public function changeName(user $user,Request $request)
	{
		$user->name=$request->name;
		$user->update();
		return Redirect()->route('users.index',$user->id)->with('message', 'name updated.');

	}
	public function myTask(Request $request)
		{
			$user=Auth::user();
			$tasks=Task::where('assignee_id',$user->id)->get();
			return view('users.mytask',compact('tasks'));

     	}
	
	}
