<?php include 'header.php';

    if ($_SESSION['UserRole'] == 'Normal User') {
        header('location: Message.php');
    }
?>
<link rel="stylesheet" href="Css/Users.Css">

<section id="DashBoard">
    <div id="Header">
        <i id="ManuBtn" class="fa-solid fa-bars"></i>
        <img src="../Img/<?php echo $_SESSION['UserImg']; ?>" alt="Admin Photo">
    </div>
    <section id="Users-Page">
        <div id="Users-Head">
            <h2>All Users</h2>
            <button id="AddUsers-Btn">Add Users</button>
        </div>
        <div id="Users-Body">
            <table border="1px">
                <thead>
                    <th>S.No.</th>
                    <th>FULL NAME</th>
                    <th>USERS NAME</th>
                    <th>ROLE</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </thead>
                <tbody id="UserList">
                    <!-- <tr>
                        <td>1</td>
                        <td>Dhananjay Gupta</td>
                        <td>Dhananjay</td>
                        <td>Admin</td>
                        <td><i class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i class="fa-solid fa-trash Trash"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dhananjay Gupta</td>
                        <td>Dhananjay</td>
                        <td>Admin</td>
                        <td><i class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i class="fa-solid fa-trash Trash"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dhananjay Gupta</td>
                        <td>Dhananjay</td>
                        <td>Admin</td>
                        <td><i class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i class="fa-solid fa-trash Trash"></i></td>
                    </tr> -->
                </tbody>
            </table>
        </div>

        <div class="AddUser-Page" id="AddUser-Page">
            <div class="User-Form">
                <form id="InsertForm">
                    <div class="AddUser-Head">
                        <h2>Add User</h2>
                    </div>            
                    <input type="file" name="1File" hidden id='File1' style="display: none;" required>
                    <div class="UserImg" id="ImgInsert" onclick="document.getElementById('File1').click();">
                        <i class="fa-solid fa-upload"></i>
                    </div>
                    <input type="text" id="1Name" name="1Name" placeholder="Enter Your Name" required>
                    <input type="text" name="1Username" id="1Username" placeholder="User Name" required>
                    <div class="password">
                        <input type="password" name="1Poassword" id="AddPassword" placeholder="Password" required>
                        <i onclick="ShowPassword('AddPassword', 'AddIcon')" id="AddIcon" class="fa-solid fa-eye-slash"></i>
                    </div>
                    <select name="1Role" id="URole" required>
                        <option selected>Normal User</option>
                        <option>Admin</option>
                    </select>
                    <div class="OprationBtn">
                        <button type="button" id="AddUser-Cancel">Cancel</button>
                        <button id="SaveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
        

        <div class="AddUser-Page" id="UpdateUser-Page">
            <div class="User-Form">
                <form id="UForm">
                    <div class="AddUser-Head">
                        <h2>Update User</h2>
                    </div>
                    <div class="UserImg" onclick="document.getElementById('File2').click();">
                        <img id="UImgSrc" src="../Img/1936218560_2022-05-10_Eid Mubarak Islamic.png" alt="User Photo">
                    </div>
                    <input id="HName" name="Name" type="text" placeholder="Enter Your Name">
                    <input id="HUserName" name="Username" type="text" placeholder="Enter Username">
                    <input id="Hhidden2" name="ID" style="display: none;" type="text">
                    <input id="Hhidden1" name="Img" style="display: none;" type="text">
                    <input type="file" name="2File" hidden id='File2' style="display: none;">
                    <select id="HSelect" name="Role">
                        <option selected>Normal User</option>
                        <option>Admin</option>
                    </select>
                    <div class="OprationBtn">
                        <button type="button" id="UpUser-Cancel">Cancel</button>
                        <button id="UpdateBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include 'Warnings.php' ?>
        
    </section>
</section>


<script src="Js/heades.js"></script>
<script src="Js/User.js"></script>