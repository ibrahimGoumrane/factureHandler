<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use function dd;
use function error_log;
use function logger;
use function min;
use function redirect;
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
                    'age' => ['required', 'numeric', 'min:18'],
                    'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                    'password' => ['required', Password::min(8)->letters()->numbers(), 'confirmed'],
                ]);

                // Create a new user with the validated data
                $user = User::create($attrs);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
