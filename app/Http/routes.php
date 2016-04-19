<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::resource('posts', 'PostController');

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'PageController@getIndex');




	Route::get('v1/posts/destroy/', function() {
 	 return view('posts.destroy');
	});



	Route::get( 'api/v1/posts/{id?}', function() {
	$WHERE= "
	SELECT p.pid, p.title, p.ptext, p.uid, p.created_at, c.cid, c.c_pid, c.ctext, c.uid, c.created_at, v.vid, v.votescore, v.v_pid, v.uid, v.created_at
	FROM posts p 
	LEFT JOIN comments c ON p.pid = c.c_pid
	LEFT JOIN votes v ON p.pid = v.v_pid
	WHERE p.pid = :pid;
";	

	$DATA = (array)DB::select( "$WHERE", ['pid => 1']);
	
	$postsFinal = array();
	$comments = array();
	$current = null;
	$previousID = null;
	$checkedPostScore=null;
	$previousComment=null;
	$previousVote=null;	
	$commentCount=0;
	$downvotes=0;
	$upvotes=0;
	$voteScore=0;
	$commentBlock=null;
	$voteBlock=null;
	
	

	foreach($DATA as $row){
		if($row->pid != $previousID)
		{
			if( !is_null($current))
			{
				$current['num_comments'] = $commentCount;
				$current['upvotes'] = $upvotes;
				$current['downvotes'] = $downvotes;
				$current['post_score'] = ($upvotes-$downvotes);
				$currentBlock['about'] = $current;
				$currentBlock['comments'] = $commentBlock;	
				$currentBlock['votes'] = $voteBlock;
				$postsFinal[] = $currentBlock;
				$current = null;
				$votes=null;
				$voteBlock = null;
				$currentBlock = null;
				$commentBlock = null;
				$previousID = null;
				$previousComment = null;
				$previousVote = null;
				$commentCount = 0;
				$upvotes=0;
				$downvotes=0;
				$comments = array();
			}
		$currentBlock = array();
		$current = array();
		$checkedPostScore = null;
		$current['pid'] = $row->pid;
		$current['title'] = $row->title;
		$current['ptext'] = $row->ptext;
		$current['uid'] = $row->uid;
		$current['created_at'] = $row->created_at;

		$previousID = $current['pid'];

		}

		if ($row->cid!=$previousComment)
		{
			$comments['cid'] = $row->cid;
			$comments['ctext'] = $row->ctext;
			$comments['uid'] = $row->uid;
			$comments['created_at'] = $row->created_at;
			$commentBlock[] = $comments;
			$previousComment = $row->cid;
			$comments = null;
			$commentCount++;
		}

		if ($row->vid!=$previousVote)
		{
			$votes['vid'] = $row->vid;
			$votes['votescore'] = $row->votescore;
			$votes['uid'] = $row->uid;
			$votes['created_at'] = $row->created_at;
			$voteBlock[]= $votes;
			$previousVote = $row->vid;
			if($row->VoteScore == 1)
			{
				$upvotes++;
			}
			if($row->VoteScore == -1)
			{
				$downvotes++;
			}
			$votes = null;	
		}

		
	}
	if (!is_null($current))
	{
		$current['num_comments'] = $commentCount;
		$current['upvotes'] = $upvotes;
		$current['downvotes'] = $downvotes;
		$current['post_score'] = ($upvotes-$downvotes);
		$currentBlock['about']=$current;
		$currentBlock['comments']=$commentBlock;
		$currentBlock['votes']=$voteBlock;
		$postsFinal[] = $currentBlock;
	}
	
	print (json_encode($postsFinal));
	//echo json_encode($DATA);
}		
);

});
