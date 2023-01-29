@extends('layouts.app')
@section('title', 'Vida Financeira')

@section('content')
    <div class="container mt-5">

        <div class="row mt-5">
            <div class="col-md-3">
                <div class="dropdown">
                    <button class="btn btn_add" data-bs-toggle="modal"
                    data-bs-target="#modalReceita"><i class="fa-solid fa-plus me-4"></i>Novo</button>

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
                                <option value="" selected>Mês</option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="ano" id="ano" class="form-select">
                                <option value="" selected>Ano</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="categoria" id="categoria" class="form-select">
                                <option value="" selected>Categoria</option>
                                <option value="1">Salário</option>
                                <option value="2">Alimentação</option>
                                <option value="3">Transporte</option>
                                <option value="4">Moradia</option>
                                <option value="5">Lazer</option>
                                <option value="6">Saúde</option>
                                <option value="7">Educação</option>
                                <option value="8">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="tipo" id="tipo" class="form-select">
                                <option value="" selected>Tipo</option>
                                <option value="1">Receita</option>
                                <option value="2">Despesa</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn_filtro"><i class="fa-light fa-filter me-2"></i>Limpar Filtro</button>
                        </div>
                    </div>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/01/2021</td>
                                <td>Salário</td>
                                <td>Salário</td>
                                <td>R$ 2.000,00</td>

                            </tr>
                            <tr>
                                <td>01/01/2021</td>
                                <td>Salário</td>
                                <td>Salário</td>
                                <td>R$ 2.000,00</td>

                            </tr>

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
                        <h1 class="modal-title fs-5" id="modalReceitaLabel"> <i class="fa fa-plus text-primary" aria-hidden="true"></i> Novo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="" id="formulario_transacao">
                            <div class="col-md-12">
                                <div class="btn_transacao">
                                    <input type="radio" value="1" class="input_transacao" checked name="transacao" id="receita">
                                    <label for="receita" class="label_transacao label_receita">Receita</label>
                                    <input type="radio" value="0" class="input_transacao" name="transacao" id="despesa">
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
                            <div class="col-md-6">
                                <label for="categoria_name" class="form-label">Categoria</label>
                                <select id="categoria_name" class="form-select">
                                    <option selected value="">Escolher...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione uma categoria.
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_add_receita" class="btn btn-primary"><i class="fa fa-save me-2"
                                aria-hidden="true"></i>Salvar</button>
                        <button type="button" class="btn btn-secondary btn_close_modal" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----------------- FIM MODAL receita ----------------- -->

        <!-- ----------------- MODAL despesa ----------------- -->


        <!-- ----------------- FIM MODAL despesa ----------------- -->


    </div>


@endsection
@push('scripts')
    <script>
        const ctx = document.getElementById('chartPie');
        const data = {
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
        const config = {
            type: 'pie',
            data: data,
        };

        new Chart(ctx, config);

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
            $('#data').val(moment().format('YYYY-MM-DD'));

            $('#valor').mask('#.##0,00', {
                reverse: true
            });

            calculaReceitas();
            calculaDespesas();
            calculaSaldoAtual();
            balancoMensal();
            listaCategoriaSelect();

            $('body').on('click','.btn_close_modal', function() {
                $('#descricao').val('');
                $('#data').val(moment().format('YYYY-MM-DD'));
                $('#valor').val('');
                $('#categoria_name').val('');
                
                $('#categoria_name').removeClass('is-invalid');
                $('#descricao').removeClass('is-invalid');
                $('#data').removeClass('is-invalid');
                $('#valor').removeClass('is-invalid');


            })

            $('.btn_add').on('click', function(){
                listaCategoriaSelect();
            })



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

            function listaCategoriaSelect(){
                $.ajax({
                    url: "{{ route('categorias.lista') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        let conteudo = '';

                        for (let i in data) {
                            conteudo += `
                    <option value="${data[i].id}">${data[i].descricao}</option>
                    `;
                        }
                        $('#categoria_name').append(conteudo);

                    }
                })
            }


            //funcao para calcular as receitas

            function calculaReceitas() {
                let conteudo = '';
                $.ajax({
                    url: "{{ route('transacoes.calculaReceita') }}",
                    type: "GET",
                    success: function(data) {
                        console.log('receita',data);
                        let saldo = data.total;
                        if(saldo == 0 || saldo == null){
                            conteudo += `<span class="saldo">R$ 0,00</span>`
                            $('.divReceita').html('');
                            $('.divReceita').append(conteudo);
                        }else{
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

            function calculaDespesas(){
                let conteudo = '';
                $.ajax({
                    url: "{{ route('transacoes.calculaDespesa') }}",
                    type: "GET",
                    success: function(data) {
                        console.log('despesa',data);

                        let saldo = data.total;
                        if(saldo == 0 || saldo == null){
                            conteudo += `<span class="saldo">R$ 0,00</span>`
                            $('.divDespesa').html('');
                            $('.divDespesa').append(conteudo);
                        }else{
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

            function calculaSaldoAtual(){
                let conteudo = '';
                $.ajax({
                    url: "{{ route('transacoes.saldoAtual') }}",
                    type: "GET",
                    success: function(data) {
                        console.log('saldo',data);

                        let saldo = data.saldoAtual;
                        if(saldo == 0 || saldo == null){
                            conteudo += `<span class="saldo">R$ 0,00</span>`
                            $('.divSaldo').html('');
                            $('.divSaldo').append(conteudo);
                        }else{
                            let saldoFormatado = saldo.toLocaleString('pt-br', {
                                style: 'currency',
                                currency: 'BRL'
                            });

                            conteudo += `<span class="saldo">${saldoFormatado}</span>`

                            $('.divSaldo').html('');
                            $('.divSaldo').append(conteudo);
                        }

                    }
                });
            }

            function balancoMensal(){
                let mes_atual = moment().month() + 1;
                let ano_atual = moment().year();
                let despesas = 0;
                let receitas = 0;
                let balanco = 0.00;

                $.ajax({
                    url: "{{ route('transacoes.balancoMensal') }}",
                    type: "post",
                    dataType: "json",
                    data:{
                        mes: mes_atual,
                        ano: ano_atual
                    },
                    success: function(data){
                        console.log('balanco',data);


                        for(let i in data){
                            let valor = parseFloat(data[i].valor);
                            if(data[i].tipo === "0"){
                                despesas += valor;
                                console.log('despesa',despesas);
                            }else{
                                receitas += valor;
                                console.log('receita',receitas);
                            }
                        }

                        balanco = parseFloat(receitas) - parseFloat(despesas);
                        console.log(balanco);

                        let balancoFormatado = balanco.toLocaleString('pt-br', {
                            style: 'currency',
                            currency: 'BRL'
                        });

                        $('.divBalanco').html('');
                        $('.divBalanco').append(`<span class="saldo">${balancoFormatado}</span>`);
                    }
                })



            }

        });
    </script>
@endpush
