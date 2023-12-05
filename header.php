 <!DOCTYPE html>
 <html>

 <head>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <title>Example</title>
     <style>
         nav {
             background-color: yellow;
             height: 60px;
         }

         ul {
             display: flex;

         }

         li {
             list-style-type: none;
             margin-right: 30px;
             text-decoration: none;
             font-size: 40px;
             cursor: pointer;
         }

         a {
             text-decoration: none;
         }

         li.active {
             color: green;
         }


         #Iframe {
             width: 100%;
             height: 700px;
             border: none;
         }
     </style>
 </head>

 <body>


     <nav>
         <ul>
             <li data-page='home' class="active">Home</li>
             <li data-page='about'>About</li>
             <li data-page='Registration'>Registration</li>
             <li data-page='login'>Login</li>
         </ul>
     </nav>
     <iframe id="Iframe" src="home.php"></iframe>
 </body>
 <script>
     $(document).ready(function() {
         const item=$('nav ul li');
         item.click(function() {
            item.removeClass('active');
             $(this).addClass('active');
          const page =  $(this).attr('data-page');
             $('#Iframe').attr('src', page+'.php'); 
         });
     })
 </script>
 </html>