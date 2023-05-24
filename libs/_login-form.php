<!-- start login -->
<section class="login">
    <div class="main py-3">
        <!-- log in -->
        <form method="POST" class="form" id="sign-in">
            <?php if ($_SESSION['logged'] == true) { ?>
                <h3>
                    Ben vindo de Volta,
                    <span>
                        <?php echo $acc->getAccount($_COOKIE['user_id'])['username'] ?>!
                    </span>
                </h3>
                <img src="<?php echo $acc->getAccount($_COOKIE['user_id'], 'user')['avatar'] ?>" alt="avatar"
                    class="rounded-circle my-3" style="width: 120px;height: 120px;" />
                <h5 class="mb-2">
                    <strong>
                        <?php echo $acc->getAccount($_COOKIE['user_id'], 'user')['fullname'] ?>
                    </strong>
                </h5>
                <p class="text-muted">
                    <?php echo $_COOKIE['user_type'] ? 'Web designer' : 'Customer' ?>
                    <span class="badge bg-primary">
                        <?php echo $_COOKIE['user_type'] ? 'Administrator' : 'User' ?>
                    </span>
                </p>
                <p class="mb-2">
                    <span>Money: </span>
                    <strong class="text-danger">
                        $
                        <?php echo $acc->getAccount($_COOKIE['user_id'], 'user')['money'] ?>
                    </strong>
                </p>
                <button class="form-submit" type="submit" name="logout-submit">Log out</button>
            <?php } else { ?>
                <h3 class="heading">Entrar</h3>
                <p class="desc">Entre para a aproveitar uma oferta excluvisa!</p>
                <div class="row" style="width: 400px;">
                    <div class="col">
                        <div class="form-group">
                            <label for="username" class="form-label">Usuario (*)</label>
                            <input id="username" name="username" type="text" rules="required|min:3|max:20"
                                placeholder="Entre com seu nome de usuário" class="form-control">
                            <span class="form-message"></span>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Senha (*)</label>
                            <input id="password" name="password" type="password" rules="required|min:3"
                                placeholder="Digite a senha" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>

                <button class="form-submit" type="submit" name="login-submit">Entrar</button>
                <p class="desc">Não possui uma Conta? <a href="./register.php">Inscreva -se</a></p>
            <?php } ?>
        </form>

    </div>
</section>
<!-- !start login -->