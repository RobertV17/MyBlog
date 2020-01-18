<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategoriesManager() {
        return view('admin.categories');
    }

    public function showCreateCategory() {
        return view('admin.categories_create');
    }

    public function createCategory(Request $request) {
        $newCategory = new Category;
        $newCategory->title = $request['title']; 
        $newCategory->save();

        if($newCategory->save()) {
            echo 'All good';
        } else {
            echo 'We have big problems';
        }
    }
}
