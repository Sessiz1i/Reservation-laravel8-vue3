<template>
    <div v-if="items.links.length > 3">
        <div class="flex items-center justify-between border-gray-200 bg-white">
            <div class="flex-1 flex justify-between sm:hidden px-4 py-3">
                <div v-if="items?.prev_page_url === null" class="ml-1 px-3 py-2 text-sm text-gray-400 border rounded">
                    <span>&laquo;&nbsp;Previous</span>
                </div>
                <Link v-else
                      class="ml-1 px-3 py-2 text-sm border rounded hover:bg-white hover:border-indigo-500 hover:text-indigo-500 focus:bg-white focus:border-indigo-500 focus:text-indigo-500"
                      :href="items.prev_page_url">
                    <span>&laquo;&nbsp;Previous</span>
                </Link>
                <div v-if="items?.next_page_url === null" class=" ml-1 px-3 py-2 text-sm text-gray-400 border rounded">
                    <span>Next&nbsp;&raquo;</span>
                </div>
                <Link v-else
                      class="ml-1 px-3 py-2 text-sm border rounded hover:bg-white hover:border-indigo-500 hover:text-indigo-500 focus:bg-white focus:border-indigo-500 focus:text-indigo-500"
                      :href="items?.next_page_url">
                    <span>Next&nbsp;&raquo;</span>
                </Link>
            </div>
        </div>
        <div class="hidden sm:flex sm:flex-wrap sm:justify-end px-4 py-3">&nbsp;
            <!--TODO PAGİNATİON UZUN-->
            <template v-for="(link, index) in items.links" :key="index">
                <div class="flex items-center">
                    <div v-if="link.url === null" class="ml-1 px-3 py-2 text-sm text-gray-400 border rounded">
                        <div v-if="link.label.includes('Previous')">
                            <span class="sr-only">Previous</span>
                            <ChevronLeftIcon class="h-5" aria-hidden="true"/>
                        </div>
                        <div v-else-if="link.label.includes('Next')">
                            <span class="sr-only">Next</span>
                            <ChevronRightIcon class="h-5" aria-hidden="true"/>
                        </div>
                    </div>
                    <div v-else>
                        <Link v-if="((index <=5 && items.current_page <5) || index <=1) ||
                                ((index >=items.links.length-6 && items.current_page > items.links.length-5) || index >= items.links.length-2) ||
                                link.label == items.current_page-1|| link.label == items.current_page|| link.label == items.current_page+1 ||
                                (link.label == items.links.length-3 && items.current_page >= items.links.length-5)"
                              class="flex ml-1 px-3 py-2 text-sm border rounded hover:bg-white hover:border-indigo-500 hover:text-indigo-500 focus:bg-white focus:border-indigo-500 focus:text-indigo-500"
                              :class="{ 'bg-blue-700 text-white': link.active,  'hidden sm:flex items-center' : link?.label.length < 3,'ml-1 px-3 py-2 text-sm text-gray-400 border rounded': !link.url}"
                              :href="link.url">
                            <div v-if="link.label.includes('Previous')">
                                <span class="sr-only">Previous</span>
                                <ChevronLeftIcon class="h-5" aria-hidden="true"/>
                            </div>
                            <div v-else-if="link.label.includes('Next')">
                                <span class="sr-only">Next</span>
                                <ChevronRightIcon class="h-5" aria-hidden="true"/>
                            </div>
                            <span v-else>{{ link.label }}</span>
                        </Link>
                        <div v-else-if="(link.label == 2 && items.current_page > 3) || (link.label == items.links.length-3)"
                             class="ml-1 px-3 py-2 hidden sm:flex sm:justify-center sm:items-center text-sm text-gray-400 border rounded" v-text="'...'"/>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>
<script>

import {Link} from "@inertiajs/inertia-vue3";
import {ChevronLeftIcon, ChevronRightIcon} from '@heroicons/vue/solid'

export default {
    components: {
        Link,
        ChevronLeftIcon,
        ChevronRightIcon,
    },
    created() {
      this.items= this.$page.props.items
    },
    data(){
        return{
            items:null
        }
    }
}

</script>
