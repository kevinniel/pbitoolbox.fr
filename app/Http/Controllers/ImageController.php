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
    public function show(Workspace $workspace): View
    {
        return view('image.show', [
            'workspace' => $workspace,
            'images' => $workspace->images,
        ]);
    }

    public function store(Workspace $workspace, ImageRequest $request): RedirectResponse
    {
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');

        if ($image != null || !$image->getError()) {
            Image::create([
                'url' => $image->store('workspace/' . $workspace->id . '/images', 'public'),
                'name' => $request->get('name'),
                'user_id' => auth()->id(),
                'workspace_id' => $workspace->id,
            ]);
        }

        return redirect()->route('image.show', $workspace);
    }

    public function destroy(Image $image): RedirectResponse
    {
        $image->delete();

        return redirect()->route('image.show', $image->workspace);
    }
}
