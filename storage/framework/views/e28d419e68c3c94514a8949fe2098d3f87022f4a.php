<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>" class="stylesheet">
</head>
<body>
    

    <?php $__env->startSection('content'); ?>
        <p>Bienvenue <?php echo e(Auth::user()->name); ?></p>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
        <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>

        <script>
            var AppBridge = window ['app-bridge'];
            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;
            var titleBarOptions = {
                title : 'Bienvenue'
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    <?php $__env->stopSection(); ?>

    <main>
        <section>
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th colspan = "2">Articles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Récupération des produits via l'API Shopify
                            $shop = Auth::user();
                            $products = $shop->api()->rest('GET', '/admin/api/2023-01/products.json', ['limit'=> 20]);
                            $products = $products['body']['container']['products'];
                            // Affichage des produits dans une table
                            foreach($products as $product) {
                                $image = '';
                                if (count($product['images']) > 0){
                                    $image = $product['images'][0]['src'];
                                }
                                ?>
                                    <tr>
                                        <td><img width="50" heigth="50" src="<?php echo $image; ?>" alt="<?php echo $product['title'];?>"></td>
                                        <td><?php echo $product['title'];?></td>
                                        <td><a href="" class ="secondary icon-trash"></a></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>                
            </div>
        </section>
    </main>    
</body>
</html>


<?php echo $__env->make('shopify-app::layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Documents\Abel\Informatique\Code\Laravel\ShopifyApp\resources\views/welcome.blade.php ENDPATH**/ ?>