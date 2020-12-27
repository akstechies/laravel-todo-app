<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function uploadAvatar(Request $request)
    {
        //dd(request()->all());
        //dd($request->all());
        //dd($request->file('image'));
        //dd($request->image);
        //dd($request->hasFile('image'));

        //$request->image->store('images');
        //$request->image->store('images', 'public');

        if($request->hasFile('image')){

            User::uploadAvatar($request->image);
            //session()->put('message', "Image Uploaded");
            //$request->session()->flash('message', "Image Uploaded");
            /*$filename = $request->image->getClientOriginalName();
            $this->deleteOldImage();
            $request->image->storeAs('images', $filename, 'public');
            //User::find(1)->update(['avatar' => $filename]);
            auth()->user()->update(['avatar' => $filename]);*/

            return redirect()->back()->with('message', "Image Uploaded");
        }

        //$request->session()->flash('error', "Image Not Uploaded");
        
        return redirect()->back()->with('error', "Image Not Uploaded");
    }

    /*protected function deleteOldImage()
    {
        if(auth()->user()->avatar){
            Storage::delete('/public/images/'.auth()->user()->avatar);
        }
    }*/

    public function index()
    {

        //Insert

        $data = [
            'name' => 'Nayan',
            'email' => 'nayan@gmail.com',
            'password' => "ayush",
        ];
        //User::create($data);

        /* $user = new User();
        //var_dump($user);
        //dd($user);

         $user->name = "Abhinav";
        $user->email = "nayan@gmail.com";
        $user->password = bcrypt("12345");

        $user->save(); */  //Insert

        $user = User::all();
        return $user; //Select

        //User::where('id',2)->delete();

        //User::where('id',7)->update(['email' => 'abhinav@nayan.com']);










        //DB::insert('insert into users (name, email, password) values (?, ?, ?)', ["AKS Techies", 'akstechies@gmail.com', 'aks123']);

        /* $users = DB::select('select * from users');
        return $users; */


        // DB::update('update users set name = ? where id = 1', ['Ayush']);

        //$deleted = DB::delete('delete from users');

        /* $deleted = DB::delete('delete from users where id = 4');
        $users = DB::select('select * from users');
        return $users; */

        return view('home');
    }
}
