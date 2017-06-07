<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

</head>
<body>

<div class="container">
	<h1>Welcome to main!</h1>

<div id="data">
<table>
   <?php foreach ($names as $row) { ?>
   
   <tr>
      <td><?=$row->EVENT_ID?></td>
      <td><?=$row->EVENT_DATA_ID?></td>
      <td><?=$row->EVENT_URL?></td>
      <td><?=$row->URL_LIKES?></td>
    </tr>
    
    <?php } ?>
</table>
</div>

  <div id="data2">
<table>
   <?php foreach ($names1 as $row) { ?>
   
   <tr>
      <td><?=$row->EVENT_ID?></td>
      <td><?=$row->EVENT_NAME?></td>
      <td><?=$row->EVENT_DESCRIPTION?></td>
      <td><?=$row->EVENT_RULES?></td>
      <td><?=$row->EVENT_URL?></td>
      <td><?=$row->EVENT_LIKES?></td>
        <td><?=$row->EVENT_VENUE?></td>
    </tr>
    
    <?php } ?>
</table>
</div>      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<div id="images">
<table>
   <?php foreach ($names as $row) { ?>
    
   <img src="<?=$row->EVENT_URL?>" id="image" height="100" width="200">
      <script>
      
          
            window.onload = function() {
                var img = new Image(); 
            img.onload = function() { 
               change_image(); 
            } 
            img.src = "<?=$row->EVENT_URL?>";  

            function change_image() {
                document.getElementById("image").src = "<?=$row->EVENT_URL?>";
            }
            };

          
          </script>
    <?php } ?>
</table>
</div>


        
        
        
        
<br>

<p id="message"></p>
<p id="createmsg"></p>

<br> <br><br>

<h3>Create Persons</h3>

   <form>
   
   <label for='Name'> Event Id </label>
   <input type='text' name='id' id='id' size='30' /> <br>

   
      <label for='Telephone'> Event_URL </label>
   <input type='text' name='URL' id='URL' size='30' /> <br>
       
       <label for='Telephone'> URL_LIKES </label>
   <input type='text' name='likes' id='a' size='30' /> <br>
   <input type="submit" value="Create" id="create" />
   
   </form>
   
   <br><br>

   
   
   </div>
   
   
  <script>
  
  $(document).ready(function() {
	  
	  $("#create").click(function(event) {
		  event.preventDefault();
		var id = $("input#id").val();  
	    var URL = $("input#URL").val();
            var a = $("input#a").val();
          
	$.ajax({
		method: "POST",
		url: "<?php echo base_url(); ?>index.php/People/person",	
		dataType: 'JSON',
		data: {id: id, URL: URL,a: a},
		
		success: function(data) {
			console.log(id, URL,a);
			$("#data").load(location.href + " #data");
			$("input#id").val("");
			$("input#URL").val("");  
		}
	});
	  });
  });
  
  
  
  
  
  
  
  
  
     $(document).ready(function() {
		 
		var Create = Backbone.Model.extend({
			url: function () {
				var link = "<?php echo base_url(); ?>index.php/People/person?id=" + this.get("id");
				return link;
			},
			defaults: {
				id: null,
				URL: null }
		});
		
		var createModel = new Create();
		
		var DisplayView = Backbone.View.extend({
			el: ".container", 
			model: createModel,
			initialize: function () {
				this.listenTo(this.model,"sync change",this.gotdata);
			},
			
			events: {
				"click #create" : "getdata"
			},
			
			getdata: function (event) {
				var id = $('input#id').val();
				this.model.set({id: id});
				this.model.fetch();
			},
			
			gotdata: function () {
				$('#createmsg').html('Name ' + this.model.get('id')  + ' has been created').show().fadeOut(5000);
			}
		});
		
		var displayView = new DisplayView();
		
	 });
  </script>



</div>

</body>
</html>