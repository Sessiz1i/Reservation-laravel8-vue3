<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap justify-center sm:justify-end items-center -mr-1">
            <template v-for="(link, key) in links">
                <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label"/>
                <Link v-else :key="Math.ceil(Math.random()*10000)"
                      class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded
                              hover:border-indigo-500 hover:text-indigo-500 focus:border-indigo-500 focus:text-indigo-500"
                      :class="{'bg-indigo-500 text-white hover:text-white hover:text-white' : link.active }"
                      :href="link.url" v-html="link.label"/>
            </template>
        </div>
    </div>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3";

export default {
    props: {
        links: Array,
    },
    components: {
        Link,
    },
    mounted() {
        console.log(this.links)
    }
}
</script>
