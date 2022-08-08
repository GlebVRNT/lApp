<template>
    <div>

        <Head :title="form.name" />
        <h1 class="mb-8 text-3xl font-bold">
            <Link class="text-indigo-400 hover:text-indigo-600" href="/banners">Banners</Link>
            <span class="text-indigo-400 font-medium">/</span>
            {{ form.name }}
        </h1>

        <div class="mx-auto w-full max-w-[550px]">
            <form @submit.prevent="update">
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Name</label>
                    <input placeholder="Name" type="text" v-model="form.name"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">User ID</label>
                    <input placeholder="Your ID" type="text" v-model="form.user_id"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Target URL</label>
                    <input placeholder="Link" type="text" v-model="form.target_url"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Img URL</label>
                    <input placeholder="Image link" type="text" v-model="form.img_url"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">CPM</label>
                    <input placeholder="'Cost per mile'" type="text" v-model="form.cpm"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">Views Limit</label>
                    <input placeholder="Views limit" type="text" v-model="form.views_limit"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                        type="submit">Submit</button>
                </div>
            </form>
        </div>

        <div class="mt-6 bg-white rounded shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">

            </table>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Head,
        Link
    },

    props: {
        banner: Object,
    },

    remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
                name: this.banner.name,
                user_id: this.banner.user_id,
                target_url: this.banner.target_url,
                img_url: this.banner.img_url,
                cpm: this.banner.cpm,
                views_limit: this.banner.views_limit,
            }),
        }
    },

    methods: {
        update() {
            this.form.put(`/banners/${this.banner.id}`)
        },

        destroy() {
            if (confirm('Are you sure you want to delete this banner?')) {
                this.$inertia.delete(`/banners/${this.banner.id}`)
            }
        },
        restore() {
            if (confirm('Are you sure you want to restore this banner?')) {
                this.$inertia.put(`/banners/${this.banner.id}/restore`)
            }
        },
    },
}
</script>