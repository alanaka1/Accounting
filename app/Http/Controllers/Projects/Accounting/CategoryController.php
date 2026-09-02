<?php

namespace App\Http\Controllers\Project\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Accounting\CategoryRequest;
use App\Models\Project\Accounting\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

        // إذا كان middleware الصلاحيات موجوداً عندك استخدم:
        // $this->middleware(['auth', 'roles']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = auth()->user()->categories()->latest()->paginate(10);

        $categories = Category::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
         try {
            Category::create([
                'user_id'    => Auth::id(),
                'name'       => $request->name,
                'type'       => $request->type,
                'description' => $request->description,
                'is_active'  => 1,
            ]);

            return redirect(route('categories.index'))->with(['success' => 'تمت إضافة التصنيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect(route('categories.index'))->with(['error' => 'حدثت مشكلة أثناء إضافة التصنيف',]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        $category = Category::where('user_id', Auth::id())->find($category);
        if (!$category) {

            return redirect(route('categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
        }
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::where('user_id', Auth::id())->find($category);

        if (!$category) {
            return redirect(route('categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
        }
        return view('categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $category = Category::where('user_id', Auth::id())->find($category);

            if (!$category) {
                return redirect(route('categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود',]);
            }

            $category->update([
                'name'        => $request->name,
                'type'        => $request->type,
                'description' => $request->description,
            ]);

            return redirect(route('categories.index'))->with(['success' => 'تم تعديل التصنيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect(route('categories.index'))->with(['error' => 'حدثت مشكلة أثناء تعديل التصنيف']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category = Category::where('user_id', Auth::id())->find($category);

            if (!$category) {
                return redirect(route('categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
            }
            $category->delete();
            return redirect(route('categories.index'))->with(['success' => 'تم حذف التصنيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect(route('categories.index'))->with(['error' => 'حدثت مشكلة أثناء حذف التصنيف']);
        }
    }

    /**
     * تفعيل أو تعطيل التصنيف.
     */
    public function updateStatus($id)
    {
        try {
            $category = Category::where('user_id', Auth::id())
                ->find($id);

            if (!$category) {
                return redirect(route('categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
            }

            $category->update(['is_active' => !$category->is_active]);

            if ($category->is_active) {
                $message = 'تم تفعيل التصنيف بنجاح';
            } else {
                $message = 'تم تعطيل التصنيف بنجاح';
            }

            return redirect(route('categories.index'))->with(['success' => $message]);
        } catch (\Exception $ex) {
            return redirect(route('categories.index'))->with(['error' => 'حدثت مشكلة أثناء تغيير حالة التصنيف']);
        }
    }
}
