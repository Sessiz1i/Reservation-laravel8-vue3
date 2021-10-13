<template>
    <div v-if="items.links.length > 3" class="flex items-center justify-between px-5 py-3">
        <div class="flex flex-1 justify-between sm:hidden">
            <span v-if="!items?.prev_page_url"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">&laquo; Previous</span>
            <Link v-else :href="items?.prev_page_url"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                &laquo; Previous
            </Link>
<!--TODO Sayfa kaynasını engelleme-->
            <Link v-if="items?.next_page_url" :href="items?.next_page_url" :preserveScroll="true"
                  class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Next &raquo;
            </Link>
            <span v-else
                  class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">Next &raquo;</span>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="text-sm text-gray-700 leading-5">
                <span>{{ 'Showing ' }}</span>
                <span class="font-medium">{{ items?.from }}</span>
                <span>{{ ' to ' }}</span>
                <span class="font-medium">{{ items?.to }}</span>
                <span>{{ ' of ' }}</span>
                <span class="font-medium">{{ items?.total }}</span>
                <span>{{ ' results' }}</span>
            </div>
            <div class="relative inline-flex">
                <template v-for="(link, index) in items.links" :key="index">
                    <div v-if="link.url === null" class="mb-1 px-4 py-2 rounded-full text-sm leading-4 text-gray-400 border"
                         v-html="label(link.label)"/>
                    <inertia-link v-else :preserveScroll="true"
                                  class="mb-1 px-4 py-2 rounded-full text-sm leading-4 border hover:bg-white focus:z-10 focus:border-indigo-500 focus:text-indigo-500"
                                  :class="{ 'bg-blue-700 border border-blue-700 hover:text-black text-white z-10': link.active }" :href="link.url" v-html="label(link.label)"/>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import {Link, InertiaLink} from "@inertiajs/inertia-vue3";
import {defineComponent} from "vue";

export default defineComponent({
    inject: ['items'],
    components: {
        Link,
        InertiaLink
    },
    data() {
        return {
            setLabel: null
        }
    },
    methods: {
        label(label) {
            if (label.includes('Previous')) {
                return `<svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="4 3 13 13">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"/>
                        </svg>`
            } else if (label.includes('Next')) {
                return `<svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="4 3 13 13">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"/>
                        </svg>`
            } else {
                return label
            }
        }
    }
})
</script>
