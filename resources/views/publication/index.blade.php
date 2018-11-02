@extends('layouts.master')
@section('contenido')

<!-- col-lg-4 col-md-2 col-sm-4 
col-lg-4 col-md-2 col-sm-4
 -->
@if ($my == 0)
    @foreach ($multimedia as $an)
    @if (count($an->category) > 0)
<div class="row justify-content-center justify-content-lg-center justify-content-md-center justify-content-sm-center">
    <div class="col-lg-auto col-md-auto col-sm-auto">
        <div class="card card-user">
            <img src="{{ url('/img/' . $an->route) }}"  alt="Sorry! Image not available at this time" style="width:100%; max-width:350px;">
            <div  class="row justify-content-center justify-content-lg-center justify-content-md-center justify-content-sm-center"> 
                <p class="description text-center">
                    "{{$an->comment}}"
                </p>
                <br>
            </div> <!-- col-lg-4 col-md-2 col-sm-4-->
            <div class="row align-items-center justify-content-center justify-content-lg-center justify-content-md-center justify-content-sm-center">
                @guest
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                        <i class="fas fa-2x fa-thumbs-up"></i>&nbsp;{{$an->rank_like($an->idmultimedia)}}
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                        <i class="fas fa-2x fa-thumbs-down"></i>&nbsp;{{$an->rank_dislike($an->idmultimedia)}}
                    </div>
                @else
                    @if (Auth::user()->iduser != $an->user_iduser)
                    <div class="col-lg-auto col-md-auto col-sm-auto col-xs-auto">
                    <a href="" id="like_{{$an->idmultimedia}}">
                        <i class="fas fa-2x fa-thumbs-up"></i>
                        <likep name="like_{{$an->idmultimedia}}">&nbsp;{{$an->rank_like($an->idmultimedia)}}</likep>
                        <like hidden="true" name="like_{{$an->idmultimedia}}">{{$an->idmultimedia}}</like>
                    </a>

                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <a href="" id="likes_{{$an->idmultimedia}}">
                        <i class="fas fa-2x fa-thumbs-down"></i>
                        <dislikep name="likes_{{$an->idmultimedia}}">&nbsp;{{$an->rank_dislike($an->idmultimedia)}}</dislikep>
                        <dislike hidden="true" name="likes_{{$an->idmultimedia}}">{{$an->idmultimedia}}</dislike>
                    </a>
                    </div>
                    @else
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <i class="fas fa-2x fa-thumbs-up"></i>&nbsp;{{$an->rank_like($an->idmultimedia)}}
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <i class="fas fa-2x fa-thumbs-down"></i>&nbsp;{{$an->rank_dislike($an->idmultimedia)}}
                    </div>
                    @endif
                @endguest
            </div>
            <hr>
            <div class="button-container mr-auto ml-auto">
                @foreach ($an->category as $ca)
                <a href="{{URL::action('PublicationsController@show', $ca->hashtag_idhastag) }}"> 
                    <i class="btn btn-info"> {{$ca->hashtag->hashtag}} </i>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
    @endif
    <br>
    <br>
    @endforeach
{{$multimedia->render()}}
@endif

@if ($my == 1)
    @foreach ($multimedia as $an)
    @if (count($an->category) > 0)
<div class="row justify-content-center">
    <div class="col-lg-auto col-md-auto col-sm-auto">
        <div class="card card-user">
            <img src="{{ url('/img/' . $an->route) }}"  alt="Sorry! Image not available at this time" style="width:100%; max-width:480px;">
            <div  class="row justify-content-center"> 
                <p class="description text-center">
                    "{{$an->comment}}"
                </p>
                <br>
                
            </div>
            <div class="row justify-content-center justify-content-lg-center justify-content-md-center justify-content-sm-center">
                @guest
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <i class="fas fa-2x fa-thumbs-up"></i>&nbsp;{{$an->rank_like($an->idmultimedia)}}
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <i class="fas fa-2x fa-thumbs-down"></i>&nbsp;{{$an->rank_dislike($an->idmultimedia)}}
                    </div>
                @else
                    @if (Auth::user()->iduser != $an->user_iduser)
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <a href="" id="like_{{$an->idmultimedia}}"><i class="fas fa-2x fa-thumbs-up"></i>&nbsp;{{$an->rank_like($an->idmultimedia)}}</a>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <a href="" id="dislike"><i class="fas fa-2x fa-thumbs-down"></i>&nbsp;{{$an->rank_dislike($an->idmultimedia)}}</a>
                    </div>
                    @else
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <i class="fas fa-2x fa-thumbs-up"></i>&nbsp;{{$an->rank_like($an->idmultimedia)}}
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-auto">
                    <i class="fas fa-2x fa-thumbs-down"></i>&nbsp;{{$an->rank_dislike($an->idmultimedia)}}
                    </div>
                    @endif
                @endguest
            </div>
            <hr>
            <div class="button-container mr-auto ml-auto">
                @foreach ($an->category as $ca)
                <a href="{{URL::action('MyPublicationsController@show', $ca->hashtag_idhastag) }}">
                    <i class="btn btn-info"> {{$ca->hashtag->hashtag}} </i>
                </a>
                @endforeach
            </div>
        </div>
            
    </div>
    <div class="col-1">
        <a href="{{ URL::action('MyPublicationsController@edit', $an->idmultimedia) }}"><button class="btn btn-info"> Editar </button></a>
            <a href="" data-target="#modal-delete-{{$an->idmultimedia}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
    </div>
    @include('publication.modal')

</div>
    @endif
    <br>
    <br>
    @endforeach
{{$multimedia->render()}}
@endif

@endsection