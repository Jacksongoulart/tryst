<?php
require_once("VisaoUsuario.php");
session_start();
if(!isset($_SESSION['username']))
  header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <meta charset="utf-8">
    <head>
      <title>Reunião</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">

      <script>
        function editar(){
            $('#user_name').prop('disabled', false);
            $('#user_email').prop('disabled', false);
            $('#data_nascimento').prop('disabled', false);
            $('#gender').prop('disabled', false);
        }
        function perfil(){
            $('#user_name').prop('disabled', true);
            $('#user_email').prop('disabled', true);
            $('#data_nascimento').prop('disabled', true);
            $('#gender').prop('disabled', true);  
        }
      </script>

        <style>
            .container-fluid{ 
               

            }

        </style>
    </head>
    <body>

      <!-- NAVBAR -->
       <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./principal.php" style="text-shadow: 0 -1px 0 rgba(248, 193, 27, 0.75);">tryst</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="#mais" onclick="perfil();" data-toggle="modal" role="button">Perfil</a></li>
              <li><a data-toggle="modal" href="#mAbout">About</a></li>
            </ul>
            <ul class="nav pull-right">
            <form method="post">
                <button class="btn btn-warning" type="submit" id="logout" name="logout">Sair</button>
            </form>
            <?php if(isset($_POST['logout'])) VisaoUsuario::deslogar(); ?> 
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

         <!--Modal About-->
    <div id="mAbout" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header" align="left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">About</h3>
            </div>
            <div class="modal-body" align="Left">
              <h2>Desenvolvedores</h2>
              <p>Gustavo Moreira Mendes</p>
              <p>Carla de Oliveira Camargo</p>
              <p>Jackson Andrade Goulart</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            </div>
    </div>
    
    <!--Modal bar-->
    <div id="mais" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Perfil</h3>
            </div>
            <div class="modal-body">
                <div class="row text-center">

                <img data-src="holder.js/140x140" class="img-polaroid" alt="140x140" style="width: 100px; height: 100px;" src="img/perfil.png">
                </div>
                <br>
                <form class="form-horizontal" id="perfil" method='post' action='?' align="left">
                    <div class="control-group">
                        <label class="control-label" for="input01">Nome Completo</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" value= <?php echo "\"".VisaoUsuario::getNomeSessao()."\""; ?> id="user_name" name="user_name" placeholder = "Nome completo">
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">E-mail</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" value= <?php echo "\"".VisaoUsuario::getEmailSessao()."\""; ?> id="user_email" name="user_email" placeholder = "Nome completo">
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Data de Nascimento</label>
                        <div class="controls">
                            <input type="date" class="input-large" value= <?php echo "\"".VisaoUsuario::getDataNascimentoSessao()."\""; ?> id="data_nascimento" name="data_nascimento" placeholder="">             
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Sexo</label>
                        <div class="controls">
                            <select name="gender" id="gender" value="gender" required>
                                <option value='M' <?php if (VisaoUsuario::getSexoSessao() == 'M') echo "selected"; ?> >Masculino</option>
                                <option value='F' <?php if (VisaoUsuario::getSexoSessao() == 'F') echo "selected"; ?> >Feminino</option>
                                <option value='O' <?php if (VisaoUsuario::getSexoSessao() == 'O') echo "selected"; ?> >Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Senha</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge" id="pwd" name="pwd" placeholder="Senha">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Confirme a senha</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge" id="cpwd" name="cpwd" placeholder="Confirma&ccedil;&atilde;o de Senha">
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" onClick="editar();" aria-hidden="true">Editar</button>
                <button class="btn btn-warning" onClick="salvar();" data-dismiss="modal" aria-hidden="true">Salvar</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            </div>
    </div>



        <!--Modal tab-->
    <div id="mtab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Novo Evento</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="register" method='post' action='?' align="left"  >
                    <div class="control-group">
                        <label class="control-label" for="input01">Nome Completo</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" id="user_name" name="user_name" placeholder = "Nome completo">
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Descrição</label>
                            <div class="controls">
                                <textarea value="Smith" id="desc" name="desc" rows="3" class="input-xlarge"></textarea>
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Inicio</label>
                            <div class="controls">
                                <input type="time" class="input-large" id="data_nascimento" name="data_nascimento" placeholder="">             
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Termino</label>
                            <div class="controls">
                                <input type="time" class="input-large" id="data_nascimento" name="data_nascimento" placeholder="">             
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Criar</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
            </div>
    </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span9">
                    <div class="hero-unit">
                        <div class="control-group">
                            <label class="control-label" for="input01">Selecione a semana</label>
                                <div class="controls">
                                    <input type="week" class="input-large" id="data_nascimento" name="data_nascimento" placeholder="">             
                                </div>
                        </div>
                        <!--TABLE-HORAS-->
                        <div class="well">
                            <table class="table table-bordered table-condensed" id="tabela-calendario">
                                <tr>
                                    <th style="width:14.2%;">Domingo</th>
                                    <th style="width:14.2%;">Segunda</th>
                                    <th style="width:14.2%;">Terça</th>
                                    <th style="width:14.2%;">Quarta</th>
                                    <th style="width:14.2%;">Quinta</th>
                                    <th style="width:14.2%;">Sexta</th>
                                    <th style="width:14.2%;">Sabado</th>
                                    
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"
                                    href="#mtab" data-toggle="modal" role="button">00:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">00:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">00:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">00:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">00:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">00:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">00:00</td>
                                    
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">01:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">01:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">01:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">01:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">01:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">01:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">01:00</td>
                                    
                                    
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">02:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">02:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">02:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">02:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">02:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">02:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">02:00</td>

                                    
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">03:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">03:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">03:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">03:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">03:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">03:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">03:00</td>

                                    
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">04:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">04:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">04:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">04:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">04:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">04:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">04:00</td>

                                    
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">05:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">05:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">05:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">05:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">05:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">05:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">05:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">06:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">06:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">06:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">06:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">06:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">06:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">06:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">07:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">07:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">07:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">07:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">07:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">07:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">07:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">08:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">08:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">08:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">08:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">08:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">08:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">08:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">09:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">09:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">09:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">09:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">09:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">09:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">09:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">10:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">10:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">10:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">10:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">10:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">10:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">10:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">11:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">11:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">11:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">11:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">11:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">11:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">11:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">12:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">12:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">12:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">12:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">12:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">12:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">12:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">13:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">13:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">13:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">13:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">13:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">13:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">13:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">14:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">14:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">14:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">14:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">14:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">14:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">14:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">15:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">15:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">15:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">15:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">15:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">15:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">15:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">16:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">16:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">16:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">16:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">16:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">16:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">16:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">17:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">17:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">17:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">17:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">17:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">17:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">17:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">18:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">18:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">18:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">18:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">18:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">18:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">18:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">19:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">19:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">19:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">19:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">19:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">19:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">19:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">20:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">20:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">20:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">20:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">20:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">20:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">20:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">21:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">21:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">21:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">21:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">21:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">21:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">21:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">22:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">22:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">22:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">22:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">22:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">22:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">22:00</td>
                                   
                                </tr>
                                <tr class="warning">
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">23:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">23:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">23:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">23:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">23:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">23:00</td>
                                    <td onmouseover="this.style.backgroundColor='#FFCC66'"onmouseout="this.style.backgroundColor='#fcf8e3'"href="#mtab" data-toggle="modal" role="button">23:00</td>
                                   
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class= "span3">
                    <div class="hero-unit">
                        <div class="well">
                            <!--TABLE-EVENTOS-->
                            <table class="table table-bordered table-hover" id="tabela-eventos">
                                <tr class="success"><th>Eventos</th></tr>
                                <tr class="success"><td>Evento1</td></tr>
                                <tr class="success"><td>Evento2</td></tr>
                                <tr class="success"><td>Evento3</td></tr>
                                <tr class="success"><td>Evento4</td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script src="js/jquery-2.0.0.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>

    </body>
</html>
