<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ModelLandingPage;
use App\Models\Settings;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->hasRole('Super admin')) {
            $settings = Settings::select('name', 'value', 'group','type')
                ->where('group', '!=', 'secret')->get();
        } else {
            $settings = Settings::select('name', 'value', 'group','type')->get();
        }
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $dataArray = $request->except('_token');

        if ($request->hasFile('site_register_img')) {
            $request->validate(
                [
                    'site_register_img' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:5000'
                ],
                [
                    'site_register_img.required' => 'Resim alanı Zorunludur',
                    'site_register_img.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                    'site_register_img.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_register_img.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır'
                ]
            );
            $dataArray['site_register_img'] = '/storage/' . $request->site_register_img->store('settings', 'public');
        }
        if ($request->hasFile('site_login_img')) {
            $request->validate(
                [
                    'site_login_img' =>  'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:5000'
                ],
                [
                    'site_login_img.required' => 'Resim alanı Zorunludur',
                    'site_login_img.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                    'site_login_img.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_login_img.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                ]
            );
            $dataArray['site_login_img'] = '/storage/' . $request->site_login_img->store('settings', 'public');
        }
        if ($request->hasFile('site_icon')) {
            $request->validate(
                [
                    'site_icon' =>  'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:5000'
                ],
                [
                    'site_icon.required' => 'Resim alanı Zorunludur',
                    'site_icon.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                    'site_icon.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_icon.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                ]
            );
            $dataArray['site_icon'] = '/storage/' . $request->site_icon->store('settings', 'public');
        }
        if ($request->hasFile('site_logo')) {
            $request->validate(
                [
                    'site_logo' =>  'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:5000'
                ],
                [
                    'site_logo.required' => 'Resim alanı Zorunludur',
                    'site_logo.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                    'site_logo.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_logo.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',

                ]
            );
            $dataArray['site_logo'] = '/storage/' . $request->site_logo->store('settings', 'public');
        }
        if ($request->hasFile('landing_slider_img')) {
            $request->validate(
                [
                    'landing_slider_img' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:5000'
                ],
                [
                    'landing_slider_img.required' => 'Resim alanı Zorunludur',
                    'landing_slider_img.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                    'landing_slider_img.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                    'landing_slider_img.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',

                ]
            );
            $dataArray['landing_slider_img'] = '/storage/' . $request->landing_slider_img->store('settings', 'public');
        }



        foreach ($dataArray as $key => $item) {
            Settings::where('name', $key)->update([
                'value' => $item,
            ]);
        }

        toastr()->success('Ayar Güncelleme İşlemi Başarılı.', 'Başarılı');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function landing_page_about()
    {
        $section_page =  ModelLandingPage::where('section_name', 'about')->get();
        return view('admin.about_deising', compact('section_page'));
    }
    public function landing_page_edit(Request $request)
    {
        ModelLandingPage::where('section_name', $request->section_name)->first();
    }

    public function landing_page_update(Request $request, $page)
    {
        $sectionPage = ModelLandingPage::where('section_name', $page)->first();


        if ($page == "about") {

            $section_data = [
                "header_1"              => $request->input("header_1"),
                "header_2"              => $request->input("header_2"),
                "button_text"           => $request->input("button_text"),
                "service_1_title"       => $request->input("service_1_title"),
                "service_1_description" => $request->input("service_1_description"),
                "service_2_title"       => $request->input("service_2_title"),
                "service_2_description" => $request->input("service_2_description"),
                "service_3_title"       => $request->input("service_3_title"),
                "service_3_description" => $request->input("service_3_description"),
                "service_4_title"       => $request->input("service_4_title"),
                "service_4_description" => $request->input("service_4_description"),

            ];



            // if ($request->hasFile('hero_image_2')){
            //     $section_data['hero_image_2'] = FileUpload::uploadFile(
            //         'system',
            //         ['image'],
            //         $request->hero_image_2)['public_file_url'
            //     ];
            // }else{
            //     $section_data['hero_image_2'] = json_decode($sectionsTable->section_content)->hero_image_2;
            // }

            if ($request->hasFile('logo_1')) {
                $request->validate(
                    [
                        'logo_1' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:4000'
                    ],
                    [
                        'logo_1.required' => 'Resim alanı Zorunludur',
                        'logo_1.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                        'logo_1.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                        'logo_1.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                    ]
                );

                $section_data['logo_1'] = '/storage/' . $request->logo_1->store('page', 'public');
            }
            else{
                $section_data['logo_1'] = json_decode($sectionPage->section_content)->logo_1;
            }
            if ($request->hasFile('logo_2')) {
                $request->validate(
                    [
                        'logo_2' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:4000'
                    ],
                    [
                        'logo_2.required' => 'Resim alanı Zorunludur',
                        'logo_2.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                        'logo_2.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                        'logo_2.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                    ]
                );
                $section_data['logo_2'] = '/storage/' . $request->logo_2->store('page', 'public');
            }else{
                $section_data['logo_2'] = json_decode($sectionPage->section_content)->logo_2;
            }
            if ($request->hasFile('logo_1')) {
                $request->validate(
                    [
                        'logo_3' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:4000'
                    ],
                    [
                        'logo_3.required' => 'Resim alanı Zorunludur',
                        'logo_3.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                        'logo_3.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                        'logo_3.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                    ]
                );
                $section_data['logo_3'] = '/storage/' . $request->logo_3->store('page', 'public');
            }else{
                $section_data['logo_3'] = json_decode($sectionPage->section_content)->logo_3;
            }
            if ($request->hasFile('logo_1')) {
                $request->validate(
                    [
                        'logo_4' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:4000'
                    ],
                    [
                        'logo_4.required' => 'Resim alanı Zorunludur',
                        'logo_4.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                        'logo_4.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                        'logo_4.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                    ]
                );
                $section_data['logo_4'] = '/storage/' . $request->logo_4->store('page', 'public');
            }else{
                $section_data['logo_4'] = json_decode($sectionPage->section_content)->logo_4;
            }
        }


        // dd(json_decode($sectionPage->section_content),$section_data);

        if ($sectionPage) {

            $sectionPage->update([
                'status' => $request->status,
                'section_content' => json_encode($section_data),
            ]);
        } else {
            $sectionPage = ModelLandingPage::create([
                'section_name' =>  $page,
                'status' => $request->status,
                'section_content' => json_encode($section_data),
            ]);
        }
        // dd($sectionSave);
        toastr()->success('Sayfa Güncelleme İşlemi Başarılı.', 'Başarılı');
        return redirect()->back();
        // $section_name =  ModelLandingPage::where('section_name', $request->section_name)->first();
    }
}
