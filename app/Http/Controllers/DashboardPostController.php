<?php

namespace App\Http\Controllers;



use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;




//use Illuminate\Routing\Controller;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.crud.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'heir_name' => 'required|max:255',
        'last_will' => 'required',
    ], [
        'heir_name.required' => 'Heir Name harus diisi.',
        'last_will.required' => 'Wills harus diisi.',
    ]);


    $post = new Post;
    $post->target_name = $validatedData['heir_name'];
    $post->will = $validatedData['last_will'];
    $post->user_id = auth()->id();
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Wasiat berhasil ditambahkan!');
}





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.crud.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
{
    $validatedData = $request->validate([
        'target_name' => 'required|max:255',
        'will' => 'required',
    ]);

    $post->update([
        'target_name' => $validatedData['target_name'],
        'will' => $validatedData['will'],
    ]);

    return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
{
    // Temukan satu posting dengan user_id yang cocok
    $post = post::where('user_id', $user_id)->first();

    if (!$post) {
        return redirect()->back()->with('error', 'Post tidak ditemukan.');
    }

    // Verifikasi jika user yang sedang login memiliki hak untuk menghapus posting
    if ($post->user_id !== auth()->id()) {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus ini.');
    }

    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Wasiat berhasil dihapus.');
}



}