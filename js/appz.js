import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-app.js";
import {
  getAuth,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  onAuthStateChanged,
  signOut,
}
  from "https://www.gstatic.com/firebasejs/9.8.4/firebase-auth.js";
// import {
//   getFirestore,
//   doc,
//   set,
//   onValue,
// }
// from "https://www.gstatic.com/firebasejs/9.8.4/firebase-firestore.js";
import {
  getDatabase,
  ref,
  set,
  onValue,
}
  from "https://www.gstatic.com/firebasejs/9.8.4/firebase-database.js";

const firebaseConfig = {
  apiKey: "AIzaSyByETFyOsnwn4O-4-qyqotVi33YG5bg0Wc",
  authDomain: "alongish-a04cb.firebaseapp.com",
  databaseURL: "https://alongish-a04cb-default-rtdb.firebaseio.com",
  projectId: "alongish-a04cb",
  storageBucket: "alongish-a04cb.appspot.com",
  messagingSenderId: "297989241072",
  appId: "1:297989241072:web:711829ef65130b07702a35"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

let sumbitBtn = document.getElementById("btn");

sumbitBtn.addEventListener("click", register);
function register(e) {
  e.preventDefault();

  var profileView = document.getElementById('profile-view');
  var registerUser = document.getElementById('registerUser');
  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var email = document.getElementById('email').value;
  var pwd1 = document.getElementById('pwd1').value;
  var address = document.getElementById('address').value;
  var number = document.getElementById('number').value;

  // firebase register auth
  const auth = getAuth();
  createUserWithEmailAndPassword(auth, email, pwd1).then(function () {
    var user = auth.currentUser;
    var user_data = {
      email: email,
      fname: fname,
      lname: lname,
      number: number,
      address: address,
      last_login: Date.now()
    };
    console.log(user_data);

    // // data to firestore
    // const firestore = getFirestore ();
    // firestore.settings({timestampsInShapshots : true});

    //   save data to firebase
    const db = getDatabase();
    set(ref(db, "users/" + user.uid), user_data);

    alert("Account created Successfully, Kindly proceed to login");
    registerUser.reset();
  })
    .catch((err) => {
      alert(err.message);
      //   console.log(err.message);
      //   console.log(err.code);
    });

}

let loginBtn = document.getElementById("btn2");

loginBtn.addEventListener("click", signIn);
function signIn(e) {
  e.preventDefault();

  let email = document.getElementById("email1").value;
  var pwd = document.getElementById("pwd").value;


  const auth = getAuth();
  signInWithEmailAndPassword(auth, email, pwd)
    .then((res) => {
      console.log(res.user);
      redirect();
    })
    // .then(function () {
    //   var user = auth.currentUser;

    //   const db = getDatabase();
    //   const addressRef = ref(db, "users/" + user.uid + "/address");
    //   onValue(addressRef, (snapshot) => {
    //     const customerAddress = snapshot.val();
    //     console.log(customerAddress);
    //     localStorage.setItem("Address", customerAddress);
    //   });

    //   const numberRef = ref(db, "users/" + user.uid + "/number");
    //   onValue(numberRef, (snapshot) => {
    //     const customerNumber = snapshot.val();
    //     console.log(customerNumber);
    //     localStorage.setItem("Number", customerNumber);
    //       });

    //   const fnameRef = ref(db, "users/" + user.uid + "/fname");
    //   onValue(fnameRef, (snapshot) => {
    //     const customerfName = snapshot.val();
    //     console.log(customerfName);
    //     localStorage.setItem("Fname", customerfName);
    //   });

    //   const lnameRef = ref(db, "users/" + user.uid + "/lname");
    //   onValue(lnameRef, (snapshot) => {
    //     const customerlName = snapshot.val();
    //     console.log(customerlName);
    //     localStorage.setItem("lname", customerlName);
    //   });
    //   localStorage.setItem("isLoggedIn", "true");
    // })
    .catch(function (err) {
      alert(err.code);
    }); 
  // redirect();
}

function redirect() {
  window.location.href = "http://development.alongish.com/user-profile.html";
}


// const auth = getAuth();
// onAuthStateChanged(auth, (user) => {
//   if(user){
//     const {email} = user;
//     store.dispatch(logUser(email));
//   }else{
    
//   }
// });

// logout function 
const logout = document.getElementById("signOut");

logout.addEventListener("click", logout);
function signIn(e) {
  e.preventDefault();

signOut(auth)
    .then(() => {
        console.log('logged out');
        navigate('/');
    })
    .catch((error) => {
        console.log(error);
    });
}