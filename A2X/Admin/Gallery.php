<?php include 'header.php';

    if ($_SESSION['UserRole'] == 'Normal User') {
        header('location: Message.php');
    }
?>
<link rel="stylesheet" href="Css/Gallery.Css">

<section id="DashBoard">
    <div id="Header">
        <i id="ManuBtn" class="fa-solid fa-bars"></i>
        <img src="../Img/<?php echo $_SESSION['UserImg']; ?>" alt="Admin Photo">
    </div>
    <section id="Gallery-Page">   
        <div id="Gallery-Head">
            <h2>All Photos</h2>
            <button id="AddCategory-BTN">Add Photo</button>
        </div>        
        <div id="Gallery-Body">
            <div id="All-Photos">
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>
                
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>
                
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>
                
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>
                
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>
                
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>
                
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>
                
                <div class="Photo">
                    <img src="../Img/F-8.jpg" alt="Factory Related Photo">
                    <div class="Photo-Details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio molestiae quis corporis, consequatur maiores.</p>
                    </div>
                    <div class="Opraiton-Btn">
                        <button class="PhotoDel-Btn">Delete</button>
                        <button class="PhotoUD-Btn">Update</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="AddPhoto-Page" id="AddImg-Page">
            <div class="AddPhoto-Form">
                <h2>Add Photos</h2>
                <form action="">
                    <div class="ChooseFile" onclick="document.getElementById('File').click();">
                        <input type="file" hidden id="File">
                        <h2>Choose Photo</h2>
                        <!-- <img src="../Img/F-2.jpg" alt=""> -->
                    </div>
                    <div class="PhotoDetials">
                        <textarea placeholder="Enter Photo Description"></textarea>
                        <div class="CU-Btn">
                            <button type="button" id="AddImg-Cancel">Cancel</button>
                            <button type="button">Uplaod</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="AddPhoto-Page" id="UpImg-Page">
            <div class="AddPhoto-Form">
                <h2>Update Photos</h2>
                <form action="">
                    <div class="ChooseFile" onclick="document.getElementById('File').click();">
                        <input type="file" hidden id="File">
                        <img src="../Img/F-8.jpg" alt="">
                    </div>
                    <div class="PhotoDetials">
                        <textarea placeholder="Enter Photo Description"></textarea>
                        <div class="CU-Btn">
                            <button type="button" id="UpImg-Cancel">Cancel</button>
                            <button type="button">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>


<script src="Js/heades.js"></script>
<script src="Js/Gallerys.js"></script>