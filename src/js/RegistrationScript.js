const minPassLen = 8;
const minNameLen = 2;
const maxNameLen = 20;
const minDate = "1952-01-01";
const maxDate = "2023-01-01";

function registrationValidation() {
  /**
   *
   * @param email connecting our email field with js validation.
   * @param name connecting our name field with js validation.
   * @param pass connecting our pass field with js validation.
   * @param date connecting our date field with js validation.
   * Returning alert with a text, which is depending on user input.
   * @return alert
   */

  const email = document.getElementById("email");
  const name = document.getElementById("username");
  const pass = document.getElementById("psd");
  const date = document.getElementById("dob");

  let emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
  let nameRegex = /^[A-Za-z0-9]*$/;

  if (
    email.value !== "" &&
    name.value !== "" &&
    pass.value !== "" &&
    date.value !== ""
  ) {
    if (email.value.match(emailRegex)) {
      if (name.value.match(nameRegex)) {
        if (name.value.length >= minNameLen) {
          if (name.value.length <= maxNameLen) {
            if (pass.value.length > minPassLen) {
              if (date.value.toString() > minDate) {
                if (date.value.toString() < maxDate) {
                  alert("Everything is Set! Your account has been created!");
                } else {
                  alert(
                    "The date must be less than " +
                      date.value +
                      " (max " +
                      maxDate +
                      ")!"
                  );
                }
              } else {
                alert(
                  "The date must be greater than " +
                    date.value +
                    " (min " +
                    minDate +
                    ")!"
                );
              }
            } else {
              alert(
                "Password length must be bigger than " +
                  minPassLen +
                  " characters!"
              );
            }
          } else {
            alert("Username must have maximum " + maxNameLen + " characters!");
          }
        } else {
          alert("Username must have minimum " + minNameLen + " characters!");
        }
      } else {
        alert("Username can contain only characters and numbers!");
      }
    } else {
      alert("Email does not work correctly!");
    }
  } else {
    alert("All fields are need to be completed!");
  }
}
// AJAX validation
function showHint(str, type) {
  if (str.trim().length === 0) {
    if (type === "email") {
      document.getElementById("email").innerHTML = "";
      document.getElementById("email").className = "form-style";
    } else if (type === "username") {
      document.getElementById("username").innerHTML = "";
      document.getElementById("username").className = "form-style";
    }
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      // Check if the request is complete and was successful
      if (this.readyState == 4 && this.status == 200) {
        // Check if the response is empty or not a valid JSON string
        if (!this.responseText || this.responseText.trim() === "") {
          console.error("Empty or invalid JSON response");
          return;
        }
        var response = JSON.parse(this.responseText);
        var emailHintElement = document.getElementById("email");
        var usernameHintElement = document.getElementById("username");

        if (response.hint.email === "red") {
          emailHintElement.className = "hint-red";
        } else if (response.hint.email === "green") {
          emailHintElement.className = "hint-green";
        }
        if (response.hint.username === "red") {
          usernameHintElement.className = "hint-red";
        } else if (response.hint.username === "green") {
          usernameHintElement.className = "hint-green";
        }
      }
    };

    // Make sure to include both q and type parameters in the AJAX request
    xmlhttp.open(
      "GET",
      "../../php/validation/ajaxValidation.php?q=" + str + "&type=" + type,
      true
    );
    xmlhttp.send();
  }
}

function init() {
  const email = document.getElementById("email");
  const name = document.getElementById("username");
  const pass = document.getElementById("psd");
  const date = document.getElementById("dob");
  const formEl = document.querySelector("#form-r");

  if (
    name.value.length >= minNameLen &&
    name.value.length <= maxNameLen &&
    pass.value.length > minPassLen &&
    date.value.toString() > minDate &&
    date.value.toString() < maxDate
  ) {
    email.addEventListener("keyup", registrationValidation);
    name.addEventListener("keyup", registrationValidation);
    pass.addEventListener("keyup", registrationValidation);
    date.addEventListener("keyup", registrationValidation);
  }
  document.getElementById("email").addEventListener("input", function () {
    showHint(this.value, "email");
  });
  document.getElementById("username").addEventListener("input", function () {
    showHint(this.value, "username");
  });
  formEl.addEventListener("submit", registrationValidation);
}

// Call init function when the document is loaded
document.addEventListener("DOMContentLoaded", init);
