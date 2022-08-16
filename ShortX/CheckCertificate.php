<?php include 'Header.php' ?>
<link rel="stylesheet" href="Css/CheckCertificate.css">

<div id="Main-CheckCertificate">


    <div id="Heading-CheckCertificate">
        <h2>Check Your Certificate</h2>
    </div>

    <!-- CheckCertificate-1 -->
    <div id="CheckCertificate-1">
        <div id="SearchBar">
            <input type="number" id="CertificateID" placeholder="Enter Certificate ID...">
            <button id="CheckBtn">Check Now</button>
        </div>
    </div>

    <!-- CheckCertificate-2 -->
    <div id="CheckCertificate-2">
        <div id="CheckingStatus">

            <div id="SuccessStatus">
                <img src="Img/Check.png" alt="Success-Img">
                <div>
                    <h2>Verifide Certificate</h2>
                    <p>This is The verifide Student and Certificatre form the ShortX.in</p>
                </div>
            </div>
            
            <div id="StudentDetails">
                <div id="Details-Box">
                    <div id="Cont-Details">
                        <img src="Img/XtarNeha.png" id="ImgUser" alt="Profile-Picture">
                        <div id="User-Details">
                            <h2>Xtar Dhananjay</h2>
                            <p>
                                <span class="material-icons">location_on</span>
                                <span>Delhi</span>
                            </p>
                            <p>
                                <span class="material-icons">call</span>
                                <span>
                                    <span>+91</span>
                                    <span>8368692759</span>
                                </span>
                            </p>
                            <p>
                                <span class="material-icons">mail</span>
                                <span>xtardhananjay@gmail.com</span>
                            </p>
                        </div>
                    </div>
                    <img id="UserCheckIcon" src="Img/Check.png" alt="Success-Img">
                </div>
            </div>
            
        </div>
    </div>


    <!-- CheckCertificate-3 -->
    <div id="CheckCertificate-3">

            <div id="SuccessStatus" class="ErrorStatus">
                <img src="Img/Cross.png" alt="Error-Img">
                <div>
                    <h2>UnVarifide Certificate</h2>
                    <p>This is the not varifide certificate</p>
                </div>
            </div>
    </div>

</div>

<script src="Js/CheckCertificate.js"></script>