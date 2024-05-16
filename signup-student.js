document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("signup-form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        var name = document.getElementById("name").value;
        var rollNumber = document.getElementById("number").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("create-password").value;

        clearErrorMessages();

        if (name.trim() === "") {
            displayErrorMessage("Please enter your name.", "name");
            return;
        }
        if (rollNumber.trim() === "") {
            displayErrorMessage("Please enter your roll number.", "number");
            return;
        }
        if (username.trim() === "") {
            displayErrorMessage("Please enter a username.", "username");
            return;
        }
        if (password.trim() === "") {
            displayErrorMessage("Please enter a password.", "create-password");
            return;
        }

        // If all validations pass, submit the form data to the server
        submitFormData(name, rollNumber, username, password);
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

    function submitFormData(name, rollNumber, username, password) {
        // Create a new FormData object to store form data
        var formData = new FormData();
        formData.append("name", name);
        formData.append("roll", rollNumber);
        formData.append("username", username);
        formData.append("password", password);

        // Send the form data to the server using fetch API or XMLHttpRequest
        fetch("student-signup.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // If form submission is successful, show a success message or redirect the user
                alert("Registration Successful. Go to the Login-page And Login.");
                // Optionally, redirect the user to the login page
                window.location.href = "student-login.html";
            } else {
                // If form submission fails, display an error message
                throw new Error("Registration failed. Please try again later.");
            }
        })
        .catch(error => {
            // Handle errors, such as network issues or server errors
            alert(error.message);
        });
    }
});
