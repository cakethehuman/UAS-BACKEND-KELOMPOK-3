<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;

    class UserController extends Controller { //show user profile
        public function index() {
            $profil = Auth::user();
            return view('profile.index', compact('profil'));
        }

        public function edit() {
            $profil = Auth::user();
            return view('profile.edit', compact('profil'));
        }

        public function updateName(Request $request) {
            $request->validate([
                'name' => 'required|string|max:50',
                'password' => 'required|string|min:8|max:50',
            ]);

            $profil = Auth::user();

            if (!Hash::check($request->password, $profil->password)) {
                return back()->withErrors([
                    'namePassword'=>'Something is wrong!',
                ]);
            }

            $profil->update(['name'=>$request->name]);
            return redirect()->route('profile.index')->with('success','User name successfully updated');
        }

        public function updateEmail(Request $request) {
            $request->validate([
                'email' => 'required|string|email|max:50|unique:users,email,'. Auth::id(),
                'password' => 'required|string|min:8|max:50',
            ]);

            $profil = Auth::user();

            if (!Hash::check($request->password, $profil->password)) {
                return back()->withErrors([
                    'emailPassword'=>'Something is wrong!',
                ]);
            }

            $profil->update(['email'=>$request->email]);
            return redirect()->route('profile.index')->with('success','User email successfully updated');
        }
        public function updatePw(Request $request) {
            $request->validate([
                'currPass' => 'required|string|max:50',
                'newPass' => 'required|string|min:8|max:50',
            ]);

            $profil = Auth::user();

            if (!Hash::check($request->currPass, $profil->password)) {
                return back()->withErrors([
                    'currPass'=>'Something is wrong!',
                ]);
            }

            if ($request->currPass == $request->newPass) {
                return back()->withErrors([
                    'newPass'=>'Something is wrong!',
                ]);
            }

            $profil->update(['password' => bcrypt($request->newPass)]);
            return redirect()->route('profile.index')->with('success','User password successfully updated');
        }

        public function delete(){
            return view('profile.delete');
        }

        public function destroy(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50'. Auth::id(),
                'password' => 'required|string|min:8|max:50',
            ]);

            $profil = Auth::user();
            if (strtolower(trim($request->name)) !== strtolower(trim($profil->name))) {
                return back()->withErrors([
                    'name' => 'Name does not match your account.',
                ]);
            }

            if (!$request->email == !$profil->mail) {
                return back()->withErrors([
                    'emaildest'=>'Something is wrong!',
                ]);
            }

            if (!Hash::check($request->password, $profil->password)) {
                return back()->withErrors([
                    'passworddest'=>'Something is wrong!',
                ]);
            }
            $profil -> delete();
            
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('/profile')->with('success','Account deleted successfully.');
        }
    }