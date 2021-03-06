<?php 
namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Runsite\Gallery\Image;
use App\Runsite\Gallery\Tag;
use App\Runsite\Gallery\ImageTag;
use Image as ImageMaker;

class ImagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $images = new Image;
        $tags = [];

        if($request->has('tags') and count($request->get('tags')))
        {
            $images = $images->whereHas('tags', function($q) use($request) {
                $q->whereIn('tag_id', $request->get('tags'));
            });

            $tags = Tag::whereIn('id', $request->get('tags'))->get();
        }
        
        $images = $images->orderBy('id', 'desc')->paginate(16);

        return view('admin.gallery.images.index', compact('images', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.gallery.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|dimensions:min_width=620',
        ]);

        $extension = $request->image->extension();
        $path = $request->image->storeAs('uploads', time().str_random(10).time().'.'.$extension, 'gallery');

        $image = Image::create([
            'image' => $path,
            'source' => $request->input('source'),
        ]);

        if(count($request->tags))
        {
            foreach($request->tags as $tagName)
            {
                $tag = Tag::where('name', $tagName)->first();
                if(!$tag)
                {
                    $tag = Tag::create([
                        'name' => $tagName,
                    ]);
                }

                ImageTag::create([
                    'image_id' => $image->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }

        return redirect(route('admin.gallery.images.crop-form', $image->id) . '?fieldname=' . request('fieldname'));
    }

  
    public function cropForm($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.gallery.images.crop', compact('image'));
    }

    public function crop($id)
    {
        $image = Image::findOrFail($id);

        $imageFile = ImageMaker::make(public_path('gallery/'.$image->image));

        $imageFile->crop((int) request('width'), (int) request('height'), (int) request('x'), (int) request('y'));
        $imageFile->resize(620, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imageFile->save(public_path('gallery/'.$image->image));

        return redirect(route('admin.gallery.images.index') . '?fieldname=' . request('fieldname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filepath = public_path('gallery/' . $image->image);

        $image->delete();

        if(file_exists($filepath))
        {
            unlink($filepath);
        }

        return redirect()->back();
    }

}
