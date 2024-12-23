<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\policyPages;
use Illuminate\Http\Request;

class HomePageController extends Controller
{


    // Home Page Content Edits.
    public function getHomePageEditor()
    {
        $slide1 = Content::where('contentId', '1')->first();
        $slide2 = Content::where('contentId', '2')->first();
        $feature1 = Content::where('contentId', '3')->first();
        $feature2 = Content::where('contentId', '4')->first();

        // return response()->json($feature1);
        return view('admin.pages.Edit.Home', [
            'title' => 'Edit Home Page',
            'slide1' => $slide1,
            'slide2' => $slide2,
            'feature1' => $feature1,
            'feature2' => $feature2
        ]);
    }

    public function UpdateContent(Request $request)
    {

        $validate = $request->validate([
            'MainHeading' => 'required|string',
            'HighlightText' => 'nullable|string',
            'PriceText' => 'nullable|string',
            'Amount' => 'nullable|string',
            'featuredText' => 'nullable|string',
            'ButtonText' => 'required|string',
            'ButtonLink' => 'required|string',
            'image' => 'nullable|mimes:png,jpeg'
        ]);

        $id = $request->input('id');
        $content = Content::find($id);


        if ($content) {

            $folderPath = 'Content';
            if ($request->file('image')) {
                $contentImage = $request->file('image');
                $contentImageName = time() . '_' . 'Slide_image' . '.' . $contentImage->getClientOriginalExtension();
                $contentImage->move(public_path($folderPath), $contentImageName);

                $content->image = $contentImageName;
            }


            if ($request->input('featuredText')) {
                $content->featureText = $validate['featuredText'];
            }
            if ($request->input('MainHeading')) {
                $content->mainHeading = $validate['MainHeading'];
            }
            if ($request->input('HighlightText')) {
                $content->Highlight_Text = $validate['HighlightText'];
            }
            if ($request->input('PriceText')) {
                $content->Price_Text = $validate['PriceText'];
            }
            if ($request->input('Amount')) {
                $content->Amount_Percentage = $validate['Amount'];
            }
            if ($request->input('ButtonText')) {
                $content->ButtonText = $validate['ButtonText'];
            }
            if ($request->input('ButtonLink')) {
                $content->ButtonLink = $validate['ButtonLink'];
            }
            $content->save();

            return back()->with('success', 'Content Updated Successfully');
        } else {
            return back()->with('error', 'There is an error updating the content');
        }

    }

    // Terms & Conditions 
    public function getTermsAndConditionsEditor()
    {
        $content = policyPages::where('type', 'TermsAndConditions')->first();

        return view('admin.pages.Edit.Terms', [
            'title' => 'Terms and Conditions',
            'content' => $content
        ]);
    }

    public function UpdateTermsAndConditions(Request $request)
    {
        $policy = policyPages::where('type', 'TermsAndConditions')->first();
        if ($policy) {
            $policy->update([
                'content' => $request->input('content'),
            ]);
            return back()->with(['success' => 'Policy Updated Successfully']);
        } else {
            $policy = new policyPages;
            $policy->type = 'TermsAndConditions';
            $policy->content = $request->input('content');
            $policy->save();
            return back()->with(['success' => 'Policy Created Successfully']);
        }

    }

    // Privacy Policy
    public function getPrivacyPolicy()
    {
        $content = policyPages::where('type', 'PrivacyPolicy')->first();
        return view('admin.pages.edit.privacy', [
            'title' => 'Terms and Conditions',
            'content' => $content
        ]);
    }

    public function UpdatePrivacyPolicy(Request $request)
    {
        $policy = policyPages::where('type', 'PrivacyPolicy')->first();
        if ($policy) {
            $policy->update([
                'content' => $request->input('content'),
            ]);
            return back()->with(['success' => 'Policy Updated Successfully']);
        } else {
            $policy = new policyPages;
            $policy->type = 'PrivacyPolicy';
            $policy->content = $request->input('content');
            $policy->save();
            return back()->with(['success' => 'Policy Created Successfully']);
        }
    }

    // Refund Policy
    public function getRefundPolicy()
    {
        $content = policyPages::where('type', 'RefundPolicy')->first();
        return view('admin.pages.Edit.RefundPolicy', [
            'title' => 'Refund Policy',
            'content' => $content
        ]);
    }
    public function UpdateRefundPolicy(Request $request)
    {
        $policy = policyPages::where('type', 'RefundPolicy')->first();
        if ($policy) {
            $policy->update([
                'content' => $request->input('content'),
            ]);
            return back()->with(['success' => 'Policy Updated Successfully']);
        } else {
            $policy = new policyPages;
            $policy->type = 'RefundPolicy';
            $policy->content = $request->input('content');
            $policy->save();
            return back()->with(['success' => 'Policy Created Successfully']);
        }
    }

}
