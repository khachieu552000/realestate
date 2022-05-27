<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

// trait
use App\Http\Controllers\Web\Admin\UploadFileTrait;

class NewsController extends Controller
{
    use UploadFileTrait;
    public function index()
    {
        $news = News::orderBy('id', 'asc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function showAddNews()
    {
        return view('admin.news.add');
    }

    public function addNews(NewsRequest $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $image = $news;
        $path = "images/news/";
        $this->upload($image, $request, $path);
        $news->save();
        return redirect()->back()->with('message', 'Đã thêm mới tin tức');
    }

    public function showUpdateNews($id_news)
    {
        $news = News::find($id_news);
        return view('admin.news.update', compact('news'));
    }

    public function updateNews(Request $request, $id_news)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'content.required' => 'Nội dung không được để trống',
        ]);
        $news = News::find($id_news);
        $news->title = $request->title;
        $news->content = $request->content;
        $image = $news;
        $path = "images/news/";
        $this->upload($image, $request, $path);
        $news->save();
        return redirect()->back()->with('message', 'Tin tức đã được cập nhật');
    }

    public function delete($id_news)
    {
        $news = News::find($id_news);
        $destinationPath = $news->image;
        if (file_exists($destinationPath)) {
            unlink($destinationPath);
        }
        $news->delete();
        return redirect()->back()->with('message', 'Tin tức đã được xoá');
    }
}
