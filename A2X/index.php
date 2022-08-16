<?php include 'header.php' ?>
<link rel="stylesheet" href="CSS/Swiper.Css">
<link rel="stylesheet" href="CSS/index.Css">

<div class="index">
    <!-- Slider main container -->
    <section class="swiper">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide"><img src="Img/Slide1.png" alt="Slider-1"></div>
            <div class="swiper-slide"><img src="Img/Slide2.png" alt="Slider-1"></div>
            <div class="swiper-slide"><img src="Img/Slide3.png" alt="Slider-2"></div>
            <div class="swiper-slide"><img src="Img/Slide4.png" alt="Slider-3"></div>
        </div>
        <div class="swiper-pagination"></div>
    </section>

    <section id="index-Content">
        <section id="Category-Section">
            <div id="Category-head">
                <h1>Category</h1>
                <hr>
            </div>
            <div id="Category-Img">
                <a href=""><img src="Img/Data-Cable.png" alt="Data-Cable Icon"></a>
                <a href=""><img src="Img/Charger.png" alt="Charger Icon"></a>
                <a href=""><img src="Img/HeadPhone.png" alt="HeadPhone Icon"></a>
                <a href=""><img src="Img/Speaker.png" alt="Speaker Icon"></a>
            </div>
        </section>
    </section>

    <section id="Product-List">
        <div id="Products-Head">
            <h1>Popular Products</h1>
            <hr>
        </div>
        <div id="Products">

            <?php

                include 'Config.php';
                $SelectQuery = " SELECT * FROM product ORDER BY Pro_ID DESC";
                $Statement = $Con -> prepare($SelectQuery);
                $Statement -> execute();

                if ($Statement -> rowCount() > 0) {

                    while ($Data = $Statement -> fetch(PDO::FETCH_ASSOC)) { 
                        $Img = explode(",",$Data['Pro_Img']);
                        $ProTitle = '';

                        if (strlen($Data['Pro_Title']) > 20) {
                            $ProTitle = substr($Data['Pro_Title'], 0, 30) . '...';
                        }else{
                            $ProTitle = $Data['Pro_Title'];
                        }
                        
                    ?>

                        <a href="SingleProduct.php?ProID=<?php echo $Data['Pro_ID']; ?>">
                            <div class="Product">
                                <img src="Img/<?php echo $Img[0]; ?>" alt="Product Img">
                                <div class="Details">
                                    <h2 class="Product-Title"><?php echo $ProTitle; ?></h2>
                                    <p class="Price"><span>Price</span> = <span><?php echo $Data['Pro_Price']; ?></span></p>
                                </div>
                            </div>
                        </a>
            <?php
                    }

                }

            ?>

            <!-- <a href="">
                <div class="Product">
                    <img src="Img/Product.jpg" alt="">
                    <div class="Details">
                        <h2 class="Product-Title">Best Type C Data Cable with Farst Charging...</h2>
                        <p class="Price"><span>Price</span> = <span>₹24</span></p>
                    </div>
                </div>
            </a> -->

        </div>

        <div id="SeeallPro">
            <a href="product.php"><button id="All-Products">SEE ALL PRODUCTS</button></a>
        </div>

    </section>

    <section id="Manufac">
        <div id="Manufac-Head">
            <h1>About Company</h1>
            <hr>
        </div>
        <div class="Manu-de-1">
            <img src="Img/Manufacturer.png" alt="Manufacturer Img">
            <p class="Manunf-Details">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis magni aperiam non facere iure, velit commodi eos laudantium quasi. Nostrum doloribus unde doloremque illum similique quis iste enim, molestias itaque? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam placeat dicta recusandae eligendi aperiam ut delectus est mollitia dolorem, voluptatum sint sapiente debitis nesciunt beatae autem consequuntur, possimus nulla distinctio! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate voluptates ipsam, labore perferendis harum temporibus quam soluta odio pariatur doloremque eum? Id tempora fugit doloremque eaque nisi illo enim?
            </p>
        </div>
        <div class="Manu-de-2">
            <p class="Manunf-Details">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis magni aperiam non facere iure, velit commodi eos laudantium quasi. Nostrum doloribus unde doloremque illum similique quis iste enim, molestias itaque? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam placeat dicta recusandae eligendi aperiam ut delectus est mollitia dolorem, voluptatum sint sapiente debitis nesciunt beatae autem consequuntur, possimus nulla distinctio! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate voluptates ipsam, labore perferendis harum temporibus quam soluta odio pariatur doloremque eum? Id tempora fugit doloremque eaque nisi illo enim?
            </p>
            <img src="Img/Dsitributor.png" alt="Manufacturer Img">
        </div>
        <div id="ContactNow">
            <img src="Img/Team.png" alt="">
            <div id="ContactNow-Detai">
                <h2>Contect A2X Team</h2>
                <a href=""><button>Contact Now</button></a>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php' ?>

<script src="Js/Swiper.js"></script>
<script src="Js/index.js"></script>