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
