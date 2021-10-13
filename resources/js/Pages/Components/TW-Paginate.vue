<template>
    <!--    <div v-if="items.links.length > 3">-->
    <nav role="navigation" aria-label="{{ 'Pagination Navigation' }}" class="flex items-center justify-between px-5 py-3">
        <div class="flex flex-1 justify-between sm:hidden">
            <span v-if="!items?.prev_page_url"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">&laquo; Previous</span>
            <Link v-else :href="items?.prev_page_url"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                &laquo;&nbsp;Previous
            </Link>
            <Link v-if="items?.next_page_url" :href="items?.next_page_url"
                  class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Next&nbsp;&raquo;
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
            <div class="relative z-0 inline-flex shadow-sm rounded-md">
                <!-- Previous Page Link -->
                <div v-if="!items?.prev_page_url" aria-disabled="true" aria-label="previous">
                    <div
                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <Link v-else :href="items.prev_page_url" rel="prev"
                      class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                      aria-label="{{ __('pagination.previous') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"/>
                    </svg>
                </Link>
                <!--Pagination Elements-->
                <!--"Three Dots" Separator-->
                <div v-for="(link,index) in items.links" :key="index">
                    <Link v-if="link.label.length <10" :href="link.url"
                          class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5
                          hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300
                          active:bg-gray-100 active:text-white transition ease-in-out duration-150"
                          :class="{'text-white bg-indigo-500 border-indigo-500 border-indigo-500 transition ease-in-out' : link.active}"
                          v-html="link.label"/>
                </div>
                <Link v-if="items.next_page_url" :href="items.next_page_url" rel="next"
                      class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                      aria-label="{{ __('pagination.next') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"/>
                    </svg>
                </Link>
                <div v-else aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <div
                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import {defineComponent} from "vue";

export default defineComponent({
    components: {
        Link,
    },
    inject: ['items'],

})

</script>
