<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Models\MyFavoriteSubject;


class TopicController extends Controller
{
    public function index()
    {
        // Kontrollige, kas andmed on vahemälus olemas
        if (Cache::has('topics')) {
            $topics = Cache::get('topics');
        } else {
            $topics = [];
        }

        // Veenduge, et $topics oleks massiiv
        if (!is_array($topics)) {
            $topics = [];
        }

        // Taasta üleslaaditud faili teekond ja nimi
        foreach ($topics as &$topic) {
            if (!empty($topic['image_path'])) {
                $imagePath = Storage::url($topic['image_path']);
                $topic['image_url'] = asset($imagePath);
            }
        }

        return view('topics', compact('topics'));
    }

    public function create()
    {
        return view('anket');
    }

    public function store(Request $request)
    {
        $topic = [
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $request->file('image')->store('public/images'),
            'topic1' => $request->topic1,
            'topic2' => $request->topic2,
        ];

        // Salvestage andmed vahemälusse 5 minutiks
        Cache::put('topics', [$topic], 5);

        return redirect()->route('topics.index');
    }

    public function outputTopics($limit = null)
{
    $topics = MyFavoriteSubject::all();

    if ($limit !== null) {
        $topics = $topics->take($limit);
    }

    return response()->json($topics);
}

}
