const form = document.getElementById("order-detail-form");
const updateBtn = document.querySelector(".update-status");

updateBtn.addEventListener("click", function(){
    form.submit();
})