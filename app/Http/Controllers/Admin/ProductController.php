<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreProductRequest;
use App\Models\MultiImage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.prdouct.all_product', compact('products'));
    }

    public function create()
    {
        $categories = Category::with('sub_categories')->orderByDesc('id')->get();
        $brands = Brand::latest()->get();
        return view('admin.prdouct.add_product', compact('categories', 'brands'));
    }

    public function store(StoreProductRequest $request)
    {
        $thumbnail = $request->file('photo');

        $thumbnail_name = '';
        if ($thumbnail) {
            $thumbnail_name = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(800, 800)->save(public_path('uploaded/product/' . $thumbnail_name));
        }





        // return $request->all();
        $request->merge(['thumbnail' => $thumbnail_name]);
        $request->merge(['product_sizes' => serialize(explode(",", $request->product_sizes))]);
        $request->merge(['product_tags' => serialize(explode(",", $request->product_tags))]);
        $request->merge(['product_colors' => serialize(explode(",", $request->product_colors))]);
        $request->merge(['product_slug' => Str::slug($request->product_name)]);
        $request->merge(['product_id' =>  "#" . str_replace(" ", "_", $request->product_name) . '_' . date('i_s')]);




        $product_id = Product::insertGetId($request->except(['_token', 'multi_images', 'photo']));
        $alert = [
            'message' => 'Successfully Added Product!',
            'type' => 'success'
        ];


        $multi_images = $request->file('multi_images');
        if ($multi_images) {
            foreach ($multi_images as  $multi_image) {
                $file_name = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
                Image::make($multi_image)->resize(800, 800)->save(public_path('uploaded/product/' . $file_name));
                MultiImage::insert([
                    'product_id' => $product_id,
                    'image' => $file_name
                ]);
            }
        }




        return redirect()->route('admin.all_product')->with($alert);
    }

    public function edit(Product $product): View
    {
        $categories = Category::with('sub_categories')->orderByDesc('id')->get();
        $brands = Brand::latest()->get();
        return view('admin.prdouct.edit_product', compact('product', 'categories', 'brands'));
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $thumbnail = $product->thumbnail;

        if ($request->hasFile('photo')) {
            if (file_exists(public_path('uploaded/product/' . $thumbnail))) {
                unlink(public_path('uploaded/product/' . $thumbnail));
            }
            $new_thumbnail = hexdec(uniqid()) . '.' . $request->photo->getClientOriginalExtension();
            Image::make($request->photo)->resize(800, 800)->save(public_path('uploaded/product/' . $new_thumbnail));
            $thumbnail = $new_thumbnail;
        }

        $product->update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_id' => "#" . str_replace(" ", "_", $request->product_name) . '_' . date('i_s'),
            'thumbnail' => $thumbnail,
            'product_sizes' => serialize(explode(',', $request->product_sizes)),
            'product_colors' => serialize(explode(',', $request->product_colors)),
            'product_tags' => serialize(explode(',', $request->product_tags)),
            'selling_price' => $request->selling_price,
            'discount' => $request->discount,
            'product_quantity' => $request->product_quantity,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        return redirect()->route('admin.all_product')->with([
            'message' => 'Produit mis à jour avec succès.',
            'type' => 'success'
        ]);
    }

    public function destroy(Product $product)
    {
        if (file_exists(public_path('uploaded/product/' . $product->thumbnail))) {
            unlink(public_path('uploaded/product/' . $product->thumbnail));
        }
        $multi_images = $product->multiple_images;
        if ($multi_images) {
            foreach ($multi_images as $item) {
                if (file_exists(public_path('uploaded/product/' . $item->image))) {
                    unlink(public_path('uploaded/product/' . $item->image));
                }
            }
        }
        return $product->delete();
    }
}
