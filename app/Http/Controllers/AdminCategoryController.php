<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Models\Category;

class AdminCategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->search_column && $request->search)
            $query->where($request->search_column, 'LIKE', "%{$request->search}%");

        if ($request->sort && $request->order) {
            if ($request->order == 'asc')
                $query->orderBy($request->sort, 'desc');
            else
                $query->orderBy($request->sort, 'asc');
        }

        $categories = $query->paginate(50)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);

        return redirect()->route('admin.categories.show', $category)->with('success', 'Categoria adicionada com sucesso.');
    }

    public function show(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        return redirect()->route('admin.categories.show', $category)->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categoria excluída com sucesso.');
    }
}
