const passwordInput = document.getElementById("password");
const passwordInput2 = document.getElementById("password2");
const passwordIcon = document.getElementById("passwordIconTerlihat");
const passwordIcon2 = document.getElementById("passwordIconTerlihat2");


document
    .getElementById("passwordToggle")
    .addEventListener("click", function () {
        if (passwordInput.type == "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("bi");
            passwordIcon.classList.remove("bi-eye");
            passwordIcon.classList.add("bi");
            passwordIcon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.add("bi");
            passwordIcon.classList.add("bi-eye");
            passwordIcon.classList.remove("bi");
            passwordIcon.classList.remove("bi-eye-slash");
        }
    });
document
    .getElementById("passwordToggle2")
    .addEventListener("click", function () {
        if (passwordInput2.type == "password") {
            passwordInput2.type = "text";
            passwordIcon2.classList.remove("bi");
            passwordIcon2.classList.remove("bi-eye");
            passwordIcon2.classList.add("bi");
            passwordIcon2.classList.add("bi-eye-slash");
        } else {
            passwordInput2.type = "password";
            passwordIcon2.classList.add("bi");
            passwordIcon2.classList.add("bi-eye");
            passwordIcon2.classList.remove("bi");
            passwordIcon2.classList.remove("bi-eye-slash");
        }
    });
