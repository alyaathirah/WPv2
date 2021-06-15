// Get the modal
var modal = document.getElementById("myModal");


// When the user clicks the button, open the modal 
function openModal(){
  //$(".big").css("border", "1px dashed orange");
  $(".modal").css("display","block");
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
  $(".modal").css("display","none");
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function closeWindow(event) {
  if (event.target == modal) {
    $(".modal").css("display","none");
  }
}

function checkStatus(){
  //var status = localStorage.getItem("status")
  //if(status == "logged in"){
    $("#exampleModal").modal();
  //}
}
