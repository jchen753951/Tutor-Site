
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
      // Don't continue running the code
    }

    // make AJAX request to the API
    $.ajax({
            type: 'POST',
            url: '/api.php',
            data: { email: email, password: password },
            success: function (response) {
                console.log('AJAX Success:', response);
                // Handle API response
                if (response && response.success) {
                    // Successful login
                    alert(response.message);
                    // Redirect or update the page as needed

                    window.location.href = 'student_registration.html';
                } else {
                    // Failed login
                    console.log("this is why!!!!!!!");
                    alert(response.message || 'Unknown error');
                }
            },
            error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
                alert('Error communicating with the server');
            }
        });

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