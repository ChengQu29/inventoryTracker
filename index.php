<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <title>Contact us</title>
 </head>

 <body>
  <div class="navbar">
  <a href="index.html"> Home</a>

  <div class="dropdown">
      <button class="dropbtn">Products</button>
      <div class="dropdown-content">
          <a href="currency.php">Currency Exchange</a>
          <a href="#">Service 2</a>
      </div>
  </div>

  <div class="dropdown">
      <button class="dropbtn">Contact Us</button>
      <div class="dropdown-content">
          <a href="#"><span class="flag-icon flag-icon-fr"></span> Contactez-nous</a>
          <a href="#"><span class="flag-icon flag-icon-jp"></span> お問い合わせ</a>
      </div>
  </div>
  <a href="aboutme.html"> About</a>
 </div>

 <br />
 <div id="greeting"></div>
  <div class="container">
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search: </span>
     <input type="text" id="search_text" placeholder="Search by Name" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>

<script>
  //display greeting based on time of the day
  var today = new Date();
  var hourNow = today.getHours();
  var greeting;

  if (hourNow < 06){
    greeting = "Good morning, you must be an early bird";
  }
  else if ((hourNow == 06 || hourNow > 06) && hourNow < 12 ){
    greeting = 'Good morning';
  }
  else if (hourNow >=12 && hourNow < 18){
    greeting = "Good afternoon"
  }
  else {
    greeting = "Good evening";
  }

  document.getElementById("greeting").innerHTML = greeting;

$(document).ready(function(){

 function load_data(query)
 {
  //performs an async AJAX request, show the result based on user input
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

</script>