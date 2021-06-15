var url = "http://localhost/WPv2/WPv2/products.php";
var value = "";
$(document).ready(function(){
    $(".dropdown-item").click(function(){
        value = this.textContent;
        window.location.href = url+'?&category='+value;
    });
});

var url1 = "http://localhost/WPv2/WPv2/product_desc.php";
var item_name = "";
$(document).ready(function(){
    $(".btn-view").click(function(){
        item_id = this.id;
        window.location.href = url1+'?&item_id='+item_id;
    });
});

