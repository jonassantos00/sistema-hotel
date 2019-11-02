    $('#modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botão que acionou o modal
      var nome = button.data('nome') // Extrai informação dos atributos data-*
      var identificador = button.data('identificador')
      var acao = button.data('acao')
      var modal = $(this)
      modal.find('.modal-body .nome').text(acao + nome + '?')
      modal.find('.modal-body .identificador').val(identificador)
    })    