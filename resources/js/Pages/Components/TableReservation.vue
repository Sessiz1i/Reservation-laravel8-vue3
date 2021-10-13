<template>
    <paginate />
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 border-t">
                        <tr>
                            <th scope="col" class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="item in items.data" :key="item.email">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4 mr-1">
                                    <div class="text-sm text-gray-900">{{ tableDate(item.date) }}</div>
                                    <h1 class="text-sm text-gray-500">{{ item.hour.join(' ') }}</h1>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" :src="user?.profile_photo_url" :alt="user.name"/>
                                    </div>
                                    <div class="ml-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
                                        <div class="text-sm text-gray-500">{{ user.email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center ">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <paginate class="border-t"/>
</template>

<script>
import moment from "moment/moment";
import Paginate from "@/Pages/Components/Paginate";
import {defineComponent} from "vue";

export default defineComponent({
    components: {
        Paginate,
    },
    inject:["items","user"],
    methods: {
        tableDate(date) {
            return moment(date, 'LL dddd', 'tr').format('LL dddd')
        },

    }
})
</script>
