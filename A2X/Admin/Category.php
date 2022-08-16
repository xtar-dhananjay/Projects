<?php 
    include 'header.php';

    if ($_SESSION['UserRole'] == 'Normal User') {
        header('location: Message.php');
    }


?>
<link rel="stylesheet" href="Css/Category.Css">

<section id="DashBoard">
    <div id="Header">
        <i id="ManuBtn" class="fa-solid fa-bars"></i>
        <img src="../Img/<?php echo $_SESSION['UserImg']; ?>" alt="Admin Photo">
    </div>
    <section id="Category-Page">
        <div id="Category-Head">
            <h2>All Category</h2>
            <button id="AddCategory-BTN">Add Category</button>
        </div>
        <div id="Category-body">
            <table border="1px">
                <thead>
                    <th>So No:</th>
                    <th>Category Name</th>
                    <th>Total Product</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody id='Tbody'>
                    <tr>
                        <td>1</td>
                        <td>Data Cable</td>
                        <td>8</td>
                        <td><i class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i class="fa-solid fa-trash Trash"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Data Cable</td>
                        <td>8</td>
                        <td><i class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i class="fa-solid fa-trash Trash"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Data Cable</td>
                        <td>8</td>
                        <td><i class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i class="fa-solid fa-trash Trash"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Add Form -->
        <div class="CategoryForm" id="AddCategory">
            <div class="CatForm">
                <div class="CategoryForm-Head">
                    <h2>Add Category</h2>
                </div>
                <form id='AddForm'>
                    <input type="text" name='CategoryName' id='CategoryName' placeholder="Category Name"><br>
                    <div class="Form-Btn">
                        <button type="button" id="Cancel-Btn">Cancel</button>
                        <button id="AddCat-Btn">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Update Form -->
        <div class="CategoryForm" id="UpdateCategory">
            <div class="CatForm">
                <div class="CategoryForm-Head">
                    <h2>Update Category</h2>
                </div>
                <form id="UpdateForm">
                    <input type="text" name="EditID" hidden id="CategoryID">
                    <input type="text" name="UpCategoryName" id='UpCategoryName' placeholder="Category Name"><br>
                    <div class="Form-Btn">
                        <button type="button" id="UpCancel-Btn">Cancel</button>
                        <button id="UpCat-Btn">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include 'Warnings.php' ?>

    </section>
</section>


<script src="Js/heades.js"></script>
<script src="Js/Categorys.js"></script>