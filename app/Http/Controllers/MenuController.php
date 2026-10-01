<?php

namespace App\Http\Controllers;

use App\Models\MenuProduct;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $category = (string) $request->query('category', '');

        $query = MenuProduct::query()->where('is_active', true);

        if ($search !== '') {
            $query->where(function ($query) use ($search): void {
                $term = '%' . $search . '%';

                $query->where('name', 'like', $term)
                    ->orWhere('slug', 'like', $term)
                    ->orWhere('category_label', 'like', $term)
                    ->orWhere('description', 'like', $term)
                    ->orWhere('keywords', 'like', $term);
            });
        }

        if ($category !== '') {
            $query->where('category', $category);
        }

        $products = $query
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        $availableCategories = MenuProduct::query()
            ->where('is_active', true)
            ->distinct()
            ->pluck('category');

        $categoryLabels = [
            'Sourdough' => 'Artisan Sourdough',
            'Pastry' => 'Viennoiserie & Pastry',
            'Savory' => 'Savory & Flatbread',
            'Sweet' => 'Pastry Manis',
            'Coffee' => 'Kopi & Minuman',
        ];

        $categories = collect($categoryLabels)
            ->filter(fn (string $label, string $key): bool => $availableCategories->contains($key))
            ->map(fn (string $label, string $key): object => (object) [
                'category' => $key,
                'category_label' => $label,
            ])
            ->values();

        $menuDetails = $products->getCollection()
            ->mapWithKeys(fn (MenuProduct $product): array => [
                $product->slug => [
                    'category' => $product->category_label,
                    'name' => $product->name,
                    'desc' => $product->description,
                    'price' => 'Rp ' . number_format($product->price, 0, ',', '.'),
                    'details' => $product->details ?? [],
                    'whatsapp_number' => preg_replace('/\D+/', '', $product->whatsapp_number),
                ],
            ])
            ->all();

        return view('menu', compact('products', 'categories', 'menuDetails', 'search', 'category'));
    }
}
