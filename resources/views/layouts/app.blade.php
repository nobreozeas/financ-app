@include('layouts.header')


@include('layouts.menu')


@yield('content')



<div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCategoriaLabel">Categorias</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nome da categoria"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary btn_add_categoria" type="button"
                            id="button-addon2">Adicionar</button>
                    </div>
                </form>

                <div class="lista_categoria">
                    <p class="placeholder-wave">
                        <span class="placeholder col-12"></span>
                    </p>
                    <p class="placeholder-wave">
                        <span class="placeholder col-12"></span>
                    </p>
                    <p class="placeholder-wave">
                        <span class="placeholder col-12"></span>
                    </p>
                    <p class="placeholder-wave">
                        <span class="placeholder col-12"></span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            mostraConteudo();


            var nome = "Ozeas Silva Nobre";
            //pegar o primeiro e o ultimo nome
            var nome = nome.split(' ');
            var primeiroNome = nome[0];
            var ultimoNome = nome[nome.length - 1];
            var usuario = primeiroNome + ' ' + ultimoNome;

            var iniciais = usuario.match(/\b(\w)/g);
            var iniciaisNome = iniciais.join('');
            $('#img_perfil span').text(iniciaisNome);

            var color = generateColor(usuario);
            $('#img_perfil').css('background-color', color);

            function generateColor(nome = 'semnome') {
                let colors = {
                    'a': '0',
                    'b': '1',
                    'c': '2',
                    'd': '3',
                    'e': '4',
                    'f': '5',
                    'g': '6',
                    'h': '7',
                    'i': '8',
                    'j': '9',
                    'k': 'A',
                    'l': 'B',
                    'm': 'C',
                    'n': 'D',
                    'o': 'E',
                    'p': 'F',
                    'q': '0',
                    'r': '1',
                    's': '2',
                    't': '3',
                    'u': '4',
                    'v': '5',
                    'w': '6',
                    'x': '7',
                    'y': '8',
                    'z': '9',
                }
                let newName = nome.replaceAll(' ', '').toLowerCase();
                let color = '#';

                for (let i = 0; i < 6; i++) {
                    if (newName[i] === undefined) {
                        color += '0';

                    } else {
                        color += colors[newName[i]];
                    }
                }
                return color;
            }





            function mostraConteudo() {
                $.ajax({
                    url: "{{ route('categorias.lista') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        let conteudo = '';

                        for (let i in data) {
                            conteudo += `
                    <div class="input-group bt_acao mt-3">
                        <input type="text" class="form-control" data-id-input="${data[i].id}" disabled value="${data[i].descricao}" style="border-radius: 0.375rem;">
                        <button id="btn_edita_categoria" data-id="${data[i].id}" class="btn btn-outline-warning ms-3 me-3 btn_edita_categoria" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button id="btn_deleta_categoria" data-id="${data[i].id}" class="btn btn-outline-danger btn_deleta_categoria" type="button"><i class="fa-solid fa-trash"></i></button>
                    </div>

                    `;
                        }
                        $('.lista_categoria').html('');
                        $('.lista_categoria').append(conteudo);

                    }
                })
            }

            $('body').on('click', '.btn_add_categoria', function() {
                let input = $(this).parent().find('input');
                let descricao = input.val();

                $.ajax({
                    url: "{{ route('categorias.adiciona') }}",
                    type: "POST",
                    data: {
                        descricao: descricao
                    },
                    dataType: "json",
                    success: function(data) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Categoria adicionada com sucesso!',
                            showConfirmButton: false,
                            timer: 1500,
                            position: 'top-end',
                        })
                        input.val('');
                        $('.lista_categoria').empty();
                        $('.lista_categoria').append(` <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p> <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p> <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p> <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p>`);

                        mostraConteudo();
                    }
                })
            });
            $('body').on('click', '.btn_edita_categoria', function() {
                let id = $(this).data('id');
                let input = $(`input[data-id-input="${id}"]`);
                input.prop('disabled', false);
                input.focus();

                input.on('blur', function() {
                    input.prop('disabled', true);

                    $.ajax({
                        url: "{{ route('categorias.edita') }}",
                        type: "POST",
                        data: {
                            id: id,
                            descricao: input.val()
                        },
                        dataType: "json",
                        success: function(data) {
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Categoria editada com sucesso!',
                                showConfirmButton: false,
                                timer: 1500,
                                position: 'top-end',
                            })
                        }
                    })
                });
            });

            $('body').on('click', '.btn_deleta_categoria', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Tem certeza que deseja deletar essa categoria?',
                    text: "Você não poderá reverter essa ação!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, deletar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('categorias.deleta') }}",
                            type: "POST",
                            data: {
                                id: id
                            },
                            dataType: "json",
                            success: function(data) {
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Categoria removida com sucesso!',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    position: 'top-end',
                                })

                            },
                            error: function(data) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    confirmButtonColor: '#3085d6',
                                    text: 'Não foi possível deletar essa categoria, pois ela está vinculada a uma ou mais transações!',
                                })
                            }
                        })
                        $('.lista_categoria').empty();
                        $('.lista_categoria').append(` <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p> <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p> <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p> <p class="placeholder-wave"> <span class="placeholder col-12"></span> </p>`);
                        mostraConteudo();
                    }
                })
            });
        });
    </script>
@endpush
@include('layouts.footer')
