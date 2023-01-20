function userProfile() {
  document.getElementById("userDropdown").classList.toggle("show");
}


function registerUser() {
  document.getElementById("registerUserDropdown").classList.toggle("show");
}

function updateUser() {
  document.getElementById("updateUserDropdown").classList.toggle("show");
}


// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.dropBtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

