<template>
    <jet-action-section>
        <template #title>
            Kustuta konto
        </template>

        <template #description>
            Jäädavalt kustutada oma konto.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
             Kui teie konto on kustutatud, kustutatakse kõik selle ressursid ja andmed jäädavalt. Enne oma konto kustutamist laadige alla kõik andmed või teave, mida soovite säilitada.
            </div>

            <div class="mt-5">
                <jet-danger-button @click="confirmUserDeletion">
                    Kustuta Kasutaja
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Kustuta Kasutaja
                </template>

                <template #content>
                    Kas olete kindel, et soovite oma konto kustutada? Kui teie konto on kustutatud, kustutatakse kõik selle ressursid ja andmed jäädavalt. Sisestage oma parool, et kinnitada, et soovite oma konto jäädavalt kustutada.

                    <div class="mt-4">
                        <jet-input type="password" class="mt-1 block w-3/4" placeholder="Parool"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="deleteUser" />

                        <jet-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Tühista
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Kustuta Kasutaja
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionSection,
            JetDangerButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            deleteUser() {
                this.form.delete(route('current-user.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingUserDeletion = false

                this.form.reset()
            },
        },
    }
</script>
