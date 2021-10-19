<?php include(__DIR__ . '/header.php'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="../?signin" method="POST" class="row g-3">
                        <h4>Inscription</h4>
                        <div class="col-12">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" placeholder="Entrez votre login">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="pwd" class="form-control" placeholder="Entrez votre mot de passe">
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-dark float-end" value="S'inscrire">                            
                        </div>
                    </form>
                    <hr class="mt-4">  
                </div>
            </div>
        </div>
    </div>  
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>