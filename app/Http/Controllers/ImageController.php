<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\ImageRequest;
use App\Models\Image;
use App\Models\Workspace;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function show(string $slug): View
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        return view('image.show', [
            'workspace' => $workspace,
            'images' => $workspace->images,
        ]);
    }

    public function store(string $slug, ImageRequest $request): RedirectResponse
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        /** @var UploadedFile|null $image */
        $image = $request->validated('image');

        $lastId = Image::orderBy('id', 'desc')->first() ? Image::orderBy('id', 'desc')->first()->id : 0;

        if ($image != null || !$image->getError()) {
            Image::create([
                'images_id' => 'images_' . $lastId + 1,
                'url' => $image->store('workspace/' . $workspace->id . '/images', 'public'),
                'name' => $request->get('name'),
                'user_id' => auth()->id(),
                'workspace_id' => $workspace->id,
            ]);
        }

        return redirect()->route('image.show', $workspace->slug);
    }

    public function destroy(Image $image): RedirectResponse
    {
        $image->delete();

        return redirect()->route('image.show', $image->workspace->slug);
    }
}
