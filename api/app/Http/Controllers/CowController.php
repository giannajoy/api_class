<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cow;
class CowController extends Controller
{
  //show all cows
  public function showAll(){
    //get all
    $cows = Cow::all();
    //pass data to the view and show

    return View(
      'cow.all',['cows' => $cows]
    );

  }

  //mock adding a cow
  public function mockAdd(){
    //Option 1
    $ngombe1 = new Cow();
    $ngombe1->name = 'Longocrass';
    $ngombe1->gender = 1;
    $ngombe1->weight = '200';
    $ngombe1->age = 2;

    //option 2
    Cow::create([
      'name' => 'Oxy',
      'gender' => 0,
      'weight' => 400,
      'age' => 3
    ]);
  }
}
