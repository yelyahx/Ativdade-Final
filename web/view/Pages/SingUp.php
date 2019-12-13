<html>

<head>
    <link rel="stylesheet" type="text/css" href="view/Styles/login.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <section>
        <div class="form-new">
            <form method="POST" id="singup-form">
                <h4 id="incorreto" style="display: none;">Email ja cadastrado!</h4>
                <h4 id="preencha" style="display: none;">Preencha todos dados necessarios!</h4>
                <label for="name">Login</label>
                <input id="name" class="input-form" name="name" type="text" required>
                <label for="file-name">Senha</label>
                <input id="password" class="input-form" name="password" type="password" required>
                <label for="email">Email</label>
                <input id="email" class="input-form" name="email" type="email" required>

                <br />
                <label for="sexo">Sexo</label>
                <br />
                <input type="radio" name="sexo" id="sexo" value="M" class="input-form-rad" checked>Masculino<br>
                <input type="radio" name="sexo" id="sexo" value="F" class="input-form-rad">Feminino<br>
                <div class="buttons">
                    <button type="button" onclick="singup();" class="submit-button-cad">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>


    <script src="view/scripts/singup.js"></script>
</body>

</html>