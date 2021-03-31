@extends('layouts.page')
@section('page-title', 'Franchise Wise Target')

@section('breadcrumb-item','Franchise Wise Target')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">

                <form action="{{route('franchiseWiseRevenue.update',$franchiseWiseRevenue->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'name_of_franchise'))}}</label>
                                <input type="text" name="name_of_franchise" value="{{$franchiseWiseRevenue->name_of_franchise}}"  class="form-control" >
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'aor_district'))}}</label>
                                <select class="form-control" name="aor_district">
                                    @foreach(\App\Models\User::district() as $dist)
                                        <option value="{{$dist}}" @if($franchiseWiseRevenue->aor_district == $dist) selected @endif>{{$dist}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'asg'))}}</label>
                                <input type="text" name="asg" value="{{$franchiseWiseRevenue->asg}}"  class="form-control" >
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'ach'))}}</label>
                                <input type="text" name="ach" value="{{$franchiseWiseRevenue->ach}}"  class="form-control" >
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label >{{strtoupper(str_replace('_',' ', 'month'))}}</label>
                                <input type="date" name="month" value="{{$franchiseWiseRevenue->month}}"  class="form-control" >
                            </div>
                        </div>


                    </div>


                    <button type="submit" class="btn btn-danger">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection


