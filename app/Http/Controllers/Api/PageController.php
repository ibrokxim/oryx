<?php

namespace App\Http\Controllers\Api;

use App\Mail\Email;
use App\Models\News;
use App\Models\Store;
use App\Models\Review;
use App\Models\MetaTeg;
use App\Models\Element;
use App\Models\Question;
use App\Models\Category;
use App\Mail\OrderShipped;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Services\ShortcodeService;
use App\Services\Admin\PageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $pageService;
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function about()
    {
        $data = $this->pageService;
        return response()->json(['data' => $data], 200);
    }

    public function popularStores(Request $request)
    {
        $categoryId = $request->input('category_id');

        if ($categoryId) {
            $storeIds = $this->pageService->getStoreIdsByCategoryId($categoryId);
            $stores = $this->pageService->getActiveStoresByIds($storeIds);
        } else {
            $stores = $this->pageService->getAllActiveStores();
        }

        $stores = $this->pageService->transformStoreImages($stores);

        $categories = Category::all();

        if ($stores->count() > 0) {
            $data = ShortcodeService::doShortcode('populiarnye');
            return response()->json(['stores' => $stores, 'categories' => $categories, 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }

    }

    public function store($slug)
    {
        $store = Store::where('slug', $slug)->first();

        if ($store) {
            $metaTegs = MetaTeg::where('name', $store->name)->pluck('code')->implode(' ');
            $store->img = url('storage/' . $store->img);

            $data = ShortcodeService::doShortcode('magazin', ['store-name' => $store->name]);

            return response()->json([
                'store' => $store,
                'data' => $data,
                'meta' => $metaTegs,
            ], 200);

        } else {
            return response()->json(['message' => 'Store Not Found'], 404);
        }

    }

    public function reviews() {
        $reviews = Review::where('status', 'active')->get();
        $data = ShortcodeService::doShortcode('otzyvy');
        return response()->json(['reviews' => $reviews, 'data' => $data], 200);
    }

    public function help() {
        $questions = Question::where('status', 'active')->get();
        $data = ShortcodeService::doShortcode('usloviia');
        return response()->json(['questions' => $questions, 'data' => $data], 200);
    }

    public function news() {
        $news = News::where('status', 'active')->get();
        $data = ShortcodeService::doShortcode('poleznoe');
        return response()->json(['news' => $news, 'data' => $data], 200);
    }

    public function newsPage($slug) {
        $new = News::where('slug', $slug)->first();
        if ($new) {
            $data = ShortcodeService::doShortcode('novost', [
                'new-name' => $new->name,
                'new-description' => $new->description,
                'new-img' => $new->img,
                'new-title' => $new->title,
                'new-meta-desc' => $new->meta_desc
            ]);
            return response()->json(['new' => $new, 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }

    public function zapreshenye() {
        $data = ShortcodeService::doShortcode('zapreshheny');
        return response()->json(['data' => $data], 200);
    }

    public function contactsUs() {
        $contacts = Element::where('type', 'kontakty')->get();
        $data = ShortcodeService::doShortcode('kontakty');
        return response()->json(['contacts' => $contacts, 'data' => $data], 200);
    }

    public function politika() {
        $rekvisit = Element::where('type', 'rekvisit')->get();
        $data = ShortcodeService::doShortcode('politika');
        return response()->json(['rekvisit' => $rekvisit, 'data' => $data], 200);
    }

    public function usloviya() {
        $data = ShortcodeService::doShortcode('o-usloviia');
        return response()->json(['data' => $data], 200);
    }

    public function buy_me() {
        $data = ShortcodeService::doShortcode('kupite');
        return response()->json(['data' => $data], 200);
    }

    public function send(Request $request) {
        $orders = Arr::get($request, 'tblAppendGrid_rowOrder', 0);
        $orders = explode(',', $orders);

        $nomer = Arr::get($request, 'number', 0);

        $products = [];

        foreach ($orders as $key => $order) {
            $link = Arr::get($request, "tblAppendGrid_link_$order");
            $name = Arr::get($request, "tblAppendGrid_product-name_$order");
            $info = Arr::get($request, "tblAppendGrid_product-info_$order");

            if ($link && $name) {
                $products[$key]['product-link'] = $link;
                $products[$key]['product-name'] = $name;
                $products[$key]['product-info'] = $info;
            }
        }

        $purchase = ['nomer' => $nomer, 'products' => $products];

        $user = Auth::user();
        if ($user) {
            Mail::to($user->email)->send(new OrderShipped($purchase));
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
//        Mail::to('ofis@orix.kz')->send(new OrderShipped($purchase));

        return response()->json(['message' => 'Order sent successfully'], 200);
    }

    public function email(Request $request) {
        $email = Arr::get($request, 'email');
        $name = Arr::get($request, 'name');

        if ($email) {
            Mail::to($email)->send(new Email($email, $name));
        }

        return response()->json(['message' => 'Email sent successfully'], 200);
    }

    public function review(Request $request) {
        $name = Arr::get($request, 'name');
        $review = Arr::get($request, 'review');

        $new_review = new Review;
        $new_review->name = $name;
        $new_review->message = $review;
        $new_review->status = 'disabled';
        $new_review->save();

        return response()->json(['message' => 'Review submitted successfully'], 200);
    }
}
