<!-- New Phones -->
<?php
shuffle($productData);
?>
<section id="new-bijus">
    <div class="container">
        <h4 class="font-size-20">Novas Bijus</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($productData as $item) { ?>
                <div class="item py-2 border rounded-2 bg-light">
                    <div class="product">
                        <a href="<?php printf('%s?id=%s', 'product.php', $item['id']); ?>"><img
                                src="<?php echo $item['image']; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6>
                                <?php echo $item['name']; ?>
                            </h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>R$
                                    <?php echo $item['price'] ?? '0'; ?>
                                </span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="user_id"
                                    value="<?php echo $_COOKIE['user_id'] ?? 0 ?>">
                                <?php
                                if (in_array($item['id'], $cart->getCartId($cart->getCart($_COOKIE['user_id'] ?? 0)) ?? [])) {
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">No carrinho</button>';
                                } else {
                                    echo '<button type="submit" name="new_bijus_submit" class="btn btn-warning font-size-12">Adicionar ao Carrinho</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !New Phones -->