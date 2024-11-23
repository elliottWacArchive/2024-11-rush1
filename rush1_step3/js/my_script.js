const alerts = document.querySelectorAll(".alert");
const textAlert = document.getElementById("textAlert")

document.getElementById("cross").addEventListener("click", function () {
    alerts.forEach(alert => {
        alert.classList.add("hidden");
    });
});

document.getElementById("subButton").addEventListener("click", function() {
    textAlert.textContent = "Voulez envoyer le formulaire ?";
    alerts.forEach(alert => {
        alert.classList.remove("hidden");
    }
    )
});

document.getElementById("oui").addEventListener("click", function() {
    document.getElementById("form").submit();
});

document.getElementById("non").addEventListener("click", function() {
    alerts.forEach(alert => {
        alert.classList.add("hidden");
    });
})