@extends('frontend.layouts.app')
@section('content')
    <!-- carusel section start from here -->
    <div>
        <div class="container mx-auto">
            <div class="swiper langindPageSwipper">
                <div class="swiper-wrapper">
                    @foreach ($carousels as $carousel)
                        <div class="swiper-slide ">
                            <img src="{{ asset('storage/carousels/' . $carousel->image) }}" alt="{{ $carousel->caption }}">
                            <p class="absolute text-primary bottom-12 capitalize">{{ $carousel->caption }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                <div class="autoplay-progress">
                    <svg viewBox="0 0 48 48">
                        <circle cx="24" cy="24" r="20"></circle>
                    </svg>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <!-- carusel section ends here -->

    <!-- hero section start  -->
    <div>
        <div class="container mx-auto py-12">
            <div class="grid grid-cols-4 items-center ">
                <div class="col-span-4 sm:col-span-2 p-4">
                    <div class="pb-4">
                        <h3 class="font-bold text-lg  capitalize text-left mt-3">Prof. MD Hasib Bhuiyan</h3>
                        <h3 class="text-xs capitalize text-left mt-1">Dhaka City College , Dhaka</h3>
                    </div>

                    <p class="text-justify ">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere corporis repellendus, quae suscipit
                        pariatur
                        debitis distinctio dignissimos possimus quisquam? Possimus explicabo commodi molestiae suscipit
                        consectetur
                        voluptas perspiciatis esse deserunt dolore.
                        Labore, voluptatum architecto sapiente dignissimos quae fuga ipsam odit fugit doloribus consequatur
                        accusantium quisquam. Iure labore est modi aspernatur eum, eos repellat fuga praesentium ab facilis
                        tempora
                        dolores, quo odit!
                        Ipsam, molestias hic recusandae quisquam itaque deleniti dicta voluptate ad sit nam velit nisi
                        maxime quod
                        eveniet modi eius corrupti sequi sunt unde doloremque nesciunt sapiente? Eum quam quo cum.
                    </p>
                </div>
                <div class="col-span-4 sm:col-span-2 ">
                    <div class="">
                        <img class="bg-cover" src="{{asset('frontend/assets/herosection/principal.jpg')}}" alt="">
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- hero section end  -->


    <!-- herosection 2 start from here  -->
    <div>
        <div class="container mx-auto">
            <div class="grid grid-cols-2 flex items-center ">
                <div class="col-span-2 md:col-span-1">
                    <img class="bg-cover" src="{{asset('frontend/assets/herosection/worried.jpg')}}" alt="" srcset="">
                </div>
                <div class="col-span-2 md:col-span-1 p-4">
                    <h1 class="text-4xl font-bold text-gray-600 tracking-wide">Are you Loo<span class="text-red-500">king
                            for Jobs
                            ?</span></h1>
                    <h2 class="text-sm text-gray-600 py-3 ">Not getting call for interview <span
                            class="text-red-500 text-xl ">?</span></h2>
                    <p class="text-gray-600 text-justify">Our Website contains thousands of CV
                        examle.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente impedit quia accusamus aliquam
                        consequatur debitis iusto, dolores minus soluta maiores officiis sit? Eligendi at quas dolores in
                        deleniti,
                        provident ea.
                        Totam pariatur perspiciatis deleniti qui. Dignissimos, nisi? Ipsam a aliquam accusantium ullam earum
                        expedita nam praesentium animi obcaecati iure repellendus exercitationem hic, ipsum sapiente,
                        consequuntur
                        rerum fugit est non quas.
                        Incidunt autem fugiat nemo nobis sed libero reprehenderit mollitia dignissimos! Non ut
                        necessitatibus
                        commodi quisquam maiores voluptates inventore, iure nisi facilis eum ipsum, odit deleniti blanditiis
                        architecto molestias accusantium eius?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- herosection 2 ends here  -->
@endsection
