//get the id 
$(".dropdown-item").click(function(){
    var category = this.id;
    localStorage.setItem("category_storage", category)
});
