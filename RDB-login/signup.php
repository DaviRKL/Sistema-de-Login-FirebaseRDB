<?php
include_once ("header.php")
    ?>
<div class="form-login card">
    <form method="post" action="signup_action.php">
        <h2>Cadastre-se</h2>

        <label class="form-label">Nome completo</label>
        <input type="text" name="name" class="form-control"><br>

        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control"><br>

        <label class="form-label">Senha</label>
        <input type="password" name="password" class="form-control"><br>

        <input type="submit" class="btn" value="SIGNUP"><br><br>
    </form>
</div>
Já possui uma conta? <a href="login.php">Login</a>

<?php
include_once ("footer.php")
    ?>