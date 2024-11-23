const alerts = document.querySelectorAll(".alert");
const textAlert = document.getElementById("textAlert");

document.getElementById("cross").addEventListener("click", function () {
    alerts.forEach((alert) => {
        alert.classList.add("hidden");
    });
});

document
    .getElementById("subButton")
    .addEventListener("click", submitValidation);

function submitValidation(event) {
    event.preventDefault(); // mettre en pause le submit

    let errorMessage = error();
    if (errorMessage !== "") {
        textAlert.innerHTML = errorMessage.replace(/\n/g, "<br>"); // remplace le \n par un <br> (ca marche pas jsp pk)
        alerts.forEach((alert) => {
            alert.classList.remove("hidden");
        });
        document.getElementById("buttonVerif").classList.add("hidden");
        document.getElementById("mikuImg").src = "../img/miku-ragegif.gif";
    } else {
        document.getElementById("buttonVerif").classList.remove("hidden");
        document.getElementById("mikuImg").src = "../img/miku-happygif.gif";
        textAlert.textContent = "Voulez-vous envoyer le formulaire ?";
        alerts.forEach((alert) => {
            alert.classList.remove("hidden");
        });
        document.getElementById("oui").addEventListener("click", function () {
            document.getElementById("form").submit();
        });
        document.getElementById("non").addEventListener("click", function () {
            alerts.forEach((alert) => {
                alert.classList.add("hidden");
            });
        });
    }
}

function error() {
    const name = document.getElementById("name");
    const mail = document.getElementById("mail");
    const phone = document.getElementById("telNo");
    let errorMessage = "";

    if (name.value === "") {
        errorMessage += "Le champ nom est requis. \n";
        name.style.borderColor = "red";
        name.style.backgroundColor = "#ff919c";
    } else if (!/^[A-Za-z]{2,}$/.test(name.value)) {
        // Vérifie si la chaîne name correspond au motif regex (2 lettres min)
        errorMessage += "Le nom doit contenir au moins 2 lettres. \n";
        name.style.borderColor = "red";
        name.style.backgroundColor = "#ff919c";
    }

    if (mail.value === "") {
        errorMessage += "Le champ email est requis. \n";
        mail.style.borderColor = "red";
        mail.style.backgroundColor = "#ff919c";
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mail.value)) {
        errorMessage += "Email invalide. \n";
        mail.style.borderColor = "red";
        mail.style.backgroundColor = "#ff919c";
    }

    if (phone.value === "") {
        errorMessage += "Le champ numéro est requis. \n";
        phone.style.borderColor = "red";
        phone.style.backgroundColor = "#ff919c";
    } else if (!/^\d{2,}$/.test(phone.value)) {
        errorMessage += "Numéro invalide. \n";
        phone.style.borderColor = "red";
        phone.style.backgroundColor = "#ff919c";
    }
    return errorMessage;
}
