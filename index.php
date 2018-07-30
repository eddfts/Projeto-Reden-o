<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto Redenção</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <!--icones boostrap-->
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="icon" href="img/portfolio/prjRedencao.ico"> 
   
  </head>

  <body id="page-top">
  

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Projeto Redenção</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Evento</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Sobre</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contate-nos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/portfolio/prjRedencao.png" alt="">
        <h2 class="text-uppercase mb-0">Projeto Redenção</h2>
        <hr class="alert-dark mb-5">
        <h2 class="font-weight-light mb-0"> Quão formosos sobre os montes são os pés do que anuncia as boas-novas, que proclama a paz, que anuncia coisas boas, que proclama a salvação...</br>
        <strong>Is.52:7</strong></h2>
      </div>
    </header>
	<?php include_once 'models/eventoSql.php'; 
 		
		  $sql = mysqli_query($con,$query) or die("Erro");
	      $linhas = mysqli_num_rows($sql);
		  if($linhas == '')
	      {
			print "<div class='msg2 padding20'>Dados não encontrado.</div>";
          }
          else
	         {
				while($dados=mysqli_fetch_assoc($sql))
			    {
				  $id_evento = $dados['id_evento'];
				
		   ?>    
    <!-- Portfolio Grid Section -->
     <section class="portfolio" id="portfolio">
      <div class="container">
         <!--Titulo da Atividade-->
         <h3 class="text-center text-uppercase text-secondary mb-0"><?php print $titulo_evento = $dados['tema_evento']; ?></h3>
         <hr class="alert-dark mb-5">
         <!--Fim Titulo da Atividade-->
        
         <!--texto informaçoes do evento-->
         <div class="col-md-6 col-lg-4">
             <div class="jumbotron">
                <div class="form-text text-justify">
                    <strong>Data:</strong>
                        <?php print $dados['Data'];?><span></span> <strong>Horário:</strong> <?php print $dados['hora_evento']; ?>
                </div>
                <div class="form-text text-justify">
                    <strong>Local:</strong> <?php print $dados['nome_local']; ?>
                </div>
                <div class="form-text text-justify">
                <strong> <?php if($dados['status_evento'] == '1'){
                                    print "<del>Concluído</del>";
                               } 
                               else if ($dados['status_evento'] == '0') 
                               { 
                                         print "Em Andamento"; 
                               }
                         ?>
                 </strong>
              </div>             
                 <!--Seleciona a atividade do ministrante do dia-->
                 <?php              
                        include_once 'models/atividadeMinistroSql.php';
                        $sql = mysqli_query($con,$query_ministro) or die("Erro");
                        $linhas = mysqli_num_rows($sql);
                        if($linhas == '')
                        {
                           print "<div class='msg2 padding20'>Dados não encontrado.</div>";
                       
                        }
                        else
                            {
                                while($dados=mysqli_fetch_assoc($sql))
                                {
                            
                                ?><div class="form-text text-center">
                                <strong><?php print $dados['nome_atividade']; ?> </strong>
                                </div>
                                <div class="form-text text-center">
                                    <?php print $dados['ministro']; ?>
                                        <i>(<?php print $dados['nome_congregacao']; ?>)</i>
                                </div>
                                <div class="form-text text-center">       
                                        <strong>Tema:</strong><?php print $dados['tema_atividade']; ?>
                             	</div>
                                <?php
                              }
                            }
                        ?>
                </div><!--Jumbotron-->
                </div> 
             <?php
                }
            }
        ?> <!--finaliza informaçoes do evento-->  
        <?php
                include_once 'models/atividadeSql.php'; 
                $sql = mysqli_query($con,$query) or die("Erro");
                $linhas = mysqli_num_rows($sql);
                if($linhas == '')
                {
                    print "<div class='msg2 padding20'>Dados não encontrado.</div>";                        
                }
                else{
                     while($dados=mysqli_fetch_assoc($sql))
                     {
        ?>				 
                            
                <!--<a class="portfolio-item btn-primary mx-auto" href="#portfolio-modal-2">
                    <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                    <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                       <i class="fa fa-search-plus fa-3x"></i>
                     <!--<i class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss"></i>
                    </div>
                  </div>
                    
                    
                 </a>      
               <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">
                  <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                    <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                      <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                  </div>
                  
                  <img class="img-fluid" src="img/portfolio/prjRedencao.png" alt="">
                </a>
              </div>
              
              </div>-->
              
    
             <div class="col-md-6 col-lg-4">
              <div class="jumbotron">
                <div class="portfolio-item d-block mx-auto" href="#portfolio-modal-3">
                  <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                    <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                      <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                  </div>
                
                  <?php print $dados['ministro']; ?></td>
                  <?php print $dados['nome_atividade']; ?></td>
                  <?php print $dados['tema_atividade']; ?></td>
                  <?php print $dados['DataAtividade']; ?></td>
                  <?php if($dados['status_atividade'] == '1'){
                           print "<del>Concluído</del>";
                        }else if ($dados['status_atividade'] == '0') { 
                                  print "<mark>A Fazer</mark>"; 
                              } ?>
              </div>
            </div>
         
         </div> 
          <!--<div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-4">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/game.png" alt="">
            </a>
          </div>-->
          
          <!--<div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-5">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/safe.png" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-6">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/submarine.png" alt="">
            </a>
          </div>
        </div>
      </div>-->
  <?php }
       }
  ?>  
    </section>
     
 
 </div>  

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h3 class="text-center text-uppercase text-white">Sobre</h3>
        <hr class="alert-dark mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">O Projeto Redenção foi concebido por meio de um chamado; "Sinalizar o Reino de Deus".</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">O Projeto visa sinalizar o Reino de Deus, por meio da proclamação da Palavra e por meio de obras que procuram demonstrar a fraternidade.</p>
           <!--<div class="col-lg-4 mr-auto">           
           <p class="lead">Valores
Ética, Excelência, Transparência e Responsabilidade Social.</p>
          
        </div>
        <!--<div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fa fa-download mr-2"></i>
            Download Now!
          </a>
        </div>-->
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h4 class="text-center text-uppercase text-secondary mb-0">Contate-nos</h4>
        <hr class="alert-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Nome</label>
                  <input class="form-control" id="name" type="text" placeholder="Nome" required data-validation-required-message="Por favor digite seu nome.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <!--<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>E-mail</label>
                  <input class="form-control" id="email" type="email" placeholder="E-mail" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>-->
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Telefone (WhatsApp)</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Telefone" required data-validation-required-message="Por favor digite o número do telefone." maxlength="14">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Mensagem</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Mensagem"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Localização</h4>
            <p class="lead mb-0"><!--2215 John Daniel Drive-->
              <br><!--Clark, MO 65243--></p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Rede Sociais</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.youtube.com/channel/UCwbYC_DRqrAcuwWHlleQ_Ig">
                  <i class="fa fa-fw fa-youtube"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-twitter"></i>
                </a>
              </li>
              <!--<li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-linkedin"></i>
                </a>
              </li>-->
              <!--<li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-dribbble"></i>
                </a>
              </li>-->
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">Sobre</h4>
            <p class="lead mb-0">Visando sinalizar o Reino de Deus, através da proclamação da Palavra e por meio de obras que procuram demonstrar a fraternidade.
              </p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>&copy; Projeto Redenção 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/cabin.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-2">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"><?php print $titulo_evento; ?></h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/prjRedencao.png" alt="">
              <p class="mb-5"><div class="container">
				 <?php 
				 		include_once 'models/atividadeSql.php'; 
                     	$sql = mysqli_query($con,$query) or die("Erro");
                		$linhas = mysqli_num_rows($sql);
                		
						if($linhas == '')
                    	{
                       		print "<div class='msg2 padding20'>Dados não encontrado.</div>";                        
                    	}
                		else
                    		{
                        
                	?>
                   		<table class="table table-bordered" style="font-family:'Open Sans',Montserrat;font-size:16px">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Ministro</th>
                      <th scope="col">Atividade</th>
                      <th scope="col">Tema</th>
                      <th scope="col">Data</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                   <?php while($dados=mysqli_fetch_assoc($sql))
                            {?>
                      <td><?php print $dados['ministro']; ?></td>
                      <td><?php print $dados['nome_atividade']; ?></td>
                      <td><?php print $dados['tema_atividade']; ?></td>
                      <td><?php print $dados['DataAtividade']; ?></td>
                      <td><?php if($dados['status_atividade'] == '1'){
                                   print "<del>Concluído</del>";
                                 }else if ($dados['status_atividade'] == '0') { 
                                            print "<mark>A Fazer</mark>"; 
                                 } ?>
                    </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                <?php				
                            
                    }
                
                 ?>  
                 </div> 
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Fechar
             </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-3">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/circus.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-4">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/game.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-5">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/safe.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-6">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/submarine.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
