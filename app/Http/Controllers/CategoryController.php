<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Вывод менеджера категорий в админке
    public function showCategoriesManager() {
        $allCategories = Category::paginate(8);
        return view('admin.categories', ['cats' => $allCategories]);
    }

    // Вывод формы создания категории
    public function showCreateCategory() {
        return view('admin.categories_create');
    }

    // Создание 
    public function createCategory(CategoryRequest $request) {
        $newCategory = new Category;
        $newCategory->title = $request['title']; 
        $newCategory->save();

        $status = ($newCategory->save()) ? 'Категория успешно создана.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        return redirect()->route('categoriesManager');
    }

    // Удаление категории
    public function deleteCategory(Request $request, $id) {
        $category = Category::find($id);

        $status = ($category->delete()) ? 'Категория успешно удалена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        return back();
    }

    // Вывод формы обновления категории
    public function showUpdateCategory($id) {
        $category = Category::find($id);
        return view('admin.categories_update', ['category' => $category]);
    }

    // Обновление
    public function updateCategory(CategoryRequest $request) {
        $category = Category::find($request['catId']);
        $category->title = $request['title'];

        $status = ($category->save()) ? 'Категория успешно обновлена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        return redirect()->route('categoriesManager');
    }
}
