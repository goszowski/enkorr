<?php 
namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Runsite\Gallery\Tag;

class TagsController extends Controller {

    public function search()
    {
        $results = [];

        $term = \Input::get('q')['term'];

        $tags = Tag::where('name', 'like', '%'.$term.'%')->take(50)->orderBy('id', 'desc')->get();

        foreach($tags as $tag)
        {
            $results[] = [
              'id' => $tag->id,
              'text' => $tag->name,
            ];
        }
        
        return response()->json([
          'results' => $results,
        ]);
    }
}