<template>
    <jet-authentication-card>
        <template #logo>
            <inertia-link :href="route('login')" class=" text-sm text-2xl text-gray-600 hover:text-gray-900">
                Logi Sisse
            </inertia-link>
            <inertia-link :href="route('register')" class="text-sm text-2xl text-gray-600 hover:text-gray-900">
                Registreeru
            </inertia-link>
        </template>
        <div class="text-2xl text-center">
            <p>Suvepraktika 2021</p>
        </div>
    </jet-authentication-card>
</template>
<script>
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
export default {
    components: {
        JetAuthenticationCard,

    },
}
</script>
