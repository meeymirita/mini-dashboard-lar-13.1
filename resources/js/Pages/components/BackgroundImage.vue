<script setup>
const props = defineProps({
    status: Boolean
})

function changeBackground() {
    if (props.status) {
        return {
            backgroundImage:
                "url('https://avatars.mds.yandex.net/i?id=5718ae59c3611e8e823519eee210c1b0_l-5372116-images-thumbs&ref=rim&n=13&w=1920&h=1080')"
        }
    }

    return {}
}
</script>

<template>
    <div
        class="min-h-screen bg-cover bg-center"
        :style="changeBackground()"
    >
        <slot/>
    </div>
</template>
