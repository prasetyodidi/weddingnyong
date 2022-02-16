<?php

namespace App\Http\Controllers\API;

use App\Models\Design;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DesignController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumb' => ['required', 'mimes:jpg,png,jpeg'],
            'code_design' => ['required', 'mimes:html,php'],
            'demo_design' => ['required', 'mimes:html,php'],
        ]);

        $data = [
            'slug' => $this->checkSlug($request->name),
            'name' => $request->name,
            // 'code_design' => $request->code_design,
            // 'demo_design' => $request->demo_design
        ];
        // $data['code_design'] = $request->file('code_design')->store($data['slug'], ['disk' => 'resources_views']);
        // $data['demo_design'] = $request->file('demo_design')->store($data['slug'], ['disk' => 'resources_views']);
        $data['code_design'] = $request->file('code_design')->storeAs('designs/' . $data['slug'], 'code_design.blade.php', ['disk' => 'resources_views']);
        $data['demo_design'] = $request->file('demo_design')->storeAs('designs/' . $data['slug'], 'demo_design.blade.php', ['disk' => 'resources_views']);
        $data['thumb'] = $request->file('thumb')->storeAs('img/invitation/design/thumb', $data['slug'] . '.jpg', ['disk' => 'directly_to_public']);

        Design::create($data);

        return response()->json([
            'message' => 'success',
            'design' => $data
        ], 200);
    }

    public function getDesignBySlug(Request $request)
    {
        $design = Design::where('slug', $request->slug)->get();

        return response()->json([
            'message' => 'success',
            'design' => $design
        ], 200);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $design = Design::where('slug', $slug);

        $design->update([
            'name' => $request->name
        ]);

        $design = Design::where('slug', $slug)->get();

        return response()->json([
            'message' => 'success',
            'design' => $design
        ], 200);
    }

    private function checkSlug($name)
    {
        $slug = SlugService::createSlug(Design::class, 'slug', $name);
        return $slug;
    }
}
