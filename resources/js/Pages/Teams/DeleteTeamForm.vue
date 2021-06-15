<template>
    <jet-action-section>
        <template #title>
            Kustuta meeskond
        </template>

        <template #description>
            Kustuta meeskond igaveseks.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Meeskonna kustutamisel, kustutatakse kõik selle meeskonna andmed. Enne kustutamist laadige alla kõik teile vajalikud andmed meeskonna kohta.
            </div>

            <div class="mt-5">
                <jet-danger-button @click="confirmTeamDeletion">
                    Kustuta meeskond
                </jet-danger-button>
            </div>

            <!-- Delete Team Confirmation Modal -->
            <jet-confirmation-modal :show="confirmingTeamDeletion" @close="confirmingTeamDeletion = false">
                <template #title>
                    Kustuta meeskond
                </template>

                <template #content>
                    Kas olete kindel, et soovite antud meeskonna kustutada? Meeskonna kustutamisel, kustutatakse kõik selle meeskonna andmed.

                </template>

                <template #footer>
                    <jet-secondary-button @click="confirmingTeamDeletion = false">
                        Tühista
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click="deleteTeam" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Kustuta meeskond
                    </jet-danger-button>
                </template>
            </jet-confirmation-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        props: ['team'],

        components: {
            JetActionSection,
            JetConfirmationModal,
            JetDangerButton,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingTeamDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmTeamDeletion() {
                this.confirmingTeamDeletion = true
            },

            deleteTeam() {
                this.form.delete(route('teams.destroy', this.team), {
                    errorBag: 'deleteTeam'
                });
            },
        },
    }
</script>
