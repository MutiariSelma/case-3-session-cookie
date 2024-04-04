
function togglePassword() {
    var passwordField = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("showPassword");

    if (showPasswordCheckbox.checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var rememberMe = document.getElementById("remember").checked;

   
    document.getElementById('showPassword').addEventListener('change', function() {
        const passwordInput = document.getElementById('password');
        if (this.checked) {
          passwordInput.type = 'text';
        } else {
          passwordInput.type = 'password';
        }
        });

    // Validate email
    if (!email.includes("@") || !email.includes(".")) {
        showDialog("Invalid email format");
        return false;
    }

    // Validate password
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password)) {
        showDialog("Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one number, and one special character.");
        return false;
    }

    // Send the data to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "validate.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                // Set the "Remember Me" cookie if checked
                if (rememberMe) {
                    var expirationDate = new Date();
                    expirationDate.setTime(expirationDate.getTime() + (24 * 60 * 60 * 1000)); // 24 hours
                    document.cookie = "email=" + email + "; expires=" + expirationDate.toUTCString() + "; path=/";
                } else {
                    // Delete the "Remember Me" cookie
                    document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
                }
                window.location.href = "profile.php";
            } else {
                showDialog("Invalid email or password");
            }
        }
    };
    var formData = "email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(formData);

    return false;
}

function showDialog(message) {
    var dialog = document.createElement("div");
    dialog.style.position = "fixed";
    dialog.style.top = "50%";
    dialog.style.left = "50%";
    dialog.style.transform = "translate(-50%, -50%)";
    dialog.style.backgroundColor = "white";
    dialog.style.padding = "20px";
    dialog.style.border = "1px solid black";
    dialog.style.zIndex = "9999";
    dialog.innerHTML = message;

    document.body.appendChild(dialog);

    setTimeout(function () {
        dialog.parentNode.removeChild(dialog);
    }, 3000);
}
