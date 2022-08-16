<?php include 'header.php' ?>
<link rel="stylesheet" href="CSS/index.Css">
<link rel="stylesheet" href="CSS/Prodcut.css">

<section id="ProductPage"> 
    <section id="header">
        <select name="" id="SelectCategory">
            <option value="" selected>Select Category</option>
        </select>
        <input type="text" id='SearchQuery' placeholder="Search...">
    </section>
    
    <section id="Product-List">
        <div id="Products">
            <!-- Data comes form the database -->
        </div>
        <div id="SeeallPro">
            <button id="All-Products">Load More</button>
        </div>
    </section>

</section>

<?php include 'footer.php' ?>

<script src="Js/Products.js"></script>
