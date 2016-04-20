<!DOCTYPE html>
<html lang="en-US" ng-app="synco">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Load Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<title>Synco Message Board</title>
</head>
<body>

<div ng-controller="SyncoHomeController">

<p style="font-size: 24px"><b>Synco!</b></p>

<!test comment, testing github>

<!{{ Auth::check() ? "Logged In" : "Logged Out" }}>


<table class="table">
	<thead>	
		<tr>
			<th></th>
			<th>Score</th>
			<th>Upvotes</th>
			<th>Downvotes</th>
			<th>Title</th>
			<th>Post Text</th>
			<th>Comments</th>
		</tr>
	</thead>
	<tbody>	
		<tr ng-repeat="x in posts | limitTo:howMany">
		    <td>
		    	<button class="btn btn-default btn-xs btn-up" >Upvote</button>
		    	<button class="btn btn-default btn-xs btn-down" >Downvote</button>
		    </td>
		    <td>{{ x.about.post_score }}</td>
		    <td>{{ x.about.upvotes }}</td>
		    <td>{{ x.about.downvotes }}</td>
		    <td>{{ x.about.title }}</td>
		    <td>{{ x.about.ptext }}
		    <td>{{ x.about.num_comments }}
		    <td>
		    	<button class="btn btn-default btn-xs btn-view" >View/Comment</button>
		    	<button class="btn btn-default btn-xs btn-edit" >Edit</button>
		    	<button class="btn btn-danger btn-xs btn-delete" ng-click="alert(x.about.pid)">Delete</button>
		    </td>
		    
		    
		</tr>
	</tbody>
</table>	


</div>
<!-- Javascript libraries -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- AngularJS Scripts -->
<script src="<?= asset('angularjs/app.js') ?>"></script>
<script src="<?= asset('angularjs/controllers/SyncoHomeController.js') ?>"></script>
</body>
</html>


