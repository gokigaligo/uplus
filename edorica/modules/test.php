<html>

   <head>
      <title>The jQuery Example</title>
      <script src="../js/jquery-1.12.0.min.js"></script>
      <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
            $('div').bind('click', function( event ){
               alert('Hi there!');
            });
         });
      </script>
		
      <style>
         .div{ margin:10px;padding:12px; border:2px solid #666; width:60px;}
      </style>
   </head>
	
   <body>
	
      <p>Click on any square below to see the result:</p>
		
      <div class = "div" style = "background-color:blue;">ONE</div>
      <div class = "div" style = "background-color:green;">TWO</div>
      <div class = "div" style = "background-color:red;">THREE</div>
		
   </body>
	
</html>