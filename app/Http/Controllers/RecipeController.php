<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function index()
    {
        return view('add-recipe');
    }

    public function store(Request $request)
    {
        $ingredients = [];
        $cooking_steps = [];

        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'add_more.*.ingredients' => 'required',
            'add_more.*.cooking_steps' => 'required',
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,PNG,JPG,JPEG', 'max:2048'],
        ]);

        if ($request->image) {
            $image_name = strtolower($request->title);
            $image = str_replace(' ', '', $image_name) . '-' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('images/recipe_images'), $image);
        }

        foreach ($request->add_more_ingredients as $value) {
            array_push($ingredients, $value['ingredients']);
        }

        foreach ($request->add_more_cooking_steps as $value) {
            array_push($cooking_steps, $value['cooking_steps']);
        }

        Recipe::create([
            'user_id' => auth()->user()->id,
            'slug' => SlugService::createSlug(Recipe::class, 'slug', $request->title . '-' . strtolower(Str::random(8))),
            'title' => $request->title,
            'description' => $request->description,
            'excerpt' => Str::limit(strip_tags($request->description), 100),
            'ingredients' => $ingredients,
            'cooking_steps' => $cooking_steps,
            'image' => $image,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Yeay! Resep Kamu Berhasil Diterbitkan 😋');
    }
}
