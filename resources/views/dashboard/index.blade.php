@extends('layouts.app')
@section('title', 'Vida Financeira')

@section('content')
    <div class="container mt-5">

        <div class="row mt-5">
            <div class="col-md-3">
                <div class="dropdown">
                    <button class="btn btn_add" data-bs-toggle="modal" data-bs-target="#modalReceita"><i
                            class="fa-solid fa-plus me-4"></i>Novo</button>

                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3 col-sm-12 cartoes">
                <div class="card cartoes_dashboard">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div>
                                <span class="titulo_cartao">Saldo Atual</span>
                            </div>
                            <div class="divSaldo">
                                <p class="placeholder-glow">
                                    <span class="placeholder col-12"></span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="icones_cartoes" id="card-1">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 cartoes">
                <div class="card cartoes_dashboard">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div>
                                <span class="titulo_cartao">Receitas</span>
                            </div>
                            <div class="divReceita">
                                <p class="placeholder-glow">
                                    <span class="placeholder col-12"></span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="icones_cartoes" id="card-2">
                                <i class="fa-solid fa-up-long"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 cartoes">
                <div class="card cartoes_dashboard">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div>
                                <span class="titulo_cartao">Despesas</span>
                            </div>
                            <div class="divDespesa">
                                <p class="placeholder-glow">
                                    <span class="placeholder col-12"></span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="icones_cartoes" id="card-3">
                                <i class="fa-solid fa-down-long"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 cartoes">
                <div class="card cartoes_dashboard">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div>
                                <span class="titulo_cartao">Balanço mensal</span>
                            </div>
                            <div class="divBalanco">
                                <p class="placeholder-glow">
                                    <span class="placeholder col-12"></span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="icones_cartoes" id="card-4">
                                <i class="fa-regular fa-scale-balanced"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="box_tabela">
                    <div class="row filtros">
                        <div class="col-md-2">
                            <select name="mes" id="mes" class="form-select">

                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="ano" id="ano" class="form-select">

                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="categoria" id="categoria" class="form-select">
                                <option value="" selected>Categorias</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="tipo" id="tipo" class="form-select">

                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn_filtro"><i class="fa-light fa-filter me-2"></i>Limpar Filtro</button>
                        </div>
                    </div>
                    <table class="table table-responsive table-hover" id="tabela_transacoes">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4 d-flex justify-content-between">
            <div class="col">
                <div class="div_graficos">
                    <div class="mb-2">
                        <span class="titulo_grafico">Despesas por Categoria</span>
                    </div>
                    <div class="box box_graficos mb-5" style="height: 466px;">
                        <canvas id="chartPie"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="div_graficos">
                    <div class="mb-2">
                        <span class="titulo_grafico">Receitas por Categoria</span>
                    </div>
                    <div class="box box_graficos mb-5" style="height: 466px;">
                        <canvas id="chartPie2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row d-flex flex-column">
                    <div class="col">
                        <div class="div_graficos">
                            <div class="mb-2">
                                <span class="titulo_grafico">Cartões de Crédito</span>
                            </div>
                            <div class="box box_graficos d-flex flex-column align-items-center p-3">
                                <div>
                                    <i class="fa fa-credit-card  text-secondary" style="font-size: 35px;"></i>
                                </div>
                                <div>
                                    <span style="font-size:14px; font-weight:600">Opa! Você ainda não possui cartões de
                                        crédito cadastrados.</span>
                                </div>
                                <div class="my-3">
                                    <small style="">Melhore seu controle financeiro agora!</small>
                                </div>
                                <div>
                                    <button class="btn btn_cadastrar_cartao">Cadastrar Cartão</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="div_graficos">
                            <div class="mb-2">
                                <span class="titulo_grafico">Contas a Pagar</span>
                            </div>
                            <div class="box box_graficos mb-5 d-flex flex-column align-items-center p-3">
                                <div>
                                    <i class="fa-solid fa-file-invoice-dollar text-secondary"
                                        style="font-size: 35px;"></i>
                                </div>
                                <div>
                                    <span style="font-size:14px; font-weight:600">Opa! Você ainda não possui contas a pagar
                                        cadastradas.</span>
                                </div>
                                <div class="my-3">
                                    <small style="">Melhore seu controle financeiro agora!</small>
                                </div>
                                <div>
                                    <button class="btn btn_cadastrar_cartao">Cadastrar Conta</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----------------- MODAL receita ----------------- -->

        <div class="modal fade" id="modalReceita" tabindex="-1" aria-labelledby="modalReceitaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalReceitaLabel"> <i class="fa fa-plus text-primary"
                                aria-hidden="true"></i> Novo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="carregaModalContent">
                            <p class="placeholder-glow">
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-4"></span>
                            </p>
                            <p class="card-text placeholder-glow">
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-4"></span>
                            </p>
                        </div>
                        <div class="div_form_transacao">
                            <form class="row g-3" action="" id="formulario_transacao">
                                <div class="col-md-12">
                                    <div class="btn_transacao">
                                        <input type="radio" value="1" class="input_transacao" checked
                                            name="transacao" id="receita">
                                        <label for="receita" class="label_transacao label_receita">Receita</label>
                                        <input type="radio" value="0" class="input_transacao" name="transacao"
                                            id="despesa">
                                        <label for="despesa" class="label_transacao label_despesa">Despesa</label>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <input type="text" class="form-control" id="descricao">
                                    <div class="invalid-feedback">
                                        Insira uma descrição.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="data" class="form-label">Data</label>
                                    <input type="date" class="form-control" id="data">
                                    <div class="invalid-feedback">
                                        Insira uma data.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="valor" class="form-label">Valor</label>
                                    <input type="text" class="form-control" id="valor">
                                    <div class="invalid-feedback">
                                        Insira um valor.
                                    </div>
                                </div>
                                <div class="col-md-6 categoria_col">
                                    <label for="categoria_name" class="form-label">Categoria</label>
                                    <select id="categoria_name" class="form-select categoria_name">

                                    </select>
                                    <div class="invalid-feedback">
                                        Selecione uma categoria.
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_add_receita" class="btn btn-primary"><i class="fa fa-save me-2"
                                aria-hidden="true"></i>Salvar</button>
                        <button type="button" class="btn btn-secondary btn_close_modal" data-bs-dismiss="modal"> <i
                                class="fa-solid fa-xmark"></i> Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script>

        //criar array com as cores para as categorias



        const ct = document.getElementById('chartPie2');
        const data1 = {
            labels: [
                'Mercado',
                'Estudos',
                'Combustível'
            ],
            datasets: [{
                label: 'Valor gasto',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };
        const config1 = {
            type: 'pie',
            data: data1,
        };

        new Chart(ct, config1);
    </script>
    <script>
        $(document).ready(function() {

            const cores = [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)'
        ];
            $.ajax({
                url: "{{ route('categorias.listaTransacoesCategoria') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    //pegar apenas as categorias em um for
                    let categorias = [];
                    for (let i = 0; i < data.length; i++) {
                        for (let j = 0; j < data[i].transacoes.length; j++) {
                            if (data[i].transacoes[j].tipo == '0') {
                                categorias.push(data[i].descricao);
                            }
                        }

                    }
                    console.log(categorias);

                    //pegar apenas os valores em um for
                    let valores = [];
                    for (let i = 0; i < data.length; i++) {
                        for (let j = 0; j < data[i].transacoes.length; j++) {
                            if (data[i].transacoes[j].tipo == '0') {

                                valores.push(data[i].transacoes[j].valor);
                            }
                        }
                    }
                    //verificar se a categoria já existe no array
                    //se existir, deixar apenas a primeira ocorrência
                    //se não existir, adicionar no array
                    let categoriasUnicas = [];
                    for (let i = 0; i < categorias.length; i++) {
                        if (categoriasUnicas.indexOf(categorias[i]) == -1) {
                            categoriasUnicas.push(categorias[i]);
                        }
                    }
                    console.log(categoriasUnicas);


                    graficoDespesa(categoriasUnicas, valores, cores);
                }
            })


            $('#data').val(moment().format('YYYY-MM-DD'));

            $('#valor').mask('#.##0,00', {
                reverse: true
            });

            calculaReceitas();
            calculaDespesas();
            calculaSaldoAtual();
            balancoMensal();

            $('.modal').on('show.bs.modal', function(event) {
                listaCategoriaSelect(false);
                $('.carregaModalContent').hide();
                $('.div_form_transacao').show();
            })

            $('.modal').on('hide.bs.modal', function(event) {

                $('#descricao').val('');
                $('#data').val(moment().format('YYYY-MM-DD'));
                $('#valor').val('');
                $('#categoria_name').val('');
                $('#categoria_name').removeClass('is-invalid');
                $('#descricao').removeClass('is-invalid');
                $('#data').removeClass('is-invalid');
                $('#valor').removeClass('is-invalid');
                listaCategoriaSelect(true);
            })

            function listaCategoriaSelect(remove = false) {
                if (remove == true) {
                    $('.categoria_name').html('');
                } else if (remove == false) {
                    $.ajax({
                        url: "{{ route('categorias.lista') }}",
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            let conteudo = '';

                            conteudo += `<option selected value="">Escolher...</option>`;

                            for (let i in data) {
                                conteudo += `
                            <option value="${data[i].id}">${data[i].descricao}</option> `;
                            }
                            conteudo += `</select>`;
                            $('.categoria_name').append(conteudo);

                        }
                    })
                }

            }

            $('#btn_add_receita').on('click', function() {


                if ($('#descricao').val() != '' && $('#data').val() != '' && $('#valor').val() != '' && $(
                        '#categoria_name').val() != '') {
                    $.ajax({
                        url: "{{ route('transacoes.adiciona') }}",
                        type: "POST",
                        data: {

                            descricao: $('#descricao').val(),
                            data: $('#data').val(),
                            valor: $('#valor').val(),
                            categoria: $('#categoria_name').val(),
                            tipo: $('input[name=transacao]:checked').val(),
                        },
                        success: function(data) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Sucesso!',
                                text: data.message,
                                showConfirmButton: true,
                                showCancelButton: true,
                                confirmButtonText: 'Inserir outra Transação',
                                cancelButtonText: 'Fechar',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#descricao').val('');
                                    $('#data').val(moment().format('YYYY-MM-DD'));
                                    $('#valor').val('');
                                    $('#categoria_name').val('');

                                    $('#descricao').removeClass('is-invalid');
                                    $('#data').removeClass('is-invalid');
                                    $('#valor').removeClass('is-invalid');
                                    $('#categoria_name').removeClass('is-invalid');

                                } else {
                                    window.location.reload();


                                }

                            });
                        }
                    });

                } else {
                    if ($('#descricao').val() == '') {
                        $('#descricao').addClass('is-invalid');
                    } else {
                        $('#descricao').removeClass('is-invalid');
                    }

                    if ($('#data').val() == '') {
                        $('#data').addClass('is-invalid');
                    } else {
                        $('#data').removeClass('is-invalid');
                    }

                    if ($('#valor').val() == '') {
                        $('#valor').addClass('is-invalid');
                    } else {
                        $('#valor').removeClass('is-invalid');
                    }

                    if ($('#categoria_name').val() == '') {
                        $('#categoria_name').addClass('is-invalid');
                    } else {
                        $('#categoria_name').removeClass('is-invalid');
                    }

                    return false;
                }
            });




            //funcao para calcular as receitas

            function calculaReceitas() {
                let conteudo = '';
                $.ajax({
                    url: "{{ route('transacoes.calculaReceita') }}",
                    type: "GET",
                    success: function(data) {
                        console.log('receita', data);
                        let saldo = data.total;
                        if (saldo == 0 || saldo == null) {
                            conteudo += `<span class="saldo">R$ 0,00</span>`
                            $('.divReceita').html('');
                            $('.divReceita').append(conteudo);
                        } else {
                            let saldoFormatado = saldo.toLocaleString('pt-br', {
                                style: 'currency',
                                currency: 'BRL'
                            });

                            conteudo += `<span class="saldo">${saldoFormatado}</span>`

                            $('.divReceita').html('');
                            $('.divReceita').append(conteudo);
                        }

                    }
                });
            }

            //funcao para calcular as despesas

            function calculaDespesas() {
                let conteudo = '';
                $.ajax({
                    url: "{{ route('transacoes.calculaDespesa') }}",
                    type: "GET",
                    success: function(data) {
                        console.log('despesa', data);

                        let saldo = data.total;
                        if (saldo == 0 || saldo == null) {
                            conteudo += `<span class="saldo">R$ 0,00</span>`
                            $('.divDespesa').html('');
                            $('.divDespesa').append(conteudo);
                        } else {
                            let saldoFormatado = saldo.toLocaleString('pt-br', {
                                style: 'currency',
                                currency: 'BRL'
                            });

                            conteudo += `<span class="saldo">${saldoFormatado}</span>`

                            $('.divDespesa').html('');
                            $('.divDespesa').append(conteudo);
                        }

                    }
                });
            }

            function calculaSaldoAtual() {
                let conteudo = '';
                $.ajax({
                    url: "{{ route('transacoes.saldoAtual') }}",
                    type: "GET",
                    success: function(data) {


                        let saldo = data.saldoAtual;



                        if (saldo == 0 || saldo == null) {
                            conteudo += `<span class="saldo">R$ 0,00</span>`
                            $('.divSaldo').html('');
                            $('.divSaldo').append(conteudo);
                        } else {
                            let saldoFormatado = saldo.toLocaleString('pt-br', {
                                style: 'currency',
                                currency: 'BRL'
                            });

                            //pegar o valor do atributo data-saldo e verificar se é negativo ou positivo
                            if (saldo < 0) {
                                conteudo += `<span class="saldo text-danger">${saldoFormatado}</span>`
                            } else {
                                conteudo += `<span class="saldo">${saldoFormatado}</span>`
                            }


                            $('.divSaldo').html('');
                            //pegar o valor do atributo data-saldo e verificar se é negativo ou positivo

                            $('.divSaldo').append(conteudo);
                        }

                    }
                });
            }

            function balancoMensal() {
                let mes_atual = moment().month() + 1;
                let ano_atual = moment().year();
                let despesas = 0;
                let receitas = 0;
                let balanco = 0.00;

                $.ajax({
                    url: "{{ route('transacoes.balancoMensal') }}",
                    type: "post",
                    dataType: "json",
                    data: {
                        mes: mes_atual,
                        ano: ano_atual
                    },
                    success: function(data) {
                        console.log('balanco', data);
                        let conteudo = '';
                        for (let i in data) {
                            let valor = parseFloat(data[i].valor);
                            if (data[i].tipo === "0") {
                                despesas += valor;

                            } else {
                                receitas += valor;
                            }
                        }

                        balanco = parseFloat(receitas) - parseFloat(despesas);
                        let balancoFormatado = balanco.toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        });
                        if (balanco < 0) {
                            conteudo += `<span class="saldo text-danger">${balancoFormatado}</span>`
                        } else {
                            conteudo += `<span class="saldo">${balancoFormatado}</span>`
                        }

                        $('.divBalanco').html('');
                        $('.divBalanco').append(conteudo);
                    }
                })
            }

            $.ajax({
                url: "{{ route('transacoes.index') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let conteudoMes = '';
                    let conteudoAno = '';
                    let conteudoTipo = '';
                    let meses = [];
                    conteudoMes += `<option value="" selected>Selecione o mês</option>`;
                    for (let i in data) {
                        let mes = moment(data[i].data).locale('pt-BR').format('MMMM');
                        let mes_inteiro = moment(data[i].data).locale('pt-BR').format('MM');
                        if (meses.indexOf(mes) == -1) {
                            meses.push(mes);
                            conteudoMes +=
                                `<option value="${mes_inteiro}">${mes.toUpperCase()}</option>`;
                        }
                    }
                    $('#mes').html('');
                    $('#mes').append(conteudoMes);
                    let anos = [];
                    conteudoAno += `<option value="" selected>Selecione o ano</option>`;
                    for (let i in data) {
                        let ano = moment(data[i].data).locale('pt-BR').format('YYYY');
                        if (anos.indexOf(ano) == -1) {
                            anos.push(ano);
                            conteudoAno += `<option value="${ano}">${ano}</option>`;
                        }
                    }
                    $('#ano').html('');
                    $('#ano').append(conteudoAno);
                    let tipos = [];
                    conteudoTipo += `<option value="" selected>Selecione o tipo</option>`;
                    for (let i in data) {
                        let tipo = data[i].tipo;
                        if (tipos.indexOf(tipo) == -1) {
                            tipos.push(tipo);
                            if (tipo == "0") {
                                conteudoTipo += `<option value="${tipo}">Despesa</option>`;
                            } else if (tipo == "1") {
                                conteudoTipo += `<option value="${tipo}">Receita</option>`;
                            }
                        }
                    }
                    $('#tipo').html('');
                    $('#tipo').append(conteudoTipo);
                }
            });

            var tabela = $('#tabela_transacoes').DataTable({
                "searching": false,

                "order": [0, "DESC"],
                "processing": true,
                "serverSide": true,
                "bLengthChange": false,
                "responsive": true,
                "lenhtChange": false,
                "language": {
                    "url": "{{ asset('assets/js/pt-BR.json') }}"
                },
                "pageLength": 50,
                "ajax": {
                    url: "{{ route('transacoes.listar') }}",
                    type: "POST",
                    data: function(data) {
                        data.mes = $('#mes').val();
                        data.ano = $('#ano').val();
                        data.tipo = $('#tipo').val();
                        data.categoria = $('#categoria').val();
                    }
                },
                "columns": [{
                        data: null,

                        className: 'align-middle',
                        render: function(data) {
                            datFormatada = moment(data.data).locale('pt-BR').format('DD/MM/YYYY');

                            return datFormatada;
                        }
                    }, {
                        data: null,
                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.descricao;

                        }
                    }, {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.categoria.descricao;
                        }
                    }, {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            if (data.tipo == "0") {
                                return `<span class="text-danger">Despesa</span>`;
                            } else if (data.tipo == "1") {
                                return `<span class="text-success">Receita</span>`;
                            }
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            let valorFormatado = parseFloat(data.valor);
                            valorFormatado = valorFormatado.toLocaleString('pt-BR', {
                                style: 'currency',
                                currency: 'BRL'
                            });
                            return valorFormatado;

                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            let acoes = '';


                            acoes += `
                            <div class="dropdown d-flex justify-content-center">
                                <a class="dropdown-toggle btn_mais_acoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                <ul class="dropdown-menu dropdown_menu_acoes">
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye me-2"></i>Visualizar</a></li>
                                    <li><a class="dropdown-item" href="" target="_blank"><i class="fa-solid fa-print me-2"></i>Imprimir</a></li>
                                </ul>
                            </div>`

                            return acoes;
                        }
                    }
                ]
            });

            $('#mes').on('change', function() {
                tabela.draw();
            })
            $('#ano').on('change', function() {
                tabela.draw();
            })
            $('#tipo').on('change', function() {
                tabela.draw();
            })
            $('#categoria').on('change', function() {
                tabela.draw();
            })


            $('.btn_filtro').on('click', function() {
                $('#mes').val('');
                $('#ano').val('');
                $('#tipo').val('');
                $('#categoria').val('');
                tabela.draw();
            })


            function graficoDespesa(categoria, valor, cores) {
            const ctx = document.getElementById('chartPie');
            const data = {
                labels: categoria,
                datasets: [{
                    label: 'Valor gasto',
                    data: valor,
                    backgroundColor: cores,
                    hoverOffset: 4
                }]
            };
            const config = {
                type: 'pie',
                data: data,
            };

            new Chart(ctx, config);
        }

        });
    </script>
@endpush
