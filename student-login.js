window.addEventListener("DOMContentLoaded", function () {
    document.getElementById("login-btn").addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the default form submission

        var username = document.getElementById("user").value;
        var password = document.getElementById("pass").value;

        clearErrorMessages();

        if (username.trim() === "") {
            displayErrorMessage("Please enter your username.", "user");
            return;
        }
        if (password.trim() === "") {
            displayErrorMessage("Please enter your password.", "pass");
            return;
        }

        // If all validations pass, submit the form data to the server
        submitFormData(username, password);
    });

    function displayErrorMessage(message, inputId) {
        var errorElement = document.createElement("div");
        errorElement.className = "error-message";
        errorElement.innerHTML = message;

        var inputField = document.getElementById(inputId);
        inputField.parentNode.insertBefore(errorElement, inputField.nextSibling);
    }

    function clearErrorMessages() {
        var errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(function (errorMessage) {
            errorMessage.remove();
        });
    }

    function submitFormData(username, password) {
        // Create a new FormData object to store form data
        var formData = new FormData();
        formData.append("username", username);
        formData.append("password", password);

        // Send the form data to the server using fetch API or XMLHttpRequest
        fetch("student-login.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // If form submission is successful, show a success message or redirect the user
                alert("Login Successful");
                // Optionally, redirect the user to the dashboard page
                window.location.href = "student-dashboard.php";
            } else {
                // If form submission fails, display an error message
                throw new Error("Login failed. Please try again later.");
            }
        })
        .catch(error => {
            // Handle errors, such as network issues or server errors
            alert(error.message);
        });
    }
});
