<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
	public function index()
	{
		return view('admin/article/index')->withArticles(Article::all());
	}

	public function create()
	{
		return view('admin/article/create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|unique:articles|max:255',
			'body' => 'required',
		]);

		$article = new Article;
		$article->title = $request->get('title');
		$article->body = $request->get('body');
		$article->user_id = $request->user()->id;

		if ($article->save()) {
			return redirect('admin/article');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}

	public function edit($id)
	{
		return view('admin/article/edit')->withArticle(Article::find($id));
	}

	public function update(Request $request, $id)
	{
//		$this->validate($request, [
//			'title' => 'required|unique:articles|max:255',
//			'body' => 'required',
//			'id' => 'required',
//		]);

		$article = Article::find($id);
		if(!is_object($article))
		{
			return redirect()->back()->withInput()->withErrors('找不到该文章');
		}

		$article->title = $request->get('title');
		$article->body = $request->get('body');
		$article->user_id = $request->user()->id;

		if ($article->save()) {
			return redirect('admin/article');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}

	public function destroy($id)
	{
		Article::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功！');
	}
}
