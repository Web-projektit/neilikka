const myFunction = () => {
    var x = document.querySelector("nav")
    x.classList.toggle("responsive")
    }

  var currentPath = location.pathname.split("/").pop();
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



