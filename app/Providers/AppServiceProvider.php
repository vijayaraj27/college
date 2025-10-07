<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\Paginator;
use App\Models\Web\TopbarSetting;
use App\Models\Web\SocialSetting;
use App\Models\ScheduleSetting;
use App\Models\Web\Page;
use App\Models\Language;
use App\Models\Setting;
use App\Http\Controllers\MenuController;
use App\Models\Menu;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(MenuController $menuController)
    {
        //
    //ini_set('display_errors', "stderr");
    //ini_set('error_reporting', E_ALL);
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        // Share view for Common Data
        $user_languages = Language::where('status', '1')->get();
        $setting = Setting::where('status', '1')->first();
        // Generate menu HTML with proper nested structure
        try {
            $menus = Menu::where('status', 0)->orderBy('id', 'asc')->get();
            
            if ($menus->count() > 0) {
                $menuController = new MenuController();
                $treeView = $menuController->buildTreeView($menus);
            } else {
                $treeView = '<ul class="" id=""><li class=""><a href="' . url('/') . '">Home</a></li></ul>';
            }
        } catch (\Exception $e) {
            // Fallback menu with proper structure
            $treeView = '<ul class="" id=""><li class=""><a href="' . url('/') . '">Home</a></li><li class=""><a href="' . url('/trust') . '">Trust</a></li></ul>';
        }
        $topbarSetting = TopbarSetting::where('status', '1')->first();
        $socialSetting = SocialSetting::where('status', '1')->first();
        $schedule_setting = ScheduleSetting::where('slug', 'fees-schedule')->first();
        $footer_pages = Page::where('language_id', Language::version()->id)
                            ->where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();
        // Set Time Zone
        Config::set('app.timezone', $setting->time_zone);
        View::share(['setting' => $setting, 'user_languages' => $user_languages, 'schedule_setting' => $schedule_setting, 'topbarSetting' => $topbarSetting, 'socialSetting' => $socialSetting, 'footer_pages' => $footer_pages, 'treeView' => $treeView]);
    }
}
