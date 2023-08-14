<script>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Pages/Layout.vue'

export default {
    layout: Layout,
    mounted: function(){
        document.title = "ブックマーク一覧";
    },
}
</script>

<script setup>
defineProps({ bookmarks: Array })
</script>

<template>
    <div>
        <h2 class="text-lg border-b p-2">
            <Link :href="route('bookmark.index')" class="text-blue-700 underline">
            ブックマーク一覧
            </Link>
        </h2>
        <ul class="list-disc list-inside p-2">
            <li v-for="bookmark in bookmarks">
                <a :href="bookmark.url" target=_blank class="text-blue-700" >{{ bookmark.title }}</a>
            </li>
        </ul>
    </div>
</template>