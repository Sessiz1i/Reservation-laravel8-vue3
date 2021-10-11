<template>
    <div v-if="links.links.length > 3">
        <div class="flex justify-between sm:justify-end p-3 sm:p-4 pt-4">
            <template v-for="(link, key) in links.links" :key="key">
                <div :class="{'hidden sm:flex items-center' : link?.label.length === 1}">
                    <div v-if="link.url === null" class="flex ml-1 px-4 py-3 text-sm text-gray-400 border rounded" v-html="link.label"/>
                    <Link v-else class="flex ml-1 px-4 py-3 text-sm border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                          :class="{ 'bg-blue-700 text-white': link.active}" :href="link.url" v-html="link.label"/>
                </div>
            </template>
            <span></span>
        </div>
    </div>
</template>
<script>

import {Link} from "@inertiajs/inertia-vue3";

export default {
    props: {
        links: Object
    },
    components: {
        Link
    }
}

</script>
