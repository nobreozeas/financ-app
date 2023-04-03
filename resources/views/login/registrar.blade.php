@extends('layouts.header')
@section('title', 'Registrar')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endpush


<div class="container d-flex flex-column align-items-center justify-content-center" style="">
    <div class="login_box d-flex flex-row justify-content-between">

        <div class="col login_img_col">
            <div class="login_img">
                <img src="{{ asset('assets/images/login.png') }}" alt="" width="300">
                <span class="texto_imagem">Vida Financeira</span>
            </div>
        </div>
        <div class="col">
            <div class="login">
                <h1 class="text-center">Registrar</h1>

                <div class="formulario">
                    <form action="">
                        <div class="row g-2">
                            <div class="col-12">
                                <input type="text" id="nome" name="nome" class="form-control"
                                    placeholder="Nome Completo">
                            </div>
                            <div class="col-12">
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Email">
                            </div>

                            <div class="col-12">
                                <input type="text" id="usuario" name="usuario" class="form-control"
                                    placeholder="Usuário">
                            </div>
                            <div class="col-12">

                                <div class="input-group">
                                    <input type="password" id="senha" name="senha" class="form-control"
                                        placeholder="Senha">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" id="mostrar-senha-icon"></i>
                                    </span>
                                </div>

                                <div id="password-validation">
                                    <div><span class="text-danger">Minímo 8 caracteres</span> <i
                                            class="fa-solid fa-xmark text-danger" id="ativar1"></i></div>
                                    <div><span class="text-danger">Letra maiúscula</span> <i
                                            class="fa-solid fa-xmark text-danger" id="ativar2"></i></div>
                                    <div><span class="text-danger">Caractere</span> <i
                                            class="fa-solid fa-xmark text-danger" id="ativar3"></i></div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="input-group">
                                    <input type="password" id="senhaConfirm" class="form-control"
                                        placeholder="Confirme a senha">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" id="mostrar-senha-icon2"></i>
                                    </span>

                                </div>
                                
                            </div>


                        </div>
                        <div class="row g-3">
                            <div class="col-12 w-100 pt-3">
                                <a href="{{ route('dashboard.index') }}" class="btn btn_login"><i
                                        class="fa-solid fa-right-to-bracket me-2"></i>Salvar</a>
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




@extends('layouts.footer')
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

            $('#mostrar-senha-icon2').click(function() {
                var senhaInput = $('#senhaConfirm');
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


            $('#senha').on('keyup', function() {

                // var password = $(this).val();
                var hasUppercase = /[A-Z]/.test($(this).val());

                var hasSpecialChars = /[^\w\s]/.test($(this).val());
                var isValidLength = $(this).val().length >= 8;

                //console.log(hasUppercase);
                //console.log(hasSpecialChars);
                //console.log(isValidLength);

                if (hasUppercase) {
                    $('#ativar2').removeClass('text-danger fa-xmark').addClass('text-success fa-check')
                        .prev('span').removeClass('text-danger').addClass('text-success');
                } else {
                    $('#ativar2').removeClass('text-success fa-check').addClass('text-danger fa-xmark')
                        .prev('span').removeClass('text-success').addClass('text-danger');
                }

                if (hasSpecialChars) {
                    $('#ativar3').removeClass('text-danger fa-xmark').addClass('text-success fa-check')
                        .prev('span').removeClass('text-danger').addClass('text-success');
                } else {
                    $('#ativar3').removeClass('text-success fa-check').addClass('text-danger fa-xmark')
                        .prev('span').removeClass('text-success').addClass('text-danger');
                }

                if (isValidLength) {
                    $('#ativar1').removeClass('text-danger fa-xmark').addClass('text-success fa-check')
                        .prev('span').removeClass('text-danger').addClass('text-success');
                } else {
                    $('#ativar1').removeClass('text-success fa-check').addClass('text-danger fa-xmark')
                        .prev('span').removeClass('text-success').addClass('text-danger');
                }

            });

            $('#senhaConfirm').on('keyup', function() {
                if($('#senha').val() == $('#senhaConfirm').val()){
                    $('#senhaConfirm').removeClass('is-invalid').addClass('is-valid');
                }else{

                    $('#senhaConfirm').removeClass('is-valid').addClass('is-invalid');
                    $('.invalid-feedback').html('Senhas não conferem');
                }
            });

        });
    </script>
@endpush
