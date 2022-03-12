<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::all();
        return view('admin.News.manage_news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.News.add_news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new news();
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('news_image', $imagename);
        $writer_i = $request->writer_image;
        $writer_iname = time() . 'w.' . $writer_i->getClientOriginalExtension();
        $request->writer_image->move('writer_image', $writer_iname);
        $news->image = $imagename;
        $news->writer_image = $writer_iname;
        $news->topic = $request->topic;
        $news->writer = $request->writer;
        $news->Description = $request->Description;
        $news->save();
        return redirect()->back()->with('message', 'News Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = news::find($id);
        return view('admin.News.update_news', compact('news'));
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
        $news = news::find($id);
        $image = $request->image;
        $writer_image = $request->writer_image;
        if ($image) {
            unlink('news_image/' . $news->image);
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('news_image', $imagename);
            $news->image = $imagename;
        }
        if ($writer_image) {

            unlink('writer_image/' . $news->writer_image);
            $writerimagename = time() . 'w.' . $writer_image->getClientOriginalExtension();
            $request->writer_image->move('writer_image', $writerimagename);
        }
        $news->topic = $request->topic;
        $news->writer = $request->writer;
        $news->Description = $request->Description;
        $news->save();
        return redirect()->route('news.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = news::find($id);
        unlink('news_image/' . $news->image);
        unlink('writer_image/' . $news->writer_image);
        $news->delete();
        return redirect()->back();
    }
}
