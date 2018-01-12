<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use Auth;
use App\Http\Requests\StoreIssue, App\Http\Requests\UpdateIssue;

class IssuesController extends Controller
{
    public function index()
    {
        $issues = Issue::with('user', 'comments')->orderBy('created_at', 'desc')->paginate(5);
        return view('issues.index')->with('issues', $issues);
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect('/')->with('alert', '没有执行此操作的权限，请先登录');
        }
        return view('issues.create');
    }

    public function store(StoreIssue $request)
    {
        Issue::create($request->all());
        return redirect('/')->with('notice', 'Issue 新增成功~');
    }

    public function show(Issue $issue)
    {
        $comments = $issue->comments()->with('user')->get();
        return view('issues.show', compact('issue', 'comments'));
    }

    public function edit(Issue $issue)
    {
        return view('issues.edit')->with('issue', $issue);
    }

    public function update(UpdateIssue $request, Issue $issue)
    {
        $issue->update($request->all());
        return redirect(route('issues.show', $issue))->with('notice', 'Issue 修改成功~');;
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect('/')->with('alert', 'Issue 删除成功~');
    }
}
