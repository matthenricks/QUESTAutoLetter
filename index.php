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
	
	function setText(id, str) {
		$("#" + id).innerHTML = str;
	};
	
	var dSelector = 1;
	function createDateSelector(container) {
		var show = $("<div type = \"dateSelector\" id=\"dS" + dSelector + "\"  class=\"label label-default\">" + CurrentMonth() + "</div>");
		var picker = $("<div class=\"dropdown\"></div>");
		picker.append("<a href=\"#\" role=\"button\" class=\"dropdown-toggle btn btn-primary btn-sm\" data-toggle=\"dropdown\">Select Date <b class=\"caret\"></b></a>");
		var list = $("<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dropdownMenu\"></ul>");
		
		list.append("<li><a tabindex=\"1\" onclick=\"setText(\"dS" + dSelector + "\", \"January\");\">January</a></li>");
		list.append("<li><a tabindex=\"1\" onclick=\"setText(\"dS" + dSelector + "\", \"February\");\">February</a></li>");
		
		picker.append(list);
		// Append the dateSelector ID's of future calls
		dSelector++;
		
		// Append the new elements to the container
		container.append(picker);
		container.append(show);
	};
	
	
	function addHeader() {
		<!-- We need the title -->
		var container = $("#pageMaker");
		
		var headerForm = $("<div class=\"myHeader\"></div>");
		headerForm.append("<textarea class=\"input-xlarge\">Input text here</textarea><br />");
		<!-- Selector and shower -->
		createDateSelector(headerForm);
		
		// Images - Only Support Mine	
		
		container.prepend(headerForm);
	};
	
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
				<h2 class="panel-title">Page Development Portion</h2>
            </div>
            <div class="panel-body">
			
				<!-- Here we need to keep something so we don't run into issues -->
				<div id="pageMaker">
			
			
				</div>
				<hr />
			
				<div class="dropdown">
				    <a href="#" role="button" class="dropdown-toggle btn btn-primary btn-lg" data-toggle="dropdown">Add Component <b class="caret"></b></a>
				  
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
						<li><a tabindex="1" onclick="addHeader();">Add Header</a></li>
						<li><a tabindex="2" onclick="unimplemented();">Add ToC and Starred Story</a></li>
						<li><a tabindex="3" onclick="unimplemented();">Footer</a></li>
						<li class="divider"></li>
						<li><a tabindex="4" onclick="unimplemented();">Left-Picture Story</a></li>
						<li><a tabindex="5" onclick="unimplemented();">Top-Picture Story</a></li>
					</ul>				
				</div>

				<hr />
			
				<p><a class="btn btn-primary btn-lg" onclick="createHTML();" role="button">Generate HTML</a></p>
            
			
			
			
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