<template>
    <app-layout title="Reservation">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reservation
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class=" bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-200">
                    <table-reservation/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'
import TableReservation from "@/Pages/Components/TableReservation";

export default defineComponent({
    components: {
        TableReservation,
        AppLayout,
        Welcome,
    },
    provide(){
        return{
            items: this.$page.props.items,
            user: this.$page.props.user
        }
    }
})
</script>
