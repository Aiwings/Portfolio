<template>
  <div class="modal is-active">
    <div class="modal-background" />
    <div class="modal-card">
      <header class="modal-card-head is-primary">
        <p class="modal-card-title">
          {{ title }}
        </p>
        <a
          class="delete"
          aria-label="close"
          @click="$emit('modalClose')"
        >
          <svg-vue
            class="iconsvg cancel-circle"
            icon="cancel-circle"
          />
        </a>
      </header>
      <section class="modal-card-body">
        <slot />
      </section>
      <footer class="modal-card-foot">
        <button
          class="button is-success"
          @click="$emit('modalAction')"
        >
          Valider
        </button>
        <button
          class="button"
          @click="$emit('modalClose')"
        >
          Annuler
        </button>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title:{
      type:String,
      default:"default title"
    },
  },
  emits: ["modalClose", "modalAction"],
};
</script>

<style>
.cancel-circle {
  width: 1.5em;
  height: 1.5em;
}
</style>