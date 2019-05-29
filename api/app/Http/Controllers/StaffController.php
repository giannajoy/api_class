<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
class StaffController extends Controller
{
    //a method to list all Staff
    public function listAll(){

      //get all the staff from the model
      $allStaff = Staff::all();

      //pass data to the view and show it
      return View('staff.all',
      ['staff' => $allStaff]);

    }
    //a method to add Staff
    public function mockAdd(){
      //an example of adding a new record

      //option 1
      $ngugi = new Staff();
      $ngugi->fname = 'Bosco';
      $ngugi->mname = 'Ngugi';
      $ngugi->lname = 'Ngatho';
      $ngugi->tel = '123456';
      $ngugi->type_of_work = 'Casual labourer';
      $ngugi->hours_per_day = 8;
      $ngugi->wage_per_week = 3000;
      $ngugi->save();

      //option 2 -- using the create method
      Staff::create(
        [
          'fname' => 'Florence',
          'mname' => 'Njakini',
          'lname' => 'Naisenya',
          'tel' => '890992',
          'type_of_work' => 'Owner',
          'hours_per_day' => 5,
          'wage_per_week' => 20000
        ]
      );

    }
    //etc..
}
