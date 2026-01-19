function send(e) {
  if (e) e.preventDefault();

  var btn = document.getElementById("send_btn");
  
  btn.disabled = true;
  var originalText = btn.innerText; 
  btn.innerText = "Sending... Please wait";
  btn.classList.add("disable"); 

  var f = new FormData();
  f.append("first-name", document.getElementById("first-name").value);
  f.append("last-name", document.getElementById("last-name").value);
  f.append("email", document.getElementById("email").value);
  f.append("phone", document.getElementById("phone").value);
  f.append("subject", document.getElementById("subject").value);
  f.append("message", document.getElementById("message").value);

  // alert("Form Data: \n" + 
  //     "first-name: " + document.getElementById("first-name").value + "\n "+
  //     "last-name: " + document.getElementById("last-name").value + "\n "+
  //     "email: " + document.getElementById("email").value + "\n "+
  //     "phone: " + document.getElementById("phone").value + "\n "+
  //     "subject: " + document.getElementById("subject").value + "\n "+
  //     "message: " + document.getElementById("message").value );


  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {

      btn.disabled = false;
      btn.innerText = originalText;
      btn.classList.remove("disable");

      if (r.responseText == "Message Sent Successfully") {
        document.getElementById("first-name").value = "";
        document.getElementById("last-name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("subject").value = "";
        document.getElementById("message").value = "";
        swal("Message Sent", "We'll get Back to you Soon ", "success");
      } else {
        swal("Try Again", r.responseText, "error");
      }


      document.getElementById("send_btn").disabled = false;
      document.getElementById("send_btn").classList.remove("disable");
    }
  }
  r.open("POST", "../mail/sendEmailProcess.php", true);
  r.send(f);
  document.getElementById("send_btn").disabled = true;
  document.getElementById("send_btn").classList.add("disable");

}



const hiddenElements = document.querySelectorAll(`
  .hidden-left, .hidden-right, .hidden-up, .hidden-down,
  .hidden-fade, .hidden-zoom-in, .hidden-zoom-out
`);

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const el = entry.target;

      if (el.classList.contains('hidden-left')) el.classList.add('show-left');
      if (el.classList.contains('hidden-right')) el.classList.add('show-right');
      if (el.classList.contains('hidden-up')) el.classList.add('show-up');
      if (el.classList.contains('hidden-down')) el.classList.add('show-down');
      if (el.classList.contains('hidden-fade')) el.classList.add('show-fade');
      if (el.classList.contains('hidden-zoom-in')) el.classList.add('show-zoom-in');
      if (el.classList.contains('hidden-zoom-out')) el.classList.add('show-zoom-out');

      observer.unobserve(el); // animate once
    }
  });
}, { threshold: 0.2 });

hiddenElements.forEach(el => observer.observe(el));






