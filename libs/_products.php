<!-- start product -->
<?php
$id = $_GET['id'] ?? 1;
foreach ($product->getData() as $item):
    if ($item['id'] == $id):
        ?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['image']; ?>" alt="product" class="img-fluid">
                        <div class="pt-4 font-size-16">
                            <div class="col">
                                <button type="submit" class="btn btn-success form-control"
                                    onclick="alert('Em desenvolvimento')">Comprar Agora</button>
                            </div>
                            <div class="col">
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_COOKIE['user_id'] ?? 0 ?>">
                                    <?php
                                    if (in_array($item['id'], $cart->getCartId($cart->getCart($_COOKIE['user_id'] ?? 0)) ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success form-control">No Carrinho</button>';
                                    } else {
                                        echo '<button type="submit" name="buy_product_submit" class="btn btn-warning form-control">Adicionar ao Carrinho</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-size-20">
                            <?php echo $item['name']; ?>
                        </h5>
                        <small>Fabricante:
                            <?php echo $manage->getBrand($item['brand'])['brand']; ?>
                        </small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-size-14">20.534 Avaliações </a>
                        </div>
                        <hr class="m-0">

                        <!--- product price -->
                        <table class="my-3 font-size-14">
                            <tr>
                                <td>De</td>
                                <td><strike>R$162,00</strike></td>
                            </tr>
                            <tr>
                                <td>Por:</td>
                                <td class="font-size-20 text-danger">R$
                                    <span>
                                        <?php echo $item['price'] ?? 0; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="font-size-12">&nbsp;&nbsp;Incluido Taxas</span>
                                </td>
                            </tr>
                            
                        </table>
                        <!-- !product price -->

                        <!-- #policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-size-12">10 Dias <br> Para Troca</a>
                                </div>
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-size-12">Entrega<br></a>
                                </div>
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-size-12">1 ano <br>De Garantia</a>
                                </div>
                            </div>
                        </div>
                        <!-- !policy -->
                        <hr>
                        <!-- order-details -->
                        <div id="order-details" class="d-flex flex-column">
                            <small>Entrega: 20/06/2023</small>
                            
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;JadLog SP</small>
                        </div>
                        <!-- !order-details -->
                        <div class="row align-items-center">
                            <div class="col-6">
                                <!-- color -->
                                <div class="color my-3">
                                <div class="qty d-flex">
                                    <h6>Quantidade</h6>
                                    <div class="px-4 d-flex">
                                        <button class="qty-up border bg-light w-25" data-id="pro1"><i
                                                class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="pro1"
                                            class="qty_input text-center border px-2 w-50" disabled value="1"
                                            placeholder="1">
                                        <button data-id="pro1" class="qty-down border bg-light w-25"><i
                                                class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                                <!-- !color -->
                            </div>
                           
                                <!-- !product qty section -->
                            </div>
                        </div>
                        <!-- size -->
                        
                        <!-- !size -->
                    </div>
                    <div class="col-12">
                        <h6>Descrição do Produto</h6>
                        <hr>
                        <p class="font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore
                            vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus
                            dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi?
                            Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae
                            vel?
                        </p>
                        <p class="font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore
                            vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus
                            dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi?
                            Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae
                            vel?
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- !start product -->
        <?php
    endif;
endforeach;
?>