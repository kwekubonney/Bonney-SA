<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Agent;
use App\Staff;
use App\Press;
use App\Fixture;
use App\Gameassign;
use App\User;
use App\Team;

class settingController extends Controller
{
    //

    public function index(){
        $roles = Role::all();
         $permissions = Permission::all();
    	return view('admin.setting.role_permission', ['roles'=>$roles, 'permissions'=>$permissions]);
    }

    public function rolecreate(Request $req){
    	$role = $req->input('roleName');

    	Role::create(['name'=> $role]);

    	return redirect()->back();
    }

    public function permissioncreate(Request $req){
    	$permission = $req->input('permissionName');
    	Permission::create(['name'=> $permission]);

    	return redirect()->back();
    }


    public function createTeam(){
         $teams = Team::all();

        return view('admin.team_create')->with('teams', $teams);
    }

    public function createAgent(Request $request){
        
            $this->users($request->input('email'), $request->input('name'), $request->input('kind'));


            $userId = User::where('email', $request->input('email'))->get();
            foreach($userId as $id){
                $uId = $id->id;
            }
            // Filling the teamrep table

            $agent = new Agent();
                $agent->user_id = $uId;
                $agent->firstName = $request->input('firstName');
                $agent->lastName = $request->input('lastName');
                $agent->contact = $request->input('contact');
                $agent->dob = $request->input('dob');
                $agent->address = $request->input('address');
                $agent->image = $request->input('email');
                $agent->save();

                return redirect()->back();
    }

     public function createStaff(Request $request){
          $this->users($request->input('email'), $request->input('name'), $request->input('kind'));


            $userId = User::where('email', $request->input('email'))->get();
            foreach($userId as $id){
                $uId = $id->id;
            }
            // Filling the teamrep table

            $staff = new Staff();
                $staff->user_id = $uId;
                $staff->firstName = $request->input('firstName');
                $staff->lastName = $request->input('lastName');
                $staff->contact = $request->input('contact');
                $staff->position = $request->input('position');
                $staff->dob = $request->input('dob');
                $staff->address = $request->input('address');
                $staff->image = $request->input('email');
                $staff->save();

                return redirect()->back();
    }

     public function createPress(Request $request){
         $this->users($request->input('email'), $request->input('name'), $request->input('kind'));


            $userId = User::where('email', $request->input('email'))->get();
            foreach($userId as $id){
                $uId = $id->id;
            }
            // Filling the teamrep table

            $press = new Press();
                $press->user_id = $uId;
                $press->firstName = $request->input('firstName');
                $press->lastName = $request->input('lastName');
                $press->contact = $request->input('contact');
                $press->entity = $request->input('entity');
               // $press->dob = $request->input('dob');
                $press->address = $request->input('address');
                $press->image = $request->input('email');
                $press->save();

                return redirect()->back();
    }

    public function assignPermission(Request $req){
        $permission = $req->input('permission');
        
        for($i=0; $i < count($permission); $i++){
             
            $role = Role::find(intval($req->input('role')));
           

            $role->givePermissionTo($permission[$i]);
                  
                            }
        return back(); 

        
    }




    public function users($email, $name, $kind){
        $users = new User();
            $users->email = $email;
            $users->name = $name;
            $users->kind = $kind;
            $users->password =  Hash::make('password123');
            $users->save();  
    }

    public function assign(Request $request){
        $fix = $request->input('fixtureId');
        $fixture = Fixture::find($fix);
        $fixture->status = 'assigned';

        $gameassign = new Gameassign();
        $gameassign->fixture_id = $fix;
        $gameassign->user_id = $request->input('agentId');
        $gameassign->save();
        $fixture->save();

        return redirect('/configuration');
    }
}
