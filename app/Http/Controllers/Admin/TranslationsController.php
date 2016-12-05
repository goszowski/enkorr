<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Runsite\Languages;
use App\Runsite\Translation;

class TranslationsController extends Controller {

    protected $storeRules = [
      'key'    => 'required|unique:translations',
    ];

    protected $updateRules = [
      'key'    => 'required|exists:translations',
    ];

    protected $removeRules = [
      'id'        => 'required|integer|exists:languages,id',
    ];

    public function index()
    {
        $translations = Translation::groupBy('key')->paginate();
        return view('admin.translations.index', compact('translations'));
    }

    public function create()
    {
        $languages = Languages::where('is_active', true)->get();
        return view('admin.translations.create', compact('languages'));
    }

    public function edit($key)
    {
        $translations = Translation::where('key', $key)->get();
        $languages = Languages::where('is_active', true)->get();
        return view('admin.translations.edit', compact('translations', 'languages'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);

        foreach($request->input('lang') as $language_id=>$value)
        {
          Translation::create([
            'key' => $request->input('key'),
            'language_id' => $language_id,
            '_value' => $value,
          ]);
        }

        return redirect(url('panel-admin/translations'));
    }

    public function update(Request $request)
    {
        $this->validate($request, $this->updateRules);
        Translation::where('key', $request->input('key'))->delete();

        foreach($request->input('lang') as $language_id=>$value)
        {
          Translation::create([
            'key' => $request->input('key'),
            'language_id' => $language_id,
            '_value' => $value,
          ]);
        }

        return redirect(url('panel-admin/translations'));
    }

    public function destroy($key)
    {
        Translation::where('key', $key)->delete();
        return redirect(url('panel-admin/translations'));
    }



}
