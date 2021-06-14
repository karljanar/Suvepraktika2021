<template>
	<div class="popup fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-50">
		<div class="popup-inner flex items-start justify-center min-h-screen pt-24 text-center">
			<slot />
			<button class="popup-close" @click="TogglePopup()">
				Close Popup
			</button>
		</div>
	</div>
</template>

<script>
export default {
	props: ['TogglePopup']
}
</script>