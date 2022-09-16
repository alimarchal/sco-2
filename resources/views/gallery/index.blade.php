@extends('layouts.page')
@section('page-title', 'Events')
@section('custom-header')
    <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 250px;
            height: 385px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }

        .truncate {
            width: 230px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection
@section('breadcrumb-item','')
@section('body-start')
    <div class="row">


        <div class="col-12">

            <form class=" d-print-none" action="{{route('gallery.index')}}" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <label>Enter Month</label>
                        <input class="form-control" type="date" name="filter[month]" placeholder="YYYY-MM-DD">
                    </div>

                    <div class="col-3">
                        <label>{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                        <select class="form-control" name="filter[region]">
                            <option value="">None</option>
                            @if(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                                <option value="Sector HQ">Sector HQ AJK</option>
                            @endif
                            @foreach(\App\Models\User::btn_name() as $btn_name)
                                <option value="{{$btn_name}}">{{$btn_name}}</option>
                            @endforeach
                            @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3">
                        <label>{{strtoupper(str_replace('_',' ', 'Category'))}}</label>
                        <select class="form-control" name="filter[category]">
                            <option value="">None</option>
                            <option value="DG SCO">DG SCO</option>
                            <option value="Sector Commander">Sector Commander</option>
                            <option value="61 CSB MZD">CO 61 CSB</option>
                            <option value="64 CSB MPR">CO 64 CSB</option>
                            <option value="Events">Events</option>
                        </select>
                    </div>

                </div>

                <br>
                <input type="submit" class="btn btn-danger" value="Search">
                <br>
            </form>
            <br>
        </div>

        <div class="col-12">


            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Photo Gallery</h2>


                <div class="row">
                    <div class="col-12">

                        @foreach($collection as $g)
                            @php
                                $attachment = explode(',',$g->attachments);
                            @endphp
                            <div class="gallery">
                                <a href="{{route('gallery.show',$g->id)}}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($attachment[0])}}" style="width: 248px; height: 200px;">
                                </a>
                                <div class="desc font-weight-bold text-left">
                                    <span class="font-weight-bold text-left">{{$g->region}}</span><br>
                                    <span class="font-weight-bold">Date: {{\Carbon\Carbon::parse($g->date)->format('d-M-Y')}}</span><br>
                                    <span class="font-weight-bold">Name: {{$g->title}}</span><br>
                                    <p class="truncate">{{$g->description}} </p>

                                    @if(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                                    <form action="{{route('gallery.destroy-album', $g->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="margin-left: 2px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd"
                                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif

                                </div>


                            </div>
                        @endforeach


                    </div>

                    {{$collection->links()}}
                </div>


            </div>
        </div>
    </div>
@endsection

