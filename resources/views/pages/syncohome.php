<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body>

<div ng-app="synco" ng-controller="angPostController">

<p style="font-size: 24px"><b>Synco!</b></p>

<!test comment, testing github>

<!{{ Auth::check() ? "Logged In" : "Logged Out" }}>


<table border='1'>
	<tr>
		<td>Title</td>
		<td>Post Text</td>
		<td>Comments</td>
		<td>Upvotes</td>
		<td>Downvotes</td>
		<td>Score</td>
	</tr>
	<tr ng-repeat="x in posts | limitTo:howMany">
	    <td>{{ x.about.title }}</td>
	    <td>{{ x.about.ptext }}
	    <td>{{ x.about.num_comments }}
	    <td>{{ x.about.upvotes }}</td>
	    <td>{{ x.about.downvotes }}</td>
	    <td>{{ x.about.post_score }}</td>
	</tr>
</table		
</table

</div>

<!-- AngularJS Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/angPostController.js') ?>"></script>

</head>
</body>
</html>


