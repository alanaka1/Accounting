<?php

namespace App\Http\Controllers\Project\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Project\Accounting\Category;
use App\Http\Requests\Project\Accounting\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

        // إذا كان middleware الصلاحيات موجوداً عندك استخدم:
        $this->middleware(['auth', 'roles']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = auth()->user()->categories()->latest()->paginate(10);

        $categories = Category::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('accounting.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Project.Accounting.Category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
         try {
            Category::create([
                'user_id'       => Auth::id(),
                'name'          => $request->name,
                'type'          => $request->type,
                'description'   => $request->description,
                'status'        => $data['status'] ?? 1,
            ]);

            return redirect(route('accounting.categories.index'))->with(['success' => 'تمت إضافة التصنيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect(route('accounting.categories.index'))->with(['error' => 'حدثت مشكلة أثناء إضافة التصنيف',]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        $category = Category::where('user_id', Auth::id())->find($category);
        if (!$category) {

            return redirect(route('Project.Accounting.Category.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
        }
        return view('Project.Accounting.Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category)
    {
        $category = Category::where('user_id', Auth::id())->find($category);

        if (!$category) {
            return redirect(route('Project.Accounting.Category.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
        }
        return view('Project.Accounting.Category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $category)
    {
        try {
            $category = Category::where('user_id', Auth::id())->find($category);

            if (!$category) {
                return redirect(route('accounting.categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود',]);
            }

            $category->update([
                'name'        => $request->name,
                'type'        => $request->type,
                'description' => $request->description,
                'status'      => $data['status'] ?? $category->status,
            ]);

            return redirect(route('accounting.categories.index'))->with(['success' => 'تم تعديل التصنيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect(route('accounting.categories.index'))->with(['error' => 'حدثت مشكلة أثناء تعديل التصنيف']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        try {
            $category = Category::where('user_id', Auth::id())->find($category);

            if (!$category) {
                return redirect(route('accounting.categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
            }
            $category->delete();
            return redirect(route('accounting.categories.index'))->with(['success' => 'تم حذف التصنيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect(route('accounting.categories.index'))->with(['error' => 'حدثت مشكلة أثناء حذف التصنيف']);
        }
    }

    /**
     * تفعيل أو تعطيل التصنيف.
     */
    public function updateStatus($id)
    {
        try {
            $category = Category::where('user_id', Auth::id())->find($id);

            if (!$category) {
                return redirect(route('accounting.categories.index'))->with(['error' => 'التصنيف المطلوب غير موجود']);
            }

            $category->update(['status' => $category->status == 1 ? 0 : 1]);

            if ($category->is_active) {
                $message = 'تم تفعيل التصنيف بنجاح';
            } else {
                $message = 'تم تعطيل التصنيف بنجاح';
            }

            return redirect(route('accounting.categories.index'))->with(['success' => $message]);
        } catch (\Exception $ex) {
            return redirect(route('accounting.categories.index'))->with(['error' => 'حدثت مشكلة أثناء تغيير حالة التصنيف']);
        }
    }

     /**
     * Display deleted categories.
     */
    public function trash()
    {
        $categories = Category::onlyTrashed()->where('user_id', Auth::id())->orderBy('deleted_at', 'DESC')->get();

        return view('Project.Accounting.Category.trash', compact('categories'));
    }
}
