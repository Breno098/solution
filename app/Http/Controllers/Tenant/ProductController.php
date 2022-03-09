<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Category\IndexCategoryService;
use App\Services\Product\IndexProductService;
use App\Services\Product\StoreProductService;
use App\Services\Product\UpdateProductService;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @param IndexProductService $indexProductService
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, IndexProductService $indexProductService)
    {
        // $this->authorize('product_index');

        $products = $indexProductService->run(
            $request->all('name'),
            $request->get('relations', []),
            $request->get('orderBy', 'name'),
            $request->get('itemsPerPage', 10),
        );

        return inertia('App/Product/Index', [
            'filters' => $request->all('name'),
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IndexCategoryService $indexCategoryService)
    {
        //$this->authorize('product_show');

        $categories = $indexCategoryService->run(['type' => 'product']);

        return inertia('App/Product/Create', compact('categories'));
    }

    /**
     * @param StoreProductRequest $storeProductRequest
     * @param StoreProductService $storeProductService
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $storeProductRequest, StoreProductService $storeProductService)
    {
        // $this->authorize('product_add');

        $data = $storeProductRequest->validated();

        $storeProductService->run($data);

        return redirect()->route('tenant.product.index');
    }

    /**
     * @param Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $this->authorize('product_show');

        $product->load(['categories']);

        return $this->sendResponse($product, 'Product retrieved successfully.');
    }

    /**
     * @param UpdateProductRequest $updateProductRequest
     * @param UpdateProductService $updateProductService
     * @param Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateProductRequest $updateProductRequest,
        UpdateProductService $updateProductService,
        Product $product
    )
    {
        $this->authorize('product_update');

        $data = $updateProductRequest->validated();

        $product = $updateProductService->run($product, $data);

        return $this->sendResponse($product, 'Product updated successfully.');
    }

    /**
     * @param Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('product_delete');

        $product->delete();

        return $this->sendResponse([], 'Product deleted successfully.');
    }

}
