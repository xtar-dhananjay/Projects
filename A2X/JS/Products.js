
// This is for Showing Border Bottom Below Main Pages
const Pages = document.querySelectorAll('.menu-list li a');
let SearchQuery = document.getElementById('SearchQuery');
Pages.forEach(element => {
    element.classList.remove('active');
});
Pages[1].classList.add('active');

let LastIndex = 4;
// Start Ajx part
let ProContainer = document.getElementById('Products');
// Let's Load the user list table
function LoadTable(Page){

    fetch(`PHP/Product.php?Page=${Page}`)
    .then((Response) => Response.json())
    .then((Data) => {
        if (Data['Empty']) {
            $('#All-Products').prop('disabled', true);
            $('#All-Products').text('Finished');
            $('#All-Products').css('background', '#73777B');
        }else{
            let Tr = '';
            for (let i = 0; i < Data.length; i++){
                // LastIndex += i;

                // Extract All Img
                Img = Data[i].Pro_Img.split(",");

                // Short Title
                if(Data[i].Pro_Title.length > 30){
                    ProTitle = Data[i].Pro_Title.substr(0, 30) + '...';
                }else{
                    ProTitle = Data[i].Pro_Title;
                }
                $('#SeeallPro').remove();
                // Get all Product in form of Html
                Tr +=`<a href="SingleProduct.php?ProID=${Data[i].Pro_ID}">
                        <div class="Product">
                            <img src="Img/${Img[0]}" alt="">
                            <div class="Details">
                                <h2 class="Product-Title">${ProTitle}</h2>
                                <p class="Price"><span>Price</span> = <span>₹${Data[i].Pro_Price}</span></p>
                            </div>
                        </div>
                      </a>`;
            }
            ProContainer.insertAdjacentHTML("beforeend",Tr);
            $('#Product-List').append(`<div id="SeeallPro"><button data-indexID='${LastIndex}' id="All-Products">Load More</button></div>`);
            LastIndex += LastIndex;

        }
        
    })
}
LoadTable(0);

$(document).on('click', '#All-Products',function(){
    let LI = $(this).data('indexid');
    LoadTable(LI);
});



// Show Product Seaerch Vise
// SearchQuery.oninput = () => {
//     let SearchTerm = $('#SearchQuery').val();
//     LoadTable(0, SearchTerm);
// }


SearchQuery.oninput = () => {
    let SearchTerm = $('#SearchQuery').val();
    if (SearchTerm !== '') {
        fetch(`PHP/SearchProduct.php?SearchTerm=${SearchTerm}`)
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data['Empty']) {
                $('#Products').html('<h2 style="text-algin: center;">Product Not Found</h2>');
            }else{
                let Tr = '';
                for (let i = 0; i < Data.length; i++){
                    // LastIndex += i;
    
                    // Extract All Img
                    Img = Data[i].Pro_Img.split(",");
    
                    // Short Title
                    if(Data[i].Pro_Title.length > 30){
                        ProTitle = Data[i].Pro_Title.substr(0, 30) + '...';
                    }else{
                        ProTitle = Data[i].Pro_Title;
                    }
                    $('#SeeallPro').remove();
                    // Get all Product in form of Html
                    Tr +=`<a href="SingleProduct.php?ProID=${Data[i].Pro_ID}">
                            <div class="Product">
                                <img src="Img/${Img[0]}" alt="">
                                <div class="Details">
                                    <h2 class="Product-Title">${ProTitle}</h2>
                                    <p class="Price"><span>Price</span> = <span>₹${Data[i].Pro_Price}</span></p>
                                </div>
                            </div>
                          </a>`;
                }
                ProContainer.innerHTML = Tr;
            }
        })
    }else{
        LastIndex = 4;
        ProContainer.innerHTML = '';
        LoadTable(0);
    }
}


// This is for get all Category form The database
$(document).ready(function(){

    fetch('PHP/ShowCategory.php')
    .then((Response) => Response.json())
    .then((Data) => {
        if (Data['Empty']) {
            $('#AddSelect').html(`<option disable >Not Found</option>`);
        }else{
            let Tr = '';
            for (let i = 0; i < Data.length; i++){
                Tr += `<option value='${Data[i].Category_ID}'>${Data[i].Category_Name}</option>`;
            }

            $('#SelectCategory').append(Tr);
        }
    })

});




// This is for Category wise search product
$('#SelectCategory').change(function(){
    let CategoryID = $('#SelectCategory').val();    

    if (CategoryID !== '') {
        fetch(`PHP/ProductCategory.php?CategoryID=${CategoryID}`)
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data['Empty']) {
                $('#Products').html('<h2 style="text-algin: center;">Product Not Found</h2>');
            }else{
                let Tr = '';
                for (let i = 0; i < Data.length; i++){
                    // LastIndex += i;
    
                    // Extract All Img
                    Img = Data[i].Pro_Img.split(",");
    
                    // Short Title
                    if(Data[i].Pro_Title.length > 30){
                        ProTitle = Data[i].Pro_Title.substr(0, 30) + '...';
                    }else{
                        ProTitle = Data[i].Pro_Title;
                    }
                    $('#SeeallPro').remove();
                    // Get all Product in form of Html
                    Tr +=`<a href="SingleProduct.php?ProID=${Data[i].Pro_ID}">
                            <div class="Product">
                                <img src="Img/${Img[0]}" alt="">
                                <div class="Details">
                                    <h2 class="Product-Title">${ProTitle}</h2>
                                    <p class="Price"><span>Price</span> = <span>₹${Data[i].Pro_Price}</span></p>
                                </div>
                            </div>
                          </a>`;
                }
                ProContainer.innerHTML = Tr;
            }
        })
    }else{
        LastIndex = 4;
        ProContainer.innerHTML = '';
        LoadTable(0);
    }
});