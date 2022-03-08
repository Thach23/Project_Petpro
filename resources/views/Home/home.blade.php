 @extends('_LayoutShare._layouthome',['Meta' => $Meta])
 @section('content')
     <main class="overflow-hidden">
         <!--End Content-->
         <!-- key visual -->
         <div id="kvCarousel" class="swiper">
             <div class="swiper-wrapper">
                 @foreach ($webAtribute as $item)
                     @if ($item->Description == 'slide_1' && $item->IsPublic == true && $item->Value != null)
                         <div class="relative swiper-slide">
                             @foreach ($webAtribute as $val)
                                 @if ($val->Description == 'slide_1')
                                     @if ($val->IsPublic == false || $val->Value == null)
                                     @else
                                         <img class="relative z-0 w-full" src="{{ $val->Value }}"
                                             alt="Hệ thống bệnh viện thú ý Pet-Pro">
                                     @endif
                                 @endif
                             @endforeach
                             <div
                                 class="absolute top-0 bottom-0 left-0 right-0 z-10 flex flex-col items-end justify-center w-full h-full px-[15px] sm:px-[30px] md:px-[80px] lg:px-35">
                                 <h3
                                     class="text-lg font-medium leading-6 text-right text-blue-200 capitalize md:leading-normal sm:text-3xl lg:text-5xl md:text-4xl">
                                     @foreach ($webAtribute as $val)
                                         @if ($val->Description == 'ten_1')
                                             {!! html_entity_decode($val->Value) !!}
                                         @endif
                                     @endforeach
                                 </h3>
                                 @foreach ($webAtribute as $val)
                                     @if ($val->Description == 'mota_1' && $val->IsPublic == true)
                                         <p class="mt-0 text-xs text-gray-600 sm:mt-2 sm:text-lg">{{ $val->Value }}</p>
                                     @endif
                                 @endforeach

                                 @foreach ($webAtribute as $val)
                                     @if ($val->Description == 'button1')
                                         @if ($val->IsPublic == true)
                                             @foreach ($webAtribute as $val_2)
                                                 @if ($val_2->Description == 'link_1')
                                                     <a class="relative mt-2 sm:mt-4 btn px-15 cus-btn"
                                                         href="{{ $val_2->Value }}">{{ $val->Value }}
                                                     </a>
                                                 @endif
                                             @endforeach
                                         @endif
                                     @endif
                                 @endforeach
                             </div>
                         </div>
                     @endif
                 @endforeach

                 @foreach ($webAtribute as $item)
                     @if ($item->Description == 'slide_2' && $item->IsPublic == true && $item->Value != null)
                         <div class="relative swiper-slide">
                             @foreach ($webAtribute as $val)
                                 @if ($val->Description == 'slide_2')
                                     @if ($val->IsPublic == false || $val->Value == null)
                                     @else
                                         <img class="relative z-0 w-full" src="{{ $val->Value }}"
                                             alt="Hệ thống bệnh viện thú ý Pet-Pro">
                                     @endif
                                 @endif
                             @endforeach
                             <div
                                 class="absolute top-0 bottom-0 left-0 right-0 z-10 flex flex-col items-end justify-center w-full h-full px-[15px] sm:px-[30px] md:px-[80px] lg:px-35">
                                 <h3
                                     class="text-lg font-medium leading-normal maxline-2 text-right text-blue-200 capitalize sm:text-3xl lg:text-5xl md:text-4xl">
                                     @foreach ($webAtribute as $val)
                                         @if ($val->Description == 'ten_2')
                                             {!! html_entity_decode($val->Value) !!}
                                         @endif
                                     @endforeach
                                 </h3>
                                 @foreach ($webAtribute as $val)
                                     @if ($val->Description == 'mota_2' && $val->IsPublic == true)
                                         <p class="mt-0 text-xs text-gray-600 sm:mt-2 sm:text-lg">{{ $val->Value }}</p>
                                     @endif
                                 @endforeach

                                 @foreach ($webAtribute as $val)
                                     @if ($val->Description == 'button2')
                                         @if ($val->IsPublic == true)
                                             @foreach ($webAtribute as $val_2)
                                                 @if ($val_2->Description == 'link_2')
                                                     <a class="relative mt-2 sm:mt-4 btn px-15 cus-btn"
                                                         href="{{ $val_2->Value }}">{{ $val->Value }}
                                                     </a>
                                                 @endif
                                             @endforeach
                                         @endif
                                     @endif
                                 @endforeach
                             </div>
                         </div>
                     @endif
                 @endforeach

                 @foreach ($webAtribute as $item)
                     @if ($item->Description == 'slide_3' && $item->IsPublic == true && $item->Value != null)
                         <div class="relative swiper-slide">
                             @foreach ($webAtribute as $val)
                                 @if ($val->Description == 'slide_3')
                                     @if ($val->IsPublic == false || $val->Value == null)
                                     @else
                                         <img class="relative z-0 w-full" src="{{ $val->Value }}"
                                             alt="Hệ thống bệnh viện thú ý Pet-Pro">
                                     @endif
                                 @endif
                             @endforeach
                             <div
                                 class="absolute top-0 bottom-0 left-0 right-0 z-10 flex flex-col items-end justify-center w-full h-full px-[15px] sm:px-[30px] md:px-[80px] lg:px-35">
                                 <h3
                                     class="text-lg font-medium leading-normal maxline-2 text-right text-blue-200 capitalize sm:text-3xl lg:text-5xl md:text-4xl">
                                     @foreach ($webAtribute as $val)
                                         @if ($val->Description == 'ten_3' && $val->IsPublic == true)
                                             {!! html_entity_decode($val->Value) !!}
                                         @endif
                                     @endforeach
                                 </h3>
                                 @foreach ($webAtribute as $val)
                                     @if ($val->Description == 'mota_3')
                                         <p class="mt-0 text-xs text-gray-600 sm:mt-2 sm:text-lg">{{ $val->Value }}</p>
                                     @endif
                                 @endforeach

                                 @foreach ($webAtribute as $val)
                                     @if ($val->Description == 'button3')
                                         @if ($val->IsPublic == true)
                                             @foreach ($webAtribute as $val_2)
                                                 @if ($val_2->Description == 'link_3')
                                                     <a class="relative mt-2 sm:mt-4 btn px-15 cus-btn"
                                                         href="{{ $val_2->Value }}">{{ $val->Value }}
                                                     </a>
                                                 @endif
                                             @endforeach
                                         @endif
                                     @endif
                                 @endforeach
                             </div>
                         </div>
                     @endif
                 @endforeach

             </div>
             <div class="swiper-pagination"></div>
         </div>
         <!-- cau chuyen petpro -->
         <div class="container py-12 mx-auto">
             <div class="text-center">
                 <h1 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">Câu
                     Chuyện Về PetPro
                 </h1>
                 <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="Câu Chuyện Về PetPro">
             </div>

             <!-- About pet pro -->
             @include('Partital_Share.CauChuyenPetProPartial',['CauChuyenblogs' => $CauChuyenblogs])

         </div>
         <!-- dich vu cap cuu -->
         @include('Partital_Share.HotLinePartial')

         <!-- chuyen khoa -->
         <div class="container relative mx-auto">
             <div class="py-10 md:py-20 md:px-5">
                 <div class="text-center">
                     <h2 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">
                         chuyên khoa
                     </h2>
                     <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="chuyên khoa">
                 </div>
                 @include('Partital_Share.ChuyenKhoaPartial' , ['ChuyenKhoablogs' => $ChuyenKhoablogs])
             </div>
         </div>

         <!-- counter -->
         @include('Partital_Share.CounterPartial')

         <!-- dich vu -->
         <div class="container relative mx-auto">
             <div class="py-10 md:py-20 md:px-5">
                 <div class="text-center">
                     <h2 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">dịch
                         vụ
                     </h2>
                     <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="dịch vụ">
                 </div>
                 @include('Partital_Share.DichVuPartial', ['DichVublogs' => $DichVublogs])
             </div>
         </div>

         <!-- chung nhan -->
         <div class="pr-0 pl-6 lg:pr-6 pt-8 pb-[50px]">
             <div class="mb-8 title">
                 <h2>các chứng nhận</h2>
                 <img src="/assets/icon-foot.48e78dce.svg" alt="các chứng nhận">
             </div>
             @include('Partital_Share.ChungNhanPartial')
         </div>

         <!-- kien thuc thu cung  -->
         <div class="relative pt-12 pb-[50px] bg-cover">
             <div class="title">
                 <h2>kiến thức</h2>
                 <img src="/assets/icon-foot.48e78dce.svg" alt="kiến thức">
             </div>
             @include('Partital_Share.TinTucPartial',['blogs' => $blogs])
         </div>

         <!-- khach hang -->
         @include('Partital_Share.LogoPartial')
     </main>

 @endsection
