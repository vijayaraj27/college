<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Web\Page;

class PageController extends Controller
{
    /**
     * Display IQAC sub-page.
     *
     * @param  string  $subpage
     * @return \Illuminate\Http\Response
     */
    public function showIQACSubPage($subpage)
    {
        // Map subpage names to slugs
        $slugMap = [
            'introduction' => 'iqac-introduction',
            'aqar-reports' => 'iqac-aqar-reports',
            'minutes-action-taken' => 'iqac-minutes-action-taken',
            'members' => 'iqac-members',
            'best-practices' => 'iqac-best-practices',
            'distinctiveness' => 'iqac-distinctiveness',
            'student-satisfaction-survey' => 'iqac-student-satisfaction-survey',
        ];
        
        $slug = $slugMap[$subpage] ?? 'iqac-' . str_replace(' ', '-', strtolower($subpage));
        
        // Page                                
        $data['page'] = Page::where('slug', $slug)
                            ->where('status', '1')
                            ->firstOrFail();

        return view('web.page', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Page                                
        $data['page'] = Page::where('slug', $slug)
                            ->where('status', '1')
                            ->firstOrFail();

        return view('web.page', $data);
    }
}
