<script setup>
    import { Link, useForm } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue';

    const form = useForm({
        name: null,
        target_url: null,
        img_url: null,
        cpm: null,
        views_limit: null,
    })

    const submit = () => {
        form.post(route("banners.store"))
    }
</script>

<template>
    <AppLayout title="Create Banner">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-5 md:mt-0 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-xl font-semibold text-gray-900">Add new banner</h3>
                    </div>
                    <div class="ml-4 mt-2 flex-shrink-0">
                        <Link :href="route('banners.index')"
                              class="relative inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Back to Banners
                        </Link>
                    </div>
                </div>

                <div class="mt-5">
                    <form action="#" method="POST" @submit.prevent="submit">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="banner-name"
                                               class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="banner-name"
                                               v-model="form.name"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md shadow-sm sm:text-sm border-gray-300"
                                               placeholder="My first banner">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="banner-target-url"
                                               class="block text-sm font-medium text-gray-700">Target URL</label>
                                        <input type="text" name="target_url" id="banner-target-url"
                                               v-model="form.target_url"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md shadow-sm sm:text-sm border-gray-300"
                                               placeholder="www.example.com">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="banner-image-url"
                                               class="block text-sm font-medium text-gray-700">Image URL</label>
                                        <input type="text" name="img_url" id="banner-image-url"
                                               v-model="form.img_url"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md shadow-sm sm:text-sm border-gray-300"
                                               placeholder="www.example.com/banner.jpg">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="banner-cpm"
                                               class="block text-sm font-medium text-gray-700">CPM</label>
                                        <input type="number" min="0" step="0.01" name="cpm" id="banner-cpm"
                                               v-model="form.cpm"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md shadow-sm sm:text-sm border-gray-300"
                                               placeholder="6.53">
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="banner-views-limit"
                                               class="block text-sm font-medium text-gray-700">Views limit</label>
                                        <input type="number" min="0" step="0.01" name="views_limit"
                                               id="banner-views-limit"
                                               v-model="form.views_limit"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md shadow-sm sm:text-sm border-gray-300"
                                               placeholder="10">
                                    </div>
                                </div>


                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Add banner
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
