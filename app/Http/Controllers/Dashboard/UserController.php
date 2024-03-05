<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use UploadTrait;

    // all users
    public function index(){
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }

    // Create users
    public function create(){
        $roles = User::all();
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(UserRequest $request){
        try {
            //save photo
            $file_name=$this ->saveImage($request->photo,'images/dashboard/admins');
            //fetch data
            $admins = $request->all();
            //hash password
            $hashedPassword = Hash::make($admins['password']);
            //store data
            $admins = User::create([
                'name'=> $admins['name'],
                'email'=> $admins['email'],
                'password'=> $hashedPassword ,
                'photo'=>$file_name,
            ]);
            return redirect()->route('users.index')->with('success', 'Admin added successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error adding Admin: ' . $e->getMessage())->withInput();
            }
    }

    public function edit($id){
        $users = User::find($id);
        $roles = \App\Models\User::$roles;
        if (!$users) {
            return redirect()->route('users.index')->with(['error' => 'This Admin Is Not Found']);
        }

        return view('dashboard.users.edit', compact('users','roles'));
    }

    public function update(UserRequest $request,$id){

        try {
            $users = User::find($id);

            if (!$users) {
                return redirect()->route('users.index')->with('error', 'User not found');
            }

            // Update other data
            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);

            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {

            return redirect()->route('users.index')->with('error', 'Error updating User: ' . $e->getMessage())->withInput();
        }

    }

    public function destroy ($id){
        $users = User::destroy($id);

        if ($users) {
            return redirect()->route('users.index')->with('success', 'Admin deleted successfully');
        } else {
            return redirect()->route('users.index')->with('error', 'Admin not found');
        }
    }
    public function getProfile(){
        $users = User::all();
        return view('dashboard.users.profile',compact('users'));
    }

    public function profileUpdate(UserRequest $request){

        try {
            $users=User::Find(Auth::user()->id);

            if (!$users) {
                return redirect()->route('dashboard.index')->with('error', 'user not found');
            }
            // Check if the request has an image
            if ($request->hasFile('photo')) {

                // Save the new image
                $file_name = $this->saveImage($request->photo, 'images/dashboard/admins');

                // Update the movie with the new image
                $users->update([
                    'photo' => $file_name
                ]);
            }

            // Update other data
            $users->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('dashboard.index')->with('success', 'Data updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating Data: ' . $e->getMessage())->withInput();
        }

    }


}
