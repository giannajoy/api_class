@extends('layout')

{{-- page title --}}
@section('title', 'Staff - ')
{{-- active menu --}}
@section('staff-active', 'active')
{{-- Title 2 --}}
@section('d_title', 'Staff')
{{-- the content --}}
@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Staff</h4>
      <p class="card-category">
        Daily quote : 'jishinde ushinde..'
      </p>
    </div>
  <div class="card-body">
    <table class="table">
      <thead class=" text-primary">
        <th>Name</th>
        <th>Tel</th>
        <th>Role</th>
        <th>Hours</th>
        <th>Weekly Wage</th>
      </thead>
      <tbody>
        @foreach($staff as $s)
          <tr>
            <td>
                {{$s->fname}}
                {{$s->mname}}
                {{$s->lname}}
            </td>
            <td>{{$s->tel}}</td>
            <td>{{$s->type_of_work}}</td>
            <td>{{$s->hours_per_day}}</td>
            <td>{{$s->wage_per_week}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
