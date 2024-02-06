<div class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand mr-5" href="#">Kalender System</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-iconmr-5 ml-5"></span>
                        </button>
                        <div class="collapse navbar-collapse ml-5 mr-5" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-5 mr-5  my-lg-0"> 
                                <li class="nav-item  mr-5 ml-5">
                                    <a class="nav-link active mr-5 ml-5" href="index.php">Home</a>
                                </li>
                                <?php
                                    if(!isset($_SESSION)) { 
                                        session_start(); 
                                    } 
                                ?>
                                <?php if(!isset($_SESSION['authenticated'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="register.php">Register</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="login.php">Login</a>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item ml-5 mr-5">
                                    <a class="nav-link" href="Dashboard.php">Zum Kalnder</a>
                                </li>
                                <?php if(isset($_SESSION['authenticated'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link ml-5" href="logout.php">Log out</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
