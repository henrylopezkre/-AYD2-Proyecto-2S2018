@extends('layouts.master')
@section('contenido')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Nuevo Usuario</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-md-7 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 pr-1">
                            <div class="form-group">
                                <label>Nombre Completo</label>
                                <input type="text" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Edad</label>
                                <input type="number" class="form-control" placeholder="Edad" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Genero</label>
                                <select class="form-control" >
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                    <option value="3">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8 pr-1">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Foto de Perfil</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-fill pull-right">Nuevo</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection