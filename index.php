<html lang="en">
<head>
	<title>QUEST Newspaper Autogen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries are not include (SORRY) -->

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>	

	
	
	<!-- Add Internal Functions -->
    <script src="AuxillaryFunctions.js"></script>
	
	
	
	<!-- This section is dedicated to adding the javascript dynamically -->
	<script>
	
	function createDateSelector(container) {
		
		var picker = $('<div class="dropdown"></div>');
		picker.append('<a href="#" role="button" class="dropdown-toggle btn btn-primary btn-sm" data-toggle="dropdown"><span read="month">' + CurrentMonth() + ' </span><b class="caret"></b></a>');
		
		var list = $('<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu"></ul>');
		picker.append(list);

		// Add each month
		// Month is defined in the AuxillaryFunctions file
		$.each(month, function( index, value ) {
			var dateSelect = $('<li><a tabindex="1">' + value + '</a></li>');
			list.append(dateSelect);
			dateSelect.click(function(){
				picker.find('span').html(value);
			});			
		});		
		// Append the new elements to the container
		container.append(picker);
	};
	
	
	function addHeader() {
		<!-- We need the title -->
		var container = $("#pageMaker");
		
		var headerForm = $('<div type="header" border="1"></div>');
		headerForm.append("<h2>Header</h2>");
		headerForm.append(makeTextbox("Newsletter Title", "title"));
		<!-- Selector and shower -->
		createDateSelector(headerForm);
		// Images - Only Support Mine
		
		container.append(headerForm);
		container.append("<hr />");
	};
	
	function addLeftStory() {
		// Create an input with a preview function ;)
		var container = $("#pageMaker");
		
		var headerForm = $('<div type="left-picture" border="1"></div>');
		headerForm.append("<h2>Left-Picture Article</h2>");
		
		headerForm.append(makeTextbox("Article Title", "title"));
		headerForm.append(makeTextbox("Article Author", "author"));

		<!-- Image Section -->
		var imageBox = $('<img src="" class="col-lg-4" />');
		headerForm.append($('<center></center>').append(imageBox));
		var urlInsert = makeTextbox("Insert Picture URL", "url");
		headerForm.append(urlInsert);
		urlInsert.change(function() {
			imageBox.attr('src', $(this).text());
			alert('THIS IS NOT FINISHED DUE TO AN INABILITY TO GET TEXT');
		});

		<!-- Article Text -->
		headerForm.append('<br />');
		headerForm.append('<textarea read="content" class="span6" rows="3" placeholder="Insert Article Text Here"></textarea>');		
		
		container.append(headerForm);
		container.append("<hr />");
	}
	
	</script>
	
	
	<!-- This section is dedicated to adding functionality to buttons -->
	<script>
	
	function createHTML() {
		
		/* Begin the loading bar */

		/* Get some values from elements on the page: */
		var values = {
			page: "basic page placement"
		};
	
		/* Send the data using post and put the results in a div */
		$.ajax({
			url: "pageWriter.php",
			type: "post",
			data: {
				page: values
			},
			success: function(data){
				alert(data);
			},
			error:function(){
				alert("failure");
			}
		});
	};
	
	</script>
	
	
	
	
</head>

<body>

	<div class="jumbotron">
      <div class="container">
        <h1>QUEST Newsletter Autogen</h1>
        <p>This is a webpage designed to support the development of newsletters and other QUEST documents.</p>
      </div>
    </div>
	
	<!-- Left column -->
	<div class="col-md-6">
	<div class="panel panel-primary">
            <div class="panel-heading">
				<h2 class="panel-title">Page Development Portion (Footer is automatic)</h2>
            </div>
            <div class="panel-body">
			
				<!-- Here we need to keep something so we don't run into issues -->
				<div id="pageMaker">
				
				<!-- Header -->
				<div type="header">
				<h2>Header</h2><input read="title" class="form-control" type="textbox" placeholder="Newsletter Title"><div class="dropdown"><a href="#" role="button" class="dropdown-toggle btn btn-primary btn-sm" data-toggle="dropdown"><span read="month">January </span><b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu"><li><a tabindex="1">January</a></li><li><a tabindex="1">February</a></li><li><a tabindex="1">March</a></li><li><a tabindex="1">April</a></li><li><a tabindex="1">May</a></li><li><a tabindex="1">June</a></li><li><a tabindex="1">July</a></li><li><a tabindex="1">August</a></li><li><a tabindex="1">September</a></li><li><a tabindex="1">October</a></li><li><a tabindex="1">November</a></li><li><a tabindex="1">December</a></li></ul></div>
				</div>
				<hr />
				
				</div>
				
				<hr style="height:1px;border:none;color:#333;background-color:#333;" />
			
				<center>
			
				<span align="left" class="dropdown col-md-3">
				    <a href="#" role="button" class="dropdown-toggle btn btn-primary btn-lg" data-toggle="dropdown">Add Component <b class="caret"></b></a>
					
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
						<!--
						Currently, changing the header amongst other things will not be completely supported
						
						<li><a tabindex="1" onclick="addHeader();">Header</a></li>
						<li><a tabindex="2" onclick="unimplemented();">Table of Contents/Starred Story</a></li>
						<li><a tabindex="3" onclick="unimplemented();">Footer</a></li>
						<li class="divider"></li>
						-->
						<li><a tabindex="4" onclick="addLeftStory();">Left-Picture Story</a></li>
						<li><a tabindex="5" onclick="unimplemented();">Top-Picture Story</a></li>
					</ul>				
				</span>
			
				<span align="right" class="btn btn-primary btn-lg" onclick="createHTML();" role="button">Generate HTML</span>
			
				</center>
			
			</div>
          </div>
		
	</div>

	<!-- Right column -->
	<div class="col-md-6">
		
		<div class="panel panel-primary">
            <div class="panel-heading">
				<h2 class="panel-title">Page Preview</h2>
            </div>
            <div class="panel-body">
			
				This will not be implemented in V1			
			
			</div>
          </div>
		
	</div>
		
	</div>
	
</body>
</html>