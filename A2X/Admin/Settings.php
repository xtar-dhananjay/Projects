<?php include 'header.php';

    if ($_SESSION['UserRole'] == 'Normal User') {
        header('location: Message.php');
    }
?>
<link rel="stylesheet" href="Css/Settings.Css">

<section id="DashBoard">
    <div id="Header">
        <i id="ManuBtn" class="fa-solid fa-bars"></i>
        <img src="../Img/<?php echo $_SESSION['UserImg']; ?>" alt="Admin Photo">
    </div>
    <section id="Settings-Page">
        <div id="Boxs">
            <div class="Box">
                <h2>Contact</h2>
                <button id="ContUpdateBtn">Upadte</button>
            </div>
            <div class="Box">
                <h2>Slides</h2>
                <button id="SlidesUpdateBtn">Upadte</button>
            </div>
            <div class="Box">
                <h2>Home</h2>
                <button id="HomeUdateBtn">Upadte</button>
            </div>
            <div class="Box">
                <h2>About</h2>
                <button id="AboutUdateBtn">Upadte</button>
            </div>
        </div>
        <div id="Contact-Cont">
            <div id="ContactForm">
                <form id="ContForm">
                    <div id="Contact-head">
                        <h2>Contact Update</h2>
                    </div>

                    <div id="SocialMedia" class="Cont-Fields">
                        <h3 class="Cont-Titles">Social Media</h3>
                        <div id="Social-Body">
                            <div class="Field">
                                <span><img src="../Img/facebook.png" alt="Social media icon"></span><input id="Facebook" type="text" placeholder="Past Link" name="Facebook">
                            </div>
                            <div class="Field">
                                <span><img src="../Img/instagram.png" alt="Social media icon"></span><input id="Instagram" type="text" placeholder="Past Link" name="Instagram">
                            </div>
                            <div class="Field">
                                <span><img src="../Img/linkedin.png" alt="Social media icon"></span><input id="linkedin" type="text" placeholder="Past Link" name="linkedin">
                            </div>
                            <div class="Field">
                                <span><img src="../Img/twitter.png" alt="Social media icon"></span><input id="Twitter" type="text" placeholder="Past Link" name="Twitter">
                            </div>
                            <div class="Field">
                                <span><img src="../Img/whatsapp.png" alt="Social media icon"></span><input id="CallNumber1"  onblur="ValidateNumber(this.id)" type="text" placeholder="Whatsapp Number" name="Whatspp">
                            </div>
                            <div class="Field">
                                <span><img src="../Img/Call.png" alt="Social media icon"></span><input id="CallNumber2" onblur="ValidateNumber(this.id)" type="text" placeholder="Phone Number" name="Call">
                            </div>
                        </div>
                    </div>

                    <div class="Cont-Fields">
                        <h3 class="Cont-Titles">Email</h3>
                        <input type="email" placeholder="Enter Email" id="Email" name="Email">
                    </div>

                    <div class="Cont-Fields">
                        <h3 class="Cont-Titles">Phone Number</h3>
                        <div class="Numbers">
                            <input type="number" placeholder="Enter Number 1" name="Phone1" id="CallNumber3" onblur="ValidateNumber(this.id)">
                            <input type="number" placeholder="Enter Number 2" name="Phone2" id="CallNumber4" onblur="ValidateNumber(this.id)">
                        </div>
                    </div>

                    <div class="Cont-Fields">
                        <h3 class="Cont-Titles">Working Tile</h3>
                        <input type="text" placeholder="Working Time" id="WorkingTime" name="WorkingTime">
                    </div>

                    <div class="Cont-Fields">
                        <h3 class="Cont-Titles">Address</h3>
                        <input type="text" placeholder="Enter Address" id="Address" name="Address">
                    </div>

                    <div class="Cont-Btn">
                        <button type="button" id="Cont-Close">Cancel</button>
                        <button type="button" id="ContUpdateButton">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="Slides-Cont">
            <div id="SlidesForm">
                <form action="">
                    <div id="Slide-Head">
                        <h2>Update Slides</h2>
                    </div>
                    <div id="Drop-Box">
                        <div id="DropHead">
                            <h2>Upload Slides</h2>
                            <button type='button' onclick="document.getElementById('SlideFile').click();" id="SlidesUpBtn">Upload</button>
                            <input type="file" hidden id="SlideFile">
                        </div>
                        <div id="DropImg-Box">
                            <!-- <h2>Drop Slides</h2> -->
                            <div class="Img">
                                <img src="../Img/Slide1.png" alt="">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="Img">
                                <img src="../Img/Slide1.png" alt="">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="Img">
                                <img src="../Img/Slide1.png" alt="">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="Img">
                                <img src="../Img/Slide1.png" alt="">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="Img">
                                <img src="../Img/Slide1.png" alt="">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </div>
                        <div class="Cont-Btn">
                            <button type="button" id="Slide-Close">Cancel</button>
                            <button type="button">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="Home-Cont">
            <div id="HomeForm">
                <form id="HomeUpForm">
                    <div id="HomeHead">
                        <h2>Home Update</h2>
                    </div>
                    <input type="file" name="File1" hidden id="HomeFile1">
                    <input type="text" name="OldFile1" hidden id="OldFile1">
                    <input type="text" name="OldFile2" hidden id="OldFile2">
                    <h2>About 1</h2>
                    <div class="Fields" id="FirstHAbout">
                        <div id="File1" class="Img" onclick="document.getElementById('HomeFile1').click();">
                            <img id="ShowAboutImg1" alt="">
                        </div>
                        <textarea id="About1" name="About1" placeholder="Enter Details"></textarea>
                    </div>
                    <input type="file" name="File2" hidden id="HomeFile2">
                    <h2>About 2</h2>
                    <div class="Fields" id="LastHAbout">
                        <div id="File2" class="Img" onclick="document.getElementById('HomeFile2').click();">
                            <img id="ShowAboutImg2" alt="">
                        </div>
                        <textarea id="About2" name="About2" placeholder="Enter Details"></textarea>
                    </div>
                    <div class="Cont-Btn">
                        <button type="button" id="Home-Close">Cancel</button>
                        <button type="button" id="HA-Up-Btn">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="About-Cont">
            <div id="AboutForm">
                <form id="AboutUpdateForm">
                    <div id="AboutHead">
                        <h2>About Update</h2>
                    </div>
                    <h2>About A2X Company</h2>
                    <div class="Fields" id="FirstAAbout">
                        <div class="Img" onclick="document.getElementById('AboutFile1').click();">
                            <img id="About1Img" src="../Img/About A2X.png" alt="">
                        </div>
                        <textarea name="AText1" id="TextAreaAbout1" placeholder="Enter Details"></textarea>
                    </div>
                    <h2>Company Vision</h2>
                    <div class="Fields" id="LastAAbout">
                        <div class="Img" onclick="document.getElementById('AboutFile2').click();">
                            <img id="About2Img" src="../Img/About A2X.png" alt="">
                        </div>
                        <textarea name="AText2" id="TextAreaAbout2" placeholder="Enter Details"></textarea>
                    </div>

                    <div id="Team-Cont">
                        <div id="Team-Head">
                            <h2>Company Team</h2>
                        </div>
                        <div id="TeamHeads">
                            <div class="TeamBox">
                                <div class="Img" onclick="document.getElementById('AboutFile3').click();">
                                    <img id="WKImg1" src="../Img/Team1.png" alt="Team Member">
                                </div>
                                <input name="Worker1" id="WK1" type="text" placeholder="Enter Name">
                            </div>
                            <div class="TeamBox">
                                <div class="Img" onclick="document.getElementById('AboutFile4').click();">
                                    <img id="WKImg2" src="../Img/Team1.png" alt="Team Member">
                                </div>
                                <input name="Worker2" id="WK2" type="text" placeholder="Enter Name">
                            </div>
                        </div>
                        
                        <input type="file" name="AFile1" hidden id="AboutFile1">
                        <input type="file" name="AFile2" hidden id="AboutFile2">
                        <input type="file" name="WFile1" hidden id="AboutFile3">
                        <input type="file" name="WFile2" hidden id="AboutFile4">
                        <input type="file" name="WFile3" hidden id="AboutFile5">
                        <input type="file" name="WFile4" hidden id="AboutFile6">
                        <input type="file" name="WFile5" hidden id="AboutFile7">
                        <input type="file" name="WFile6" hidden id="AboutFile8">

                        <input type="text" name="OldImgA1" hidden id="OldImgA1">
                        <input type="text" name="OldImgA2" hidden id="OldImgA2">
                        <input type="text" name="OldImgW1" hidden id="OldImgW1">
                        <input type="text" name="OldImgW2" hidden id="OldImgW2">
                        <input type="text" name="OldImgW3" hidden id="OldImgW3">
                        <input type="text" name="OldImgW4" hidden id="OldImgW4">
                        <input type="text" name="OldImgW5" hidden id="OldImgW5">
                        <input type="text" name="OldImgW6" hidden id="OldImgW6">

                        <div id="TeamMember">
                            <div class="TeamBox">
                                <div class="Img" onclick="document.getElementById('AboutFile5').click();">
                                    <img id="WKImg3" src="../Img/Team1.png" alt="Team Member">
                                </div>
                                <input name="Worker3" id="WK3" type="text" placeholder="Enter Name">
                            </div>
                            <div class="TeamBox">
                                <div class="Img" onclick="document.getElementById('AboutFile6').click();">
                                    <img id="WKImg4" src="../Img/Team1.png" alt="Team Member">
                                </div>
                                <input name="Worker4" id="WK4" type="text" placeholder="Enter Name">
                            </div>
                            <div class="TeamBox">
                                <div class="Img" onclick="document.getElementById('AboutFile7').click();">
                                    <img id="WKImg5" src="../Img/Team1.png" alt="Team Member">
                                </div>
                                <input name="Worker5" id="WK5" type="text" placeholder="Enter Name">
                            </div>
                            <div class="TeamBox">
                                <div class="Img" onclick="document.getElementById('AboutFile8').click();">
                                    <img id="WKImg6" src="../Img/Team1.png" alt="Team Member">
                                </div>
                                <input name="Worker6" id="WK6" type="text" placeholder="Enter Name">
                            </div>
                        </div>
                        
                    </div>

                    <div class="Cont-Btn">
                        <button type="button" id="About-Close">Cancel</button>
                        <button type="button" id="AboutUpdateBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>


        <?php include 'Warnings.php' ?>
    </section>
</section>


<script src="Js/heades.js"></script>
<script src="Js/Settings.js"></script>