<!DOCTYPE html>
<html>
<head>
    <title>Pessoas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('lib/alertifyjs/css/alertify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/alertifyjs/css/themes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/select2/css/select2.css')}}">
    <!--<link rel="stylesheet" type="text/css" href="css/menu.css">-->
    <script src="{{ asset('lib/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('lib/alertifyjs/alertify.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.js') }}"></script>
    <script src="{{ asset('js/funcoes.js') }}"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Ronivaldo Santos Souza</h3>
            <br/>
            <p></p>
            <div class="col-sm-4">
                <form id="frmClientes">
                    <label>Nome</label>
                    <input type="text" class="form-control input-sm" id="nome" name="nome">
                    @csrf
                    <label>Nascimento</label>
                    <input type="date" class="form-control input-sm" id="nascimento" name="nascimento">
                    <p></p>
                    <label>Genero</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Feminino
                </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Outros
            </label>
        </div>
        <label>Pais</label>
        <p></p>
        <select name="pais_id" id="pais_id" class="form-control input-sm" aria-label="Default select example">
          <option selected disabled="disabled">Escolha um País</option>
          <option value="1">Brasil</option>
          <option value="2">United States of America</option>
      </select>
      <p></p>
      <span class="btn btn-primary" id="btnAdicionarCliente">Salvar</span>
  </form>
</div>
<div class="col-sm-8">
    <div id="tabelaClientesLoad">
        <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
            <caption><label></label></caption>
            <tr>
                <td>Nome</td>
                <td>Data Nascimento</td>
                <td>Genero</td>
                <td>Pais</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>


            <?php foreach ($pessoas as $pessoa) { ?>
             <tr>
                <td><?php echo $pessoa->nome; ?></td>
                <td><?php echo $pessoa->nascimento; ?></td>
                <td>
                    <?php  
                    if($pessoa->genero == "M"){
                        echo "Masculino";
                    }elseif($pessoa->genero == "F"){
                        echo  "Feminino";
                    }else{
                        echo "Outros"; 
                    }

                    ?>

                </td>
                <td><?php echo $pessoa->pais; ?></td>

                <td>
                    <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="adicionarDado('<?php echo $pessoa->id; ?>')">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-danger btn-xs" onclick="eliminarCliente('<?php echo $pessoa->id; ?>')">
                        <span class="glyphicon glyphicon-remove"></span>
                    </span>
                </td>

            <?php   } ?>
        </tr>

    </table>
</div>
</div>
</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar cliente</h4>
            </div>
            <div class="modal-body">
                <form id="frmClientesU">
                    <input type="text" hidden="" id="idclienteU" name="idclienteU">
                    <label>Nome</label>
                    <input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
                    <label>Data Nascimento</label>
                    <input type="text" class="form-control input-sm" id="nascimentoU" name="nascimentoU">
                    <label>Genero</label>
                    <input type="text" class="form-control input-sm" id="generoU" name="generoU">
                    <label>Pais</label>
                    <input type="text" class="form-control input-sm" id="pais_nomeU" name="pais_nomeU">
                    <input type="hidden" class="form-control input-sm" id="pais_idU" name="pais_idU">
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnAdicionarClienteU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>

            </div>
        </div>
    </div>
</div>

</body>
</html>

<script type="text/javascript">
    function adicionarDado(idcliente){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        $.ajax({
            type:"POST",
            data:'',
            url:"/editarPessoa/" + idcliente,
            success:function(r){
                dado=jQuery.parseJSON(r);
                $('#idclienteU').val(dado['id']);
                $('#nomeU').val(dado['nome']);
                $('#nascimentoU').val(dado['nascimento']);
                $('#generoU').val(dado['genero']);
                $('#pais_nomeU').val(dado['pais']);
                $('#pais_idU').val(dado['pais_id']);
            }
        });
    }

    function eliminarCliente(idcliente){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        alertify.confirm('Deseja Excluir essa Pessoa?', function(){ 
            $.ajax({
                type:"POST",
                data:'',
                url:"deletarPessoa/" + idcliente,
                success:function(r){
                    if(r==1){

                        alertify.success("Excluido com sucesso!!");
                        document.location.reload(true);
                    }else{
                        alertify.error("Não foi possível excluir");
                    }
                }
            });
        }, function(){ 
            alertify.error('Cancelado !')
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
     $('#btnAdicionarCliente').click(function(){
        vazios=validarFormVazio('frmClientes');
        if(vazios > 0){
            alertify.alert("Preencha os Campos!!");
            return false;
        }

        dados=$('#frmClientes').serialize();

        $.ajax({
            type:"POST",
            data:dados,
            url:"adicionarPessoas",
            success:function(r){
                if(r==1){
                   alertify.success("Cliente Adicionado");
                   document.location.reload(true);
               }else{
                alertify.error("Não foi possível adicionar");
            }
        }
    });
    });
 });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnAdicionarClienteU').click(function(){
            idclienteU = $('#idclienteU').val();
            dados=$('#frmClientesU').serialize();

            $.ajax({
                type:"POST",
                data:dados,
                url:"atualizarPessoa/" + idclienteU,
                success:function(r){
                    if(r==1){
                        $('#frmClientes')[0].reset;
                        
                        alertify.success("Cliente atualizado com sucesso!");
                        document.location.reload(true);
                    }else{
                        alertify.error("Não foi possível atualizar cliente");
                    }
                }
            });
        })
    })
</script>
