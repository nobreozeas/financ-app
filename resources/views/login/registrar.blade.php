@extends('layouts.login')
@section('title', 'Registrar')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endpush

@section('content')

    <div class="login">
        <div class="login_box">
            <div class="my-3">
                <span class="texto_imagem">Vida Financeira<i class="fa-light fa-sack-dollar ms-2"></i></span>
            </div>
            <div class="my-2">
                <h1 class="texto_login">Registrar</h1>
            </div>

            <form action="" class="row g-3 px-3">
                <div class="col-12">
                    <input type="text" id="nome" name="nome" class="form-control input"
                        placeholder="Nome Completo">
                </div>
                <div class="col-12">
                    <input type="text" id="celular" name="celular" class="form-control input"
                        placeholder="Celular">
                </div>
                <div class="col-12">
                    <input type="email" id="email" name="email" class="form-control input"
                        placeholder="Email">
                </div>


                <div class="col-12">
                    <div class="input-group ">
                        <input type="password" id="senha" name="senha" class="form-control input" placeholder="Senha">
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="mostrar-senha-icon"></i>
                        </span>
                    </div>
                </div>

                <div class="col-12 w-100 pt-3">
                    <a href="" class="btn btn_login">Cadastrar</a>
                </div>

                <div class="col-12">

                    <div class="text-center">
                        <a href="{{ route('login.index') }}" class="text-decoration-none"
                        style="color:#35128C">Já tenho uma conta</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#mostrar-senha-icon').click(function() {
                var senhaInput = $('#senha');
                var tipo = senhaInput.attr('type');
                var icon = $(this);

                if (tipo === 'password') {
                    senhaInput.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    senhaInput.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });


            $('#celular').mask('(00) 00000-0000');
        });
    </script>
@endpush

