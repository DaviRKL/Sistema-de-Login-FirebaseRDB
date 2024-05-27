<?php
    include_once ("header.php")
?>
    <div class="form-login card">
        <form method="post" action="login_action.php" >
            <h2>Faça seu Login</h2>
            <label  class="form-label">Email</label>
            <input type="text" name="email"  class="form-control"><br>
            <label  class="form-label">Senha</label>
            <input type="password" name="password"  class="form-control"><br>
            <input type="submit" class="btn" value="LOGIN"><br><br>
            
        </form>
    </div>
    Ainda não possui uma conta? <a href="signup.php">Cadastre-se</a>   
<?php
    include_once ("footer.php")
?>