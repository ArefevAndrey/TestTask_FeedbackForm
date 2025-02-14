var request = new XMLHttpRequest();

function liveEmailCheckInit() {
   var emailInput = document.getElementById("emailInput");
   request.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
        document.getElementById("emailCheckResult").style.display = this.responseText 
       }
   }
   emailInput.addEventListener( "blur", function() { 
       request.open("POST", "/formMailCompleted.php", true);
       request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       request.send("email=" + this.value);  
   }, false)
}
window.addEventListener( "load", liveEmailCheckInit, false );




