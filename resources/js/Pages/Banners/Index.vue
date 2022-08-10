<script setup>
    import { Inertia } from '@inertiajs/inertia';
    import { Link } from "@inertiajs/inertia-vue3"
    import AppLayout from "@/Layouts/AppLayout.vue"
    import Pagination from "@/Pages/Shared/Pagination.vue"

    const props = defineProps({
        banners: Object,
    })

    const destroy = (id) => {
        Inertia.delete(route("banners.destroy", id))
    }
</script>

<template>
    <AppLayout title="Banners">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2"></div>
                <!-- component -->
                <div class="bg-white p-8 rounded-md w-full">
                    <div class="flex items-center justify-between pb-6">
                        <div>
                            <h2 class="text-gray-600 font-semibold">
                                Banners
                            </h2>
                            <span class="text-xs">All banners</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex bg-gray-50 items-center p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <input class="bg-gray-50 outline-none ml-1 block" type="text" name="" id=""
                                       placeholder="search..."/>
                            </div>
                            <div class="lg:ml-40 ml-10 space-x-8">
                                <a
                                    :href="route('banners.create')"
                                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer hover:bg-indigo-500">
                                    Create Banner
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Target url
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Img url
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            CPM
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Views limit
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="banner in banners.data" :key="banner.id"
                                        class="hover:bg-gray-100 focus-within:bg-gray-100">
                                        <td class="border-t px-5 py-3">
                                            {{ banner.id }}
                                        </td>
                                        <td class="border-t px-5 py-3">
                                            {{ banner.name }}
                                        </td>
                                        <td class="border-t px-5 py-3">
                                            {{ banner.target_url }}
                                        </td>
                                        <td class="border-t px-5 py-3">
                                            <img :src="banner.img_url" alt="" class="w-20">
                                        </td>
                                        <td class="border-t px-5 py-3">
                                            {{ banner.cpm }}
                                        </td>
                                        <td class="border-t px-5 py-3">
                                            {{ banner.views_limit }}
                                        </td>
                                        <td class="border-t px-5 py-3">
                                            <Link class="text-green-700" :href="route('banners.edit', banner.id)">
                                                Edit
                                            </Link>
                                            <button @click="destroy(banner.id)" class="text-red-700">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
									<span class="text-xs xs:text-sm text-gray-900">
										<Pagination class="mt-6" :links="banners.links"/>
									</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
