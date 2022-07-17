<template>
    <!-- component -->
    <div class="flex items-center justify-center p-12">
    
        <div class="mx-auto w-full max-w-[550px]">
            <form action="/banners" method="GET">
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Name</label>
                    <input placeholder="Name"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">User ID</label>
                    <input placeholder="Your ID"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Target URL</label>
                    <input placeholder="Link"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Img URL</label>
                    <input placeholder="Image link"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">CPM</label>
                    <input
                    placeholder="'Cost per mile'"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Views Limit</label>
                    <input placeholder="Views limit"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div>
                    <button class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>