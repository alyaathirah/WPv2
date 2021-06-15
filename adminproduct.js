 var category = localStorage.getItem("pdCategory");
 item = document.getElementById("item1");
        cloneditem = item.cloneNode(true);
        cloneditem.id = 'item01';
        cloneditem.querySelector("#iname1").innerHTML = localStorage.getItem("pdName");
        cloneditem.querySelector("#inname1").value = localStorage.getItem("pdName");
        cloneditem.querySelector("#iprice1").value = localStorage.getItem("pdPrice");
        cloneditem.querySelector("#idesc1").innerHTML = localStorage.getItem("pdDes");
        cloneditem.querySelector("#iweight1").value = localStorage.getItem("pdWeight");
        cloneditem.querySelector("#istock1").value = localStorage.getItem("pdStock");
        cloneditem.querySelector("#iexpDate1").value = localStorage.getItem("pdExpDate");
        cloneditem.querySelector("#iimage1").src = localStorage.getItem("pdImage");

        if(localStorage.getItem("pdLocal") != null){
          cloneditem.querySelector("#ilocal1").checked = true;
          cloneditem.querySelector("#iimported1").checked = false;
        }else{
          cloneditem.querySelector("#ilocal1").checked = false;
          cloneditem.querySelector("#iimported1").checked = true;
        }

        var unit = localStorage.getItem("pdUnit");
        if(unit == "kg"){
          cloneditem.querySelector("#iunit1").value = unit;
        }else{
          cloneditem.querySelector("#iunit1").value = "g";
        }
    
      if(category=="Snacks"){
        //SNACKS   
        document.getElementById("snacks_items1").appendChild(cloneditem);
        console.log(cloneditem);
      }else if(category=="Fruit and Vegetables"){
        //FRUIT AND VEG
        document.getElementById("fruitnvegs_items1").appendChild(cloneditem);
        console.log(cloneditem);
      }else if(category=="Instant Food"){
        //INSTANT FOOD
        document.getElementById("instantfoods_items1").appendChild(cloneditem);
        console.log(cloneditem);
      }

      //collapse desc
 var coll = document.getElementsByClassName('collapsible');
 var i;
 alert(coll.length);
 for (i = 0; i < coll.length; i++) {
   coll[i].addEventListener("click", function() {
     this.classList.toggle("descactive");
     var content = this.nextElementSibling;
     if (content.style.display === "block") {
       content.style.display = "none";
     } else {
       content.style.display = "block";
     }
   });
 }

 //delete item
 function delFunction() {
  var id = localStorage.getItem("iddel");
  var buttonID = "item" + id;
  var myobj = document.getElementById(buttonID);
  myobj.remove();
  localStorage.removeItem('iddel');
}

function idFunction(){
localStorage.setItem("iddel",event.srcElement.id);
}


//clear input field
function clear(){
  document.getElementById('new_prod').value = '';
  document.getElementById('new_category').value = '';
  document.getElementById('new_Price').value = '';
  document.getElementById('productDesc').value = '';
  document.getElementById('new_Weight').value = '';
  document.getElementById('new_unit').value = '';
  document.getElementById('new_Stock').value = '';
  document.getElementById('new_expDate').value = '';
  document.getElementById('new_Local').value = '';
  document.getElementById('new_Imported').value = '';
  document.getElementById('test4').value = '';
}

$(function () {
  $(window).on('scroll', function () {
      if ( $(window).scrollTop() > 10 ) {
          $('.navbar').addClass('active');
      } else {
          $('.navbar').removeClass('active');
      }
  });
});
