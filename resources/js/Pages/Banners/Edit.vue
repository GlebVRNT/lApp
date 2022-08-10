<script setup>
    import { Link, useForm } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue';

    const props = defineProps({
        banner: Object,
    })

    const form = useForm({
        name: props.banner.name,
        target_url: props.banner.target_url,
        img_url: props.banner.img_url,
        cpm: props.banner.cpm,
        views_limit: props.banner.views_limit,
    })

    const update = () => {
        form.put(route('banners.update', props.banner.id))
    }
</script>

<template>
    <AppLayout title="Edit Banner">
        <h1 class="mb-8 text-3xl font-bold">
            <Link class="text-indigo-400 hover:text-indigo-600" :href="route('banners.index')">Back to Banners</Link>
            <span class="text-indigo-400 font-medium">/</span>
            {{ banner.name }}
        </h1>

        <div class="mx-auto w-full max-w-[550px]">
            <form @submit.prevent="update">
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Name</label>
                    <input placeholder="Name" type="text" v-model="form.name"
                           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Target URL</label>
                    <input placeholder="Link" type="text" v-model="form.target_url"
                           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Img URL</label>
                    <input placeholder="Image link" type="text" v-model="form.img_url"
                           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">CPM</label>
                    <input placeholder="'Cost per mile'" type="text" v-model="form.cpm"
                           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Views Limit</label>
                    <input placeholder="Views limit" type="text" v-model="form.views_limit"
                           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                </div>

                <div>
                    <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                        type="submit">Submit
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
