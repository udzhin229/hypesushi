$("#burger").on("click", function(event) {
    event.preventDefault;
    $("#burger").toggleClass("active");
    $("#nav").toggleClass("active");
});
$("#icon-cart, #overflow, #show-cart, #continue").on("click", function() {
    $("#cart-menu").toggleClass("show");
    $("#overflow").toggleClass("show");
});