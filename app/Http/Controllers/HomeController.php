<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->get();
        return view('home', [
            'recipes' => $recipes
        ]);
    }

    public function detail($slug)
    {
        $recipe = Recipe::where('slug', $slug)->first();
        return view('detail-recipe', [
            'recipe' => $recipe
        ]);
    }
}
