
//display the id
window.onload = function() {
    //document.getElementById("page_title").innerHTML = localStorage.getItem("category_storage"); 
    category = localStorage.getItem("category_storage");
    if (category == "fruitVegNav") {
        document.getElementById("page_title").innerHTML = document.getElementById(category).textContent;
    } else if (category == "snacksNav") {
        document.getElementById("page_title").innerHTML = document.getElementById(category).textContent;
    } else if (category == "instantFoodNav") {
        document.getElementById("page_title").innerHTML = document.getElementById(category).textContent;
    } else if (category == "stationeryNav") {
        document.getElementById("page_title").innerHTML = document.getElementById(category).textContent;
    } else if (category == "allCategoriesNav") {
        document.getElementById("page_title").innerHTML = document.getElementById(category).textContent;
    }
}

    


