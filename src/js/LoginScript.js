const minPassLen = 8;

function loginValidation() {
    /**
     *
     * @param email connecting our email field with js validation.
     * @param pass connecting our pass field with js validation.
     * Returning alert with a text, which is depending on user input.
     * @return alert
     */
    const email = document.getElementById("login");
    const pass = document.getElementById("pass");
  
    let emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;

    if (email.value !== "" && pass.value !== "") {
      if (email.value.match(emailRegex) && pass.value.length > minPassLen) {
        alert("Welcome " + email.value + "!");
      } else {
        alert("Email or password is incorrect. Try again");
      }
    } else {
      alert("All fields are need to be completed!");
    }
  }
  
  function init() {
    /**
     * @param formEl - connected to the form id.
     * Sending confirmation after users clicking "Log In" button.
     * Sending user to Menu.php or staying on LogIn.php for refilling data.
     */
    const formEl = document.querySelector("#form1");
    const email = document.getElementById("login");
    const pass = document.getElementById("pass");
  
    // check if both fields have values before adding event listeners
    if (email.value !== "" && pass.value.length > minPassLen) {
      email.addEventListener("keyup", loginValidation);
      pass.addEventListener("keyup", loginValidation);
    }

    // add event listener for submit on form
    formEl.addEventListener("submit", loginValidation); // call loginValidation function
  }
  