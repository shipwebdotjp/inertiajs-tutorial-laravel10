<script setup>
import { ref } from "vue";
import { Link, Head, usePage } from '@inertiajs/vue3'

const page = usePage()
defineProps({ title: String })
const searchWord = ref('');
</script>

<template>
    <Head :title="title" />
    <main>
        <header class="bg-gray-100">
            <Link href="/" class="text-blue-700 underline m-2">Home</Link>
            <Link href="/HelloWorld" class="text-blue-700 underline m-2">HelloWorld</Link>
            <Link :href="route('bookmark.index')" class="text-blue-700 underline m-2">ブックマーク一覧</Link>
            <input type=text name=search v-model="searchWord" size=15 class="p-1 m-1 text-sm" />
            <Link as="button" method="get" :href="route('bookmark.search',{queryWord: searchWord})" preserve-state class="border border-gray-400 m-1 p-1 text-sm">ブックマーク検索</Link>
        </header>
        <article class="max-w-screen-sm">
            <div v-if="page.props.flash.message" class="bg-green-200 p-2 m-1">
                {{ page.props.flash.message }}
            </div>
            <slot />
        </article>
    </main>
</template>