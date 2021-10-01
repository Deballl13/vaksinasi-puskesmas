const sidebarToggle = document.getElementById("sidebar-toggle");
const navbarSide = document.getElementById("navbar-side");
const navbarTop = document.getElementById("navbar-top");
const content = document.getElementById("content");
var width = window.innerWidth;

sidebarToggle.addEventListener("click", function () {
    if (this.hasAttribute("checked")) {
        this.removeAttribute("checked");
    }

    navbarSide.classList.toggle("onDesktop");
    navbarTop.classList.toggle("onDesktop");
    content.classList.toggle("onDesktop");
});
