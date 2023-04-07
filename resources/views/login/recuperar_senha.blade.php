@extends('layouts.login')
@section('title', 'Recuperar Senha')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endpush

@section('content')

    <div class="login">
        <div class="login_box">
            <div class="my-3">
                <span class="texto_imagem">Vida Financeira<i class="fa-light fa-sack-dollar ms-2"></i></span>
            </div>
            <div class="my-4">
                <h1 class="texto_login">Recuperar Senha</h1>
            </div>

            <form action="" class="row g-3 px-3">
                <div class="col-12">
                    <input type="text" id="usuario" name="usuario" class="form-control input"
                        placeholder="Email">
                </div>

                <div class="col-12 w-100 pt-3">
                    <a href="{{ route('dashboard.index') }}" class="btn btn_login">Enviar</a>
                </div>

                <div class="col-12">
                    <div class="text-center">
                        <a href="{{ route('login.index') }}" class="text-decoration-none"
                        style="color:#35128C">Voltar para o login</a>
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
        });
    </script>
@endpush
