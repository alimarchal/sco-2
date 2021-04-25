@extends('layouts.page')
@section('page-title', 'SNet')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('snet.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Battalion Name'))}}</label>
                        <select class="form-control" name="filter[btn]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Company'))}}</label>
                        <select class="form-control" name="filter[company]">
                            <option value="">None</option>
                            @foreach(\App\Models\User::company_name() as $company_name)
                                <option value="{{$company_name}}">{{$company_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-md-3">
                        <label>DSL Site</label>
                        <input class="form-control" type="text" name="filter[dsl_site]">
                    </div>

                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
                <br>

            </form>
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">SNet</h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'month'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'company'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'dsl_site'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'capacity'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'vacant'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'active_subscriber'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'cir_customers'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'other_customers'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'official_customers'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'remarks'))}}</th>
                        <th colspan="2">Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::createFromDate($coll->date)->format('M-Y')}}</td>
                            <td>{{strtoupper($coll->company)}}</td>
                            <td>{{$coll->dsl_site}}</td>
                            <td>{{$coll->capacity}}</td>
                            <td>{{$coll->vacant}}</td>
                            <td>{{$coll->active_subscriber}}</td>
                            <td>{{$coll->cir_customers}}</td>
                            <td>{{$coll->other_customers}}</td>
                            <td>{{$coll->official_customers}}</td>
                            <td>{{$coll->remarks}}</td>
                            <td class="text-center"><a href="{{route('snet.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td class="text-center">
                                <form action="{{route('snet.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($collection->isNotEmpty())
                        <tr>
                            <td colspan="4" class="text-right font-weight-bold">Total</td>
                            <td>{{$collection->sum('capacity')}}</td>
                            <td>{{$collection->sum('vacant')}}</td>
                            <td>{{$collection->sum('active_subscriber')}}</td>
                            <td>{{$collection->sum('cir_customers')}}</td>
                            <td>{{$collection->sum('other_customers')}}</td>
                            <td>{{$collection->sum('official_customers')}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

