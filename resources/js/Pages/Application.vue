<template>

    <app-layout>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert" v-if="this.$page.props.flash.message">

                        <div class="flex">

                            <div>

                                <p class="text-sm">{{ this.$page.props.flash.message }}</p>

                            </div>

                        </div>

                    </div>
                    <button @click="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 text-center">Lisa rakendus</button>
                    <table class="table-fixed w-full">
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20 border-2 border-gray-200 ">Raamistik</th>
                        <th class="px-4 py-2 w-20 border-2 border-gray-200 ">Kokku</th>
                    </tr>
                    <tr>
                        <th class="w-1/4 border-2 border-gray-200">Drupal</th>
                        <th class="w-1/4 border-2 border-gray-200">{{dcount}}</th>
                    </tr>
                    <tr>
                        <th class="w-1/4 border-2 border-gray-200">Wordpress</th>
                        <th class="w-1/4 border-2 border-gray-200">{{wcount}}</th>
                    </tr>

                    </table>

                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20 border-2 border-gray-200 ">No.</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Raamistik</th>
                            <th class="px-4 py-2 border-2 border-gray-200">URL</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Reaalne URL</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Praegune versioon</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Rakenduse asukoht serveris</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Kommentaarid</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Tellija</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Tehniline vastutaja</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Sisu vastutaja</th>
                            <th class="px-4 py-2 border-2 border-gray-200">Muuda</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="row in data" :key="row.id">
                            <td class="w-1/4 border-2 border-gray-200">{{ row.id }}</td>
                            <template v-for="val in scrape">
                            <td v-if="row.version_scraper_id === val.id" class="w-1/4 border-2 border-gray-200">{{ val.application_name }}</td>
                            </template>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.app_url }}</td>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.real_app_url }}</td>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.current_version }}</td>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.app_loc_in_server }}</td>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.comments }}</td>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.service_subscriber_name }}</td>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.technical_supervisor_name }}</td>
                            <td class="w-1/4 border-2 border-gray-200">{{ row.content_supervisor_name }}</td>

                            <td class="border px-4 py-2">
                                <button @click="edit(row)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Muuda</button>
                                <button @click="deleteRow(row)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Kustuta</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">

                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">



                            <div class="fixed inset-0 transition-opacity">

                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

                            </div>

                            <!-- This element is to trick the browser into centering the modal contents. -->

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                                <form>

                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                        <div class="">

                                            <div class="mb-4" >
                                                <label class="block shadow-5xl  w-80 italic placeholder-gray-500"> Raamistik</label>
                                                <select name="version_scraper_id" id="version_scraper_id"
                                                        class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                        v-model="form.version_scraper_id">

                                                    <option v-for="val in scrape" :value="val.id">{{val.application_name}}</option>

                                                </select>

                                                <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>

                                            </div>

                                            <div class="mb-4">

                                                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                       name="app_url"
                                                       placeholder="Rakenduse URL..."
                                                       v-model="form.app_url">

                                                <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>

                                            </div>

                                            <div class="mb-4">

                                                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                       name="real_app_url"
                                                       placeholder="Rakenduse tegelik URL..."
                                                       v-model="form.real_app_url">

                                            <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>
                                            </div>

                                            <div class="mb-4">

                                                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                       name="current_version"
                                                       placeholder="Praegune versioon..."
                                                       v-model="form.current_version">

                                            <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>
                                            </div>

                                            <div class="mb-4">

                                                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                       name="app_loc_in_server"
                                                       placeholder="Rakenduse asukoht serveris..."
                                                       v-model="form.app_loc_in_server">

                                                <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>
                                            </div>

                                            <div class="mb-4">

                                                <label class="block shadow-5xl  w-80 italic placeholder-gray-500"> Kommentaarid</label>
                                                <textarea class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                          name="comments" placeholder="Kommentaarid..."
                                                          v-model="form.comments"> </textarea>

                                                <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>
                                            </div>

                                            <div class="mb-4">

                                                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                       name="service_subscriber_name"
                                                       placeholder="Rakenduse tellija nimi..."
                                                       v-model="form.service_subscriber_name">

                                                <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>
                                            </div>

                                            <div class="mb-4">

                                                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                       name="technical_supervisor_name"
                                                       placeholder="Rakenduse tehniline vastutaja..."
                                                       v-model="form.technical_supervisor_name">

                                                <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>
                                            </div>

                                            <div class="mb-4">

                                                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-500"
                                                       name="content_supervisor_name"
                                                       placeholder="Rakenduse sisu vastutaja..."
                                                       v-model="form.content_supervisor_name">

                                                <div v-if="this.$page.props.errors.title" class="text-red-500">{{ this.$page.props.errors.title[0] }}</div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                              <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="!editMode" @click="save(form)">

                                Salvesta

                              </button>

                            </span>

                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                              <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="editMode" @click="update(form)">

                                Muuda

                              </button>

                            </span>

                                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                              <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                                Tühista

                              </button>

                            </span>

                                    </div>

                                </form>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </app-layout>

</template>

<script>

import AppLayout from './../Layouts/AppLayout'

import Welcome from './../Jetstream/Welcome'

export default {

    components: {

        AppLayout,

        Welcome,

    },

    props: ['data', 'scrape', 'errors', 'dcount', 'wcount'],

    data() {

        return {

            editMode: false,

            isOpen: false,

            form: {

                version_scraper_id: null,

                real_app_url: null,

                app_url: null,

                current_version: null,

                app_loc_in_server: null,

                comments: null,

                service_subscriber_name: null,

                technical_supervisor_name: null,

                content_supervisor_name: null,

            },

        }

    },

    methods: {

        openModal: function () {

            this.isOpen = true;

        },

        closeModal: function () {

            this.isOpen = false;

            this.reset();

            this.editMode=false;

        },

        reset: function () {

            this.form = {

                version_scraper_id: null,

                real_app_url: null,

                app_url: null,

                current_version: null,

                app_loc_in_server: null,

                comments: null,

                service_subscriber_name: null,

                technical_supervisor_name: null,

                content_supervisor_name: null,

            }

        },

        save: function (data) {

            this.$inertia.post('/apps', data)

            this.reset();

            this.closeModal();

            this.editMode = false;

        },

        edit: function (data) {

            this.form = Object.assign({}, data);

            this.editMode = true;

            this.openModal();

        },

        update: function (data) {

            data._method = 'PATCH';

            this.$inertia.post('/apps/edit/' + data.id, data)

            this.reset();

            this.closeModal();

        },

        deleteRow: function (data) {

            if (!confirm('Kas te olete kindlat, et soovite antud rakendust kustutada?')) return;

            data._method = 'DELETE';

            this.$inertia.post('/apps/destroy/' + data.id, data)

            this.reset();

            this.closeModal();

        }

    }

}

</script>
