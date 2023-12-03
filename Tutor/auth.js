// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyD_dmjpAvdUAwGpYSbyMlMRj66cr1xWyuk",
    authDomain: "c2education-8fb43.firebaseapp.com",
    projectId: "c2education-8fb43",
    storageBucket: "c2education-8fb43.appspot.com",
    messagingSenderId: "143917690141",
    appId: "1:143917690141:web:a9ff88897f1a46dd6285f4",
    measurementId: "G-346KSB76FF"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  // Initialize variables
  const auth = firebase.auth()
  //_________________________________________________________________
  
  //MUST HAVE (EVENT) AND (EVENT.PREVENTDEFAULT) IN ORDER TO WORK
  // Set up our register function
  function register (event) {
    event.preventDefault()
    // Get all our input fields
    email = document.getElementById('email').value
    password = document.getElementById('password').value
    name = document.getElementById('name').value
  
    let validationMessages = '';
  
    if (!validate_email(email)) {
        validationMessages += 'Email is invalid\n';
    }
  
    if (!validate_password(password)) {
        validationMessages += 'Password must be at least 6 characters long\n';
    }
  
    if (validationMessages !== "") {
        // At least one validation failed, show the combined alert message
        alert(validationMessages);
        return;
    }
  
    // Move on with Auth
    auth.createUserWithEmailAndPassword(email, password)
    .then(function() {
      // Declare user variable
      var user = auth.currentUser
         alert('User Created!!')
       })
       .catch(function(error) {
         // Firebase will use this to alert of its errors
         var error_code = error.code
         var error_message = error.message
     
         alert(error_message)
       })
     }
  
     function validate_email(email) {
        expression = /^[^@]+@\w+(\.\w+)+\w$/
        if (expression.test(email) == true) {
          return true
        } else {
          return false
        }
      }
      
      function validate_password(password) {
        if (password < 6) {
          return false
        } else {
          return true
        }
      }