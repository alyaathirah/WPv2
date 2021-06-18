//var url = "http://localhost/Web%20Programming/Assignment/WPv2/products.php";
var value = "";
$(document).ready(function(){
    $(".dropdown-item").click(function(){
        value = this.textContent;
        window.location.href = 'products.php'+'?&category='+value;
    });
});

//var url1 = "http://localhost/Web%20Programming/Assignment/WPv2/product_desc.php";
var item_name = "";
$(document).ready(function(){
    $(".btn-view").click(function(){
        item_id = this.id;
        window.location.href = 'product_desc.php'+'?&item_id='+item_id;
    });
});

