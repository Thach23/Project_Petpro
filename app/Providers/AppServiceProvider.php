<?php

namespace App\Providers;

use Illuminate\Support\Str;
use App\Models\WEBSITEATTRIBUTES;
use App\Models\PRODUCTCATEGORIES;
use App\Models\BLOGCATEGORIES;
use App\Models\BLOGS;
use App\Models\PRODUCTS;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;

#region repository
use App\Repositories\IRepositories\IStaffRepository;
use App\Repositories\Repositories\StaffRepository;
use App\Repositories\IRepositories\IProductsRepository;
use App\Repositories\Repositories\ProductsRepository;

//Hang cam xoa
use App\Repositories\IRepositories\IOrderItemsRepository;
use App\Repositories\Repositories\OrderItemsRepository;

use App\Repositories\IRepositories\IOrderItemRepository;
use App\Repositories\Repositories\OrderItemRepository;

use App\Repositories\IRepositories\IOrdersRepository;
use App\Repositories\Repositories\OrdersRepository;
use App\Repositories\IRepositories\IPicturesRepository;
use App\Repositories\Repositories\PicturesRepository;
use App\Repositories\IRepositories\IProductPictureMappingsRepository;
use App\Repositories\Repositories\ProductPictureMappingsRepository;
use App\Repositories\IRepositories\IProductCategoriesRepository;
use App\Repositories\Repositories\ProductCategoriesRepository;
use App\Repositories\IRepositories\IProductAttributesRepository;
use App\Repositories\Repositories\ProductAttributesRepository;
use App\Repositories\IRepositories\IProductAttributeMappingsRepository;
use App\Repositories\Repositories\ProductAttributeMappingsRepository;
use App\Repositories\IRepositories\IBlogsRepository;
use App\Repositories\Repositories\BlogsRepository;
use App\Repositories\IRepositories\IBlogCategoriesRepository;
use App\Repositories\Repositories\BlogCategoriesRepository;
use App\Repositories\IRepositories\IWebsiteAttributesRepository;
use App\Repositories\Repositories\WebsiteAtributesRepository;
use App\Repositories\IRepositories\IPetProfilesRepository;
use App\Repositories\Repositories\PetProfilesRepository;
use App\Repositories\IRepositories\IProfilesRepository;
use App\Repositories\Repositories\ProfilesRepository;
use App\Repositories\IRepositories\ICommentsRepository;
use App\Repositories\Repositories\CommentsRepository;
use App\Repositories\IRepositories\IFilesRepository;
use App\Repositories\Repositories\FilesRepository;
use App\Repositories\IRepositories\ITagsRepository;
use App\Repositories\Repositories\TagsRepository;
use App\Repositories\IRepositories\IBlogTagMappingRepository;
use App\Repositories\Repositories\BlogTagMappingRepository;
use App\Repositories\IRepositories\IProductTagMappingRepository;
use App\Repositories\Repositories\ProductTagMappingRepository;
use App\Repositories\IRepositories\ILocationsRepository;
use App\Repositories\Repositories\LocationsRepository;
use App\Repositories\IRepositories\IDepartmentsRepository;
use App\Repositories\Repositories\DepartmentsRepository;
use App\Repositories\IRepositories\IRecruitsRepository;
use App\Repositories\Repositories\RecruitsRepository;
#endregion

#region service
use App\Services\IService\IStaffService;
use App\Services\StaffService;
use App\Services\IService\IProductsService;
use App\Services\ProductsService;
use App\Services\IService\IProductPictureMappingsService;
use App\Services\ProductPictureMappingsService;
use App\Services\IService\IProductCategoriesService;
use App\Services\ProductCategoriesService;
use App\Services\IService\IProductAttributesService;
use App\Services\ProductsAttributesService;
use App\Services\IService\IPicturesService;
use App\Services\PicturesService;
use App\Services\IService\IProductAttributeMappingsService;
use App\Services\ProductAttributeMappingsService;

//Hang cam xoa
use App\Services\IService\IOrderItemsService;
use App\Services\OrderitemsService;

use App\Services\IService\IOrderItemService;
use App\Services\OrderitemService;
use App\Services\IService\IOrdersService;
use App\Services\OrdersService;
use App\Services\IService\IBlogsService;
use App\Services\BlogsService;
use App\Services\IService\IBlogCategoriesService;
use App\Services\BlogCategoriesService;
use App\Services\IService\IWebsiteAttributesService;
use App\Services\WebsiteAttributesService;
use App\Services\IService\IPetProfilesService;
use App\Services\PetProfilesService;
use App\Services\IService\IProfilesService;
use App\Services\ProfilesService;
use App\Services\IService\ICommentsService;
use App\Services\CommentsService;
use App\Services\IService\IFilesService;
use App\Services\FilesService;
use App\Services\IService\ITagsService;
use App\Services\TagsService;
use App\Services\IService\IBlogTagMappingService;
use App\Services\BlogTagMappingService;
use App\Services\IService\IProductTagMappingService;
use App\Services\ProductTagMappingService;

use App\Services\IService\IRecruitsService;
use App\Services\RecruitsService;
use App\Services\IService\IRedisService;
use App\Services\RedisService;
use App\Services\IService\IMailService;
use App\Services\MailService;
use App\Services\IService\ILocationsService;
use App\Services\LocationsService;
use App\Services\IService\IDepartmentsService;
use App\Services\DepartmentsService;

#endregion

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        #region Repositories
        $this->app->singleton(IStaffRepository::class, StaffRepository::class);
        $this->app->singleton(IProductsRepository::class, ProductsRepository::class);

        //Hang cam xoa
        $this->app->singleton(IOrderItemsRepository::class, OrderItemsRepository::class);

        $this->app->singleton(IOrderItemRepository::class, OrderItemRepository::class);
        $this->app->singleton(IOrdersRepository::class, OrdersRepository::class);
        $this->app->singleton(IPicturesRepository::class, PicturesRepository::class);
        $this->app->singleton(IProductPictureMappingsRepository::class, ProductPictureMappingsRepository::class);
        $this->app->singleton(IProductAttributeMappingsRepository::class, ProductAttributeMappingsRepository::class);
        $this->app->singleton(IProductAttributesRepository::class, ProductAttributesRepository::class);
        $this->app->singleton(IProductCategoriesRepository::class, ProductCategoriesRepository::class);
        $this->app->singleton(IBlogsRepository::class, BlogsRepository::class);
        $this->app->singleton(IBlogCategoriesRepository::class, BlogCategoriesRepository::class);
        $this->app->singleton(IWebsiteAttributesRepository::class, WebsiteAtributesRepository::class);
        $this->app->singleton(IPetProfilesRepository::class, PetProfilesRepository::class);
        $this->app->singleton(IProfilesRepository::class, ProfilesRepository::class);
        $this->app->singleton(ICommentsRepository::class, CommentsRepository::class);
        $this->app->singleton(IFilesRepository::class, FilesRepository::class);
        $this->app->singleton(ITagsRepository::class, TagsRepository::class);
        $this->app->singleton(IBlogTagMappingRepository::class, BlogTagMappingRepository::class);
        $this->app->singleton(IProductTagMappingRepository::class, ProductTagMappingRepository::class);
        $this->app->singleton(ILocationsRepository::class, LocationsRepository::class);
        $this->app->singleton(IDepartmentsRepository::class, DepartmentsRepository::class);
        $this->app->singleton(IRecruitsRepository::class, RecruitsRepository::class);
        #endregion

        #region Service
        $this->app->singleton(IStaffService::class, StaffService::class);
        $this->app->singleton(IProductsService::class, ProductsService::class);

        //Hang cam xoa
        $this->app->singleton(IOrderItemsService::class, OrderItemsService::class);

        $this->app->singleton(IOrderItemService::class, OrderItemService::class);
        $this->app->singleton(IOrdersService::class, OrdersService::class);
        $this->app->singleton(IPicturesService::class, PicturesService::class);
        $this->app->singleton(IProductPictureMappingsService::class, ProductPictureMappingsService::class);
        $this->app->singleton(IProductCategoriesService::class, ProductCategoriesService::class);
        $this->app->singleton(IProductAttributesService::class, ProductsAttributesService::class);
        $this->app->singleton(IProductAttributeMappingsService::class, ProductAttributeMappingsService::class);
        $this->app->singleton(IBlogsService::class, BlogsService::class);
        $this->app->singleton(IBlogCategoriesService::class, BlogCategoriesService::class);
        $this->app->singleton(IWebsiteAttributesService::class, WebsiteAttributesService::class);
        $this->app->singleton(IPetProfilesService::class, PetProfilesService::class);
        $this->app->singleton(IProfilesService::class, ProfilesService::class);
        $this->app->singleton(ICommentsService::class, CommentsService::class);
        $this->app->singleton(IFilesService::class, FilesService::class);
        $this->app->singleton(ITagsService::class, TagsService::class);
        $this->app->singleton(IBlogTagMappingService::class, BlogTagMappingService::class);
        $this->app->singleton(IProductTagMappingService::class, ProductTagMappingService::class);
        $this->app->singleton(ILocationsService::class, LocationsService::class);
        $this->app->singleton(IDepartmentsService::class, DepartmentsService::class);

        $this->app->singleton(IRedisService::class, RedisService::class);
        $this->app->singleton(IMailService::class, MailService::class);
        $this->app->singleton(IRecruitsService::class, RecruitsService::class);
        #endregion
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //pass data to GioHangPartial
        View::composer('Partital_Share/GioHangPartial', function ($view) {
            $count = 0;
            if (Cookie::get('cart') == null) {
                $count = 0;
            } else {
                $items = json_decode(Cookie::get('cart'), true);
                //dd($items, Cookie::get('cart'));
                if ($items != null) {
                    $count = count($items);
                } else {
                    $count = 0;
                }
            }
            $view->with(['numberitem' => $count]);
        });

        //pass data to loginPartial
        View::composer('Partital_Share/loginPartial', function ($view) {
            $user = session()->get('user');

            if (!isset($user)) {
                $login = false;
                $name = "";
            } else {
                $login = true;
                $name = $user->name;
            }

            $view->with(['login' => $login, 'name' => $name]);
        });

        View::composer('Partital_Share/HeaderPartial', function ($view) {
            $Scocial_Media = WEBSITEATTRIBUTES::where('Type', 'Scocial_Media')->get();

            $view->with(['Scocial_Media' => $Scocial_Media]);
        });

        // View::composer('Partital_Share/GGAnalyticsPartial', function ($view) {
        //     $GgAnalytics = WEBSITEATTRIBUTES::where('Type', 'GoogleAnalytics')->get();

        //     $view->with(['GgAnalytics' => $GgAnalytics]);
        // });

        View::composer('Partital_Share/HotLinePartial', function ($view) {
            $Scocial_Media = WEBSITEATTRIBUTES::where('Type', 'Scocial_Media')->get();
            foreach ($Scocial_Media as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }
            }

            $view->with(['Scocial_Media' => $Scocial_Media]);
        });

        View::composer('Partital_Share/QuangCaoPartial', function ($view) {
            $Scocial_Media = WEBSITEATTRIBUTES::where('Type', 'Scocial_Media')->get();
            $check = "";

            foreach ($Scocial_Media as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                if ($val->Description == 'banner_1') {
                    $check = $val;
                }
            }

            $data = [
                'Scocial_Media' => $Scocial_Media,
                'check' => $check,
            ];

            $view->with($data);
        });

        View::composer('Partital_Share/QuangCao2Partial', function ($view) {
            $Scocial_Media = WEBSITEATTRIBUTES::where('Type', 'Scocial_Media')->get();
            $check = "";

            foreach ($Scocial_Media as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                if ($val->Description == 'banner_3') {
                    $check = $val;
                }
            }

            $data = [
                'Scocial_Media' => $Scocial_Media,
                'check' => $check,
            ];

            $view->with($data);
        });

        View::composer('Partital_Share/ChungNhanPartial', function ($view) {
            $Scocial_Media = WEBSITEATTRIBUTES::where('Type', 'Scocial_Media')->get();
            $lst = [];
            foreach ($Scocial_Media as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                if (str::contains($val->Description, 'chungnhan')) {
                    $lst[] = $val;
                }
            }

            $view->with(['Scocial_Media' => $lst]);
        });

        View::composer('Partital_Share/LogoPartial', function ($view) {
            $Scocial_Media = WEBSITEATTRIBUTES::where('Type', 'Scocial_Media')->get();
            $lst = [];
            foreach ($Scocial_Media as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                if (str::contains($val->Description, 'logo')) {
                    $lst[] = $val;
                }
            }

            $view->with(['Scocial_Media' => $lst]);
        });

        View::composer('_LayoutShare._layouthome', function ($view) {
            $Scocial_Media = WEBSITEATTRIBUTES::where('Type', 'Scocial_Media')->get();
            $lst = [];
            foreach ($Scocial_Media as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;

                    if ($val->Value == $strURL) {
                        $val->Value = null;
                    }
                }

                if (str::contains($val->Description, 'footer')) {
                    $lst[] = $val;
                }
            }

            $GgAnalytics = WEBSITEATTRIBUTES::where('Type', 'GoogleAnalytics')->get();

            $data = [
                'GgAnalytics' => $GgAnalytics,
                'Scocial_Media' => $lst,
            ];

            $view->with($data);
        });

        View::composer('Partital_Share/RightMenuBlogPartial', function ($view) {
            $Scocial_Media_image = WEBSITEATTRIBUTES::where([['Type', 'Scocial_Media'], ['Description', '=', 'banner_4']])->get();
            $Scocial_Media_link = WEBSITEATTRIBUTES::where([['Type', 'Scocial_Media'], ['Description', '=', 'link_banner_4']])->get();
            // $lst = [];
            foreach ($Scocial_Media_image as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                // if (str::contains($val->Description, 'footer')) {
                //     $lst[] = $val;
                // }
            }

            $BlogCategories = [];
            for ($i = 17; $i <= 20; $i++) {
                $item = BLOGCATEGORIES::where([['Id', '=', $i]])->get();
                $BlogCategories[] = $item[0];
            }

            $data = [
                'BlogCategories' => $BlogCategories,
                'image' => $Scocial_Media_image[0],
                'link' => $Scocial_Media_link[0],
            ];
            $view->with($data);
        });

        View::composer('Partital_Share/RightMenuShopPartial', function ($view) {
            $Scocial_Media_image = WEBSITEATTRIBUTES::where([['Type', 'Scocial_Media'], ['Description', '=', 'banner_4']])->get();
            $Scocial_Media_link = WEBSITEATTRIBUTES::where([['Type', 'Scocial_Media'], ['Description', '=', 'link_banner_4']])->get();
            // $lst = [];
            foreach ($Scocial_Media_image as $val) {
                //Cắt chuỗi lấy tên ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                // if (str::contains($val->Description, 'footer')) {
                //     $lst[] = $val;
                // }
            }

            $ProductCategories = PRODUCTCATEGORIES::where([['Position', '10']])->get();

            $data = [
                'ProductCategories' => $ProductCategories,
                'image' => $Scocial_Media_image[0],
                'link' => $Scocial_Media_link[0],
            ];

            $view->with($data);
        });

        View::composer('Partital_Share/nav', function ($view) {
            $chuyenKhoa = BLOGS::where([['BlogCategoryId ', '=', 16], ['Deleted', false]])->get();
            $dichVu = BLOGS::where([['BlogCategoryId ', '=', 15], ['Deleted', false]])->get();

            $data = [
                'chuyenKhoa' => $chuyenKhoa,
                'dichVu' => $dichVu,
            ];

            $view->with($data);
        });

        View::composer('Partital_Share/NewProdPartial', function ($view) {
            $newProduct = PRODUCTS::where([['Deleted', false]])->get();
            $newProduct =  $newProduct->sortbydesc('DateCreated')->take(6);
            $env = env('URLIMAGE');

            foreach ($newProduct as $val) {
                $val->ProductImage = $env . $val->ProductImage;
                if ($val->ProductImage == $env) {
                    $val->ProductImage = null;
                }
            }

            $data = [
                'newProduct' => $newProduct,
            ];

            $view->with($data);
        });
    }
}
