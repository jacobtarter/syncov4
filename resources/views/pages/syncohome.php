<!DOCTYPE html>
<html lang="en-US" ng-app="synco">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Load Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<title>Synco Message Board</title>
</head>
<body>

<div ng-controller="ViewPostController">

<p style="font-size: 24px"><b>Synco!</b></p>


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
		    	<button class="btn btn-default btn-xs btn-view" ng-click="viewPost(x.about.id)">View/Comment</button>
		    	<button class="btn btn-default btn-xs btn-edit" >Edit</button>
		    	<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(x.about.id)">Delete</button>
		    	<button class="btn btn-danger btn-xs btn-show" ng-click="viewPost(x.about.id)">Delete</button>
		    </td>
		    
		    
		</tr>
	</tbody>
</table>	


</div>
<!-- Javascript libraries -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity=
"sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- AngularJS Scripts -->
<script src="<?= asset('angularjs/app.js') ?>"></script>
<script src="<?= asset('angularjs/controllers/ViewPostController.js') ?>"></script>
</body>
</html>


