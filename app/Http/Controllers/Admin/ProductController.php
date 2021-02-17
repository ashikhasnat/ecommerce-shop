<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isTrue;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = $product
            ->with(['category', 'brand'])
            ->latest()
            ->paginate();
        // dd($products);
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand)
    {
        $brands = $brand->all('id', 'name');
        // dd($brands);
        return view('dashboard.product.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        // dd(request()->all());
        $newProduct = $request->validate([
            'sku' => ['nullable'],
            'slug' => ['nullable'],
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'price' => ['numeric', 'required'],
            'old_price' => ['nullable', 'numeric'],
            'discount' => ['numeric', 'nullable'],
            'thumbnail' => ['nullable'],
            // 'images' => ['nullable'],
            'brand_id' => ['nullable', 'required'],
            'category_id' => ['required'],
            'sub_category_id' => ['nullable'],
            'stock_status' => ['required'],
            'short_details' => ['required', 'max:2000', 'min:100'],
            'long_details' => ['required', 'max:2000', 'min:100'],
            'top_rated' => [''],
            'weekly_deal' => [''],
            'best_seller' => [''],
            'main_slider' => [''],
        ]);

        if (request()->has('discount')) {
            $discount = request('discount') / 100;
            $discountPrice = request('price') - request('price') * $discount;
            $old_price = request('price');
        }
        // Create Thumbnail

        if (request()->hasFile('thumbnail')) {
            $thumbnail_path =
                'app/public/thumbnail/' . $newProduct['thumbnail']->hashName();
            Image::make($newProduct['thumbnail'])
                ->fit(720, 720)
                ->save(storage_path($thumbnail_path));
            $replacePath = str_replace(
                'app/public',
                '/storage',
                $thumbnail_path
            );
        }
        $product = Product::create(
            array_merge($newProduct, [
                'sku' => Str::upper(Str::random(3)) . '-' . rand(0, 4000),
                'slug' => Str::slug($newProduct['title']),
                'price' => $discountPrice ?? request('price'),
                'old_price' => $old_price,
                'weekly_deal' => $newProduct['weekly_deal'] ?? 0,
                'top_rated' => $newProduct['top_rated'] ?? 0,
                'best_seller' => $newProduct['best_seller'] ?? 0,
                'main_slider' => $newProduct['main_slider'] ?? 0,
                'thumbnail' => $replacePath,
            ])
        );

        // Create Image gallery

        if (request()->hasFile('images')) {
            $images = request()->file('images');
            foreach ($images as $file) {
                $sample_images = $file->getClientOriginalName();
                // $newFile = $file->storeAs('images', $sample_images, 'public');
                $newFile = $file->store(
                    '/product-images/' . $product->id,
                    'public'
                );
                $storage_path_0f_imgs = 'storage/' . $newFile;
                $new_path_to_save = 'app/public/product-images/' . $product->id;
                if (!file_exists($new_path_to_save)) {
                    mkdir($new_path_to_save, 0777, true);
                }
                $path_with_new_name =
                    $new_path_to_save .
                    '/' .
                    hash('ripemd160', $product->id) .
                    $sample_images;
                Image::make($storage_path_0f_imgs)
                    ->fit(720, 720)
                    ->save(storage_path($path_with_new_name));
                unlink($storage_path_0f_imgs);
                $replacePath = str_replace(
                    'app/public',
                    '/storage',
                    $path_with_new_name
                );
                rmdir($new_path_to_save);
                rmdir('app/public/product-images/');
                rmdir('app/public/');
                $product->images()->create([
                    'image_path' => $replacePath,
                ]);
            }
        }
        return redirect(route('product.index'))->with(
            'msg',
            'Successfully Created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand, Product $product)
    {
        $brands = $brand->all('id', 'name');
        $categories = Category::latest()->get(['id', 'name']);
        $subcategories = SubCategory::latest()->get(['id', 'name']);
        // dd($brands);
        return view(
            'dashboard.product.edit',
            compact('brands', 'product', 'categories', 'subcategories')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $product = Product::findOrFail($id);
        if (!empty(request('discount'))) {
            $discount = request('discount') / 100;
            $discountPrice = request('price') - request('price') * $discount;
            $old_price = request('price');
        }
        $product->update(
            array_merge(request()->all(), [
                'price' => $discountPrice ?? request('price'),
                'old_price' => $old_price ?? request('price'),
                'weekly_deal' => request('weekly_deal') ?? 0,
                'top_rated' => request('top_rated') ?? 0,
                'best_seller' => request('best_seller') ?? 0,
                'main_slider' => request('main_slider') ?? 0,
            ])
        );
        return redirect(route('product.index'))->with('msg', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with(
            'delete',
            'successfully Deleted'
        );
    }
}
