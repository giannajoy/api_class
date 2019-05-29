@extends('layout')

{{-- page title --}}
@section('title', 'Cows - ')
{{-- active menu --}}
@section('cow-active', 'active')
{{-- Title 2 --}}
@section('d_title', 'Cows')
{{-- the content --}}
@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Cow</h4>
      <p class="card-category">
        Daily quote : 'jishinde ushinde..'
      </p>
    </div>
  <div class="card-body">
  <table class="table">
    <thead class=" text-primary">
      <th>Name</th>
      <th>Gender</th>
      <th>Weight(Kgs.)</th>
      <th>Age (Yrs.)</th>
    </thead>
    <tbody>
      @foreach($cows as $cow)
        <tr>
          <td>{{$cow->name}}</td>
          <td>
              @if($cow->gender == 0)
                Male
              @else
                Female
              @endif
          </td>
          <td>{{$cow->weight}}</td>
          <td>{{$cow->age}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection
