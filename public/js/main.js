function toggleNavbar(navbarId) {
    var navbar = document.getElementById(navbarId);
    if (navbar.style.display === "none" || navbar.style.display === "") {
        navbar.style.display = "block";
    } else {
        navbar.style.display = "none";
    }
}
