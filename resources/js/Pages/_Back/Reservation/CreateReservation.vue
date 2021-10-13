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
                    <form @submit.prevent="submit">
                        <div class="p-5 sm:p-10 bg-white border-b border-gray-200">
                            <!-- Logo -->
                            <div class="flex items-center p-2 sm:px-10">
                                <logo class="h-16"/>
                                <h2 class="ml-2 mt-2 text-3xl">Reservation Register</h2>
                            </div>
                            <div class="grid grid-cols-12  gap-2 sm:gap-2 mt-6">
                                <!-- Date -->
                                <div class="col-span-12 sm:col-span-12">
                                    <jet-label for="date">
                                        {{ labelDate }}
                                    </jet-label>
                                    <jet-input @change.prevent="selectDate" v-model="form.date" type="date" :min="now" class="mt-1 w-full" id="date" autocomplete="date"/>
                                    <input-error :message="form.errors.date" class="mt-2"/>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between my-1.5">
                                <div v-for="item in hours" :key="item" class="my-2 mr-2 sm:mr-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <label :for="`hour-${item.id}`" class="py-1.5 px-2 text-sm border border-gray-300 rounded-md hover: shadow-sm"
                                           :role="!item?.isActive ? 'button' :null"
                                           :class="item?.isActive ? 'bg-gray-200 line-through' : 'hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50'">
                                        <input v-model="form.hour"
                                               type="checkbox"
                                               class="mb-1 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                               :value="item.hours" :id="`hour-${item.id}`"
                                               v-bind="{'disabled' : item?.isActive}"
                                               :class="item?.isActive ? 'bg-gray-200' : 'hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50'"/>
                                        {{ item.hours }}</label>
                                </div>
                            </div>
                            <input-error :message="form.errors.hour" class=""/>
                            <div class="grid grid-cols-12 gap-2 sm:gap-2">
                                <!-- Notes -->
                                <div class="col-span-12 sm:col-span-12">
                                    <jet-label for="name" value="Notes"/>
                                    <textarea v-model="form.notes" type="text" id="name" rows="3"
                                              class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                </div>
                                <!-- Name -->
                                <div class="col-span-12 sm:col-span-3">
                                    <jet-label for="name" value="Name"/>
                                    <jet-input v-model="user.name" type="text" readonly class="w-full" id="name"/>
                                </div>
                                <!-- Email -->
                                <div class="col-span-12 sm:col-span-3">
                                    <jet-label for="email" value="Email"/>
                                    <jet-input v-model="user.email" type="email" readonly class="w-full" id="email"/>
                                </div>
                                <!-- Telephone -->
                                <div class="col-span-12 sm:col-span-2">
                                    <jet-label for="telephone" value="Telephone"/>
                                    <jet-input v-model="user.telephone" type="tel" readonly class=" w-full" id="telephone"/>
                                </div>
                                <!-- Site Block No -->
                                <div class="col-span-12 sm:col-span-2">
                                    <jet-label for="siteBlockNo" value="Site block No"/>
                                    <jet-input v-model="user.siteBlockNo" type="number" readonly class="w-full" id="siteBlockNo"/>
                                </div>
                                <!-- Apartment No -->
                                <div class="col-span-12 sm:col-span-2">
                                    <jet-label for="apartmentNo" value="Apartment No"/>
                                    <jet-input v-model="user.apartmentNo" type="number" readonly class="w-full" id="apartmentNo"/>
                                </div>
                                <div class="col-span-12 sm:col-span-12 flex items-center justify-end mt-4">
                                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Register
                                    </jet-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'

import Logo from "@/Pages/Components/Logo"
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetCheckbox from '@/Jetstream/Checkbox'
import AppLayout from "@/Layouts/AppLayout"
import DangerButton from "@/Jetstream/DangerButton";
import SecondaryButton from "@/Jetstream/SecondaryButton";
import ValidationErrors from "@/Jetstream/ValidationErrors";
import InputError from "@/Jetstream/InputError";
import Welcome from "@/Jetstream/Welcome";
import moment from "moment";
import 'moment/locale/tr'


export default defineComponent({
    components: {
        InputError, ValidationErrors, SecondaryButton, DangerButton, Logo, JetApplicationMark, AppLayout,
        JetInput, JetButton, JetLabel, JetCheckbox, Welcome,
    },
    props: ['user', 'hours', 'date'],
    data() {
        return {
            now: moment('', 'YYYY-MM-DD', 'tr').format('YYYY-MM-DD'),
            bool: '',
            form: this.$inertia.form({
                user_id: this.user.id,
                date: this.date,
                hour: [],
                notes: '',

            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('reservation.store'), {
                onSuccess: () => {
                    this.form.reset("date", "hour", "notes")
                    this.form.date = this.date
                    this.bool = false
                },
                preserveScroll: this.bool // sayfa yukarı kaydırıldı
            })
        },
        selectDate() {
            this.$inertia.get(this.route('reservation.show', this.form.date), {
                onSuccess: () => {
                    this.form.date = this.date
                },
            })
        }
    },
    computed: {
        labelDate() {
            return moment(this?.form?.date,'LL dddd','tr').format('LL dddd')
        },
        errors() {
            return this.form?.errors ?? this.$page.props?.error
        },
    },
})

</script>
