const projekti = "neilikka"
const myFunction = () => {
    var x = document.querySelector("nav")
    x.classList.toggle("responsive")
    }

  /* Huom. tämä on vain esimerkki, joka ei välttämättä toimi oikein */ 
  var currentPath = location.pathname.split(`${projekti}/`).pop();
  console.log("currentPath:",currentPath);
  var navLinks = document.querySelectorAll("nav a");

  navLinks.forEach(link => {
      if (link.getAttribute("href") === currentPath) {
          link.classList.add("active");
      }
  });

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'
  console.log('form validation start')
   const forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  forms.forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
        }
      form.classList.add('was-validated')
    }, false)
  })
})()



