importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyDqVmJAewbTY4N2G0ajHqhdz8bzyNhvSIo",
    projectId: "kabbani-315209",
    messagingSenderId: "904126821488",
    appId: "1:904126821488:web:6be3b475558469e11cb0b5"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});