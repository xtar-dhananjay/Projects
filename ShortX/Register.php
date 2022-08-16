<?php include "Header.php" ?>
<link rel="stylesheet" href="Css/Register.css">

<div id="Main-Register">
    <div id="Register-1">
        <div id="Register-Form">
            <form action="">
                <div id="Form-Header">
                    <h2>Register</h2>
                </div>
                <div id="Form-Body">
                    <input type="file" id="UserImg" hidden>
                    <div id="Upload-Photo" onclick="document.getElementById('UserImg').click();">
                        <div>
                            <span class="material-icons">file_upload</span>
                            <p>Upload Photo</p>
                        </div>

                        <!-- This is the Img tag for use photo live preview -->
                        <img>
                    </div>
                    <div id="Input-Fields">
                        <div id="Input-Col1">
                            <input id="Name" type="text" placeholder="Full Name">
                            <input id="Username" type="text" placeholder="Enter Username">
                            <input id="PhoneNumber" type="number" placeholder="Enter Phone Number">
                            <input id="Email" type="email" placeholder="Enter Email">
                            <select id="Qualification">
                                <option>Select Qualification</option>
                                <option>10th</option>
                                <option>12th</option>
                                <option>BCom</option>
                                <option>BTech</option>
                                <option>BA</option>
                            </select>
                        </div>
                        <div id="Input-Col2">
                            <select id="State">
                                <option>Select State</option>
                                <option>Delhi</option>
                                <option>Bihar</option>
                                <option>UP</option>
                                <option>Mumbai</option>
                            </select>
                            <select id="Gender">    
                                <option>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                            <input id="Birth" type="date" placeholder="Date Of Birth">

                            <div>
                                <input type="password" id="FirstPassword" placeholder="Enter Password">
                                <span onclick="ShowHide('FirstPassword', 'FirstEye')" class="material-icons" id="FirstEye">visibility_off</span>
                            </div>
                            
                            <div>
                                <input type="Password" id="SecondPassword" placeholder="Confirm Password">
                                <span onclick="ShowHide('SecondPassword', 'SecondEye')" class="material-icons" id="SecondEye">visibility_off</span>
                            </div>        
                        </div>
                    </div>
                </div>
                <div id="Form-Footer">
                    <button id="Submit" type="Submit">Register Now</button>
                    <p>You have a account? <a href="Login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/Register.js"></script>