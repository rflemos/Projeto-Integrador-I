<!-- start #account -->
<section id="account" class="py-3">
    <?php if ($_SESSION['logged'] == false) {
        header("Location: login.php");
    } ?>
    <div class="container-xxl">
        <div class="row">
            <div class="col-3">
               
                <!-- !add member -->
            </div>
            <div class="col-9">
                <form method="POST" id="account-member">
                    <div class="form-group">
                        <table class="table table-striped table-bordered table-data">
                            <thead>
                                <tr class="text-center">
                                    <th scope="colgroup rowgroup">ID</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Senha</th>
                                    <th scope="col">Privilegio</th>
                                    <th scope="col">Ação</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($accData as $item): ?>
                                    <tr data-id="<?php echo $item['id'] ?>">
                                        <td>
                                            <input type="number" value="<?php echo $item['id'] ?>" readonly
                                                name="id-<?php echo $item['id'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['username'] ?>"
                                                name="username-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['password'] ?>"
                                                name="password-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <select name="privilege-<?php echo $item['id'] ?>">
                                                <option value="<?php echo $item['privilege'] ?>" selected>
                                                    <?php echo $item['privilege'] ? 'Admin' : 'User'; ?>
                                                </option>
                                                <option value="1">Administrador</option>
                                                <option value="0">Usuario</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" name="account-update"
                                                formaction="account.php?id=<?php echo $item['id'] ?>"
                                                class="btn btn-warning">Atualizar</button>
                                        </td>
                                        <td>
                                            <button type="submit" name="account-delete"
                                                formaction="account.php?id=<?php echo $item['id'] ?>"
                                                class="btn btn-danger">Deletar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                      
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- !start #account -->