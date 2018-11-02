@extends('layouts.master')
@section('contenido')


<div class="row">
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar Perfil</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update') }}" aria-label="{{ __('Update') }}" enctype="multipart/form-data">
                @csrf
                        <!-- fullname -->
                        <div class="form-group row">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ Auth::user()->fullname }}" required autofocus>

                                @if ($errors->has('fullname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- username -->
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ Auth::user()->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- password -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <!-- age -->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ Auth::user()->age }}" autofocus>

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- gender -->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender" required>
                                    <option value="{{ Auth::user()->gender }}" >{{ Auth::user()->gender == 1? "Hombre":"Mujer"}}</option>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- photo -->
                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Fotografia') }}</label>

                            <div class="col-md-6">
                                <input class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" type="file" name="photo" id="photo">
                            </div>
                        </div>
                        <!-- comment -->
                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comentario sobre mi') }}</label>

                            <div class="col-md-6">
                               <textarea  type="text" name="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" placeholder="Comentario ..." rows="5" cols="80">{{Auth::user()->comment}}</textarea>
                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Editar</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@guest
@else
<div class="col-md-4">
    <div class="card card-user">
        
        <div class="card-body">
            <div class="author">
                <a >
                    <div class="card-image">
            <img class="img-fluid img-thumbnail" src="{{ url('/photo/' . Auth::user()->photo) }}" alt="...">
        </div>
                    <h5 class="title">{{ Auth::user()->fullname }}</h5>
                </a>
                <br>
                <p class="description">
                    Usuario: {{ Auth::user()->username}}
                    <br>
                    Correo: {{ Auth::user()->email}}
                    <br>
                    {{ Auth::user()->gender == 1? "Hombre": "Mujer"}}
                    <br>
                    Edad: {{ Auth::user()->age}}
                </p>
            </div>
            <br>
            <p class="description text-center">
                "{{ Auth::user()->comment }}"
            </p>
        </div>
        <hr>
    </div>
</div>
@endguest

</div>

@endsection