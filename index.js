// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var app_firebase = {};
var firebaseConfig = {
    apiKey: "AIzaSyCvQHkBkKRgSXVDDR6wzXRttOcGuF3R6Gk",
    authDomain: "makanikapp-f4e0f.firebaseapp.com",
    databaseURL: "https://makanikapp-f4e0f-default-rtdb.firebaseio.com",
    projectId: "makanikapp-f4e0f",
    storageBucket: "makanikapp-f4e0f.appspot.com",
    messagingSenderId: "380296935879",
    appId: "1:380296935879:web:d6e9e6bf83b1ffc6ddc1e2",
    measurementId: "G-F1YDPZXVHG"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

firebase.analytics();

firebase.auth().onAuthStateChanged((user) => {
    if (user) {

        var uid = user.uid;
        window.location="index.php"
    } else {
        window.location="log_in.php"
    }
});

function logIn() {
    var userEmail = document.getElementById('email').value;
    var userPassword = document.getElementById('password').value;

    firebase.auth().signInWithEmailAndPassword(userEmail, userPassword)
        .then((userCredential) => {
            // Signed in
            var user = userCredential.user;

        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            window.alert("Error: " +errorMessage);
        });


}

function signUp() {

}