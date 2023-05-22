<!-- start register -->
<section class="register">
    <div class="main py-3">
        <!-- sign up -->
        <form method="POST" class="form" id="sign-up">
            <h3 class="heading">Sign up</h3>
            <p class="desc">Registre-se para receber nossas ofertas agora!</p>
            <div class="row" style="width: 800px;">
                <div class="col">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Nome (*)</label>
                        <input id="fullname" name="fullname" type="text" rules="required" placeholder="Nome Completo"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">Usuario (*)</label>
                        <input id="username" name="username" type="text" rules="required|min:3"
                            placeholder="Escolha o nome da sua conta" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Senha (*)</label>
                        <input id="password" name="password" type="password" rules="required|min:3"
                            placeholder="Senha Desejada" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirmar Senha (*)</label>
                        <input id="password_confirmation" name="password_confirmation"
                            rules="required|confirm:#password" placeholder="Confirme a Senha" type="password"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Telefone (*)</label>
                        <input id="phone" name="phone" type="text" rules="required|min:15|max:15"
                            placeholder="Telefone" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input id="avatar" name="avatar" type="file" class="form-radio-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email (*)</label>
                        <input id="email" name="email" type="text" rules="required|email"
                            placeholder="Email" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="city" class="form-label">Cidade (*)</label>
                        <input id="city" rules="required" name="city" class="form-control" 
                            placeholder="Cidade" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Genero (*)</label>
                        <div class="form-radio-control">
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="1"
                                    class="form-radio">Feminino
                            </div>
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="0"
                                    class="form-radio">Masulino
                            </div>
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="2"
                                    class="form-radio">Outro
                            </div>
                        </div>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Endereço</label>
                        <input id="address" name="address" type="text" placeholder="Endereço"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>

            <button class="form-submit" type="submit" name="register-submit">Registrar</button>
            <p class="desc">Já possui uma conta? <a href="./login.html">Entre</a></p>
        </form>

    </div>
</section>
<!-- !start register -->