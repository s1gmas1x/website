<template>
  <button btntype="text"
    :class="{
      'button': true,
      'primary': btntype === 'primary',
      'small': btntype === 'small',
      'small primary': btntype === 'small-primary',
    }"
  >
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    btntype: {
      type: String,
      },
  },
};
</script>

<style>
</style>