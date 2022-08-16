<?php include 'header.php' ?>
<link rel="stylesheet" href="CSS/SingleImgSwipe.css">
<link rel="stylesheet" href="CSS/SingleProduc.css">


    <?php

        if (isset($_GET['ProID'])) {
            $ProID = $_GET['ProID'];
            
            include 'Config.php';
            $SelectQuery = " SELECT * FROM product WHERE Pro_ID = :ProID";
            $Statement = $Con -> prepare($SelectQuery);
            $Statement -> bindParam(":ProID", $ProID);
            $Statement -> execute();
            
            if ($Statement -> rowCount() > 0) {
                
                $Data = $Statement -> fetch(PDO::FETCH_ASSOC);
                $Img = explode(",",$Data['Pro_Img']);
                array_pop($Img);
                $TTitle = explode(",",$Data['Pro_TTitle']);
                $TDesc = explode(",",$Data['Pro_TDesc']);
    ?>

    <section id="Single-Product">
        <div id="Product-Img">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php

                        for ($i=0; $i < count($Img); $i++) { 
                            echo '<div class="swiper-slide"><img src="Img/'. $Img[$i] .'" alt="Product-Img"></div>';
                        }
                    
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <button id="QueryBtn">Send Inquiry</button>
        </div>
        <div id="Product-Details">
            <h2 id="Title"><?php echo $Data['Pro_Title']; ?></h2>
            <h3 id="Price"><span>Rs.</span> <span><?php echo $Data['Pro_Price']; ?></span></h3>
            <div id="Desc">
                <h3 id="Desc-Title">Description</h3>
                <p id="Desc-Detilas"><?php echo $Data['Pro_Desc']; ?></p>
            </div>
            <Table id="Tbale" border="1px">

                <thead>
                    <tr>
                        <th colspan="2">Product Details</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                        for ($i=0; $i < count($TTitle); $i++) { 
                            echo "<tr>
                                    <td>{$TTitle[$i]}</td>
                                    <td>{$TDesc[$i]}</td>
                                  </tr>";
                        }

                    ?>
                </tbody>

            </Table>
        </div>
    </section>


    <section id="wrapper">
        <div class="wrapper">
            <header id="Form-header">
                <h2>Enquire Now</h2>
                <span class="material-icons">close</span>
            </header>
            <form id="InquiryForm" action="#">
                <div class="dbl-field">
                    <div class="field">
                    <input type="text" name="name" placeholder="Enter your name">
                    <i class='fas fa-user'></i>
                    </div>
                    <div class="field">
                    <input type="text" name="email" placeholder="Enter your email">
                    <i class='fas fa-envelope'></i>
                    </div>
                </div>
                <div class="dbl-field">
                    <div class="field">
                    <input type="number" name="phone" placeholder="Enter your phone">
                    <i class='fas fa-phone-alt'></i>
                    </div>
                    <div class="field">
                    <input type="text" name="website" placeholder="Enter Your City">
                    <i class="material-icons loca">pin_drop</i>
                    </div>
                </div>
                <div class="message">
                    <textarea placeholder="Write your message" name="message"></textarea>
                    <i class="material-icons">message</i>
                </div>
                <div class="button-area">
                    <button type="submit" id='FormSubmit'>Sand Inquiry</button>
                    <!-- this span is for Showing message -->
                    <span></span>
                </div>
            </form>
        </div>
    </section>

<?php } } ?>


<?php include 'footer.php' ?>


















<!-- <script src="script.js"></script> -->
<script src="Js/SingleImgSwipe.js"></script>
<script src="Js/SingleProduct.js"></script>

