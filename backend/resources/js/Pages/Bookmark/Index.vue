<script setup>
import { reactive, computed } from "vue";
import { Link, router, useForm } from '@inertiajs/vue3'
import Layout from '@/Pages/Layout.vue'

const props = defineProps({ 
    bookmarks: {
        type: Array
    }, 
    errors: {
        type: Object
    }
});
const form = useForm({
    title: null,
    url: null,
});

const submit = () => {
    form
    .transform((data) => ({
        ...data,
        title: data.title ? data.title : '無題',
    }))
    .post(route('bookmark.store'));
    console.log("form posted");
}
</script>

<template>
    <Layout title="ブックマーク一覧">
        <h2 class="text-lg border-b p-2">
            <Link :href="route('bookmark.index')" class="text-blue-700 underline">
            ブックマーク一覧
            </Link>
        </h2>
        <ul class="list-disc list-inside p-2">
            <li v-for="bookmark in bookmarks" class="list-none flex justify-between">
                <a :href="bookmark.url" target=_blank class="text-blue-700" >{{ bookmark.title }}</a>
                <Link as="button" method="delete" :href="route('bookmark.delete',bookmark.id)" preserve-scroll :only="['bookmarks']" class="border border-red-400 m-1 p-1 text-sm text-red-400">削除</Link>
            </li>
        </ul>
        <form @submit.prevent="submit">
            <h3 class="border-l-4 p-1">ブックマーク追加</h3>
            <div class="flex w-full">
                <div class="w-20 text-right bg-gray-200 text-sm p-1 m-1">タイトル</div>
                <div class="w-40">
                    <input type=text v-model="form.title" size=15 class="p-1 m-1 text-sm w-full border" />
                </div>
                <div v-if="form.errors.title" class="p-1 m-1 text-sm text-red-400">{{ form.errors.title }}</div>
            </div>
            <div class="flex w-full">
                <div class="w-20 text-right bg-gray-200 text-sm p-1 m-1">URL</div>
                <div class="w-40">
                    <input type=text v-model="form.url" size=15 class="p-1 m-1 text-sm w-full border" />
                </div>
                <div v-if="form.errors.url" class="p-1 m-1 text-sm text-red-400">{{ form.errors.url }}</div>
            </div>
            <button type="submit" class="border border-gray-400 m-1 p-1 text-sm" :disabled="form.processing" v-bind:class="{'cursor-not-allowed': form.processing}">ブックマーク追加</button>
            <button v-if="form.processing" @click="form.cancel()" type="button" class="border bg-red-200 m-1 p-1 text-sm">送信中止</button>
            <button @click="form.reset()" type="reset" class="border bg-gray-200 m-1 p-1 text-sm" :disabled="!form.isDirty" v-bind:class="{'cursor-not-allowed': !form.isDirty}">リセット</button>
            <button @click="form.defaults()" type="button" class="border bg-gray-200 m-1 p-1 text-sm" :disabled="!form.isDirty" v-bind:class="{'cursor-not-allowed': !form.isDirty}">初期値として設定</button>
            <div v-if="form.recentlySuccessful" class="p-1 m-1 bg-green-200">送信が完了しました。</div>
        </form>
    </Layout>
</template>