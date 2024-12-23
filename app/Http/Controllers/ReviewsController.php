<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Review;
use App\Models\Review_replies;
use App\Models\Reviews;
use Auth;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function storeReview(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        $product = Products::findOrFail($productId);

        Reviews::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'seller_id' => $product->user_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Review added successfully.');
    }

    public function storeReply(Request $request, $reviewId)
    {
        $request->validate(['reply' => 'required|string']);

        Review_replies::create([
            'review_id' => $reviewId,
            'user_id' => Auth::id(),
            'reply' => $request->reply,
        ]);

        return back()->with('success', 'Reply added successfully.');
    }


    public function showPendingReviews()
    {
        $userId = Auth::user()->id; // Get the current logged-in seller's user ID
    
        // Fetch all products of the seller
        $products = Products::where('user_id', $userId)->get();
    
        // Fetch all reviews for those products that are pending approval
        $pendingReviews = Reviews::whereIn('product_id', $products->pluck('id'))
                                ->where('approved', false) // Assuming 'approved' is false for pending reviews
                                ->get();
    
        // Pass the filtered reviews to the view
        return view('admin.Reviews.pending_reviews', compact('pendingReviews'));
    }
    
    public function approveReview($reviewId)
    {
        $review = Reviews::findOrFail($reviewId);
        $review->update(['approved' => true]);

        // Approve all replies associated with this review
        foreach ($review->replies as $reply) {
            $reply->update(['approved' => true]);
        }

        return redirect()->back()->with('success', 'Review approved successfully.');
    }

    // Decline a review
    public function declineReview($reviewId)
    {
        $review = Reviews::findOrFail($reviewId);
        $review->delete();

        // Optionally, delete replies if the review is declined
        foreach ($review->replies as $reply) {
            $reply->delete();
        }

        return redirect()->back()->with('success', 'Review and replies deleted.');
    }

    // Approve a reply
    public function approveReply($replyId)
    {
        $reply = Review_replies::findOrFail($replyId);
        $reply->update(['approved' => true]);

        return redirect()->back()->with('success', 'Reply approved successfully.');
    }

    // Decline a reply
    public function declineReply($replyId)
    {
        $reply = Review_replies::findOrFail($replyId);
        $reply->delete();

        return redirect()->back()->with('success', 'Reply deleted.');
    }
}
