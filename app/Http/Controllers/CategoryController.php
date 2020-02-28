<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategoriesManager() {
        $allCategories = Category::paginate(8);
        return view('admin.categories', ['cats' => $allCategories]);
    }

    public function showCreateCategory() {
        return view('admin.categories_create');
    }

    public function createCategory(CategoryRequest $request) {
        $newCategory = new Category;
        $newCategory->title = $request['title']; 
        $newCategory->save();

        $status = ($newCategory->save()) ? 'Категория успешно создана.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        return redirect()->route('allCategories');
    }

    public function deleteCategory(Request $request, $id) {
        $category = Category::find($id);

        $status = ($category->delete()) ? 'Категория успешно удалена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        return back();
    }

    public function showUpdateCategory($id) {
        $category = Category::find($id);
        return view('admin.categories_update', ['category' => $category]);
    }

    public function updateCategory(CategoryRequest $request) {
        $category = Category::find($request['catId']);
        $category->title = $request['title'];

        $status = ($category->save()) ? 'Категория успешно обновлена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        return redirect()->route('allCategories');
    }
}
