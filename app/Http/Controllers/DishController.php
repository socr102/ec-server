<?php

namespace App\Http\Controllers;

use App\Dish;
use App\DishIngredient;
use App\DishNutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class DishController extends Controller
{

    public function showFormCreateDishMain()
    {
        return view('home.home-chef.dish.new-dish.step-1');
    }

    public function showFormCreateIngredient()
    {
        return view('home.home-chef.dish.new-dish.step-2');
    }

    public function showFormCreateNutrition()
    {
        return view('home.home-chef.dish.new-dish.step-3');
    }

    public function storeMain(Request $request)
    {
        $request->validate(
            [
                'dish_image' => 'required',
                'description' => 'required',
                'number_of_availability' => 'required|string',
                'time_preparation' => 'required',
                // 'price' => 'required|string',
                'dish_name' => 'required|string',
            ],
        );

        $image = $request->file('dish_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $dish = new Dish();
        $dish->dish_image = $imageName;
        $dish->description = $request->description;
        $dish->number_of_availability = $request->number_of_availability;
        $dish->time_preparation = $request->time_preparation;
        // $dish->price = $request->price;
        $dish->dish_name = $request->dish_name;
        $dish->video_dish = $request->video_uuid;
        $dish->user_id = Auth::user()->id;
        // $dish->save();
        $request->session()->put('dish', $dish);

        $destinationPath = public_path('/images/food');
        $img = Image::make($image->getRealPath());

        $img->save($destinationPath . '/' . $imageName, 70);


        return redirect()->route('home.home-chef.dish.new-dish.step-2');
    }


    public function storeIngredient(Request $request)
    {
        $ListIngredient = json_decode($request->all()['dataIngredient']);

        $request->session()->put('listIngredient', $ListIngredient);

        return redirect()->route('home.home-chef.dish.new-dish.step-3');
    }

    public function storeNutritionAndAllDataDish(Request $request)
    {
        $ListIngredient = json_decode($request->all()['dataIngredient']);

        $request->session()->put('listIngredient', $ListIngredient);

        // $request->validate(
        //     [
        //         'fats' => 'required',
        //         'calorie' => 'required',
        //         'carbs' => 'required',
        //         'protein' => 'required',
        //         'cholestrol' => 'required',
        //         'sodium' => 'required',
        //     ],
        // );

        DB::beginTransaction();
        try {

            // save dish
            $dish = $request->session()->get('dish');
            $dish->save();

            // save approval
            $dish->approval()->create(['status' => 'Pending']);

            // save ingredient
            $ListIngredient = $request->session()->get('listIngredient');
            foreach ($ListIngredient as $dt) {
                $dishIngredient = new DishIngredient();
                $dishIngredient->dish_id = $dish->id_dish;
                $dishIngredient->ingredient = $dt->ingredient;
                $dishIngredient->quantity = $dt->quantity;
                $dishIngredient->unit = $dt->unit;
                $dishIngredient->save();
            }

            // // save nutrition
            // $dishNutrition = new DishNutrition();
            // $dishNutrition->dish_id = $dish->id_dish;
            // $dishNutrition->fats = $request->fats;
            // $dishNutrition->calorie = $request->calorie;
            // $dishNutrition->carbs = $request->carbs;
            // $dishNutrition->protein = $request->protein;
            // $dishNutrition->cholestrol = $request->cholestrol;
            // $dishNutrition->sodium = $request->sodium;
            // $dishNutrition->save();

            DB::commit();
        } catch (\Exception $ex) {
            dd($ex);
            DB::rollback();
        }

        return redirect()->route('home.home-chef.dish-list')->with('success', 'Dish Added!');
    }


    public function dishListHomeChef()
    {
        $listOwnDish = Dish::where(['user_id' => Auth::user()->id])->get();

        return view('home.home-chef.dish-list', ['listOwnDish' => $listOwnDish]);
    }


    public function infoDishHomeChef($id)
    {
        $dish = Dish::where(['id_dish' => $id])->first();

        return view('home.home-chef.dish.dish', ['dish' => $dish]);
    }

    public function detailsInfoDishHomeChef($id)
    {
        $dish = Dish::where(['id_dish' => $id])->first();

        return view('home.home-chef.dish.details', ['dish' => $dish]);
    }


    public function videoDishHomeChef($id)
    {
        $dish = Dish::where(['id_dish' => $id])->first();

        return view('home.home-chef.dish.video', ['dish' => $dish]);
    }


    public function dishListCustomer(Request $request)
    {
        $dish = $request->dish;
        $data = [
            'listDish' => Dish::where(['approve' => 'Accepted'])->when($dish, function ($query, $dish) {
                return $query->where('dish_name', 'like', "%{$dish}%");
            })->orderBy('created_at', 'desc')->with('isVoted')->get(),
        ];
        return view('home.customer.dish-list', $data);
    }

    public function infoDishCustomer($id)
    {
        $dish = Dish::where(['id_dish' => $id])->first();

        $user = auth()->user();
        $dish->doView($user);

        return view('home.customer.dish.dish', ['dish' => $dish]);
    }

    public function detailsInfoDishCustomer($id)
    {
        $dish = Dish::where(['id_dish' => $id])->first();

        return view('home.customer.dish.details', ['dish' => $dish]);
    }

    public function videoDishCustomer($id)
    {
        $dish = Dish::where(['id_dish' => $id])->first();

        return view('home.customer.dish.video', ['dish' => $dish]);
    }

    public function dishLeaderboardHomeChef(Request $request)
    {
        $dish = $request->dish;

        $dishes = Dish::where(['approve' => 'Accepted'])
            ->when($dish, function ($query, $dish) {
                return $query->where('dish_name', 'like', "%{$dish}%");
            })
            ->orderBy('upvote', 'desc')->with('isVoted')->get();

        $data = [
            'dishes' => $dishes
        ];
        return view('home.home-chef.leaderboard', $data);
    }

    public function dishLeaderboardCustomer()
    {
        $dishes = Dish::where('approve', 'Accepted')->with('chef')->orderBy('upvote', 'desc')->get();
        $data = [
            'dishes' => $dishes
        ];
        return view('home.customer.leaderboard', $data);
    }

    public function upvote(Dish $id)
    {
        $dish = $id;
        $user = auth()->user();
        $dish->doVote($user);

        return redirect()->back();
    }


    public function searchDish(Request $request)
    {

        $dish = Dish::where('dish_name', 'like', '%' . $request->name . '%')->where(['user_id' => Auth::user()->id])->with(['chef', 'nutrition', 'chef.title'])->orderBy('created_at', 'desc')->orderBy('upvote', 'desc')->get();

        return response()->json($dish);
    }
}
