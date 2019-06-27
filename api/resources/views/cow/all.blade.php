@extends('layout')

{{-- page title --}}
@section('title', 'Cows - ')
{{-- active menu --}}
@section('cow-active', 'active')
{{-- Title 2 --}}
@section('d_title', 'Cows')
{{-- the content --}}
@section('content')
<div id='vue-wrapper'>
  <div class='col-md-8' style='float:left'>

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
            <th>Id</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Weight(Kgs.)</th>
            <th>Age (Yrs.)</th>
          </thead>
          <tbody>
            <tr v-for="item in items">
              <td>@{{ item.id }}</td>
              <td>@{{ item.name }}</td>
              <td>
                <span v-if="item.name == '1' ">Female</span>
                <span v-else>Male</span>
              </td>
              <td>@{{ item.weight }}</td>
              <td>@{{ item.age }}</td>
              <td id="edit" class="btn btn-info" >
                {{-- Material icons seem to work :)--}}
                <i class="material-icons">edit</i>
              </td>
              <td @click.prevent="deleteCow(item)" class="btn btn-danger">
                <i class="material-icons">delete</i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class='col-md-4' style='float:right'>
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Add Cow</h4>
      </div>
      <div class="card-body">
        <p class="text-center alert alert-danger"
        v-bind:class="{ hidden: hasError }">Please fill all fields!</p>
        <form>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <input type="text" v-model="newItem.name" placeholder="Name" autocomplete="off" name='name' class="form-control" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <select name='gender' v-model="newItem.gender" class="form-control">
                  <option value=''> Please select gender.. </option>
                  <option value='1'>Female</option>
                  <option value='0'>Male</option>
                </select>
              </div>
            </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <input type="number" v-model="newItem.age" step='any' placeholder='Age' name='age' class="form-control" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <input type="text" v-model="newItem.weight" step='any' placeholder="Weight" name='weight' class="form-control" />
              </div>
            </div>
          </div>
          <button type="submit" @click.prevent="createItem()" class="btn btn-primary pull-right">Save</button>
          <div class="clearfix"></div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
