@extends('layouts.page')
@section('page-title', 'Court Case')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <form action="{{route('customerServiceCenter.index')}}" method="get">
                <div class="form-group">
                    <label>{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</label>
                    <select class="form-control" name="filter[loc_of_csc]">
                        @foreach(\App\Models\User::district() as $dist)
                            <option value="{{$dist}}">{{$dist}}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="submit" class="btn btn-danger">
                </div>

            </form>
            <div class="invoice p-3 mb-3 rounded">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{strtoupper(str_replace('_',' ', 'loc_of_csc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'svsc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'inquiry'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'complaint'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'ntc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'acct_closure'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'bill_payment'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'payment_detail_receipt'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'duplicate_bill'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'card_purchases'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'misc'))}}</th>
                        <th>{{strtoupper(str_replace('_',' ', 'total'))}}</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collection as $coll)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coll->loc_of_csc}}</td>
                            <td>{{$coll->svsc}}</td>
                            <td>{{$coll->inquiry}}</td>
                            <td>{{$coll->complaint}}</td>
                            <td>{{$coll->ntc}}</td>
                            <td>{{$coll->acct_closure}}</td>
                            <td>{{$coll->bill_payment}}</td>
                            <td>{{$coll->payment_detail_receipt}}</td>
                            <td>{{$coll->duplicate_bill}}</td>
                            <td>{{$coll->card_purchases}}</td>
                            <td>{{$coll->misc}}</td>
                            <td>{{$coll->total}}</td>
                            <td><a href="{{route('customerServiceCenter.edit',$coll->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td>
                                <form action="{{route('customerServiceCenter.destroy',$coll->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


