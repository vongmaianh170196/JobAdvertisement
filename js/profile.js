// Change between profile information editing and account information editing
function editProfile() {
    document.getElementById("profilebox").style.display = "block";
    document.getElementById("accountbox").style.display = "none";
    document.getElementById("deletebox").style.display = "none";
}
function editAccount() {
    document.getElementById("profilebox").style.display = "none";
    document.getElementById("accountbox").style.display = "block";
}

//Delete profile shows up when button pressed
function profileDelete() {
    document.getElementById("deletebox").style.display = "block";
}