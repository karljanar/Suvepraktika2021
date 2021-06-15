<template>
    <jet-authentication-card>
        <template #logo>
            <inertia-link :href="route('login')" class="text-sm text-2xl text-gray-600 hover:text-gray-900">
                Logi Sisse
            </inertia-link>
            <inertia-link :href="route('register')" class="text-sm text-2xl text-gray-600 hover:text-gray-900">
                Registreeru
            </inertia-link>
        </template>

        <div class="mb-4 text-sm text-gray-600">
            <template v-if="! recovery">
                Kinnitage juurdepääs oma kontole, sisestades autentimisrakenduse poolt pakutava autentimiskoodi.
            </template>

            <template v-else>
                Kinnitage juurdepääs oma kontole, sisestades ühe oma hädaolukorra taastamise koodidest.
            </template>
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <jet-label for="code" value="Kood" />
                <jet-input ref="code" id="code" type="text" inputmode="numeric" class="mt-1 block w-full" v-model="form.code" autofocus autocomplete="one-time-code" />
            </div>

            <div v-else>
                <jet-label for="recovery_code" value="Taastamise Kood" />
                <jet-input ref="recovery_code" id="recovery_code" type="text" class="mt-1 block w-full" v-model="form.recovery_code" autocomplete="one-time-code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Kasuta taastamise koodi
                    </template>

                    <template v-else>
                        Autentimiskoodi kasutamine
                    </template>
                </button>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   Logi sisse
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
        },

        data() {
            return {
                recovery: false,
                form: this.$inertia.form({
                    code: '',
                    recovery_code: '',
                })
            }
        },

        methods: {
            toggleRecovery() {
                this.recovery ^= true

                this.$nextTick(() => {
                    if (this.recovery) {
                        this.$refs.recovery_code.focus()
                        this.form.code = '';
                    } else {
                        this.$refs.code.focus()
                        this.form.recovery_code = ''
                    }
                })
            },

            submit() {
                this.form.post(this.route('two-factor.login'))
            }
        }
    }
</script>
