<?php include 'header.php';

    if ($_SESSION['UserRole'] == 'Normal User') {
        header('location: Message.php');
    }
?>
<link rel="stylesheet" href="Css/Product.Css">

<section id="DashBoard">
    <div id="Header">
        <i id="ManuBtn" class="fa-solid fa-bars"></i>
        <img src="../Img/<?php echo $_SESSION['UserImg']; ?>" alt="Admin Photo">
    </div>
    <section id="Product-Page">
        <div id="Head">
            <h2>All Product</h2>
            <button id="AddProductBtn">Add Product</button>
        </div>
        <div id="AllProdcut">
            
            <!-- <div class="Product">
                <img src="../Img/Product-4.png" alt="">
                <div class="Pro-Btn">
                    <div class="Up-Vi">
                        <button class="Pro-UpdateBtn">Update</button>
                        <a href="http://localhost/A2X/SingleProduct.php" target="_"><button>View</button></a>
                    </div>
                    <button class="Delete">Delete</button>
                </div>
            </div> -->

        </div>

        <div id="AddProduct">
            <div id="Product-Form">
                <div id="ProForm-Head">
                    <h2>Updoad Product</h2>
                </div>
                <form id='InserForm'>
                    <input type="text" name="Title" id="PTitle" placeholder="Enter Title">
                    <input type="number" name="Price" id="PPrice" placeholder="Enter Price">
                    <!-- <input type="text" name="TableData1" id="TableData1" hidden> -->
                    <select class='SelectCategory' name="Category" id='AddSelect'>
                        <option>Data Cable</option>
                        <option>AUX Cable</option>
                        <option>Charger</option>
                        <option>Speaker</option>
                    </select>
                    <textarea placeholder="Write Descrition" id="PDesc" name="Description"></textarea>
                    <div id="DropImg">
                        <div id="Drop-Head">
                            <h2>Updoad Image</h2>
                            <button type="button" onclick="document.getElementById('File').click()">Uplaod</button>
                        </div>
                        <input type="file" name='File23' id="File" hidden multiple>
                        <div id="All-Drops">
                            <!-- <div class="DropPhotos">
                                <img src="../Img/Product-5.png" alt="Product Img">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="DropPhotos">
                                <img src="../Img/Product-5.png" alt="Product Img">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="DropPhotos">
                                <img src="../Img/Product-5.png" alt="Product Img">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="DropPhotos">
                                <img src="../Img/Product-5.png" alt="Product Img">
                                <i class="fa-solid fa-xmark"></i>
                            </div> -->
                        </div>
                    </div>
                    <div id="Table-Details">
                        <h2>Product Details</h2>
                        <div id="ALlTbale-Rows">
                            <div class="inputs inputs1">
                                <input class="Title" type="text" placeholder="Title">
                                <input class="RDetails" type="text" placeholder="Description">
                                <span onclick="this.parentElement.style.display = 'none'; this.parentElement.classList.remove('inputs1')"><i class="fa-solid fa-circle-minus"></i></span>
                            </div>
                            <div class="inputs inputs1">
                                <input class="Title" type="text" placeholder="Title">
                                <input class="RDetails" type="text" placeholder="Description">
                                <span onclick="this.parentElement.style.display = 'none'; this.parentElement.classList.remove('inputs1')"><i class="fa-solid fa-circle-minus"></i></span>
                            </div>
                        </div>
                        <button type="button" id="AddRow-Btn"><i class="fa-solid fa-circle-plus"></i> Add Row</button>
                    </div> 
                    <div id="ProUp-Btns">
                        <button type="button" id="ProUp-CancelBtn">Cancel</button>
                        <button id="ProUploadBtn">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div id="UpdateProduct">
            <div id="UpProduct-Form">
                <div id="UpProForm-Head">
                    <h2>Update Product</h2>
                </div>
                <form action="">
                    <input type="text" id="UpTitle" name="UpTitle" placeholder="Enter Title">
                    <input type="number" id="UpPrice" name="UpPrice" placeholder="Enter Price">
                    <input type="text" hidden id="OldPhotos" name="OldPhotos">
                    <select class='SelectCategory' name="UpSelect" id='UpSelect'>
                        <!-- Data Come's from the fetch API -->
                    </select>
                    <textarea id="UpDesc" name="UpDesc" placeholder="Write Descrition"></textarea>
                    <div id="UpDropImg">
                        <div id="UpDrop-Head">
                            <h2>Update Image</h2>
                            <button type="button" onclick="document.getElementById('UpFile').click()">Uplaod</button>
                        </div>
                        <input type="file" name="UpFile" id="UpFile" hidden multiple>
                        <div id="All-UpDrops">
                            <!-- <div class="DropPhotos">
                                <img src="../Img/Product-5.png" alt="Product Img">
                                <i class="fa-solid fa-xmark"></i>
                            </div> -->
                        </div>
                    </div>
                    <div id="UpTable-Details">
                        <h2>Product Details</h2>
                        <div id="UpTbale-Rows">
                        </div>
                        <button type="button" id="UpAddRow-Btn"><i class="fa-solid fa-circle-plus"></i> Add Row</button>
                    </div> 
                    <div id="Up-ProUp-Btns">
                        <button type="button" id="Up-CancelBtn">Cancel</button>
                        <button type="button" id="UploadBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include 'Warnings.php' ?>
    </section>
</section>


<script src="Js/heades.js"></script>
<script src="Js/Products.js"></script>