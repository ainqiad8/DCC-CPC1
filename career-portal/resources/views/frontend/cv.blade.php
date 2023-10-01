@extends('frontend.layouts.app')
@section('content')
    <!-- herosection start from here  -->
    <div>
        <div class="container mx-auto">
            <div class="grid grid-cols-2 flex items-center ">
                <div class="col-span-2 md:col-span-1">
                    <img class="bg-cover" src="{{asset('frontend/assets/herosection/worried.jpg')}}" alt="" srcset="">
                </div>
                <div class="col-span-2 md:col-span-1 p-4">
                    <h1 class="text-4xl font-bold text-gray-600 tracking-wide">Are you Wor<span class="text-red-500">ried
                            ?</span></h1>
                    <h2 class="text-sm text-gray-600 py-3 ">How to Write a Good CV <span
                            class="text-red-500 text-xl ">?</span></h2>
                    <p class="text-gray-600 text-justify">Our Website contains thousands of CV
                        examle.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente
                        impedit quia accusamus aliquam consequatur debitis iusto, dolores minus
                        soluta maiores officiis sit? Eligendi at quas dolores in deleniti,
                        provident ea.
                        Totam pariatur perspiciatis deleniti qui. Dignissimos, nisi? Ipsam a
                        aliquam accusantium ullam earum expedita nam praesentium animi obcaecati
                        iure repellendus exercitationem hic, ipsum sapiente, consequuntur rerum
                        fugit est non quas.
                        Incidunt autem fugiat nemo nobis sed libero reprehenderit mollitia
                        dignissimos! Non ut necessitatibus commodi quisquam maiores voluptates
                        inventore, iure nisi facilis eum ipsum, odit deleniti blanditiis
                        architecto molestias accusantium eius?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- herosection ends here  -->
    <div class="mb-6">
        <div class="container mx-auto">
            <h1 class="text-center py-3  mb-6 font-bold text-xl  ">Examples of CURRICULUM VITAE (CV) </h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 md:grid-cols-3 gap-2 px-4">
                @foreach ($cvs as $cv) 
                    <div
                        class="group flex gap-2 border border-border__primary hover:border-primary rounded-md overflow-hidden  ">
                        <div
                            class=" text-primary w-24 h-24 flex items-center justify-center   border-r border-border__primary group-hover:border-primary">
                            <i class="fa-regular fa-file-lines text-5xl"></i>
                        </div>
                        <div class="p-2">
                            <a class="text-primary hover:text-secondary font-semibold capitalize " href="{{asset('storage/cvs/'.$cv->file)}}" download>{{$cv->title}}</a>
                            <p class="text-gray-500 capitalize text-sm"> version : {{$cv->version}}</p>
                        </div>
                    </div>
                @endforeach
               
              
            </div>
        </div>
    </div>
@endsection
