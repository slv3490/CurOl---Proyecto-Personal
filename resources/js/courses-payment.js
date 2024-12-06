window.addEventListener("DOMContentLoaded", function() {
    if(document.querySelector(".course-parent")) {
        showButtonPayment();
    }
});

function showButtonPayment() {
    const coursesParent = document.querySelectorAll(".course-parent");
    coursesParent.forEach(function(course) {
        course.addEventListener("click", function(event) {
            const buttonPayment = event.currentTarget.children[4];
            if(buttonPayment.classList.contains("display-none")) {
                buttonPayment.classList.remove("display-none");
                buttonPayment.classList.add("button-payment");
                document.body.classList.add("overflow-hidden");
            } else {
                buttonPayment.classList.add("display-none");
                buttonPayment.classList.remove("button-payment");
                document.body.classList.remove("overflow-hidden");
            };
        });
    });
};