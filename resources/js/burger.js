window.addEventListener("DOMContentLoaded", function() {
    if(document.querySelector(".burger")) {
        deployLinks() 
    }
})

function deployLinks() {
    const url =  window.location.pathname;
    const headerNav = document.querySelector(".header-nav");
    if(url != "/") {
        headerNav.classList.add("correct-height");
    }    
    const burger = document.querySelector(".burger");
    const links = document.querySelector(".enlaces");
    const display = document.querySelector(".titulo-cabecera")
    burger.addEventListener("click", function(e) {
        if(links.classList.contains("display-links-nav")) {
            links.classList.remove("display-links-nav")
            if(url == "/") {
                display.classList.add("mostrar")
            }
        } else {
            links.classList.add("display-links-nav")
            if(url == "/") {
                display.classList.remove("mostrar")
            }
        }
    })
}