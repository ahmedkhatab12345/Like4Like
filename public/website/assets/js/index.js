let Home = document.getElementById("Home");
let Help = document.getElementById("Help");
let Profits = document.getElementById("Profits");

function handelClick(type){
    let listItem = document.getElementById(type);
    Home.classList.remove("active");
    Help.classList.remove("active");
    Profits.classList.remove("active");
    listItem.classList.add("active");

}

document.getElementById("moveButton").addEventListener("click", function() {
    var listBox = document.getElementById("myListbox");
    var selectedValue = listBox.options[listBox.selectedIndex].value;
  
    // تحديد الصفحة المختارة وتوجيه المستخدم إليها
    switch(selectedValue) {
      case "Bank":
        window.location.href = "Bank.html";
        break;
      case "vcash":
        window.location.href = "vcash.html";
        break;
      case "ipa":
        window.location.href = "ipa.html";
        break;
      default:
        // إفتراضي: توجيه المستخدم لصفحة افتراضية في حالة عدم اختيار أي صفحة
        window.location.href = "Bank.html";
        break;
    }
  });

document.getElementById("imageBox").addEventListener("click", function() {
  document.getElementById("imageInput").click();
});

document.getElementById("imageInput").addEventListener("change", function() {
  var file = this.files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function(event) {
      document.getElementById("imagePreview").src = event.target.result;
      document.getElementById("imagePreview").style.display = "block";
    };
    reader.readAsDataURL(file);
  }
});
