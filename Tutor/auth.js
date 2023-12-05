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
//const auth = firebase.auth()
//_________________________________________________________________

//MUST HAVE (EVENT) AND (EVENT.PREVENTDEFAULT) IN ORDER TO WORK
// Set up our register function
//function register (event) {
//  event.preventDefault()
//  // Get all our input fields
//  email = document.getElementById('email').value
//  password = document.getElementById('password').value
//  name = document.getElementById('name').value
//
//  let validationMessages = '';
//
//  if (!validate_email(email)) {
//      validationMessages += 'Email is invalid\n';
//  }
//
//  if (!validate_password(password)) {
//      validationMessages += 'Password must be at least 6 characters long\n';
//  }
//
//  if (validationMessages !== "") {
//      // At least one validation failed, show the combined alert message
//      alert(validationMessages);
//      return;
//  }
//
//  // Move on with Auth
//  auth.createUserWithEmailAndPassword(email, password)
//  .then(function() {
//    // Declare user variable
//    var user = auth.currentUser
//       alert('User Created!!')
//     })
//     .catch(function(error) {
//       // Firebase will use this to alert of its errors
//       var error_code = error.code
//       var error_message = error.message
//
//       alert(error_message)
//     })
//   }

//function login(event) {
//    console.log('Login button clicked');
//
//    event.preventDefault();
//
//    // Get all our input fields
//    var email = document.getElementById('email').value
//    var password = document.getElementById('password').value
//
//    // Validate input fields
//    if (validate_email(email) == false || validate_password(password) == false) {
//      alert('Email or Password is Outta Line!!')
//      return;
//      // Don't continue running the code
//    }
//
//    // Make AJAX request to the API
//    $.ajax({
//            type: 'POST',
//            url: '/Tutor/api.php',
//            data: { email: email, password: password },
//            success: function (response) {
//                console.log('AJAX Success:', response);
//                // Handle API response
//                if (response && response.success) {
//                    // Successful login
//                    alert(response.message);
//                    // Redirect or update the page as needed
//
//                    window.location.href = 'student_registration.html';
//                } else {
//                    // Failed login
//                    console.log("this is why!!!!!!!");
//                    alert(response.message || 'Unknown error');
//                }
//            },
//            error: function (xhr, status, error) {
//            console.error('AJAX Error:', status, error);
//                alert('Error communicating with the server');
//            }
//        });
    function login(event) {
        console.log('Login button clicked');

        event.preventDefault();

        // Get all our input fields
        var email = document.getElementById('email').value
        var password = document.getElementById('password').value

        // Validate input fields
        if (validate_email(email) == false || validate_password(password) == false) {
            alert('Email or Password is Outta Line!!')
            return;
        }

        // Make AJAX request to the PHP file directly
        fetch('/Tutor/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Fetch Success:', data);

            // Handle API response
            if (data && data.success) {
                // Successful login
                alert(data.message);
                // Redirect or update the page as needed
                window.location.href = 'student_registration.html';
            } else {
                // Failed login
                alert(data.message || 'Unknown error');
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            alert('Error communicating with the server');
        });
    }







  
//    auth.signInWithEmailAndPassword(email, password)
//    .then(function() {
//      // Declare user variable
//      var user = auth.currentUser
//      alert('User Logged In!!')
//    })
//    .catch(function(error) {
//      // Firebase will use this to alert of its errors
//      var error_code = error.code
//      var error_message = error.message
//
//      alert(error_message)
//    })
//  }

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
