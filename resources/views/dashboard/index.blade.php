@extends('layouts.app')
@section('title', 'Vida Financeira')

@section('content')

    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: #fff;
        }

        .cont {
            height: 100%;
        }
    </style>

    <div class="loader">
        <div class="row cont">
            <div class="col d-flex flex-column align-items-center justify-content-center">
                <div class="">
                    <img src="{{ asset('assets/images/loading.gif') }}" alt="carregando..." class="img-fluid"
                        style="max-width: 250px; ">

                </div>
                <div>
                    <h5 class="text-secondary">Carregando...</h5>
                </div>
            </div>
        </div>

    </div>


    <div class="container mt-5">

        <div class="row mt-5 botao_add">
            <div class="col-md-3">
                <button class="btn btn_add" data-bs-toggle="modal" data-bs-target="#modalReceita"><i
                        class="fa-solid fa-plus me-4"></i>Novo</button>

            </div>
        </div>

        <div class="row">

            <div class="col-md-3 col-sm-6 cartoes">
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

            <div class="col-md-3 col-sm-6 cartoes">
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

            <div class="col-md-3 col-sm-6 cartoes">
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

            <div class="col-md-3 col-sm-6 cartoes">
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
                        <div class="col-md-2 mb-3 ">
                            <select name="mes" id="mes" class="form-select">

                            </select>
                        </div>
                        <div class="col-md-2 mb-3 ">
                            <select name="ano" id="ano" class="form-select">

                            </select>
                        </div>

                        <div class="col-md-3 mb-3 ">
                            <select name="categoria" id="categoria" class="form-select">

                            </select>
                        </div>
                        <div class="col-md-3 mb-3 ">
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
                                <th scope="col" style="text-align:center;">Data</th>
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

        <div class="row mt-4 d-flex justify-content-between" style="margin-bottom: 50px;">
            <div class="col">
                <div class="div_graficos">
                    <div class="mb-2">
                        <span class="titulo_grafico">Despesas por Categoria</span>
                    </div>
                    <div class="box box_graficos mb-2" style="height: 466px;">
                        <canvas id="chartPie"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="div_graficos">
                    <div class="mb-2">
                        <span class="titulo_grafico">Receitas por Categoria</span>
                    </div>
                    <div class="box box_graficos mb-2" style="height: 466px;">
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
                            <div class="box box_graficos mb-2 d-flex flex-column align-items-center p-3">
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
                                    <a href="{{route('cartoes.index')}}" class="btn btn_cadastrar_cartao">Cadastrar Cartão</a>
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

            setTimeout(() => {
                $('.loader').hide();
            }, 2000);




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
                    let categorias = {};

                    for (let i = 0; i < data.length; i++) {

                        for (let j = 0; j < data[i].transacoes.length; j++) {

                            if (data[i].transacoes[j].tipo == '0') {

                                if (categorias[data[i].descricao] == undefined) {

                                    categorias[data[i].descricao] = 0

                                }

                                categorias[data[i].descricao] += parseFloat(data[i].transacoes[j]
                                    .valor) ?? 0;

                            }

                        }

                    }

                    let label = []
                    let dados = []
                    for (let key in categorias) {
                        label.push(key)
                        dados.push(categorias[key])
                    }

                    graficoDespesa(label, dados, cores);
                }
            })

            calculaReceitas();
            calculaDespesas();
            calculaSaldoAtual();
            balancoMensal();

            //funcao para calcular as receitas

            function calculaReceitas() {
                let conteudo = '';
                $.ajax({
                    url: "{{ route('transacoes.calculaReceita') }}",
                    type: "GET",
                    success: function(data) {

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


            function selectCategorias() {
                $.ajax({
                    url: "{{ route('categorias.categorias') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        let conteudoCategoria = '';
                        conteudoCategoria += `<option value="" selected>Categorias</option>`;
                        for (let i in data) {
                            conteudoCategoria +=
                                `<option value="${data[i].id}">${data[i].descricao}</option>`;
                        }
                        $('#categoria').html('');
                        $('#categoria').append(conteudoCategoria);
                    },
                    complete: function() {
                        $('#modalCategoria').on('hide.bs.modal', function(event) {

                            setTimeout(selectCategorias, 1000);

                        });
                    }
                });
            }

            selectCategorias();

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
                        orderable: true,
                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.categoria.descricao;
                        }
                    }, {
                        data: null,
                        orderable: true,
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

            //funcao para verificar se é cpf ou cnpj

            function verificaCpfCnpj(valor) {
                //retira caracteres invalidos do valor
                valor = valor.replace(/[^0-9]/g, '');

                //verifica se tem 11 digitos
                if (valor.length == 11) {
                    return 'CPF';
                } else if (valor.length == 14) {
                    return 'CNPJ';
                } else {
                    return false;
                }
            }



        });
    </script>
@endpush
