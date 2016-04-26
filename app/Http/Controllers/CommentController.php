<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\FacadesValidator;

use App\Http\Requests;

use App\Post;

use DB;

class CommentController extends Controller
{

	public function getCommentsByPost($pid)
    {
		$WHERE= "
	                SELECT c.cid, c.ctext, c.name, c.c_pid, c.created_at, c.updated_at
	                FROM comments c 
	                
	                WHERE c.c_pid = '$pid';
	            ";
	    $DATA = (array)DB::select( "$WHERE" );
	    echo json_encode($DATA);
	}
}