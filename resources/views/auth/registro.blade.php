@extends('layout.app')
@section('title', 'Productos')
@section('content')
    <h1>Registro de usuarios</h1>
    <form class="container w-50">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-column pt-4 ">
                    <label for="">Nombres</label>
                    <input class="form-control" type="text">
                </div>
                <div class="d-flex flex-column pt-4">
                    <label for="">Apellidos</label>
                    <input class="form-control" type="text">
                </div>
                <div class="d-flex flex-column pt-4">
                    <label for="">DUI</label>
                    <input class="form-control" type="text">
                </div>
                <div class="d-flex flex-column pt-4">
                    <label for="">Correo electrónico</label>
                    <input class="form-control" type="text">
                </div>
            </div>
            <div class="col">
                <div class="d-flex flex-column pt-4">
                    <label for="">Fecha de nacimiento</label>
                    <input class="form-control" type="text">
                </div>
                <div class="d-flex flex-column pt-4">
                    <label for="">Rol</label>
                    <Select class="form-control" type="">
                        <option>Seleccione un rol</option>
                        <option>Doctor</option>
                        <option>Paciente</option>
                        <option>Administrador</option>
                    </Select>
                </div>
            </div>


        </div>
        <div class="row w-100">
            <div class="w-25">
                <div class="d-flex flex-column pt-4">
                    <label for="">Contraseñas</label>
                    <input class="form-control" type="password">
                </div>
                <div class="d-flex flex-column pt-4">
                    <label for="">Repetir contraseña</label>
                    <input class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center pt-5">
            <button class="btn btn-primary w-25 ">Enviar</button>
        </div>
    </form>
@endsection
