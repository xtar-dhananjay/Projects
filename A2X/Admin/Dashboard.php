<?php include 'header.php';

    if ($_SESSION['UserRole'] == 'Normal User') {
        header('location: Message.php');
    }
?>
<link rel="stylesheet" href="Css/Dashboard.Css">

<section id="DashBoard">
    <div id="Header">
        <i id="ManuBtn" class="fa-solid fa-bars"></i>
        <img src="../Img/<?php echo $_SESSION['UserImg']; ?>" alt="Admin Photo">
    </div>
    <section id="index-Page">

        <div id="Top-Record">
            <a href="" class="Desc">
                <div class="Card">
                    <h2>Total Views</h2>
                    <h3>293988</h3>
                </div>
                <i class="fa-solid fa-eye"></i>
            </a>
            <a href="Message.php" class="Desc">
                <div class="Card">
                    <h2>Total Contact</h2>
                    <h3>384</h3>
                </div>
                <i class="fa-solid fa-comment"></i>
            </a>
            <a href="Message.php" class="Desc">
                <div class="Card">
                    <h2>Total Inquiry</h2>
                    <h3>534</h3>
                </div>
                <i class="fa-solid fa-envelope"></i>
            </a>
            <a href="Product.php" class="Desc">
                <div class="Card">
                    <h2>Total Product</h2>
                    <h3>28</h3>
                </div>
                <i class="fa-solid fa-box"></i>
            </a>
        </div>

        <div id="Quick-Access">

            <div class="Quick">
                <h2>Add Product</h2>
                <a href="Product.php"><button>Add Now</button></a>
            </div>

            <div class="Quick">
                <h2>Add Category</h2>
                <a href="Category.php"><button>Add Now</button></a>
            </div>

            <div class="Quick">
                <h2>Check AnyLtics</h2>
                <a href=""><button>Check Now</button></a>
            </div>

            <div class="Quick">
                <h2>Check Inquiry</h2>
                <a href="Message.php"><button>Check Now</button></a>
            </div>

        </div>

        <div id="Last-Inquiry">
            <div id="L-Ihead">
                <h1>Recent Inquiry</h1>
            </div>
            <table>
                <thead>
                    <th width="120px">So No:</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Phone Number</th>
                    <th>Email ID</th>
                    <th>Time</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sandeep Prajapati</td>
                        <td>New Delhi</td>
                        <td>8368692759</td>
                        <td>Codingdhananjay@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dhananjay Gupta</td>
                        <td>Bihar</td>
                        <td>8368692759</td>
                        <td>Codingdhananjay@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Monu Gupta</td>
                        <td>Pnajab</td>
                        <td>8368692759</td>
                        <td>Monu@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Snajay Panday</td>
                        <td>New York</td>
                        <td>8368692759</td>
                        <td>Snajayay@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Vikash Gupta</td>
                        <td>Delhi</td>
                        <td>8368692759</td>
                        <td>Vikash@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Nitin Prajapati</td>
                        <td>Model Town</td>
                        <td>8368692759</td>
                        <td>NitinPrajapati@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Naman Roy</td>
                        <td>Mumbai</td>
                        <td>8368692759</td>
                        <td>NamanRoy@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Neha Koli</td>
                        <td>Godgonw</td>
                        <td>8368692759</td>
                        <td>Nehakoli@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Kanran Yadav</td>
                        <td>New Delhi</td>
                        <td>8368692759</td>
                        <td>Kanranyadav@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Sankar Sha</td>
                        <td>Goa</td>
                        <td>8368692759</td>
                        <td>SankarSha@gmail.com</td>
                        <td>1 May, 2022</td>
                    </tr>
                </tbody>
            </table>
            <div id="LoadALlInquiry">
                <a href=""><button id="All-Inquiry">All Inquiry</button></a>
            </div>
        </div>
        
    </section>
</section>


<script src="Js/heades.js"></script>
<script src="Js/Dashboard.js"></script>