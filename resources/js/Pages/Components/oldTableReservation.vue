<template>
    <div>
        <div v-for="item in items" :key="item">
            {{ item.name }}
        </div>
        <paginate :links="items.links" />
    </div>
</template>

<script>


import Paginate from "@/Pages/Components/Paginate";
export default {
    components: {
        Paginate
    },
    props: {
        items: Object,
    },
}
</script>





<!-- This example requires Tailwind CSS v2.0+ -->
<!--<template>-->
<!--    <div class="flex flex-col">-->
<!--        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">-->
<!--            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">-->
<!--                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">-->
<!--                    <table class="min-w-full divide-y divide-gray-200">-->
<!--                        <thead class="bg-gray-50">-->
<!--                        <tr>-->
<!--                            <th scope="col" class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
<!--                                Name-->
<!--                            </th>-->
<!--                            <th scope="col" class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
<!--                                Date-->
<!--                            </th>-->
<!--                            <th scope="col" class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
<!--                                Status-->
<!--                            </th>-->
<!--                            <th scope="col" class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
<!--                                Role-->
<!--                            </th>-->
<!--                            <th scope="col" class="border px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
<!--                                Edit-->
<!--                            </th>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody class="bg-white divide-y divide-gray-200">-->
<!--                        <tr v-for="item in pageData.data" :key="item.email">-->
<!--                            <td class="px-6 py-4 whitespace-nowrap">-->
<!--                                <div class="flex items-center">-->
<!--                                    <div class="flex-shrink-0 h-10 w-10">-->
<!--                                        <img class="h-10 w-10 rounded-full" :src="user.profile_photo_url" :alt="user.name"/>-->
<!--                                    </div>-->
<!--                                    <div class="ml-4">-->
<!--                                        <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>-->
<!--                                        <div class="text-sm text-gray-500">{{ user.email }}</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                            <td class="px-6 py-4 w-60">-->
<!--                                <div class="ml-4 mr-1">-->
<!--                                    <div class="text-sm text-gray-900">{{ tableDate(item.date) }}</div>-->
<!--                                    <h1 class="text-sm text-gray-500">{{ item.hour.join(' ') }}</h1>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                            <td class="px-6 py-4 ">-->
<!--                                 <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">-->
<!--                                    Active-->
<!--                                 </span>-->
<!--                            </td>-->
<!--                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-->
<!--                                {{ item.role }}-->
<!--                            </td>-->
<!--                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium w-auto">-->
<!--                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        </tbody>-->
<!--                    </table>-->
<!--                    <paginate :pageData="this.pageData"-->
<!--                              :url="'http://reservation04102021.test/reservation'"-->
<!--                                :currentPage="this.pageData.current_page"-->
<!--                                :lastPage="this.pageData.last_page"-->
<!--                                :textOptions="{-->
<!--                                text: 'some text 123',-->
<!--                                position: 'top',-->
<!--                                'textClass': 'badge badge-primary'}"-->
<!--                                :ulClass="'relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50'"-->
<!--                                @pagination-update="paginationUpdate"/>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--import pagination from 'tb-vue3-laravel-lnertia-pagination'-->
<!--import Paginate from "@/Pages/Components/Paginate";-->
<!--import moment from "moment/moment";-->
<!--import { usePage } from '@inertiajs/inertia-vue3'-->
<!--import { computed } from 'vue'-->
<!--import {defineComponent} from "vue";-->

<!--const people = [-->
<!--    {-->
<!--        name: 'Jane Cooper',-->
<!--        title: 'Regional Paradigm Technician',-->
<!--        department: 'Optimization',-->
<!--        role: 'Admin',-->
<!--        email: 'jane.cooper@example.com',-->
<!--        image:-->
<!--            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',-->
<!--    },-->
<!--    // More people...-->
<!--]-->

<!--export default defineComponent({-->
<!--    components: {-->
<!--        Paginate,-->
<!--        pagination-->
<!--    },-->
<!--    props: ['user', 'pageData'],-->
<!--    data() {-->
<!--        return {-->
<!--            people,-->
<!--            saat: '',-->
<!--        }-->
<!--    },-->
<!--    setup() {-->
<!--        let pageData = computed({-->
<!--            get: () => usePage().props.value.pageData,-->
<!--            set: (obj) =>  {-->
<!--                usePage().props.value.pageData = obj-->
<!--            }-->
<!--        })-->
<!--        //callback from pagination component-->
<!--        function paginationUpdate(pagination) {-->
<!--            pageData.value = pagination.data.pageData-->
<!--        }-->
<!--        return { pageData, paginationUpdate }-->
<!--    },-->
<!--    methods: {-->
<!--        tableDate(date) {-->
<!--            return moment(date, 'LL dddd', 'tr').format('LL dddd')-->
<!--        },-->
<!--    }-->
<!--})-->
<!--</script>-->

