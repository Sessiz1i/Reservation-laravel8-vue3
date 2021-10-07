<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links">
                <div v-if="link.url === null" :key="Math.round(5)" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label"/>
                <inertia-link v-else :key="key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                              :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label"/>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        links: Array,
    },
    mounted() {
        console.log()
    }
}
</script>


<!--&lt;!&ndash; This example requires Tailwind CSS v2.0+ &ndash;&gt;-->
<!--<template>-->
<!--    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">-->
<!--        <div class="flex-1 flex justify-between sm:hidden">-->
<!--            <a class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"/>-->
<!--            Previous-->
<!--            <a class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">-->
<!--                Next-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">-->
<!--            <div>-->
<!--                <p class="text-sm text-gray-700">-->
<!--                    Showing-->
<!--                    {{ ' ' }}-->
<!--                    <span class="font-medium">{{ pageData.from }}</span>-->
<!--                    {{ ' ' }}-->
<!--                    to-->
<!--                    {{ ' ' }}-->
<!--                    <span class="font-medium">{{ pageData.to }}</span>-->
<!--                    {{ ' ' }}-->
<!--                    of-->
<!--                    {{ ' ' }}-->
<!--                    <span class="font-medium">{{ pageData?.total }}</span>-->
<!--                    {{ ' ' }}-->
<!--                    results-->
<!--                </p>-->
<!--            </div>-->
<!--            <div>-->
<!--                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">-->
<!--&lt;!&ndash;                    <a :href="pageData.prev_page_url"&ndash;&gt;-->
<!--&lt;!&ndash;                       class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="sr-only">Previous</span>&ndash;&gt;-->
<!--&lt;!&ndash;                        <ChevronLeftIcon class="h-5 w-5" aria-hidden="true"/>&ndash;&gt;-->
<!--&lt;!&ndash;                    </a>&ndash;&gt;-->
<!--                    &lt;!&ndash; Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600",-->
<!--                         Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" &ndash;&gt;-->
<!--                    <a v-for="link in pageData.links" :href="link.url" :aria-current="link.active ? 'page' : null"-->
<!--                      v-bind:class="isActive(link.active)" class="relative inline-flex items-center px-4 py-2 border text-sm font-medium">-->
<!--                        <span v-html="link.label"></span>-->
<!--                    </a>-->


<!--                    &lt;!&ndash;                    <a href="#" aria-current="page"&ndash;&gt;-->
<!--                    &lt;!&ndash;                       class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">&ndash;&gt;-->
<!--                    &lt;!&ndash;                        1&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </a>&ndash;&gt;-->
<!--                    &lt;!&ndash;                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">&ndash;&gt;-->
<!--                    &lt;!&ndash;                        2&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </a>&ndash;&gt;-->
<!--                    &lt;!&ndash;                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">&ndash;&gt;-->
<!--                    &lt;!&ndash;                        3&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </a>&ndash;&gt;-->
<!--                    &lt;!&ndash;                    <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">&ndash;&gt;-->
<!--                    &lt;!&ndash;            ...&ndash;&gt;-->
<!--                    &lt;!&ndash;          </span>&ndash;&gt;-->
<!--                    &lt;!&ndash;                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">&ndash;&gt;-->
<!--                    &lt;!&ndash;                        8&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </a>&ndash;&gt;-->
<!--                    &lt;!&ndash;                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">&ndash;&gt;-->
<!--                    &lt;!&ndash;                        9&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </a>&ndash;&gt;-->
<!--                    &lt;!&ndash;                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">&ndash;&gt;-->
<!--                    &lt;!&ndash;                        10&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </a>&ndash;&gt;-->
<!--&lt;!&ndash;                    <a :href="pageData.next_page_url"&ndash;&gt;-->
<!--&lt;!&ndash;                       class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="sr-only">Next</span>&ndash;&gt;-->
<!--&lt;!&ndash;                        <ChevronRightIcon class="h-5 w-5" aria-hidden="true"/>&ndash;&gt;-->
<!--&lt;!&ndash;                    </a>&ndash;&gt;-->
<!--                </nav>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--import {defineComponent} from 'vue'-->
<!--import {ChevronLeftIcon, ChevronRightIcon} from '@heroicons/vue/solid'-->

<!--export default defineComponent({-->
<!--    name: "Paginate",-->
<!--    props: ["pageData"],-->
<!--    components: {-->
<!--        ChevronLeftIcon,-->
<!--        ChevronRightIcon,-->
<!--    },-->
<!--    created() {-->
<!--        console.log(this.pageData)-->
<!--    },-->
<!--    data(){-->
<!--        return{-->

<!--        }-->
<!--    },-->
<!--    methods: {-->
<!--        isActive(active) {-->
<!--            return active-->
<!--                ? "z-10 bg-indigo-50 border-indigo-500 text-indigo-600"-->
<!--                : "bg-white border-gray-300 text-gray-500 hover:bg-gray-50"-->
<!--        },-->
<!--        getPage(){-->

<!--        }-->
<!--    }-->
<!--})-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->
