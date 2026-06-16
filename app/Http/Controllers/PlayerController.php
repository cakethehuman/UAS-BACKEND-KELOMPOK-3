<?php

    namespace App\Http\Controllers;

    use App\Models\Player;
    use App\Models\Team;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Gate;
    use Illuminate\Support\Facades\Storage;
    class PlayerController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $player = Player::all();
            return view("players.index", compact("player"));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            Gate::authorize('create',  Team::class); 
            $teams = Team::pluck('name');
            return view("players.create", compact("teams"));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            // 100 dan 50 ini dipilih karena untuk minmize varcharnya biar lebih cepet dbnya
            // 100 and 50 varchar values is selected so the database could be more efficent
            // lanjutan dari create, maka harus diauthorize

            Gate::authorize('create', Player::class);
            $validated  = $request->validate([
                    'pfp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'name' => 'required|string|max:255',
                    'team' => 'required|string|max:255',
                    'height' => 'required|string|max:50',
                    'weight' => 'required|string|max:50',
                    'age' => 'required|integer|min:1|max:100',
                    'role' => 'required|string|max:100',
                    'country' => 'required|string|max:100',
                    'yearspro' => 'required|string|max:50',
                    'points' => 'required|integer|min:0|max:150', 
                    'rebounds' => 'required|integer|min:0|max:100', 
                    'assists' => 'required|integer|min:0|max:100', 
                    'blocks' => 'required|integer|min:0|max:50', 
                    'steals' => 'required|integer|min:0|max:50', 
                    'turnovers' => 'required|integer|min:0|max:50', 
                    'threepoints' => 'required|integer|min:0|max:50', 
                    'freethrows' => 'required|integer|min:0|max:50', 
                    'fantasy' => 'required|numeric|min:0|max:999.9' 
            ]);

            // Ambil image yang diupload
            if ($request->hasFile('pfp')) {
                $file = $request->file('pfp');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('images/players'), $filename);
                $validated['pfp'] = 'images/players/' . $filename;
            }
            
            Player::create($validated);

            return redirect()->route('players.index')->with('success','The player is inserted successfully.');
        }

        /**
         * Display the specified resource.
         */
        public function show(Player $player)
        {
            return view('players.show', compact('player'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Player $player)
        {
            Gate::authorize('update', $player);
            $teams = Team::pluck('name');
            return view('players.edit', compact('player', 'teams'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Player $player)
        {
            Gate::authorize('update', $player);
                 $validated  = $request->validate([
                    'pfp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'name' => 'required|string|max:255',
                    'team' => 'required|string|max:255',
                    'height' => 'required|string|max:50',
                    'weight' => 'required|string|max:50',
                    'age' => 'required|integer|min:1|max:100',
                    'role' => 'required|string|max:50',
                    'country' => 'required|string|max:100',
                    'yearspro' => 'required|string|max:50',
                    'points' => 'required|integer|min:0|max:150', 
                    'rebounds' => 'required|integer|min:0|max:100', 
                    'assists' => 'required|integer|min:0|max:100', 
                    'blocks' => 'required|integer|min:0|max:50', 
                    'steals' => 'required|integer|min:0|max:50', 
                    'turnovers' => 'required|integer|min:0|max:50', 
                    'threepoints' => 'required|integer|min:0|max:50', 
                    'freethrows' => 'required|integer|min:0|max:50', 
                    'fantasy' => 'required|numeric|min:0|max:999.9' 
                ]);

            // Ambil image yang diupload
            if ($request->hasFile('pfp')) {
                $file = $request->file('pfp');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('images/players'), $filename);
                $validated['pfp'] = 'images/players/' . $filename;
            }

            $player->update($validated);

            return redirect()->route('players.index')->with('success','The player is edited successfully.');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Player $player)
        {
            //
            Gate::authorize('delete', $player);

            if($player->pfp){
                $photo = public_path($player->pfp);
                @unlink($photo);
            }
            

            $player -> delete();

            return redirect()->route('players.index')->with('success','The player is deleted successfully.');
        }
    }
