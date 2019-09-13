
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Status - UFFS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile friendliness -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Stay up to date with the latest service updates from Cachet Demo.">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Cachet Demo">
    <meta property="og:image" content="/img/ogimage.png">
    <meta property="og:description" content="Stay up to date with the latest service updates from Cachet Demo.">

    <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
    <meta http-equiv="cleartype" content="on">

    <meta name="msapplication-TileColor" content="#7ED321" />
    <meta name="msapplication-TileImage" content="/img/favicon.png" />

    <link rel="icon" type="image/png" href="/img/favicon.ico">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">

    <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-touch-icon-152x152.png">

    <!-- Estilos lindos da aplicação -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="./css/ionicons.min.css" media="screen">
    <link rel="stylesheet" href="./css/froala_blocks.min.css" media="screen">
    <link rel="stylesheet" href="./css/app.css" media="screen">
  </head>
  <body>
    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="https://www.froala.com">
                <i class="icon ion-md-checkbox-outline text-success" style="font-size: 1.5em;"></i> UFFS Status
            </a>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav11" aria-controls="navbarNav11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarNav11">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.froala.com">About</a>
                    </li>
                </ul>
                <a class="btn btn-outline-light ml-md-3" href="https://www.froala.com">Button</a>
            </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-sm-2 m-sm-auto">
                <img alt="image" class="img-fluid rounded-circle" src="./img/people/7.jpg">
            </div>
        </div>

        <div class="row text-center justify-content-center">
            <div class="col-sm-6 m-sm-auto">
                <h2>{{ $name }}</h2>
                <h3>Ciência da Computação</h3>
                <p>Professor, Chapecó/SC</p>
            </div>
        </div>

        <div class="row justify-content-center section">
            <div class="col-lg-8">
                <div class="card text-white bg-dark border-success">
                    <div class="card-header bg-success">Status</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-2 text-center status-icon-col">
                                <i class="icon ion-md-checkmark-circle-outline status-icon text-success"></i>
                            </div>
                            <div class="col-10">
                                <h4 class="card-title">Disponível</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            

        <div class="row justify-content-center section">
            <div class="col-lg-8">
                <div class="card text-white bg-dark border-secondary">
                    <div class="card-header">Localização</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-2 text-center status-icon-col">
                                <i class="icon ion-md-pin info-icon"></i>
                            </div>
                            <div class="col-10">
                                <h4 class="card-title">{{ $place_name }}</h4>
                                <p class="card-text">Essa localização é aproximada e baseada no acesso ao AP <em>{{ $place_ap }}</em>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Visto nesse local há 5 minutos atrás.
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center section">
            <div class="col-lg-8">
                <div class="card text-white bg-dark border-secondary">
                    <div class="card-header">Próximos compromissos</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="text-muted"><i class="icon ion-md-calendar"></i> 14/09 - 16:00</span> Reunião do colegiado</li>
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        <small><i class="icon ion-md-warning"></i> Essa informação foi obtida de forma automática. Consulte a pessoa para confirmar os compromissos.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="fdb-block footer-large bg-dark">
      <div class="container">
        <div class="row align-items-top text-center text-md-left">
          <div class="col-3 text-md-left">
            <h3><strong>About Us</strong></h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>

          <div class="col-3"></div>
    
          <div class="col-3">
            <h3><strong>Country B</strong></h3>
            <p>Street Address 100<br>Contact Name</p>
            <p>+13 827 312 5002</p>
            <p><a href="https://www.froala.com">countryb@amazing.com</a></p>
          </div>

          <div class="col-3">
            <h3><strong>Country B</strong></h3>
            <p>Street Address 100<br>Contact Name</p>
            <p>+13 827 312 5002</p>
            <p><a href="https://www.froala.com">countryb@amazing.com</a></p>
          </div>
        </div>
    
        <div class="row mt-5">
          <div class="col text-center text-muted">
            © 2018 Froala. All Rights Reserved
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
