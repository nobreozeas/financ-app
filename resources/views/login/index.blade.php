@extends('layouts.header')
@section('title', 'Login')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endpush


<div class="container d-flex flex-column align-items-center justify-content-center" style="">
    <div class="login_box d-flex flex-row justify-content-between">

        <div class="col login_img_col">
            <div class="login_img">
                <img src="{{ asset('assets/images/login.png') }}" alt="" width="450">
                <span class="texto_imagem">Vida Financeira</span>
            </div>
        </div>
        <div class="col">
            <div class="login">
                <h1 class="text-center">Login</h1>

                <div class="formulario">
                    <form action="">
                        <div class="row g-2 mb-2">
                            <div class="col-12">

                                <input type="text" id="usuario" name="usuario" class="form-control"
                                    placeholder="Usuário ou Email">
                            </div>
                            <div class="col-12">

                                <div class="input-group">
                                    <input type="password" id="senha" name="senha" class="form-control"
                                        placeholder="Senha">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" id="mostrar-senha-icon"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="row g-3">
                            <div class="col-12 w-100 pt-3">
                                <a href="{{ route('dashboard.index') }}" class="btn btn_login"><i
                                        class="fa-solid fa-right-to-bracket me-2"></i>Entrar</a>
                            </div>

                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('login.registrar') }}" class="text-decoration-none"
                                        style="color:#35128C">Registrar-me</a>
                                    <a href="" class="text-decoration-none" style="color:#35128C">Esqueci
                                        minha senha</a>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>

                <div class="d-flex justify-content-center align-items-end" style="height: 100px; color: #b9b9b9">
                    <p>nobretech&copy;@php echo date('Y'); @endphp</p>
                </div>

            </div>
        </div>



    </div>
</div>

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


@extends('layouts.footer')
