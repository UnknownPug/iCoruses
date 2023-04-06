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

    if (email.value !== "" && name.value !== "" && pass.value !== "" && date.value !== "") {
      if (email.value.match(emailRegex)) {
        if (name.value.match(nameRegex)) {
          if (name.value.length >= minNameLen) {
            if (name.value.length <= maxNameLen) {
              if (pass.value.length > minPassLen) {
                if (date.value.toString() > minDate) {
                  if (date.value.toString() < maxDate) {
                    alert("Everything is Set! Your account has been created!");
                  } else {
                    alert("The date must be less than " + date.value + " (max " + maxDate +")!");
                  }
                } else {
                  alert("The date must be greater than " + date.value + " (min " + minDate +")!");
                }
              } else {
                alert("Password length must be bigger than " + minPassLen + " characters!");
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
  
  function init() {
    const email = document.getElementById("email");
    const name = document.getElementById("username");
    const pass = document.getElementById("psd");
    const date = document.getElementById("dob");
    const formEl = document.querySelector('#form-r');
    if (
      name.value.length >= minNameLen &&
      name.value.length <= maxNameLen && pass.value.length > minPassLen &&
      date.value.toString() > minDate && date.value.toString() < maxDate
      ) {
        email.addEventListener("keyup", registrationValidation);
        name.addEventListener("keyup", registrationValidation);
        pass.addEventListener("keyup", registrationValidation);
        date.addEventListener("keyup", registrationValidation);
      }
      formEl.addEventListener('submit', registrationValidation);
    }  

