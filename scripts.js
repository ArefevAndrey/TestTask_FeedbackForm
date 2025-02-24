var request = new XMLHttpRequest();

function liveEmailCheckInit() {
   var emailInput = document.getElementById("emailForm");
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

function NameValidation(e) {

  if (!e.key.match(/[а-яА-ЯёЁ]/)) {
    e.preventDefault();
  }
  document.getElementById('nameForm').addEventListener('input', function () {
    var maxLength = 15;
    if (this.value.length > maxLength) {
      this.value = this.value.substring(0, maxLength);
    }
  });

}
function EmailValidation(e) {

  if (!e.key.match(/^(?!.*\.{2,}.*$)[a-z0-9.@]+$/)) {
    e.preventDefault();
  }
  document.getElementById('emailForm').addEventListener('input', function () {
    var maxLength = 15;
    if (this.value.length > maxLength) {
      this.value = this.value.substring(0, maxLength);
    }
  });

}

function PhoneValidation(e) {
  if (!e.key.match(/^[0-9]*$/)) {
    e.preventDefault();
  }
  document.getElementById('numberForm').addEventListener('input', function () {
    var maxLength = 11;
    if (this.value.length > maxLength) {
      this.value = this.value.substring(0, maxLength);
    }
  });
}

function MessageValidation(e){
  var position = 'selectionStart' in this ?
    this.selectionStart :
     Math.abs(document.selection.createRange().moveStart('character', -input.value.length)); //ie<9
  if(e.keyCode === 32 && position === 0) return false
}
