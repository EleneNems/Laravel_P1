<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    public function showForm()
    {
        return view('classwork2/form');
    }

    public function generateGreeting(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string',
            'fav_color' => 'required|string',
            'fav_activity' => 'required|string',
        ]);

        $greeting = "გამარჯობა, {$validated['user_name']}! სასიამოვნოა შენი გაცნობა. ვიცით, რომ შენი საყვარელი ფერია {$validated['fav_color']} და თავისუფალ დროს {$validated['fav_activity']} გიყვარს. მშვენიერი არჩევანია!";

        return view('classwork2/result', compact('greeting'));
    }
}
