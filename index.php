<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<title>Agenda - Financeiro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<style type="text/css">
		#pesquisaCliente{
			width:500px;
		}
		#form_pesquisa{
			margin-top:50px;
		}
	</style>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="css/jquery-ui.css" />

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){

    //Aqui a ativa a imagem de load
    function loading_show(){
		$('#loading').html("<img src='img/loading.gif'/>").fadeIn('fast');
    }

    //Aqui desativa a imagem de loading
    function loading_hide(){
        $('#loading').fadeOut('fast');
    }


    // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json
    function load_dados(valores, page, div)
    {
        $.ajax
            ({
                type: 'POST',
                dataType: 'html',
                url: page,
                beforeSend: function(){//Chama o loading antes do carregamento
		              loading_show();
				},
                data: valores,
                success: function(msg)
                {
                    loading_hide();
                    var data = msg;
			        $(div).html(data).fadeIn();
                }
            });
    }

    //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
    load_dados(null, 'pesquisa.php', '#MostraPesq');


    //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
    $('#pesquisaCliente').keyup(function(){

        var valores = $('#form_pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada

        //pegando o valor do campo #pesquisaCliente
        var $parametro = $(this).val();

        if($parametro.length >= 1)
        {
            load_dados(valores, 'pesquisa.php', '#MostraPesq');
        }else
        {
            load_dados(null, 'pesquisa.php', '#MostraPesq');
        }
    });

	});
	</script>
</head>
<body>
	<center>
		<article>
			<form name="form_pesquisa" id="form_pesquisa" method="post" action="">
				<fieldset>
					<div class="input-group" >
				  <input type="text" class="form-control" name="pesquisaCliente" id="pesquisaCliente" aria-describedby="basic-addon1" value="" tabindex="1"/>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						Cadastrar Cliente
					</button>
						</div>
				</fieldset>
			</form>

			<div id="contentLoading">
				<div id="loading"></div>
			</div>
			<section class="jumbotron">
				<div id="MostraPesq"></div>
			</section>
		</article>
	</center>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar Clientes</h4>
      </div>
      <div class="modal-body">
<div class="container">
         <form action="inserir_clientes.php" method="POST" name="form1">
        <br/>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="nome">Nome do Cliente</label>
                    <input class="form-control" type="text" name="nome" id="nome" required>
                </div>
                </div>
                        <div class="row">
                           <div class="form-group col-md-5">
                     <label for="banco">Banco</label>
                   <input class="form-control" type="text" name="banco" id="banco" required>
                   </div>
                  </div>

                  <div class="row">
                           <div class="form-group col-md-5">
                     <label for="agencia">Agencia</label>
                   <input class="form-control" type="text" name="agencia" id="agencia" required>
                   </div>
                   </div>

                   <div class="row">
                           <div class="form-group col-md-5">
                     <label for="conta">Conta</label>
                   <input class="form-control" type="text" name="conta" id="conta" required>
                   </div>
                   </div>

                   <div class="row">
                           <div class="form-group col-md-5">
                     <label for="email">E-mail</label>
                   <input class="form-control" type="text" name="email" id="email">
                   </div>
                   </div>

                   <div class="row">
                           <div class="form-group col-md-5">
                     <label for="fone">Telefone</label>
                   <input class="form-control" type="text" name="fone" id="fone">
                   </div>
                   </div>
      </div>
      </div>

      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
        </form>
  </div>
  </div>
  </div>
</div>
</div>
		</body>
</html>
