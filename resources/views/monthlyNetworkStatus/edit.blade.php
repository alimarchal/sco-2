@extends('layouts.page')
@section('page-title', 'SPhone')

@section('breadcrumb-item','SPhone')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">SPhone</h2>
                <br>
                <form action="{{route('monthly-network-status.update',$monthlyNetworkStatus->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" value="{{$monthlyNetworkStatus->date}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'bn'))}}</label>
                            <select class="form-control" name="btn">
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}" @if($monthlyNetworkStatus->btn == $btn_name) selected @endif>{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'company'))}}</label>
                            <select class="form-control" name="company">
                                <option value="">None</option>
                                @foreach(\App\Models\User::company_name() as $company_name)
                                    <option value="{{$company_name}}"  @if($monthlyNetworkStatus->company == $company_name) selected @endif>{{$company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <h2 class="text-center">S-Phone</h2>
                    <hr>
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_exc'))}}</label>
                                <input type="number" name="sphone_total_exc" value="{{$monthlyNetworkStatus->sphone_total_exc}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'wc'))}}</label>
                                <input type="number" name="sphone_wc" value="{{$monthlyNetworkStatus->sphone_wc}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'pmc'))}}</label>
                                <input type="number" name="sphone_pmc" value="{{$monthlyNetworkStatus->sphone_pmc}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'ntc'))}}</label>
                                <input type="number" name="sphone_ntc" value="{{$monthlyNetworkStatus->sphone_ntc}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'fds'))}}</label>
                                <input type="number" name="sphone_fds" value="{{$monthlyNetworkStatus->sphone_fds}}" class="form-control">
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h2 class="text-center">GSM</h2>
                    <hr>
                    <div class="row">
                        <div class="col-1">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_bts'))}}</label>
                                <input type="number" name="gsm_total_bts" value="{{$monthlyNetworkStatus->gsm_total_bts}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sys_cap'))}}</label>
                                <input type="number" name="gsm_sys_cap" value="{{$monthlyNetworkStatus->gsm_sys_cap}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sim_sold_till_date'))}}</label>
                                <input type="number" name="gsm_sim_sold_till_date" value="{{$monthlyNetworkStatus->gsm_sim_sold_till_date}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_subscriber'))}}</label>
                                <input type="number" name="gsm_total_subscriber" value="{{$monthlyNetworkStatus->gsm_total_subscriber}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'active_subscriber'))}}</label>
                                <input type="number" name="gsm_active_subscriber" value="{{$monthlyNetworkStatus->gsm_active_subscriber}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'average_vlr_subs'))}}</label>
                                <input type="number" name="gsm_average_vlr_subs" value="{{$monthlyNetworkStatus->gsm_average_vlr_subs}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'sim_sold_during_month'))}}</label>
                                <input type="number" name="gsm_sim_sold_during_month" value="{{$monthlyNetworkStatus->gsm_sim_sold_during_month}}" class="form-control">
                            </div>
                        </div>

                    </div>

                    <hr>


                    <h2 class="text-center">DSL</h2>
                    <hr>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_dsl_sites'))}}</label>
                                <input type="number" name="dsl_total_dsl_sites" value="{{$monthlyNetworkStatus->dsl_total_dsl_sites}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cap'))}}</label>
                                <input type="number" name="dsl_cap" value="{{$monthlyNetworkStatus->dsl_cap}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'active_subs'))}}</label>
                                <input type="number" name="dsl_active_subscriber" value="{{$monthlyNetworkStatus->dsl_active_subscriber}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dsl_provided_during_the_month'))}}</label>
                                <input type="number" name="dsl_provided_during_the_month" value="{{$monthlyNetworkStatus->dsl_provided_during_the_month}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <h2 class="text-center">DXX</h2>
                    <hr>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'total_dss_sites'))}}</label>
                                <input type="number" name="dxx_total_dss_sites" value="{{$monthlyNetworkStatus->dxx_total_dss_sites}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'cap'))}}</label>
                                <input type="number" name="dxx_cap" value="{{$monthlyNetworkStatus->dxx_cap}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'active_subs'))}}</label>
                                <input type="number" name="dxx_active_subs" value="{{$monthlyNetworkStatus->dxx_active_subs}}" class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'dxx_provided_during_the_month'))}}</label>
                                <input type="number" name="dxx_provided_during_the_month" value="{{$monthlyNetworkStatus->dxx_provided_during_the_month}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection


