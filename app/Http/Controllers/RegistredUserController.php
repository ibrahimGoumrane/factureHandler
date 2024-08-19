<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use function bcrypt;
use function dd;
use function dump;
use function error_log;
use function file_exists;
use function logger;
use function ltrim;
use function min;
use function redirect;
use function response;
use function time;
use function view;

class RegistredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function teamData()
    {
        $users = User::with(['role', 'cellule'])->get();
        $adminUsers = [];
        $nebulaUsers = [];
        $novaUsers = [];
        $neutronUsers = [];

        foreach ($users as $user) {
            if ($user->is_admin) {
                $adminUsers[] = $user;
            } else {
                switch ($user->cellule->libelle) {
                    case 'nebula':
                        $nebulaUsers[] = $user;
                        break;
                    case 'nova':
                        $novaUsers[] = $user;
                        break;
                    case 'neutron':
                        $neutronUsers[] = $user;
                        break;
                }
            }
        }
        return view('team.index', [
            'adminUsers' => $adminUsers,
            'nebulaUsers' => $nebulaUsers,
            'novaUsers' => $novaUsers,
            'neutronUsers' => $neutronUsers,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.signUp');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            try {

                // Validate the request
                $attrs = $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                    'password' => ['required', Password::min(8)->letters()->numbers()->mixedCase(), 'confirmed'],
                    'role_id' => 'sometimes|integer|exists:roles,id',
                    'cellule_id' => 'sometimes|integer|exists:cellules,id',
                    'profile_photo_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
                ]);


                $profilePhotoPath = '/storage/uploads/profilePicture/default.png'; // Default picture
                if ($request->hasFile('profile_photo_path')) {
                    $profilePhoto = $request->file('profile_photo_path');
                    $profilePhotoName = time() . '.' . $profilePhoto->getClientOriginalName();
                    $filePath = $profilePhoto->storeAs('uploads/profilePicture', $profilePhotoName, 'public');
                    $profilePhotoPath = '/storage/' . $filePath;
                }
                // Create a new user with the validated data
                $user = User::create([
                    'first_name' => $attrs['first_name'],
                    'last_name' => $attrs['last_name'],
                    'email' => $attrs['email'],
                    'password' => bcrypt($attrs['password']),
                    'cellule_id' => $attrs['cellule_id'] ?? 1, // Use provided cellule_id or default to 1
                    'role_id' => $attrs['role_id'] ?? 3, // Use provided role_id or default to 3
                    'profile_photo_path' => $profilePhotoPath, // Use uploaded or default picture
                ]);
                Log::info($user);

                // Log in the user
                Auth::login($user);

                // Redirect to the homepage
                return redirect('/');
            } catch (ValidationException $e) {
                Log::info($e->getMessage());

                // Handle validation errors
                return redirect()->back()->withErrors($e->validator)->withInput();
            } catch (\Exception $e) {
                // Handle other exception
                Log::info($e->getMessage());

                return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
            }
        }
        /**
        *create as admin
         */
    public function storeAdmin(Request $request)
    {
        try {
            // Validate the request
            $attrs = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'role_id' => 'sometimes|integer|exists:roles,id',
                'cellule_id' => 'sometimes|integer|exists:cellules,id',
                'profile_photo_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);


            $profilePhotoPath = '/storage/uploads/profilePicture/default.png'; // Default picture
            if ($request->hasFile('profile_photo_path')) {
                $profilePhoto = $request->file('profile_photo_path');
                $profilePhotoName = time() . '.' . $profilePhoto->getClientOriginalName();
                $filePath = $profilePhoto->storeAs('uploads/profilePicture', $profilePhotoName, 'public');
                $profilePhotoPath = '/storage/' . $filePath;
            }
            // Create a new user with the validated data
            $user = User::create([
                'first_name' => $attrs['first_name'],
                'last_name' => $attrs['last_name'],
                'email' => $attrs['email'],
                'password' => bcrypt($attrs['password']),
                'cellule_id' => $attrs['cellule_id'] ?? 1, // Use provided cellule_id or default to 1
                'role_id' => $attrs['role_id'] ?? 3, // Use provided role_id or default to 3
                'profile_photo_path' => $profilePhotoPath, // Use uploaded or default picture
            ]);
         return redirect()->back()->with('success', ' utulisateur est ajouter avec success');
        } catch (ValidationException $e) {
            Log::info($e->getMessage());

            // Handle validation errors
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Handle other exception
            Log::info($e->getMessage());

            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('view', User::class);

        $attrs = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'email', 'max:255', 'unique:users,email,' . $id],
            'cellule_id' => 'sometimes',
            'role_id' => 'sometimes',
            'profile_photo_path' => [
                'sometimes',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:4096'
            ]
        ]);

        try {
            // Retrieve the User record
            $user = User::findOrFail($id);

            // Update user attributes
            $user->first_name = $attrs['first_name'];
            $user->last_name = $attrs['last_name'];
            $user->email = $attrs['email'];
            $user->cellule_id = $attrs['cellule_id'];
            $user->role_id = $attrs['role_id'];

            // Handle profile photo upload
            if ($request->hasFile('profile_photo_path')) {
                $profile_photo_path = $request->file('profile_photo_path');
                $profile_photo_path_name = time() . '.' . $profile_photo_path->getClientOriginalName();
                $filePath = $profile_photo_path->storeAs('uploads/profilePicture', $profile_photo_path_name, 'public');
                $user->profile_photo_path = '/storage/' . $filePath;
            }

            // Save the updated user
            $user->save();

            return redirect()->back()->with('success', ' utulisateur est modifier avec success');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving file: ' . $e->getMessage()], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('view', User::class);

        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'utulisateur est supprimer avec success');
    }
}
