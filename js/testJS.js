var url = "http://localhost/Web%20Programming/Assignment/WPv2/products.php";
var value = "";
$(document).ready(function(){
    $(".dropdown-item").click(function(){
        value =this.textContent;
        window.location.href = url+'?&category='+value;
    });
});

