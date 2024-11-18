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

        if(!$workspace->can_access_image && !auth()->user()->is_admin) {
            abort(404);
        }

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
                'url' => $image->store('workspace/' . $workspace->slug . '/images', 'public'),
                'name' => $request->get('name'),
                'user_id' => auth()->id(),
                'workspace_id' => $workspace->id,
            ]);
        }

        return redirect()->back()->with('success', 'L\'image a bien été ajoutée.');
    }

    public function destroy(Image $image): RedirectResponse
    {
        $filePath = storage_path('app/public/' . $image->url);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $image->delete();

        return redirect()->back()->with('success', 'L\'image a bien été supprimée.');
    }
}
