<?php

namespace App\Http\Controllers\PollController;

use App\Traits\UploadImage;
use Illuminate\Support\Str;
use App\Models\poll_answers;
use Illuminate\Http\Request;
use App\Models\stories_dating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\dating_advices;
use App\Models\poll_option;
use App\Models\poll_question;


class PollController extends Controller
{
    use UploadImage;
    //

    public function poll_answer(Request $request)
    {
        $request->validate([
            'answer' => 'required',
        ]);

        $ip = request()->ip();

        $poll_answer = new poll_answers;
        $poll_answer->option_id = $request->answer;
        $poll_answer->poll_question_id = $request->poll_question_id;
        $poll_answer->ip_address = $ip;
        $result = $poll_answer->save();
        if ($result) {
            $poll_option = poll_option::find($request->answer);
            if ($poll_option) {
                $poll_option->increment('user_count');
            }

            return ["return" => "Thank you for your interesting answer!"];
        } else {
            return ["return" => "Not subscribing!"];
        }
    }


    public function AddQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required',
        ]);

        $poll_question = new poll_question;
        $poll_question->ref_no = mt_rand(1000000, 9999999);
        $poll_question->question = $request->question;
        $poll_question->status = 2;
        $poll_question->save();

        foreach ($request->options as $optionValue) {
            $poll_option = new poll_option;
            $poll_option->poll_question_id = $poll_question->id;
            $poll_option->option_value = $optionValue;
            $poll_option->save();
        }
        Session::flash('success', 'Question Add successful.');
        return redirect()->to('admin/poll-question');
    }



    public function PollQuestionUpdate(Request $request)
    {
        $question_id = $request->question_id;

        // Update the poll question
        $data = poll_question::where('id', $question_id)->first();
        $data->update([
            'question' => $request->question,
        ]);

        // Update options
        $options = $request->options;
        $optionIds = $request->optionid;

        foreach ($optionIds as $index => $optionId) {
            $optionModel = poll_option::where('id', $optionId)
                ->where('poll_question_id', $question_id)
                ->first();
            if ($optionModel) {
                $optionModel->update([
                    'option_value' => $options[$index], // Use $index to access corresponding option value
                ]);
            }
        }

        Session::flash('success', 'Update successful.');
        return redirect()->to('admin/poll-question');
    }





    public function PollQuestionInActive($ref_no)
    {
        $data = poll_question::where('ref_no', $ref_no)->first();
        $data->update([
            'status' => 3,
        ]);
        Session::flash('success', 'Delete successful.');
        return back();
    }



    public function PollQueActive($ref_no)
    {
        poll_question::where('ref_no', '!=', $ref_no)->where('status', '!=', 3)->update([
            'status' => 2,
        ]);

        poll_question::where('ref_no', $ref_no)->update([
            'status' => 1,
        ]);

        Session::flash('success', 'Activation successful.');
        return back();
    }





    public function add_stories(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'details' => 'required',
        ]);

        $imgProduct = null;
        if ($request->hasFile('listing_img')) {
            $imgProductFile = $request->file("listing_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/stories/listing_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $imgProduct2 = null;
        if ($request->hasFile('detail_img')) {
            $imgProductFile = $request->file("detail_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct2 = $this->UploadImage('assets/stories/detail_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $imgProduct3 = null;
        if ($request->hasFile('home_img')) {
            $imgProductFile = $request->file("home_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct3 = $this->UploadImage('assets/stories/home_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $blog = new stories_dating;
        $blog->ref_no = mt_rand(1000000, 9999999);
        $blog->title = $request->title;
        $blog->detail_img = $imgProduct2;
        $blog->listing_img = $imgProduct;
        $blog->home_img = $imgProduct3;
        $blog->summary = $request->summary;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->details = $request->details;
        $blog->slug = $request->slug;
        $blog->status = 2;
        $blog->publish_date = now();
        $blog->save();
        Session::flash('success', 'Add Stories successful.');
        return redirect()->to('admin/dating-stories');
    }


    public function Update_stories(Request $request)
    {
        $ref_no = $request->ref_no;

        $data = stories_dating::where('ref_no', $ref_no)->first();

        if ($request->hasFile('detail_img')) {
            $imgProductFile = $request->file("detail_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/stories/detail_img/', '', $imgProductFile, $new_name_of_profile_photo3);
            stories_dating::where('ref_no', $ref_no)->update([
                'detail_img' => $imgProduct,
            ]);
        }

        if ($request->hasFile('listing_img')) {
            $imgProductFile2 = $request->file("listing_img");
            $new_name_of_profile_photo4 = uniqid('', true) . "." . $imgProductFile2->getClientOriginalExtension();
            $imgProduct2 = $this->UploadImage('assets/stories/listing_img/', '', $imgProductFile2, $new_name_of_profile_photo4); // Use $imgProductFile2 here
            stories_dating::where('ref_no', $ref_no)->update([
                'listing_img' => $imgProduct2,
            ]);
        }

        if ($request->hasFile('home_img')) {
            $imgProductFile2 = $request->file("home_img");
            $new_name_of_profile_photo4 = uniqid('', true) . "." . $imgProductFile2->getClientOriginalExtension();
            $imgProduct3 = $this->UploadImage('assets/stories/home_img/', '', $imgProductFile2, $new_name_of_profile_photo4); // Use $imgProductFile2 here
            stories_dating::where('ref_no', $ref_no)->update([
                'home_img' => $imgProduct3,
            ]);
        }

        stories_dating::where('ref_no', $ref_no)->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'details' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);
        Session::flash('success', 'Updated successfully.');
        return redirect()->to('admin/dating-stories');
    }




    public function add_dating_advice(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'details' => 'required',
        ]);

        $imgProduct = null;
        if ($request->hasFile('listing_img')) {
            $imgProductFile = $request->file("listing_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/dating-advice/listing_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $imgProduct3 = null;
        if ($request->hasFile('home_img')) {
            $imgProductFile = $request->file("home_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct3 = $this->UploadImage('assets/dating-advice/home_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $imgProduct2 = null;
        if ($request->hasFile('detail_img')) {
            $imgProductFile = $request->file("detail_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct2 = $this->UploadImage('assets/dating-advice/detail_img/', '', $imgProductFile, $new_name_of_profile_photo3);
        }

        $blog = new dating_advices;
        $blog->ref_no = mt_rand(1000000, 9999999);
        $blog->title = $request->title;
        $blog->detail_img = $imgProduct2;
        $blog->listing_img = $imgProduct;
        $blog->home_img = $imgProduct3;
        $blog->short_description = $request->summary;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->long_description = $request->details;
        $blog->slug = $request->slug;
        $blog->status = 2;
        $blog->publish_date = now();
        $blog->save();
        Session::flash('success', 'Dating Advice successful.');
        return redirect()->to('admin/dating-advice');
    }


    public function UpdateDatingAdvice(Request $request)
    {
        $ref_no = $request->ref_no;

        $data = dating_advices::where('ref_no', $ref_no)->first();

        if ($request->hasFile('detail_img')) {
            $imgProductFile = $request->file("detail_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/dating-advice/detail_img/', '', $imgProductFile, $new_name_of_profile_photo3);
            dating_advices::where('ref_no', $ref_no)->update([
                'detail_img' => $imgProduct,
            ]);
        }

        if ($request->hasFile('listing_img')) {
            $imgProductFile2 = $request->file("listing_img");
            $new_name_of_profile_photo4 = uniqid('', true) . "." . $imgProductFile2->getClientOriginalExtension();
            $imgProduct2 = $this->UploadImage('assets/dating-advice/listing_img/', '', $imgProductFile2, $new_name_of_profile_photo4); // Use $imgProductFile2 here
            dating_advices::where('ref_no', $ref_no)->update([
                'listing_img' => $imgProduct2,
            ]);
        }

        if ($request->hasFile('home_img')) {
            $imgProductFile = $request->file("home_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct3 = $this->UploadImage('assets/dating-advice/home_img/', '', $imgProductFile, $new_name_of_profile_photo3);
            dating_advices::where('ref_no', $ref_no)->update([
                'home_img' => $imgProduct3,
            ]);
        }

        dating_advices::where('ref_no', $ref_no)->update([
            'title' => $request->title,
            'short_description' => $request->summary,
            'long_description' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);
        Session::flash('success', 'Dating Advice successful.');
        return redirect()->to('admin/dating-advice');
    }


    public function UpdateStoriesByUsers(Request $request)
    {
        $ref_no = $request->ref_no;

        $data = stories_dating::where('ref_no', $ref_no)->first();
        $imgProduct = null;
        if ($request->hasFile('detail_img')) {
            $imgProductFile = $request->file("detail_img");
            $new_name_of_profile_photo3 = uniqid('', true) . "." . $imgProductFile->getClientOriginalExtension();
            $imgProduct = $this->UploadImage('assets/stories/detail_img/', '', $imgProductFile, $new_name_of_profile_photo3);
            stories_dating::where('ref_no', $ref_no)->update([
                'detail_img' => $imgProduct,
            ]);
        }

        if ($request->hasFile('listing_img')) {
            $imgProductFile2 = $request->file("listing_img");
            $new_name_of_profile_photo4 = uniqid('', true) . "." . $imgProductFile2->getClientOriginalExtension();
            $imgProduct2 = $this->UploadImage('assets/stories/listing_img/', '', $imgProductFile2, $new_name_of_profile_photo4); // Use $imgProductFile2 here
            stories_dating::where('ref_no', $ref_no)->update([
                'listing_img' => $imgProduct2,
            ]);
        }

        stories_dating::where('ref_no', $ref_no)->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'details' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);
        Session::flash('success', 'Updated successfully.');
        return redirect()->to('dating-stories');
    }

    public function deleteStories($ref_no)
    {
        $data = stories_dating::where('ref_no', $ref_no)->first();
        $data->update([
            'status' => 3,
        ]);
        Session::flash('success', 'Delete successful.');
        return back();
    }



}
