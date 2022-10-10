<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post; // importo il model post per poterlo usare in questo file.
use Illuminate\Support\Str; // importo questa classe per poterla usare nella creazione dello <slug>.

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ritorno tutti i post nella pagina amministrativa nella view index degli admin (di ha effettuato l'accesso)
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'content' => 'required|max:65535'
            ]
        );
        $data = $request->all();

        // inizio parte slug.
        // per evitare problemi di nomenclatura con lo slug, serve implementare quanto scritto sotto.
        $slug = Str::slug($data['title'], '-'); // creo lo slug
        $checkOtherSlugs = Post::where('slug', $slug)->first(); // ritorno il primo slug che abbia come valore $slug
        $counter = 1; // imposto un contatore
        while ($checkOtherSlugs) { // se esiste già lo slug, entro nel ciclo per crearne uno nuovo dinamicamente, aggiungendo un numero a fine slug.
            $slug = Str::slug($data['title'] . '-' . $counter, '-');
            $counter++;
            $checkOtherSlugs = Post::where('slug', $slug)->first();
            // per uscire dal ciclo, cerco nel database se esiste già uno slug con il nome appena creato:
            // se esiste, torno nel ciclo e ne creo uno nuovo, altrimenti esco dal ciclo (perché il nuovo $checkOtherSlugs non viene trovato).
        }
        $data['slug'] = $slug; // aggiungo il campo la proprietà <slug> a $data e le assegno lo $slug
        // fine parte slug.

        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) // utilizzo la dependency injection al posto di: <public function show($id)> + metodo <::find()>.
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
