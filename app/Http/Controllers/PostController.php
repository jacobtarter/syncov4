<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid = null)
    {
    
        if(!is_null($pid))
        {
            $WHERE= "
                SELECT p.pid, p.title, p.ptext, p.uid, p.created_at, c.cid, c.c_pid, c.ctext, c.uid, c.created_at, v.vid, v.votescore, v.v_pid, v.uid, v.created_at
                FROM posts p 
                LEFT JOIN comments c ON p.pid = c.c_pid
                LEFT JOIN votes v ON p.pid = v.v_pid
                WHERE p.pid = '$pid';
            ";
        }
        else 
        {
            $WHERE= "
            SELECT p.pid, p.title, p.ptext, p.uid, p.created_at, c.cid, c.c_pid, c.ctext, c.uid, c.created_at, v.vid, v.votescore, v.v_pid, v.uid, v.created_at
            FROM posts p 
            LEFT JOIN comments c ON p.pid = c.c_pid
            LEFT JOIN votes v ON p.pid = v.v_pid;
            ";  
        }   

        $DATA = (array)DB::select( "$WHERE" );
        
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	// validate data
        $this->validate($request, array(
                'title' => 'required|max:249',
                'ptext' => 'required'
            ));
        // store in database
        $post = new Post;
        $post->title = $request->title;
        $post->ptext = $request->ptext;
        $post->save();
        return redirect('/');	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
    	$post = Post::find($request->input('pid'));
    	$post->delete();
    	return "Post record successfully deleted, PID: " . $request->input('pid');
    }
}
