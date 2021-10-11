<template>
    <div v-if="items.links.length > 3">
        <div class="flex flex-wrap justify-between sm:justify-end p-3 sm:p-4 pt-4">
            <!--TODO PAGİNATİON SOLKENAR-->
            <div v-if="items?.prev_page_url === null" class="ml-1 px-3 py-2 text-sm text-gray-400 border rounded">
                <span class="sr-only">Previous</span>
                <ChevronLeftIcon class="h-5 w-5" aria-hidden="true"/>
            </div>
            <Link v-else
                  class="ml-1 px-3 py-2 text-sm border rounded hover:bg-white hover:border-indigo-500 hover:text-indigo-500 focus:bg-white focus:border-indigo-500 focus:text-indigo-500"
                  :href="items.prev_page_url">
                <span class="sr-only">Previous</span>
                <ChevronLeftIcon class="h-5 w-5" aria-hidden="true"/>
            </Link>
            <!--TODO PAGİNATİON ORTA ALAN-->
            <template v-for="(link, index) in items.links" :key="index">
                <div v-if="items.last_page < 8">
                    <div v-if="link.label.length <10">
                        <Link class="ml-1 px-3 py-2 text-sm border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                              :class="{'bg-blue-700 text-white': link.active, 'hidden sm:flex items-center' : link?.label.length < 3}" :href="link.url" v-html="link.label"/>
                    </div>
                </div>
                <div v-else>
                    <div v-if="link.label.length <10">
                        <div
                            v-if="((index <= 5 && items.current_page <5) || (index >=items.last_page-4 && items.current_page > items.last_page-4)) || index === 1 || index == items.current_page-1 || index == items.current_page || index == items.current_page +1 || index == items.last_page">
                            <Link
                                class="ml-1 px-3 py-2 text-sm border rounded hover:bg-white hover:border-indigo-500 hover:text-indigo-500 focus:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                :class="{ 'bg-blue-700 text-white': link.active,  'hidden sm:flex items-center' : link?.label.length < 3}" :href="link.url" v-html="link.label"/>
                        </div>
                        <div v-else-if="(index == 2 && items.current_page > 3) || (index == items.last_page-1 && items.current_page < items.last_page-2)"
                             class="ml-1 px-3 py-2 hidden sm:flex sm:justify-center sm:items-center text-sm text-gray-400 border rounded" v-text="'...'"/>
                    </div>
                </div>
            </template>
            <!--TODO PAGİNATİON SAĞKENAR-->
            <div v-if="items?.next_page_url === null" class=" ml-1 px-3 py-2 text-sm text-gray-400 border rounded">
                <span class="sr-only">Next</span>
                <ChevronRightIcon class="h-5 w-5" aria-hidden="true"/>
            </div>
            <Link v-else
                  class="ml-1 px-3 py-2 text-sm border rounded hover:bg-white hover:border-indigo-500 hover:text-indigo-500 focus:bg-white focus:border-indigo-500 focus:text-indigo-500"
                  :href="items?.next_page_url">
                <span class="sr-only">Next</span>
                <ChevronRightIcon class="h-5 w-5" aria-hidden="true"/>
            </Link>
        </div>
    </div>
</template>
<script>

import {Link} from "@inertiajs/inertia-vue3";
import {ChevronLeftIcon, ChevronRightIcon} from '@heroicons/vue/solid'

export default {
    props: {
        items: Object
    },
    components: {
        Link,
        ChevronLeftIcon,
        ChevronRightIcon,
    },
}

</script>
